<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Products;

use App\Models\Table;

use App\Traits\Functions;
use App\Models\OrderItem;
use DataTables;
use Auth;
use DB;
use Validator;

class TablesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $res = Table::paginate(8);
        return view('admin.tables.list')->with('records', $res);
    }
    
    // public function show($id)
    // {
    //     $products['records'] = OrderItem::where('order_id')->latest()->get();
    //     $products['id']      = $id;
    //     return view('admin.orders.list')->with($products);
    // }
    
    public function create(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'restaurant_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'table_name' => 'required',
            'seating_capacity' => 'required',
        ]);
        
        if ($request->input()) 
        {
            if ($valid->fails()) 
            {
                return redirect()->back()->with('danger', 'Fill the required fields please.');
            }
            
            $files = $request->file('table_image');
            if(!empty($files)):
                $image = singleFileUpload($request->file('table_image'),
                request()->segment(2), 
                $files->getClientOriginalName());
                $nameImg = $files->getClientOriginalName();
            else:
                $nameImg = "";
            endif;
            
            $data = new Table();
            $data->restaurant_id        = $request->restaurant_id;
            $data->price      = $request->price;
            $data->table_name    = $request->table_name;
            $data->seating_capacity   = $request->seating_capacity;
            $data->description = $request->description;
            $data->picture = $nameImg;
            $data->status = 1;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Added');
            }
        }
        return view('admin.tables.add');
    }
    
    public function remove($id)
    {
        $view = Table::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }

    public function show($id)
    {
        $res = Table::where('id',$id)->first();
        return view('admin.tables.show')->with('records', $res);
    }

    public function update(Request $request, $id){
        
        $valid = Validator::make($request->all(), [
            'restaurant_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'table_name' => 'required',
            'seating_capacity' => 'required',
        ]);
        
        if ($request->input()) {
            
            if ($valid->fails()) 
            {
                return redirect()->back()->with('danger', 'Fill the required fields please.');
            }
            
            $files = $request->file('table_image');
            if(!empty($files)):
                $image = singleFileUpload($request->file('table_image'),request()->segment(2), $files->getClientOriginalName());
                $name = $files->getClientOriginalName();
            else:
                $name = $request->table_img;
            endif;
            $data = Table::find($id);
            $data->table_name        = $request->table_name;
            $data->restaurant_id        = $request->restaurant_id;
            $data->price      = $request->price;
            $data->picture    = $request->picture;
            $data->seating_capacity   = $request->seating_capacity;
            $data->description = $request->description;
            $data->picture = $name;
            $data->status = $request->status;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Updated');
            }
        }

        return view('admin.tables.show');
    }
    
    public static function search(Request $request)
    {
        if(isset($_GET['query']))
        {
            $search_text = $_GET['query'];
            $orders = DB::table('restaurant_tables')
            ->where('table_name','LIKE','%'.$search_text.'%')
            ->paginate(8)
            ->withQueryString();
            return view('admin.tables.list', ['records'=>$orders]);
        }
        else
        {
            return view('admin.tables.list');
        }
    }
}