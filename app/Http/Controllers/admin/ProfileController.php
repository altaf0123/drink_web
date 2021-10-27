<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use App\Traits\Functions;

use App\Models\Order;
use App\Models\User;
use App\Models\Products;
use App\Models\Table;
use App\Models\OrderItem;

use DataTables;
use Auth;
use DB;
use Validator; 
use Redirect;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // public function index(Request $request)
    // {
    //     $res = Table::paginate(8);
    //     return view('admin.tables.list')->with('records', $res);
    // }

    public function show()
    {
        
        $res = User::where('id',Auth::id())->first();
        return view('admin.profile.view')->with('records', $res);
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => ['required',Rule::unique('users')->ignore(Auth::id()),'email'],
        ];
        $validator = Validator::make($request->all(),$rules);
        
        if ($request->input()) 
        {
            if(!$validator->fails())
            { 
                $files = $request->file('profile_picture');
                if(!empty($files)):
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
            else
            {
                $errors = $validator->errors()->toArray();
                if(!empty($errors)){
                    foreach($errors as $row)
                    {
                        return Redirect::to('admin/profile/show/')
                            ->with('danger', $row[0]);
                    }
                }
            }
        }
    }
}