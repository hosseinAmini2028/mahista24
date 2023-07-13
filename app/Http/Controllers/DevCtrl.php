<?php

namespace App\Http\Controllers;

use App\Jobs\NewOrderPayed;
use App\Lib\Sms\SendSms;
use App\Models\Order;
use Illuminate\Http\Request;

class DevCtrl extends Controller
{
    public function test(){
        try {
    
        } catch (\Throwable $th) {
           throw $th;
        }
    }
}
