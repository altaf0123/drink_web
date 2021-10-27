<?php

namespace App\Http\Controllers\user;

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
use Redirect;
use DB;

class ReservationsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // $res = Reservation::where('user_id',Auth::id())->paginate(8);
        $res = DB::table('table_reservations')
        ->join('restaurant_tables','restaurant_tables.id','=','table_reservations.table_id')
        ->select('table_reservations.status as tr_status','table_reservations.*')
        ->where('restaurant_tables.restaurant_id',Auth::User()->restaurant_id)->paginate(8);
        
        return view('bar.reservations.list')->with('records', $res);
    }

    public function create(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'table_id' => 'required',
            'price' => 'numeric|required',
            'times' => 'required',
            'status'=>'required'
        ]);
        if ($request->input()) 
        {
            if ($valid->fails()) 
            {
                $errors = $valid->errors()->toArray();
                    foreach($errors as $row)
                    {
                        return Redirect::to('user/reservations/add/')
                            ->with('danger', $row[0]);
                    }
            }
            
            if(!empty(Auth::user()->restaurant_id)) {
                $data = new Reservation();
                $data->table_id = $request->table_id;
                $data->user_id = Auth::user()->id;
                $data->price = $request->price;
                $data->status = $request->status;
                $timesArr = explode(' - ', $_POST['times']);
                $data->time_from = $timesArr[0];
                $data->time_to = $timesArr[1];
                if($data->save())
                {
                    return redirect()->back()->with('success', 'Added');
                }
            } else {
                return redirect()->back()->with('danger', 'No restaurant assigned');
            }
        }
        return view('bar.reservations.add');
    }

    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'table_id' => 'required',
            'price' => 'numeric|required',
            'times' => 'required',
            'status'=>'required'
        ]);
        if ($request->input()) 
        {
            if ($valid->fails()) 
            {
                $errors = $valid->errors()->toArray();
                    foreach($errors as $row)
                    {
                        return Redirect::to('user/reservations/show/'.$id)
                            ->with('danger', $row[0]);
                    }
            }
            
            $data = Reservation::find($id);
            $data->table_id = $request->table_id;
            $data->user_id = Auth::user()->id;
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

        return view('bar.reservations.show');
    }

    public function remove($id)
    {
        $view = Reservation::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }

    public function show($id)
    {
        $res = DB::table('table_reservations')
        ->join('restaurant_tables','restaurant_tables.id','=','table_reservations.table_id')
        ->where('table_reservations.table_id',$id)->first();
        if(!empty($res)) {
            return view('bar.reservations.show')->with('records', $res);
        }
        return redirect()->back()->with('danger', 'Not found');
    }
    
}
