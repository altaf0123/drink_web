<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;

class ReportsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function show(Request $request)
    {
        return view('admin.reports.list');
    }

    public function total_orders_all_time()
    {
        $res['records'] = DB::table('orders')->get();
        $pdf = PDF::loadView('admin.reports.total_orders_all_time',$res);
        return $pdf->stream();
    }

    public function orders_by_highest_grand()
    {
        $res['records'] = DB::table('orders')->orderByDesc('grand_total')->get();
        $pdf = PDF::loadView('admin.reports.orders_by_highest_grand_all',$res);
        return $pdf->stream();
    }
}

