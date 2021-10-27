<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Order;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $currentMonth = date('m');
        $todays = date('Y-m-d') . '%';
        $id = Auth::user()->id;

        $res['active']          = Order::where('user_id', Auth::user()->user_id)
                                    ->where('order_status','completed')
                                    ->get()->count();
                            
        $res['inactive']        = Order::where('user_id', Auth::user()->user_id)
                                    ->where('order_status','pending')
                                    ->get()->count();
        
        $res['active_user']     = User::where('account_status','active')
                                    ->where('role','waiter')
                                    ->where('restaurant_id',Auth::user()->restaurant_id)
                                    ->get()->count();
                             
        $res['inactive_user']   = User::where('account_status','suspended')
                                    ->where('role','waiter')
                                    ->where('restaurant_id',Auth::user()->restaurant_id)
                                    ->get()->count();

        $ord1 = DB::table('orders')
          ->join('order_items','order_items.order_id','=','orders.id')
          ->join('products','products.id','=','order_items.item_id')
          ->join('restaurants','restaurants.id','=','products.restaurant_id')
          ->select('orders.*','order_items.order_id as order_id','restaurants.id as rest_id')
          ->where('products.restaurant_id','=',Auth::User()->restaurant_id)
          ->whereMonth('orders.created_at', $currentMonth)
          ->count();
        $res['monthsale'] = $ord1;
        

        $ord = DB::table('orders')
          ->join('order_items','order_items.order_id','=','orders.id')
          ->join('products','products.id','=','order_items.item_id')
          ->join('restaurants','restaurants.id','=','products.restaurant_id')
          ->select('orders.*','order_items.order_id as order_id','restaurants.id as rest_id')
          ->where('products.restaurant_id','=',Auth::User()->restaurant_id)
          ->where('orders.created_at', 'LIKE', '%'.$todays.'%')
          ->count();
        $res['daysale'] = $ord;
        
        $res['orders'] = raw_q("SELECT MONTH(created_at) 'month', count(id) as total FROM `orders` WHERE user_id = ".Auth::user()->id." GROUP BY MONTH(created_at)");
        $res['products'] = raw_q("SELECT MONTH(created_at) 'month', count(id) as total FROM `products` WHERE restaurant_id = ".Auth::user()->restaurant_id." GROUP BY MONTH(created_at)");
        $res['cities'] = Restaurant::pluck('address');
        
        return view('bar.dashboard',$res);
    }
    
}
