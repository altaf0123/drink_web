<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Products;
use App\Models\Restaurant;
use App\Models\User;
use App\Traits\Functions;
use App\Models\OrderItem;
use DataTables;
use Auth;
use DB;
use Validator; 

class ProductsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $ord = Restaurant::paginate(8);
        return view('admin.products.list')->with('records', $ord);
    }

    public function show2($restaurant)
    {
        $ord = Products::where('restaurant_id',$restaurant)->where('restaurant_id','!=',0)->paginate(8);
        return view('admin.products.list2')->with('records', $ord);
    }
    
    public function show($id)
    {
        $view = Products::where('id', $id)->first();
        return view('admin.products.show')->with('records', $view);
    }
    
    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        
        if ($request->input()) {
            
            if ($valid->fails()) 
            {
                return redirect()->back()->with('danger', 'Fill the required fields please.');
            }
            
            $files = $request->file('image');
            if(!empty($files)):
                $image = singleFileUpload($request->file('image'),request()->segment(2), $files->getClientOriginalName());
                $name = $files->getClientOriginalName();
            else:
                $name = $request->prod_img;
            endif;
            $data = Products::find($id);
            $data->name = $request->name;
            $data->price = $request->price;
            $data->picture = $name;
            $data->restaurant_id = $request->restaurant_id;
            $data->cat_id = $request->cat_id;
            $data->description = $request->description;
            $data->type = $request->type;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Updated');
            }
        }

        return view('admin.products.show');
    }

    public function create(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        
        if ($request->input()) {
            
            if ($valid->fails()) 
            {
                return redirect()->back()->with('danger', 'Fill the required fields please.');
            }
            
            $files = $request->file('image');

            $image = singleFileUpload($request->file('image'),request()->segment(2), $files->getClientOriginalName());

            $data = new Products();
            $data->name = $request->name;
            $data->price = $request->price;
            $data->picture = $files->getClientOriginalName();
            $data->restaurant_id = $request->restaurant_id;
            $data->cat_id = $request->cat_id;
            $data->description = $request->description;
            $data->type = $request->type;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Product added');
            }
        }
        return view('admin.products.add');
    }

    public function remove($id)
    {
        $view = Products::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }
        
    public static function search(Request $request)
    {
        if(isset($_GET['query']))
        {
            $search_text = $_GET['query'];
            $orders = DB::table('products')
            ->where('name','LIKE','%'.$search_text.'%')
            ->paginate(8)
            ->withQueryString();
            return view('admin.products.list2', ['records'=>$orders]);
        }
        else
        {
            return view('admin.products.list2');
        }
    }
    // public function viewProducts($id){
    //     $products['records'] = OrderItem::where('order_id')->latest()->get();
    //     $products['id'] = $id;
    //     return view('admin.viewProduct')->with($products);
    // }
    
    // public function viewProduct($id){
    //     $viewOrder = Order::whereHas('itemsUser', function($query) use($id){
    //         $query->where('orders.id', $id);
    //      })->get();
    //     return view('admin.viewOrder')->with('records', $viewOrder);
    // }

    // public function toPending($id){
    //     $ord = Order::find($id);
    //     $ord->order_status = 'completed';
    //     $ord->save();
    //     return redirect()->back()->with('success', 'Status Changed');
    // }

    // public function toComplete($id){
    //     $ord = Order::find($id);
    //     $ord->order_status = 'pending';
    //     $ord->save();
    //     return redirect()->back()->with('success', 'Status Changed');
    // }
    // public static function getCatById($id){
    //     $cat = Category::where($id);
    //     return $cat;
    // }
}
