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
        $invoice = (new Invoice)->amount($amount);

        $invoice->detail(['transaction_id' => $invoice->getTransactionId()]);

        $uuid = $invoice->getUuid();

        return Payment::purchase(
            $invoice,
            function($driver, $transactionId) use($amount, $orderId, $uuid) {
                \App\Models\Payment::query()
                    ->create(['transaction_id' => $uuid, 'amount' => $amount, 'order_id' => $orderId]);
            }
        )->pay()->render();
    }

    public function callback(Request $request)
    {
        $transaction = \App\Models\Payment::query()->where('transaction_id', $request->post('ResNum'))->first();

        if (!$transaction) {
            return redirect()->route('home');
        }

        try {
            Payment::amount($transaction->amount)->transactionId($transaction->transaction_id)->verify();

            $message = 'سفارش شما با  شماره '. $transaction->transaction_id . 'موفقیت ثبت شد';

        }catch (InvalidPaymentException $exception) {
            $transaction->update(['status' => $request->post("StateCode"), 'description' => $request->post('State')]);
            $message = $exception->getMessage();
        }

        return redirect()->route('home')->with('messages', $message);
    }
}
