<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CMS;

class CMSController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function show(Request $request, $name)
    {
        if($name == 'terms'){
            if($request->input())
            {
                $data = CMS::find(1);
                $data->terms = $request->terms;
                if($data->save())
                {
                    return redirect()->back()->with('success', 'Updated');
                }
            }
            $res['type'] = $name;
            $res['records'] = CMS::pluck($name)->first();
            return view('admin.cms.show')->with($res);
        } 
        if($name == 'privacy'){
            if($request->input())
            {
                $data = CMS::find(1);
                $data->privacy = $request->privacy;
                if($data->save())
                {
                    return redirect()->back()->with('success', 'Updated');
                }
            }
            $res['type'] = $name;
            $res['records'] = CMS::pluck($name)->first();
            return view('admin.cms.show')->with($res);
        }
    }

    public function privacy()
    {
        
        return view('admin.cms.privacy');
    }
}
