<?php

namespace App\Http\Controllers\manager;

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

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ord = Category::paginate(8);
        return view('manager.categories.list')->with('records', $ord);
    }

    public function show($id)
    {
        $view = Category::where('id', $id)->first();
        return view('manager.categories.show')->with('records', $view);
    }
    
    public function update(Request $request, $id)
    {
        if ($request->input()) 
        {
            $data = Category::find($id);
            $data->title = $request->title;
            $data->type = $request->type;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Updated');
            }
        }
        return view('manager.categories.show');
    }
}
