<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Products;
use App\Traits\Functions;
use App\Models\OrderItem;
use DataTables;
use Auth;
use DB;
use Validator;
use PDF;
class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $ord = Order::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.invoices.list')->with('records', $ord);
    }

    // public function show($id)
    // {
    //     $products['records'] = OrderItem::where('order_id')->latest()->get();
    //     $products['id']      = $id;
    //     return view('admin.orders.list')->with($products);
    // }

    public function create(Request $request)
    {
        if ($request->input()) 
        {
             $validate = Validator::make($request->all(), [
                'sub_total' => 'required',
                'grand_total' => 'required',
                'order_status' => 'required',
                'payment_status' => 'required',
            ]);
            if ($validate->fails()) {
                return redirect()
                    ->back()
                    ->with('danger', ' Error. Please select required fields.');
            }
            $data = new Order();
            $data->user_id        = $request->user_id;
            $data->sub_total      = $request->sub_total;
            $data->grand_total    = $request->grand_total;
            $data->order_status   = $request->order_status;
            $data->payment_status = $request->payment_status;
            if ($data->save()):
                foreach ($request->item_id as $item => $key):
                    $data1           = new OrderItem();
                    $data1->order_id = $data->id;;
                    $data1->item_id = $key;
                    $data1->qty     = $request->qty[$item];
                    $data1->price   = $this->getProductPrice($key);
                    $data1->save();
                endforeach;
            endif;
            return redirect()->back()->with('success', 'Added');
        }
        return view('admin.invoices.add');
    }

    public function update(Request $request, $id)
    {
        if ($request->input()) {
            $validate = Validator::make($request->all(), [
                'waiter_id' => 'required'
            ]);
            if ($validate->fails()) {
                return redirect()
                    ->back()
                    ->with('danger', ' Error. Please select required fields.');
            }
            try {
                $waiter = $request->waiter_id;
                DB::beginTransaction();
                $res = DB::statement("INSERT INTO `waiter_orders`(`order_id`, `waiter_id`) VALUES ($id, $request->waiter_id) ON DUPLICATE KEY UPDATE order_id= $id, waiter_id = $waiter", [$id, $request->waiter_id]);
                $res1 = DB::table('orders')
                    ->where('id', $id)
                    ->update(['is_seen' => 0]);
                DB::commit();
            } catch (\Exception $ex) {
                return redirect()
                    ->back()
                    ->with('danger', 'Something went wrong.');
            }
            return redirect()
                ->back()
                ->with('success', 'Updated');
        }
        return view('admin.invoices.show');
    }

    public function getProductPrice($id)
    {
        $res = Products::where('id', $id)->pluck('price');
        return json_decode($res)[0];
    }

    public function show($id)
    {
        $viewOrder = DB::table('orders')
            ->leftjoin('order_items', 'orders.id', '=', 'order_items.order_id')
            ->leftjoin('waiter_orders', 'orders.id', '=', 'waiter_orders.order_id')
            ->where('order_items.order_id', '=', $id)
            ->get();

        return view('admin.invoices.show')->with('records', $viewOrder);
    }

    public function toPending($id)
    {
        $ord               = Order::find($id);
        $ord->order_status = 'completed';
        $ord->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toComplete($id)
    {
        $ord               = Order::find($id);
        $ord->order_status = 'pending';
        $ord->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toPaid($id)
    {
        $ord                 = Order::find($id);
        $ord->payment_status = 'paid';
        $ord->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toUnPaid($id)
    {
        $ord                 = Order::find($id);
        $ord->payment_status = 'unpaid';
        $ord->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

    public static function search(Request $request)
    {
        if (isset($_GET['query'])) {
            $search_text = $_GET['query'];
            if ($request->input('search_type') == 'id') {
                $orders = DB::table('orders')
                    ->whereJsonContains('payment_response->id', $search_text)
                    ->paginate(1)
                    ->withQueryString();
            } elseif ($request->input('search_type') == 'customer') {
                $orders = DB::table('orders')
                    ->join('users', 'users.id', '=', 'orders.user_id')
                    ->select('users.name', 'orders.*')
                    ->where('users.name', 'LIKE', '%' . $search_text . '%')
                    ->paginate(8)
                    ->withQueryString();
            } elseif ($request->input('search_type') == 'rest') {
                $orders = DB::table('orders')
                    ->join('users', 'users.id', '=', 'orders.user_id')
                    ->join('restaurants', 'restaurants.id', '=', 'users.restaurant_id', 'left')
                    ->select('orders.*')
                    ->where('restaurants.name', 'LIKE', '%' . $search_text . '%')
                    ->paginate(8)
                    ->withQueryString();
            } else {
                $orders = DB::table('orders')
                    ->where('created_at', 'LIKE', '%' . $search_text . '%')
                    ->paginate(8)
                    ->withQueryString();
            }

            return view('admin.invoices.list', ['records' => $orders, 'search_type' => $request->input('search_type')]);
        } else {
            return view('admin.invoices.list');
        }
    }

    public function order_chart_by_restaurant($id)
    {
        $orders = raw_q("SELECT MONTH(created_at) 'month', count(id) as total FROM `orders` WHERE user_id = '$id' GROUP BY MONTH(created_at)");
        echo json_encode($orders[0]);
    }
    
    public function invoice($id=0)
    {
        $res['records'] = DB::table('orders')
        ->join('order_items','order_items.order_id','=','orders.id')
        ->join('products', 'products.id','=','order_items.item_id')
        ->join('users','users.id','=','orders.user_id')
        ->select('orders.created_at as ord_date','orders.grand_total as ord_amount','orders.id as ord_id','orders.user_id as ord_user',
        'products.name as prod_name','products.price as prod_price','order_items.order_id as ord_items_ord',
        'order_items.item_id as item_id','order_items.qty as quantity','order_items.price as ord_items_price','orders.payment_status as pay_status','users.name as user_name')
        ->where('orders.id',$id)->orderByDesc('orders.grand_total')->get();
        $pdf = PDF::loadView('admin.reports.invoice',$res);
        return $pdf->stream();
    }
}
