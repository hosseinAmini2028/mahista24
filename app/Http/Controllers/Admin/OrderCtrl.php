<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\RoomType;
use Illuminate\Http\Request;

class OrderCtrl extends Controller
{
    public function index()
    {
        $orders = Order::with(['item','item.categore', 'item.roomTypes', 'user', 'payment', 'reserves', 'reserves.itemRoomType', 'reserves.itemRoomType.roomType'])
        ->where('status', 'payed')->orderBy('created_at','DESC')->paginate(15);
        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }
}
