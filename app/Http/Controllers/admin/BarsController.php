<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Traits\Functions;
use App\Models\Order;
use App\Models\User;
use App\Models\Products;
use App\Models\OrderItem;
use App\Models\Table;
use App\Models\Restaurant;
use App\Models\RestaurantImage;

use DataTables;
use Auth;
use DB;
use Validator;

class BarsController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $res = Restaurant::paginate(8);
        return view('admin.restaurants.list')->with('records', $res);
    }
    
    public function create(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);
        
        if ($request->input()) 
        {
            if ($valid->fails()) 
            {
                return redirect()->back()->with('danger', 'Fill the required fields please.');
            }
            
            $data = new Restaurant();
            $data->name        = $request->name;
            $data->address      = $request->address;
            $data->lat    = $request->lat;
            $data->long   = $request->long;
            $data->status = 1;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Added');
            } 
            return redirect()->back()->with('danger', 'Error Occured');
        }
        return view('admin.restaurants.add');
    }
    
    public function remove($id)
    {
        $view = Restaurant::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }

    public function show($id)
    {
        $res = Restaurant::where('id',$id)->first();
        return view('admin.restaurants.show')->with('records', $res);
    }

    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);
        
        if ($request->input()) 
        {
            if($valid->fails()) 
            {
                return redirect()->back()->with('danger', 'Fill the required fields please.');
            }
            
            $data = Restaurant::find($id);
            $data->name        = $request->name;
            $data->address      = $request->address;
            $data->lat    = $request->lat;
            $data->long   = $request->long;
            $data->status = $request->status;
            if($data->save())
            {
                return redirect()->back()->with('success', 'Updated');
            }
            return redirect()->back()->with('danger', 'Error Occured');
        }

        return view('admin.restaurants.show');
    }
    
    public function uploadRestaurantImages(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        
        $dds = explode('/', public_path());
        $url = '/'.$dds[1].'/'.$dds[2].'/'.$dds[3].'/'.'drinkapp_mobile/public/uploads/restaurants';

        $image->move($url,$imageName);
        
        $imageUpload = new RestaurantImage();
        $imageUpload->picture = $imageName;
        $imageUpload->restaurant_id = $request->rest_id;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }
    
    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        RestaurantImage::where('picture',$filename)->delete();
        
        $dds = explode('/', public_path());
        $url = '/'.$dds[1].'/'.$dds[2].'/'.$dds[3].'/'.$dds[4].'/drinkapp_php/public/uploads/restaurants/';
        $path=$url.$filename;
        
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }
    
    public function DeleteGet($id)
    {
        $fileNameGet = RestaurantImage::find($id);
        
        RestaurantImage::where('id',$id)->delete();
        
        $dds = explode('/', public_path());
        $url = '/'.$dds[1].'/'.$dds[2].'/'.$dds[3].'/'.$dds[4].'/drinkapp_php/public/uploads/restaurants/';
        $path=$url.$fileNameGet->picture;
        
        if (file_exists($path)) {
            unlink($path);
        }
        
        return redirect()->back()->with('success', 'File ' .$fileNameGet->picture.' Deleted Successfully!');
    }
    
    public function ledger()
    {
        $res = DB::table('users')
        ->where('role', 'user')
        ->where('restaurant_id','!=',0)
        ->orderBy('created_at','DESC')
        ->paginate(4);
                    
        return view('admin.restaurants.list2')->with('records', $res);
    }
    
    public function ledgerUser()
    {
        $res = DB::table('users')
                ->where('users.role', '!=','admin')
                ->leftjoin('orders', 'orders.user_id', '=', 'users.id')
                ->groupBy('users.name')
                ->select('users.name', 'users.email as email'
                    ,DB::raw('CASE 
                            WHEN orders.grand_total IS NULL THEN 0
                            ELSE orders.grand_total + orders.tip
                    END AS Profit'),
                    DB::raw('count(CASE WHEN users.role LIKE "%manager%" THEN 1 ELSE NULL END)
                    AS TotalManagers'),
                    DB::raw('count(CASE WHEN users.role LIKE "%waiter%" THEN 1 ELSE NULL END)
                    AS TotalWaiters'),
                    DB::raw('count(orders.id) as TotalOrders'))->paginate(4);
                    
        return view('admin.restaurants.list3')->with('records', $res);
    }
    
    public function toPending($id)
    {
        $ord = Restaurant::find($id);
        $ord->status = 0;
        $ord->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toComplete($id)
    {
        $ord = Restaurant::find($id);
        $ord->status = 1;
        $ord->save();
        return redirect()->back()->with('success', 'Status Changed');
    }
}