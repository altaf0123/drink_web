<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use App\Models\Reservation;
use App\Traits\Functions;
use App\Models\OrderItem;
use DataTables;
use Auth;
use Validator;

class ReservationsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $res = Reservation::paginate(8);
        return view('admin.reservations.list')->with('records', $res);
    }

    public function create(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'table_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'times' => 'required',
        ]);
        
        if ($request->input()) 
        {
            if ($valid->fails()) 
            {
                return redirect()->back()->with('danger', 'Fill the required fields please.');
            }
            $data = new Reservation();
            $data->table_id = $request->table_id;
            $data->user_id = $request->user_id;
            $data->price = $request->price;
            $data->status = $request->status;
            $timesArr = explode(' - ', $_POST['times']);
            $data->time_from = $timesArr[0];
            $data->time_to = $timesArr[1];
            if($data->save())
            {
                return redirect()->back()->with('success', 'Added');
            }
        }
        return view('admin.reservations.add');
    }

    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'table_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'times' => 'required',
        ]);
        
        if ($request->input()) 
        {
            if ($valid->fails()) 
            {
                return redirect()->back()->with('danger', 'Fill the required fields please.');
            }
            $data = Reservation::find($id);
            $data->table_id = $request->table_id;
            $data->user_id = $request->user_id;
            $data->price = $request->price;
            $data->status = $request->status;
            $timesArr = explode(' - ', $_POST['times']);
            $data->time_from = $timesArr[0];
            $data->time_to = $timesArr[1];
            if($data->save())
            {
                return redirect()->back()->with('success', 'Updated');
            }
        }

        return view('admin.reservations.show');
    }

    public function remove($id)
    {
        $view = Reservation::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }

    public function show($id)
    {
        $res = Reservation::where('id',$id)->first();
        return view('admin.reservations.show')->with('records', $res);
    }
    
}
