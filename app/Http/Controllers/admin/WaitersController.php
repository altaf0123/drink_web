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
use Illuminate\Support\Facades\Validator;
use Redirect;
use Hash;
use Illuminate\Database\QueryException;

class WaitersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $res = User::where('role','waiter')->paginate(8);
        return view('admin.waiters.list')->with('records', $res);
    }
    
    public function show($id)
    {
        $res = Table::where('id',$id)->first();
        return view('admin.waiters.show')->with('records', $res);
    }
    
    public function assign(Request $request, $id)
    {
        if ($request->input()) 
        {
            try { 
                DB::table('waiter_restaurants')->upsert([
                    ['waiter_id' => $id, 'restaurant_id' => $request->restaurant_id],
                ], ['waiter_id', 'restaurant_id'], ['waiter_id','restaurant_id']);
       
                
                $data = User::find($id);
                $data->restaurant_id = $request->restaurant_id;
                if($data->save())
                {
                    return redirect()->back()
                    ->with('success', 'Assigned successfully.');
                }
            } catch(QueryException $ex) { 
                return redirect()->back()
                ->with('danger', 'Waiter already assigned');
            }
        }
        else
        {
            $data = User::where('role','waiter')
            ->where('id', $id)
            ->first();
        }
        $records = array(
            'data'=>$data->restaurant_id,
            'id'=>$id
        );
        return view('admin.waiters.assign')->with('records',$records);
    }
}