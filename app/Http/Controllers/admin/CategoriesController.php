<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use App\Traits\Functions;
use App\Models\OrderItem;
use App\Models\Category;

use DataTables;
use Auth;
use Validator;
use Redirect;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ord = Category::paginate(8);
        return view('admin.categories.list')->with('records', $ord);
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(), [
           'title'=>'required|string',
           'type'=>'required|numeric'
        ]);
        
        if ($request->input()) 
        {
            if($validate->fails())
            {
                $errors = $validate->errors()->toArray();
                if(!empty($errors)){
                    foreach($errors as $row)
                    {
                        return Redirect::to('admin/categories/add/')
                            ->with('danger', $row[0]);
                    }
                }
            }
            $data = new Category();
            $data->title = $request->title;
            $data->type = $request->type;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Added');
            }
        }
        return view('admin.categories.add');
    }

    public function show($id)
    {
        $view = Category::where('id', $id)->first();
        return view('admin.categories.show')->with('records', $view);
    }
    
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
           'title'=>'required|string',
           'type'=>'required|numeric'
        ]);
        if ($request->input()) 
        {
            if($validate->fails())
            {
                $errors = $validate->errors()->toArray();
                if(!empty($errors)){
                    foreach($errors as $row)
                    {
                        return Redirect::to('admin/categories/view/'.$id)
                            ->with('danger', $row[0]);
                    }
                }
            }
            $data = Category::find($id);
            $data->title = $request->title;
            $data->type = $request->type;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Updated');
            }
        }
        return view('admin.categories.show');
    }

    public function remove($id)
    {
        $view = Category::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }
}
