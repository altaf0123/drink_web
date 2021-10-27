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
use Validator; 
use Redirect;

class TablesController extends Controller
{
    public function __construct()
    {
        $this->fileExtensions = array('jpg','jpeg','png','gif','JPG','JPEG','PNG','GIF');
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $res = Table::where('restaurant_id', Auth::user()->restaurant_id)->paginate(8);
        return view('bar.tables.list')->with('records', $res);
    }
    
    public function create(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'price' => 'numeric|required',
            'table_name' => 'required',
            'seating_capacity' => 'numeric|required',
            'description' => 'required',
        ]);
        
        if ($request->input()) 
        {
            if ($valid->fails()) 
            {
                $errors = $valid->errors()->toArray();
                    foreach($errors as $row)
                    {
                        return Redirect::to('user/tables/add/')
                            ->with('danger', $row[0]);
                    }
            }
            
            $files = $request->file('table_image');
            
            if(!empty($files)):
                $ext = pathinfo($files->getClientOriginalName(), PATHINFO_EXTENSION);
                if(!in_array($ext, $this->fileExtensions)) {
                    return redirect()->back()->with('danger', 'File must be image JPEG, JPG, PNG,GIF.');
                    exit;
                }
                $image = singleFileUpload($request->file('table_image'),
                request()->segment(2), 
                $files->getClientOriginalName());
                $nameImg = $files->getClientOriginalName();
            else:
                $nameImg = "";
            endif;
            if(!empty(Auth::user()->restaurant_id)) {
                $data = new Table();
                $data->restaurant_id        = Auth::user()->restaurant_id;
                $data->price      = $request->price;
                $data->table_name    = $request->table_name;
                $data->seating_capacity   = $request->seating_capacity;
                $data->description = $request->description;
                $data->picture = $nameImg;
                if($data->save())
                {
                    return redirect()->back()->with('success', 'Added');
                }
            } else {
                return redirect()->back()->with('danger', 'No restaurant assigned');
            }
        }
        return view('bar.tables.add');
    }
    
    public function remove($id)
    {
        $view = Table::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }

    public function show($id)
    {
        $res = Table::where('id',$id)->first();
        return view('bar.tables.show')->with('records', $res);
    }

    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'price' => 'numeric|required',
            'table_name' => 'required',
            'seating_capacity' => 'numeric|required',
            'description' => 'required',
        ]);
        if ($request->input()) 
        {
            if ($valid->fails()) 
            {
                $errors = $valid->errors()->toArray();
                    foreach($errors as $row)
                    {
                        return Redirect::to('user/tables/add/')
                            ->with('danger', $row[0]);
                    }
            }

            $files = $request->file('table_image');
            
            if(!empty($files)):
                            
                $ext = pathinfo($files->getClientOriginalName(), PATHINFO_EXTENSION);
    
                if(!in_array($ext, $this->fileExtensions)) {
                    return redirect()->back()->with('danger', 'File must be image JPEG, JPG, PNG,GIF.');
                    exit;
                }
                $image = singleFileUpload($request->file('table_image'),request()->segment(2), $files->getClientOriginalName());
                $name = $files->getClientOriginalName();
            else:
                $name = $request->table_img;
            endif;
            $data = Table::find($id);
            $data->table_name        = $request->table_name;
            $data->restaurant_id        = Auth::user()->restaurant_id;
            $data->price      = $request->price;
            $data->picture    = $request->picture;
            $data->seating_capacity   = $request->seating_capacity;
            $data->description = $request->description;
            $data->picture = $name;
            $data->status = $request->status;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Updated');
            }
        }

        return view('bar.tables.show');
    }
    
    public static function search(Request $request)
    {
        if(isset($_GET['query']))
        {
            $search_text = $_GET['query'];
            $orders = DB::table('restaurant_tables')
            ->where('table_name','LIKE','%'.$search_text.'%')
            ->where('restaurant_id','=',Auth::user()->restaurant_id)
            ->paginate(8)
            ->withQueryString();
            return view('bar.tables.list', ['records'=>$orders]);
        }
        else
        {
            return view('bar.tables.list');
        }
    }
}