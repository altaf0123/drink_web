<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use Validator;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
  
    /** 
     * Write code on Method
     *
     * @return response()
     */
    public function saveToken(Request $request)
    {
        $user = User::findorFail(57);
        $user->device_token = $request->token;
        $user->save();
        // auth()->user()->update(['device_token'=>$request->token]);
        return response()->json(['token saved successfully.']);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
     
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
    
    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
    
        $SERVER_API_KEY = 'AAAAN_DygSA:APA91bE_VLQOsZy9_tVvAiRND3aXPD4IPVMKKfEuA5EAbwC16lScfr5t5ZjMonEgstyGzmG2Tban3jJtyXNRcwnGdHQ1RrqpHlapAWp9Acv7sflp9DO3Um7MhtW02AX93sc3-pxUA7X-';
  
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        dd($response);
    }
}
