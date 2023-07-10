<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;

class PaymentController extends Controller
{
    public function index($orderId, $amount)
    {
        return Payment::purchase(
            (new Invoice)->amount($amount),
            function($driver, $transactionId) use($amount, $orderId) {
                \App\Models\Payment::query()
                    ->create(['transaction_id' => $transactionId, 'amount' => $amount, 'order_id' => $orderId]);
            }
        )->pay()->render();
    }

    public function callback(Request $request)
    {
        $transaction = \App\Models\Payment::query()->where('transaction_id', $request->post('RefNum'))->firstOrFail();
        try {
            Payment::amount(1000)->transactionId($transaction->transaction_id)->verify();

            $message = 'سفارش شما با  شماره '. $transaction->transaction_id . 'موفقیت ثبت شد';

        }catch (InvalidPaymentException $exception) {
            $transaction->update(['status' => $exception->getCode(), 'description' => $exception->getMessage()]);
            $message = $exception->getMessage();
        }

        return redirect()->route('home')->with('messages', $message);
    }
}
