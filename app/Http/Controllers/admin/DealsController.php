<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deals;
use App\Traits\Functions;
use DataTables;
use Auth;
use DB;
use Validator;

class DealsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $ord = Deals::paginate(8);
        return view('admin.deals.list')->with('records', $ord);
    }
    
    public function show($id)
    {
        $view = Deals::where('id', $id)->first();
        return view('admin.deals.show')->with('records', $view);
    }
    
    public function update(Request $request, $id)
    {
        if ($request->input()) {
            $data = Deals::find($id);
            $data->title = $request->title;
            $data->description = $request->description;
            $data->type = $request->type;
            $data->status = $request->status;
            $data->created_by = $request->created_by;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Updated');
            }
        }
        return view('admin.deals.show');
    }

    public function create(Request $request)
    {
        if ($request->input()) {
            $validate = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
                'type' => 'required',
                'status' => 'required',
            ]);
            if ($validate->fails()) {
                return redirect()
                    ->back()
                    ->with('danger', ' Error. Please select required fields.');
            }
            $data = new Deals();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->type = $request->type;
            $data->status = $request->status;
            $data->created_by = $request->created_by;
            if($data->save())
            {
                foreach($request->user_id as $row) {
                    $user[] = array(
                        'user_id' => $row,
                        'deal_alert_id'=>$data->id,
                    );
                }
                try {
                    DB::table('update_deal_alert')->insert($user);
                } catch(Exception $ex) {
                    return redirect()->back()->with('danger', 'Error Occured');  
                }
                return redirect()->back()->with('success', 'Product added');
            }
        }
        return view('admin.deals.add');
    }

    public function remove($id)
    {
        $view = Deals::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }
}
