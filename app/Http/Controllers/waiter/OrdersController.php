<?php

namespace App\Http\Controllers\waiter;

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

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $ord = DB::table('waiter_orders')
            ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            ->select('orders.*')
            ->paginate(8);
        return view('waiter.orders.list')->with('records', $ord);
    }

    public function getProductPrice($id)
    {
        $res = Products::where('id', $id)->pluck('price');
        return json_decode($res)[0];
    }

    public function show($id)
    {
        Order::where('id', $id)
            ->update(['is_seen' => '1']);

        $viewOrder = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('waiter_orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->where('order_items.order_id', '=', $id)
            ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            ->get();

        return view('waiter.orders.show')->with('records', $viewOrder);
    }

    public function toPending($id)
    {
        try {
            $get = Order::find($id);
            $get->delivered_at = date("Y-m-d h:i:s");
            $get->save();
        
            Order::where('id', $id)
                ->update(['order_status' => 'completed']);
        } catch(\Exception $e) {
            return redirect()->back()->with('danger', 'Something went wrong!');
        }
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toComplete($id)
    {
        try {
            $get = Order::find($id);
            $get->delivered_at = NULL;
            $get->save();
    
            Order::where('id', $id)
                ->update(['order_status' => 'pending']);
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Something went wrong!');
        }
        return redirect()->back()->with('success', 'Status Changed');
    }

    public static function search(Request $request)
    {
        if (isset($_GET['query'])) {
            $search_text = $_GET['query'];
            if($request->input('search_type') == 'id') {
                $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->join('waiter_orders','waiter_orders.order_id','=','orders.id')
                ->select('orders.*')
                ->where('waiter_orders.waiter_id','=',Auth::User()->id)
                ->whereJsonContains('orders.payment_response->id', $search_text)
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
            // if ($request->input('search_type') == 'id') {
            //     // $orders = DB::table('waiter_orders')
            //     //     ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            //     //     ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            //     //     ->where('orders.id','LIKE','%'.$search_text.'%')
            //     //     ->select('orders.*')
            //     //     ->paginate(8)
            //     //     ->withQueryString();
            //     $orders = DB::table('waiter_orders')
            //         ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            //         ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            //         ->whereJsonContains('payment_response->id', $search_text)
            //         ->select('orders.*')
            //         ->paginate(8)
            //         ->withQueryString();
            // } else if ($request->input('search_type') == 'customer') {
            //     $orders = DB::table('waiter_orders')
            //         ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            //         ->join('users', 'users.id', '=', 'orders.user_id')
            //         ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            //         ->where('users.name', 'LIKE', '%' . $search_text . '%')
            //         ->select('orders.*')
            //         ->paginate(8)
            //         ->withQueryString();
            //     // $orders = DB::table('waiter_orders')
            //     //     ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            //     //     ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            //     //     ->where('orders.grand_total','LIKE','%'.$search_text)
            //     //     ->select('orders.*')
            //     //     ->paginate(8)
            //     //     ->withQueryString();
            // } else {
            //     $orders = DB::table('waiter_orders')
            //         ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            //         ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            //         ->where('orders.created_at', 'LIKE', '%' . $search_text . '%')
            //         ->select('orders.*')
            //         ->paginate(8)
            //         ->withQueryString();
            // }
            return view('waiter.orders.list', ['records' => $orders, 'search_type' => $request->input('search_type')]);
        } else {
            return view('waiter.orders.list');
        }
    }
    
    public function ledger()
    {
        
        $res = DB::table('users')
        ->where('role', 'waiter')
        ->where('restaurant_id','!=',0)
        ->where('id',Auth::User()->id)
        ->orderBy('created_at','DESC')
        ->paginate(4);
        // $res = DB::table('users')
        //         ->where('users.id', '=',Auth::user()->id)
        //         ->leftjoin('orders', 'orders.user_id', '=', 'users.id')
        //         ->groupBy('users.name')
        //         ->select('users.name', 'users.email as email'
        //             ,DB::raw('CASE 
        //                     WHEN orders.grand_total IS NULL THEN 0
        //                     ELSE orders.grand_total * orders.grand_total
        //             END AS Profit'),
        //             DB::raw('count(orders.id) as TotalOrders'))->paginate(4);
                    
        return view('waiter.orders.list1')->with('records', $res);
    }
    
}
