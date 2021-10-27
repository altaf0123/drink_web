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
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $res = User::orderBy('created_at','DESC')->paginate(8);
        return view('admin.users.list')->with('records', $res);
    }
    
    public function create(Request $request)
    {
        if ($request->input()) 
        {
            $rules = [
                'name' => 'required',
                'role' => 'required',
                'password' => 'required|min:6',
                'email'    => 'required|email|max:255|unique:users',
                'restaurant_id' => 'required|numeric'
            ];
            $validator = Validator::make($request->all(),$rules);

            if(!$validator->fails())
            {       
                $files = $request->file('profile_picture');
                $role = $request->role == 'user1' ? 'user' : $request->role;

                $IfRestaurantAssignedUser = User::where('restaurant_id', $request->restaurant_id)
                ->where('role', $role)->count();

                if(!($IfRestaurantAssignedUser > 0)) {
                    if(!empty($files)):
                        $image = singleFileUpload($request->file('profile_picture'),
                        request()->segment(2), 
                        $files->getClientOriginalName());
                        $nameImg = $files->getClientOriginalName();
                    else:
                        $nameImg = "";
                    endif;
                    $data = new User();
                    $data->name      = $request->name;
                    $data->email    = $request->email;
                    $data->role   = $role;
                    if($role == 'user' && isset($request->restaurant_id)){
                        $data->restaurant_id = $request->restaurant_id;
                    }
                    $data->device_type = 'web';
                    $data->password   = Hash::make($request->password);
                    $data->profile_picture = $nameImg;
                    
                    if($data->save())
                    {
                        return redirect()->back()->with('success', 'Added');
                    }
                } else {
                        return redirect()->back()->with('danger', 'Restaurant already assigned');
                }
            } 
            else 
            {
                $errors = $validator->errors()->toArray();
                if(!empty($errors)){
                    foreach($errors as $row)
                    {
                        return Redirect::to('admin/users/add')
                            ->with('danger', $row[0]);
                    }
                }
            }
        }
        return view('admin.users.add');
    }
    
    public function remove($id)
    {
        $view = User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }

    public function show($id)
    {
        $res = User::where('id',$id)->first();
        return view('admin.users.show')->with('records', $res);
    }

    public function update(Request $request, $id)
    {
        if ($request->input()) 
        {
            $rules = [
                'name' => 'string|max:30|required',
                'role' => 'required',
                'password' => 'required|min:6',
                'email' => ['required',Rule::unique('users')->ignore($id)],
                'long' => 'nullable|numeric',
                'lat'    => 'nullable|numeric'
            ];
            $validator = Validator::make($request->all(),$rules);

            if(!$validator->fails())
            {   
                $files = $request->file('profile_picture');
                $role = $request->role == 'user1' ? 'user' : $request->role;

                $IfRestaurantAssignedUser = User::where('restaurant_id', $request->restaurant_id)
                ->where('role', $role)->count();

                if(!($IfRestaurantAssignedUser > 0)) {
                    if(!empty($files)):
                        $image = singleFileUpload($request->file('profile_picture'),
                        request()->segment(2), $files->getClientOriginalName());
                        $name = $files->getClientOriginalName();
                    else:
                        $name = $request->user_img;
                    endif;
                    $data = User::find($id);
                    $data->name        = $request->name;
                    $data->email        = $request->email;
                    $data->role      = $request->role;
                    $data->profile_picture = $name;
                    $data->long = $request->long;
                    $data->lat = $request->lat;
                    if($data->save())
                    {
                        return redirect()->back()->with('success', 'Updated');
                    }
                } else {
                        return redirect()->back()->with('danger', 'Restaurant already assigned');
                }
            }
            else
            {
                $errors = $validator->errors()->toArray();
                if(!empty($errors)){
                    foreach($errors as $row)
                    {
                        return Redirect::to('admin/users/view/'.$id)
                            ->with('danger', $row[0]);
                    }
                }
            }
        }
        
        return view('admin.users.show');
    }

    public function toPending($id)
    {
        $usr = User::find($id);
        $usr->account_status = 'active';
        $usr->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toComplete($id)
    {
        $usr = User::find($id);
        $usr->account_status = 'suspended';
        $usr->save();
        return redirect()->back()->with('success', 'Status Changed');
    }
    
    public function toVerifyPending($id)
    {
        $usr = User::find($id);
        $usr->account_verified = 0;
        $usr->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toVerifyComplete($id)
    {
        $usr = User::find($id);
        $usr->account_verified = 1;
        $usr->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

}