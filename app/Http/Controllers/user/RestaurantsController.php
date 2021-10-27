<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use App\Traits\Functions;
use App\Models\OrderItem;
use DataTables;
use Auth;

class RestaurantsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $restaurant_id = User::where('id')->pluck('restaurant_id')->first();
        $ord = Products::where('restaurant_id', $restaurant_id)->paginate(8);
        return view('admin.listProduct')->with('records', $ord);
    }

    public function create(Request $request){
        if ($request->input()) {
            $files = $request->file('image');

            $image = singleFileUpload($request->file('image'),request()->segment(2), $files->getClientOriginalName());

            $data = new Products();
            $data->name = $request->name;
            $data->price = $request->price;
            $data->picture = $files->getClientOriginalName();
            $data->restaurant_id = $request->restaurant_id;
            $data->cat_id = $request->cat_id;
            $data->description = $request->desc;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Product added');
            }
        }

        return view('admin.addProduct');

    }

    public function viewProducts($id){
        $products['records'] = OrderItem::where('order_id')->latest()->get();
        $products['id'] = $id;
        return view('admin.viewProduct')->with($products);
    }
    
    public function viewProduct($id){
        $viewOrder = Order::whereHas('itemsUser', function($query) use($id){
            $query->where('orders.id', $id);
         })->get();
        return view('admin.viewOrder')->with('records', $viewOrder);
    }

    public function toPending($id){
        $ord = Order::find($id);
        $ord->order_status = 'completed';
        $ord->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toComplete($id){
        $ord = Order::find($id);
        $ord->order_status = 'pending';
        $ord->save();
        return redirect()->back()->with('success', 'Status Changed');
    }
    public static function getCatById($id){
        $cat = Category::where($id);
        return $cat;
    }
}
