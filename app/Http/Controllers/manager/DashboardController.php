<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Order;
use Auth;
use Redirect;

class DashboardController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return Redirect::to('manager/categories');

        $res['active'] = Order::where('user_id', Auth::user()->user_id)->where('order_status','completed')->get()->count();
        $res['inactive'] = Order::where('user_id', Auth::user()->user_id)->where('order_status','pending')->get()->count();
        // $res['active'] = Restaurant::where('status',1)->first()->count();
        // $res['inactive'] = Restaurant::where('status', 0)->first()->count();
        
        $res['active_user'] = User::where('account_status','active')
                                ->where('role','waiter')
                                ->where('restaurant_id',Auth::user()->restaurant_id)
                                ->get()->count();
                             
        $res['inactive_user'] = User::where('account_status','suspended')
                                ->where('role','waiter')
                                ->where('restaurant_id',Auth::user()->restaurant_id)
                                ->get()->count();
                                
        $res['orders'] = raw_q("SELECT MONTH(created_at) 'month', count(id) as total FROM `orders` WHERE user_id = ".Auth::user()->id." GROUP BY MONTH(created_at)");
        $res['products'] = raw_q("SELECT MONTH(created_at) 'month', count(id) as total FROM `products` WHERE restaurant_id = ".Auth::user()->restaurant_id." GROUP BY MONTH(created_at)");

        $res['cities'] = Restaurant::pluck('address');
        
        return view('manager.dashboard',$res);
    
    }
    
}
