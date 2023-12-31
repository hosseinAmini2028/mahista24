<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Models\Categore;
use App\Models\Item;
use App\Models\ItemRoomType;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Reserve;
use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Validator;

class OrderCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'item_id'        => 'required',
            'name'           => 'required',
            'phone'          => 'required',
            'meliCode'       => 'required',
            'start_at'       => 'required_if:categore_id,1',
            'end_at'         => 'required_if:categore_id,1',
            'qutity.*.count' => 'required|numeric|min:0',
        ]);

        if ($validate->fails()) {
            $notification = array(
                'message'    => 'مقادیر ورودی معتبر نیست.',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $request->name,
                'phone'    => $request->phone,
                'meliCode' => $request->meliCode,
            ]);
        }

        $categore = Categore::findOrFail($request->categore_id);
        $startDate = null;
        $endDate = null;
        $dayCount = 0;

        if ($categore->slug == 'hotels') {
            $startDate = Jalalian::fromFormat('Y/m/d', convert($request->start_at))->toCarbon();
            $endDate = Jalalian::fromFormat('Y/m/d', convert($request->end_at))->toCarbon();
            $dayCount = $endDate->diffInDays($startDate);
            if ($dayCount == 0) $dayCount = 1;
        }

        $total_price = 0;
        $total_count = 0;
        $reserves = [];

        foreach ($request->qutity as $key => $value) {
            if ($value['count'] > 0) {
                $price = 0;
                if ($categore->slug == 'hotels') {
                    $roomType = ItemRoomType::findOrFail($key);
                    $price = $roomType->price * $value['count'] * $dayCount;
                } else {
                    $roomType = Item::where('id', $request->item_id)->first();
                    $price = $roomType->price * $value['count'];
                }
                $total_count += $value['count'];
                $total_price += $price;
                $reserves[] = [
                    'item_id'           => $request->item_id,
                    'user_id'           => $user->id,
                    'price'             => $price,
                    'count'             => $value['count'],
                    'item_room_type_id' => $request->categore_id == 1 ? $roomType->id : null,
                    'start_at'          => $startDate,
                    'end_at'            => $endDate,
                    'status'            => 'waittopay',
                ];
            }
        }

        if ($total_count === 0) {
            $notification = array(
                'message'    => 'مقادیر ورودی معتبر نیست.',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        $order = Order::create([
            'item_id'     => $request->item_id,
            'status'      => 'waittopay',
            'total_price' => $total_price,
            'user_id'     => $user->id,
        ]);

        foreach ($reserves as &$value) {
            $value['order_id'] = $order->id;
            Reserve::create($value);
        }

        return (new PaymentController())->index($order->id, $order->total_price);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
