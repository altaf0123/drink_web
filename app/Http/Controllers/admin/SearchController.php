<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use App\Traits\Functions;
use App\Models\OrderItem;
use DataTables;
use Auth;

class SearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = Products::select("name","id")
                ->where("name","LIKE","%{$request->str}%")
                ->get();
   
        return response()->json($data);
    }
    
}
