<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Order;
use App\Models\User;
use App\Models\Products;
use App\Models\Table;
use App\Models\OrderItem;
use App\Traits\Functions;

use DataTables;
use Auth;
use DB;
use Validator;
use Redirect;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->fileExtensions = array('jpg','jpeg','png','gif','JPG','JPEG','PNG','GIF');
        $this->middleware('auth');
    }
    
    // public function index(Request $request)
    // {
    //     $res = Table::paginate(8);
    //     return view('bar.tables.list')->with('records', $res);
    // }

    public function show()
    {
        $res = DB::table('orders')
              ->join('order_items','order_items.order_id','=','orders.id')
              ->join('products','products.id','=','order_items.item_id')
              ->join('restaurants','restaurants.id','=','products.restaurant_id')
              ->select('orders.*','order_items.order_id as order_id','restaurants.id as rest_id')
              ->where('products.restaurant_id','=',Auth::User()->restaurant_id)
              ->groupBy('orders.id')->get();
              
        $total = $res->count() ?? 0;
              
        $records = User::where('id',Auth::id())->first();
        
        return view('bar.profile.view')->with(compact('records', 'total'));
    }

    public function update(Request $request)
    {
        if ($request->input()) 
        {
            $rules = [
                'name' => 'required',
                'email' => ['required',Rule::unique('users')->ignore(Auth::id()),'email'],
            ];
            $valid = Validator::make($request->all(),$rules);
            
            if ($valid->fails()) 
            {
                $errors = $valid->errors()->toArray();
                    foreach($errors as $row)
                    {
                        return Redirect::to('user/profile/show/')
                            ->with('danger', $row[0]);
                    }
            }
            $files = $request->file('profile_picture');
            if(!empty($files)):
                $ext = pathinfo($files->getClientOriginalName(), PATHINFO_EXTENSION);
                if(!in_array($ext, $this->fileExtensions)) {
                    return redirect()->back()->with('danger', 'File must be image JPEG, JPG, PNG,GIF.');
                    exit;
                }
                $image = singleFileUpload($request->file('profile_picture'),request()->segment(2), $files->getClientOriginalName());
                $name = $files->getClientOriginalName();
            else:
                $name = $request->prof_img;
            endif;
            $data = User::find(Auth::id());
            $data->name        = $request->name;
            $data->email        = $request->email;
            $data->profile_picture = $name;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Updated');
            }
        }
    }
}