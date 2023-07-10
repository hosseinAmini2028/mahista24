<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderCtrl extends Controller
{
    public function index(){
        $orders = Order::with(['item','user','payment'])->withCount('reserves')->where('status','payed')->paginate(15);
        return view('admin.orders.index',[
            'orders'=>$orders
        ]);
    }
}
