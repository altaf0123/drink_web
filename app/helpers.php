<?php
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Products;
use App\Models\User;
use App\Models\Table;
use Carbon\Carbon;

function customAsset($path, $secure = null)
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    return 'test';
}

function getCatName($id)
{
    $record = Category::where('id', $id)->pluck('title')->first();
    return $record;
}

function getUserNameById($id)
{
    $record = User::where('id', $id)->pluck('name')->first();
    return $record;
}

function getUserMod($where)
{
    $record = User::where($where[0], $where[1])->get();
    return $record;
}

function getTableNameById($id)
{
    $record = Table::where('id', $id)->pluck('table_name')->first();
    return $record;
}

function getRestaurantName($id)
{
    $record = Restaurant::where('id', $id)->pluck('name')->first();
    return $record;
}

function getListRestaurant()
{
    $record = Restaurant::all();
    return $record;
}

function getListCategory()
{
    $record = Category::all();
    return $record;
}

function getListProducts()
{
    $record = Products::all();
    return $record;
}

function getListProductsPerUser($id)
{
    $record = Products::where('restaurant_id', $id)->get();
    return $record;
}

function getListUsers()
{
    $record = User::where('account_status','active')
    ->where('role','user')
    ->where('restaurant_id','=',0)
    ->get();
    return $record;
}

function getListTables()
{
    $record = Table::where('status',1)->get();
    return $record;
}

function getListTablesPerUser($id)
{
    $record = Table::where('restaurant_id', $id)->get();
    return $record;  
}

function getProductInfo($id)
{
    $record = Products::where('id', $id)->first();
    return $record;
}

function singleFileUpload($image,$folder,$name)
{
    $url = explode('/',url('/'));
    $url = $url[0]."//".$url[1].$url[2].'/drinkapp_mobile/public/uploads';

    $imageName = $name;
    $dds = explode('/', public_path());
    if($folder == "users" || $folder == "profile"):
            $newURL = '/'.$dds[1].'/'.$dds[2].'/'.$dds[3].'/'.'drinkapp_mobile/public/uploads';
            $image->move($newURL,$imageName);
    else:
        $newURL = '/'.$dds[1].'/'.$dds[2].'/'.$dds[3].'/'.'drinkapp_mobile/public/uploads';
        $image->move($newURL.'/'.$folder,$imageName);
    endif;
    return 'uploads/'.$folder.'/'.$imageName;
}

function get_list($table="",$where="",$limit="",$order_col="",$order_by="",$like="",$join_tabel="",$join="",$join_type="", $group_by="",$distinct=""){

    $skills = DB::table($table)
    ->select('*');        
    if($where){
        $skills->where($where);
    }
    if($group_by){
        $skills->group_by($group_by);
    }   
    if($limit){
        $skills->limit($limit);
    }
    if($order_by){
        $skills->order_by($order_col, $order_by);
    }   
    if($like){
        $skills->like($order_col,$like);
    }       
    
    if($join_type){
        if($join_type == "left"){
            $skills->leftjoin($join_tabel,$join); 
        }else if($join_type == "right"){
            $skills->rightjoin($join_tabel,$join); 
        }else if($join_type == "inner"){                
            $skills->join($join_tabel,$join); 
        }
    }           
    if($distinct){
        $skills->distinct($distinct);    
    } 

    $result = $skills->get();
    return $result;

}

function get_name_by_id($table='',$field='',$where="")
{        
    $data = DB::table($table)
    ->select($field);                
    if($where){
        $data->where($where);
    }
    $result = $data->pluck($field)->first();
    return $result;
}

function raw_q($query)
{
    return DB::select($query);
}

function get_Total($table, $where="")
{
    $data = DB::table($table);
    if($where){
        $data->where($where);
    }
    $result = $data->get();
    return $result->count();
}

function todays_total_invoice()
{
   
    $data = DB::table('orders')
    ->where('created_at','LIKE',Carbon::today()->toDateString().'%')
    ->count();
    
    return $data;
}

function month_total_invoice()
{
    $month = Carbon::now()->month;
    $data = DB::table('orders')
    ->whereMonth('created_at', '=', $month)
    ->count();
    return $data;
}

function todays_total_invoice_bar()
{
    $ord = DB::table('orders')
      ->join('order_items','order_items.order_id','=','orders.id')
      ->join('products','products.id','=','order_items.item_id')
      ->join('restaurants','restaurants.id','=','products.restaurant_id')
      ->select('orders.*','order_items.order_id as order_id','restaurants.id as rest_id')
      ->where('products.restaurant_id','=',Auth::User()->restaurant_id)
      ->where('orders.created_at','LIKE',Carbon::today()->toDateString().'%')
      ->groupBy('orders.id');
      
    $record = $ord ? $ord->count() : 0;
    
    return $record;
}

function month_total_invoice_bar()
{
    $month = Carbon::now()->month;

    $ord = DB::table('orders')
      ->join('order_items','order_items.order_id','=','orders.id')
      ->join('products','products.id','=','order_items.item_id')
      ->join('restaurants','restaurants.id','=','products.restaurant_id')
      ->select('orders.*','order_items.order_id as order_id','restaurants.id as rest_id')
      ->where('products.restaurant_id','=',Auth::User()->restaurant_id)
      ->whereMonth('orders.created_at', '=', $month)
      ->groupBy('orders.id');
      
    $record = $ord ? $ord->count() : 0;
    
    return $record;
}

function get_web_users()
{
    $data = DB::table('users')
    ->where('role', 'LIKE', 'user')
	->whereNull('device_type')    
	->orWhere('device_type', 'LIKE','web')
    ->get();
    
    return $data;
}

function totalProfit($rest_id)
{
    $data = DB::table('orders')
    ->select(DB::raw('SUM(orders.grand_total + orders.tip) AS sum'))
    ->leftJoin('order_items','order_items.order_id','=','orders.id')
    ->leftJoin('products','products.id','=', 'order_items.item_id')
    ->where('products.restaurant_id',$rest_id)->first();
    $res = $data ?? $data->sum;
    return $res->sum;
}
function totalOrders($rest_id)
{
    $data = DB::table('orders')
    ->select('orders.id')
    ->leftJoin('order_items','order_items.order_id','=','orders.id')
    ->leftJoin('products','products.id','=', 'order_items.item_id')
    ->where('products.restaurant_id',$rest_id)->count();
    $res = $data ?? $data;
    return $res;
}
function totalProfitWaiter($waiter_id)
{
    $data = DB::table('orders')
    ->select(DB::raw('SUM(orders.grand_total + orders.tip) AS sum'))
    ->leftJoin('waiter_orders','orders.id','=','waiter_orders.order_id')
    ->where('waiter_orders.waiter_id',$waiter_id)->first();
    $res = $data ?? $data->sum;
    return $res->sum;
}
function totalOrdersWaiter($waiter_id)
{
    $data = DB::table('orders')
    ->select(DB::raw('SUM(orders.grand_total + orders.tip) AS sum'))
    ->leftJoin('waiter_orders','orders.id','=','waiter_orders.order_id')
    ->where('waiter_orders.waiter_id',$waiter_id)->count();
    $res = $data ?? $data;
    return $res;
}

?>