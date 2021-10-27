<?php

namespace App\Http\Controllers\user;

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

class UsersController extends Controller
{
    public function __construct()
    {
        $this->fileExtensions = array('jpg','jpeg','png','gif','JPG','JPEG','PNG','GIF');
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $res = User::where('role','waiter')->where('restaurant_id', Auth::user()->restaurant_id)->paginate(8);
        return view('bar.users.list')->with('records', $res);
    }
    
    public function index2(Request $request)
    {
        $res = User::where('role','manager')->where('restaurant_id', Auth::user()->restaurant_id)->paginate(8);
        return view('bar.users.list2')->with('records', $res);
    }
    
    public function create(Request $request)
    {
        if ($request->input()) 
        {
            $rules = [
                'name' => 'required|string|min:5|max:15',
                'email'    => 'unique:users|email|required',
                'password' => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);

            if(!$validator->fails())
            {       
                if(!empty($files)):
                    
                    $files = $request->file('profile_picture');
                
                    $ext = pathinfo($files->getClientOriginalName(), PATHINFO_EXTENSION);
    
                    if(!in_array($ext, $this->fileExtensions)) {
                        return redirect()->back()->with('danger', 'File must be image JPEG, JPG, PNG,GIF.');
                        exit;
                    }
                
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
                $data->role   = $request->role;
                $data->password   = Hash::make($request->password);
                $data->profile_picture = $nameImg;
                $data->restaurant_id = Auth::user()->restaurant_id;
                if($data->save())
                {
                    return redirect()->back()->with('success', 'Added');
                }
            } 
            else 
            {
                $errors = $validator->errors()->toArray();
                if(!empty($errors)){
                    foreach($errors as $row)
                    {
                        return Redirect::to('user/users/add')
                            ->with('danger', $row[0]);
                    }
                }
            }
        }
        return view('bar.users.add');
    }
    
    public function remove($id)
    {
        $view = User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }

    public function show($id)
    {
        $res = User::where('id',$id)->first();
        return view('bar.users.show')->with('records', $res);
    }

    public function update(Request $request, $id)
    {
        if ($request->input()) 
        {
            $rules = [
                'long' => 'numeric|nullable',
                'lat'    => 'numeric|nullable',
                'email' => 'email|required'
            ];
            $validator = Validator::make($request->all(),$rules);

            if(!$validator->fails())
            {   
                $files = $request->file('profile_picture');

                if(!empty($files)):
                                    
                    $ext = pathinfo($files->getClientOriginalName(), PATHINFO_EXTENSION);
    
                    if(!in_array($ext, $this->fileExtensions)) {
                        return redirect()->back()->with('danger', 'File must be image JPEG, JPG, PNG,GIF.');
                        exit;
                    }
                    
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
                $data->lat = $request->lat;
                $data->long = $request->long;
                if($data->save())
                {
                    return redirect()->back()->with('success', 'Updated');
                }
            }
            else
            {
                $errors = $validator->errors()->toArray();
                if(!empty($errors)){
                    foreach($errors as $row)
                    {
                        return Redirect::to('user/users/view/'.$id)
                            ->with('danger', $row[0]);
                    }
                }
            }
        }

        return view('bar.users.show');
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
    
    public function ledger()
    {
        $res = DB::table('users')
        ->where('role', 'user')
        ->where('restaurant_id',Auth::User()->restaurant_id)
        ->orderBy('created_at','DESC')
        ->get();
        return view('bar.users.list3')->with('records', $res);
    }

}