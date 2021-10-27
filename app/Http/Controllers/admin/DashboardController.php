<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurant;

class DashboardController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $currentMonth = date('m');
        $todays = date('Y-m-d') . '%';
        $sum = 0;
        $sum2 = 0;
        
        $res['active'] = Restaurant::where('status',1)->get()->count();
        $res['inactive'] = Restaurant::where('status',0)->get()->count();

        $res['active_user'] = User::where('account_status','active')->get()->count();
        $res['inactive_user'] = User::where('account_status', 'suspended')->get()->count();
        $res['orders'] = raw_q("SELECT DAY(created_at) as 'month', count(id) as total FROM `orders` WHERE MONTH(created_at) = ".date('m')." GROUP BY DAY(created_at)");
        $res['orders2'] = raw_q("SELECT DAY(created_at) as 'month', count(id) as total FROM `orders` WHERE MONTH(created_at) = ".date('m')." GROUP BY DAY(created_at)");
        $res['orders3'] = raw_q("SELECT MONTH(created_at) as 'month', count(id) as total FROM `orders` WHERE YEAR(created_at) = ".date('Y')." GROUP BY MONTH(created_at)");
        
        $res['monthsale'] = collect(raw_q(" SELECT count(id) as total FROM `orders` WHERE MONTH(created_at) = '$currentMonth'"))->first();
        $res['daysale'] = collect(raw_q("SELECT count(id) as daysale FROM `orders` WHERE created_at LIKE '$todays'"))->first();
        $res['restaurants'] = raw_q("SELECT MONTH(created_at) 'month', count(id) as total FROM `restaurants` GROUP BY MONTH(created_at)");

        $dataGrand = raw_q("SELECT grand_total,tip FROM `orders` WHERE created_at LIKE '$todays'");
        if(isset($dataGrand)):
            foreach($dataGrand as $row):
                $sum = $sum + $row->grand_total;
                $sum2 = $sum2 + ($row->grand_total - $row->tip);
            endforeach;
        endif;
        $res['todayRevenue'] = $sum;
        $res['todayProfit'] = $sum2; 

        $res['cities'] = Restaurant::pluck('address');

        return view('admin.dashboard',$res);
    }
    
    // public function sendNotification()
    // {
    //     //$firebaseToken = User::whereNotNull('notification_token')->pluck('notification_token')->all();
    //     $firebaseToken = User::where('id',61)->pluck('notification_token')->all();
    //     $SERVER_API_KEY = 'AAAAN_DygSA:APA91bE_VLQOsZy9_tVvAiRND3aXPD4IPVMKKfEuA5EAbwC16lScfr5t5ZjMonEgstyGzmG2Tban3jJtyXNRcwnGdHQ1RrqpHlapAWp9Acv7sflp9DO3Um7MhtW02AX93sc3-pxUA7X-';

    //     $data = [
    //         "registration_ids" => $firebaseToken,
    //         "notification" => [
    //             "title" =>'sd',
    //             "body" => 'sdasd',  
    //         ]
    //     ];
    //     $dataString = json_encode($data);
    
    //     $headers = [
    //         'Authorization: key=' . $SERVER_API_KEY,
    //         'Content-Type: application/json',
    //     ];
    
    //     $ch = curl_init();
      
    //     curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
    //     $response = curl_exec($ch);
  
    //     echo json_encode($response);
    // }
}
