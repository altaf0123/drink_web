<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Products;
use App\Models\Table;
use App\Traits\Functions;
use App\Models\OrderItem;
use Illuminate\Http\Request;

use DataTables;
use Auth;
use DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show()
    {
        $res = User::where('id',Auth::id())->first();
        return view('manager.profile.view')->with('records', $res);
    }

    public function update(Request $request)
    {
        if ($request->input()) {

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
    }
}
?>