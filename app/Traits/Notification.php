<?php

namespace App\Traits;

use App\Models\User;
use App\Models\NotificationModel;

trait Notification
{
    public function sendNotification($id, $message)
    {
        //$firebaseToken = User::whereNotNull('notification_token')->pluck('notification_token')->all();
        $firebaseToken = User::where('id',$id)->pluck('notification_token')->all();
        // $SERVER_API_KEY = 'AAAAN_DygSA:APA91bE_VLQOsZy9_tVvAiRND3aXPD4IPVMKKfEuA5EAbwC16lScfr5t5ZjMonEgstyGzmG2Tban3jJtyXNRcwnGdHQ1RrqpHlapAWp9Acv7sflp9DO3Um7MhtW02AX93sc3-pxUA7X-';
        
        
        // $data = [
        //     "registration_ids" => $firebaseToken,
        //     "notification" => [
        //         "title" =>$message,
        //         // "body" => 'sdasd',  
        //     ]
        // ];
        // $dataString = json_encode($data);
    
        // $headers = [
        //     'Authorization: key=' . $SERVER_API_KEY,
        //     'Content-Type: application/json',
        // ];
    
        // $ch = curl_init();
      
        // curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        // $response = curl_exec($ch);
        
        $not = new NotificationModel();
        $not->user_id = $id;
        $not->for_id = $id2;
        $not->notification = $message;
        $not->save();
        
        return 1;
    }
}
