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

class ManagersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $res = User::where('role','manager')->paginate(8);
        return view('admin.managers.list')->with('records', $res);
    }
    
    public function show($id)
    {
        $res = Table::where('id',$id)->first();
        return view('admin.managers.show')->with('records', $res);
    }
    
    public function assign(Request $request, $id)
    {
        if ($request->input()) 
        {
            try { 
                DB::table('managers_restaurants')->upsert([
                    ['manager_id' => $id, 'restaurant_id' => $request->restaurant_id],
                ], ['manager_id', 'restaurant_id'], ['manager_id','restaurant_id']);
       
                
                $data = User::find($id);
                $data->restaurant_id = $request->restaurant_id;
                if($data->save())
                {
                    return redirect()->back()
                    ->with('success', 'Assigned successfully.');
                }
            } catch(QueryException $ex) { 
                return redirect()->back()
                ->with('danger', 'Manager already assigned');
            }
        }
        else
        {
            $data = User::where('role','manager')
            ->where('id', $id)
            ->first();
        }
        $records = array(
            'data'=>$data->restaurant_id,
            'id'=>$id
        );
        return view('admin.managers.assign')->with('records',$records);
    }
}