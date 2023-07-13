<?php

namespace App\Lib\Sms;

use App\Models\Order;

class SendSms
{
    public static function orderPayedSms($order_id)
    {
        try {
            $order = Order::with(['user','item'])->find($order_id);

            $params = [
                [
                    'name'=>'ITEMNAME',
                    'value'=>$order->item->title
                ]
            ];
     
            $adminParams = [
                [
                    'name'=>'ITEMNAME',
                    'value'=>$order->item->title
                ],
                [
                    'name'=>'USERNAME',
                    'value'=>$order->user->name
                ]
            ];
     
            $smsHandler = new SmsHandler();
            $res = [];
     
            $res[] = $smsHandler->send($order->user->phone,$params,config('smsir.submit_new_order_user'));
     
            $res[] = $smsHandler->sendAdmin($adminParams,config('smsir.submit_new_order_admin'));
            return $res;
        } catch (\Throwable $th) {
            throw $th;
        }
      
    }
}
