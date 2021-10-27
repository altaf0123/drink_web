<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Products;
use App\Traits\Functions;
use App\Models\OrderItem;
use DataTables;
use Auth;
use DB;
use Validator;
use Redirect;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $ord = DB::table('orders')
              ->join('order_items','order_items.order_id','=','orders.id')
              ->join('products','products.id','=','order_items.item_id')
              ->join('restaurants','restaurants.id','=','products.restaurant_id')
              ->select('orders.*','order_items.order_id as order_id','restaurants.id as rest_id')
              ->where('products.restaurant_id','=',Auth::User()->restaurant_id)
              ->groupBy('orders.id')
              ->paginate(8);

        return view('bar.orders.list')->with('records', $ord);
    }
    
    // public function create(Request $request)
    // {
    //     if ($request->input()) 
    //     {
    //         $data = new Order();
    //         $data->user_id        = Auth::id();
    //         $data->sub_total      = $request->sub_total;
    //         $data->grand_total    = $request->grand_total;
    //         $data->order_status   = $request->order_status;
    //         $data->payment_status = $request->payment_status;
    //         $result = $data->save();
    //         if ($result):
    //             foreach ($request->item_id as $item => $key):
    //                 $data1           = new OrderItem();
    //                 $data1->order_id = $data->id;
    //                 $data1->item_id = $key;
    //                 $data1->qty     = $request->qty[$item];
    //                 $data1->price   = $this->getProductPrice($key);
    //                 $data1->save();
    //             endforeach;
    //             DB::table('waiter_orders')->insert([
    //                 'waiter_id' => $request->waiter_id,
    //                 'order_id' => $data->id
    //             ]);
    //         endif;
    //         return redirect()->back()->with('success', 'Added');
    //     }
    //     return view('bar.orders.add');
    // }
    
    public function update(Request $request, $id)
    {
        if ($request->input())
        {
            $rules = [
                'waiter_id' => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
            if(!$validator->fails())
            {   
                $waiter = $request->waiter_id;
                try {
                    DB::beginTransaction();
                    $res = DB::statement("INSERT INTO `waiter_orders`(`order_id`, `waiter_id`) VALUES ($id, $request->waiter_id) ON DUPLICATE KEY UPDATE order_id= $id, waiter_id = $waiter", [$id, $request->waiter_id]);
                    $res1 = DB::table('orders')
                      ->where('id', $id)
                      ->update(['is_seen' => 0]);  
                    DB::commit();
                    
                    return redirect()
                        ->back()
                        ->with('success', 'Updated');
                        
                } catch(\Exception $ex){
                    
                    DB::rollback();
                    return redirect()
                        ->back()
                        ->with('danger', $ex);
                        
                }
            } 
            else 
            {
                $errors = $validator->errors()->toArray();
                if(!empty($errors)){
                    foreach($errors as $row)
                    {
                        return Redirect::to('user/orders/view/'.$id)
                            ->with('danger', $row[0]);
                    }
                }
            }
        }
        return view('bar.orders.show');
    }
    
    public function getProductPrice($id)
    {
        $res = Products::where('id', $id)->pluck('price');
        return json_decode($res)[0];
    }

    public function show($id)
    {
        $viewOrder = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->leftjoin('waiter_orders', 'orders.id', '=', 'waiter_orders.order_id')
        ->where('order_items.order_id','=',$id)
        ->get();
        
        return view('bar.orders.show')->with('records', $viewOrder);
       
    }

    public function toPending($id)
    {
        Order::where('id', $id)
             ->where('user_id','=', Auth::id())
             ->update(['order_status' => 'completed']);
            
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toComplete($id)
    {
        Order::where('id', $id)
        ->where('user_id','=', Auth::id())
        ->update(['order_status' => 'pending']);
            
        return redirect()->back()->with('success', 'Status Changed');
    }
    
    public function toPaid($id)
    {
        $ord               = Order::find($id);
        $ord->payment_status = 'paid';
        $ord->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toUnPaid($id)
    {
        $ord               = Order::find($id);
        $ord->payment_status = 'unpaid';
        $ord->save();
        return redirect()->back()->with('success', 'Status Changed');
    }
    
    public static function search(Request $request)
    {
        if(isset($_GET['query']))
        {
            $search_text = $_GET['query'];
            if($request->input('search_type') == 'id') {
                
                $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->join('order_items','order_items.order_id','=','orders.id')
                ->join('products','products.id','=','order_items.item_id')
                ->select('users.name', 'orders.*','order_items.order_id')
                ->where('products.restaurant_id','=',Auth::User()->restaurant_id)
                ->whereJsonContains('payment_response->id', $search_text)
                ->groupBy('orders.id')
                ->paginate(1)
                ->withQueryString();
                
            } elseif($request->input('search_type') == 'customer') {
                
                $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->join('order_items','order_items.order_id','=','orders.id')
                ->join('products','products.id','=','order_items.item_id')
                ->join('restaurants','restaurants.id','=','products.restaurant_id')
                ->select('users.name', 'orders.*','order_items.order_id')
                ->where('users.name','LIKE','%'.$search_text.'%')
                ->where('products.restaurant_id','=',Auth::User()->restaurant_id)
                ->groupBy('orders.id')
                ->paginate(8)
                ->withQueryString();
                
            } else {
                
                $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->join('order_items','order_items.order_id','=','orders.id')
                ->join('products','products.id','=','order_items.item_id')
                ->join('restaurants','restaurants.id','=','products.restaurant_id')
                ->select('users.name', 'orders.*','order_items.order_id')
                ->where('products.restaurant_id','=',Auth::User()->restaurant_id)
                ->where('orders.created_at','LIKE','%'.$search_text.'%')
                ->groupBy('orders.id')
                ->paginate(8)
                ->withQueryString();
                
            }
            
            return view('bar.orders.list', ['records'=>$orders, 'search_type'=>$request->input('search_type')]);
        }
        else
        {
            return view('bar.orders.list');
        }
    }
    
    public function order_chart_by_restaurant($id)
    {
        $orders = raw_q("SELECT MONTH(orders.created_at) 'month', count(orders.id) as total FROM `orders` 
            INNER JOIN order_items ON order_items.order_id = orders.id 
            INNER JOIN products ON products.id = order_items.item_id 
            INNER JOIN restaurants ON restaurants.id = products.restaurant_id 
            WHERE products.restaurant_id = ".Auth::User()->restaurant_id." GROUP BY MONTH(orders.created_at)");
        $data = $orders ?? "";
        foreach($data as $row)
        {
            $datas[] = $row;
        }
        echo json_encode($datas);
    }

}