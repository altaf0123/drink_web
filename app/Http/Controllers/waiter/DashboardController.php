<?php

namespace App\Http\Controllers\waiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurant;
use DB;
use Auth;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $res['total_orders'] =  DB::table('waiter_orders')
            ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            ->select('waiter_orders.*')
            ->get()->count();


        $res['delivered'] =  DB::table('waiter_orders')
            ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            ->where('orders.order_status', '=', 'completed')
            ->select('waiter_orders.*')
            ->get()->count();

        $res['pending'] =  DB::table('waiter_orders')
            ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            ->where('orders.order_status', '=', 'pending')
            ->select('waiter_orders.*')
            ->get()->count();

        $res['paid'] =  DB::table('waiter_orders')
            ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            ->where('orders.payment_status', '=', 'paid')
            ->select('waiter_orders.*')
            ->get()->count();

        $res['unpaid'] =  DB::table('waiter_orders')
            ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            ->where('orders.payment_status', '=', 'unpaid')
            ->select('waiter_orders.*')
            ->get()->count();
        
        $res['tips_daily'] =  DB::table('waiter_orders')
            ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            ->where('orders.tip', '=', '0')
            ->where('orders.created_at','LIKE', '%'.Carbon::today()->toDateString().'%')
            ->select('waiter_orders.waiter_id')
            ->groupBy('waiter_orders.waiter_id')
            ->count();
            
        $res['tips_month'] =  DB::table('waiter_orders')
            ->join('orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->where('waiter_orders.waiter_id', '=', Auth::user()->id)
            ->where('orders.tip', '=', '0')
            ->whereMonth('orders.created_at','=', Carbon::now()->format('m'))
            ->select('waiter_orders.waiter_id')
            ->groupBy('waiter_orders.waiter_id')
            ->count();
        
        $query = "SELECT DAY(orders.created_at) as 'month', count(waiter_orders.order_id) as total FROM `waiter_orders` 
                INNER JOIN orders ON orders.id = waiter_orders.order_id 
                WHERE waiter_orders.waiter_id = ".Auth::user()->id." AND MONTH(orders.created_at) = ".date('m')." GROUP BY DAY(orders.created_at)";
                
        $res['orders'] = raw_q($query);
        
        $res['tips_daily'] =  DB::table('orders')
            ->join('waiter_orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->whereDay('orders.created_at', Carbon::now()->day)
            ->whereMonth('orders.created_at', Carbon::now()->month)
            ->whereYear('orders.created_at', Carbon::now()->year)
            ->where('orders.tip', '>', '0')
            ->where('waiter_orders.waiter_id',Auth::user()->id)
            ->select('orders.tip')
            ->get()->count();
        
        $res['tips_month'] =  DB::table('orders')
            ->join('waiter_orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->whereMonth('orders.created_at', Carbon::now()->month)
            ->whereYear('orders.created_at', Carbon::now()->year)
            ->where('orders.tip', '>', '0')
            ->where('waiter_orders.waiter_id',Auth::user()->id)
            ->select('orders.tip')
            ->get()->count();
            
        $res['daysale'] =  DB::table('orders')
            ->join('waiter_orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->whereDay('orders.created_at', Carbon::now()->day)
            ->whereMonth('orders.created_at', Carbon::now()->month)
            ->whereYear('orders.created_at', Carbon::now()->year)
            ->where('waiter_orders.waiter_id',Auth::user()->id)
            ->select('orders.id as total')
            ->get()->count();
        
        $res['monthsale'] =  DB::table('orders')
            ->join('waiter_orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->whereMonth('orders.created_at', Carbon::now()->month)
            ->whereYear('orders.created_at', Carbon::now()->year)
            ->where('waiter_orders.waiter_id',Auth::user()->id)
            ->select('orders.id as total')
            ->get()->count();
            
        return view('waiter.dashboard', $res);
    }
}
