<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reserve;
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
            $receipt = Payment::amount($transaction->amount)->transactionId($transaction->transaction_id)->verify();

            $message = sprintf('سفارش شما (%s) با شماره پیگیری %d با موفقیت پرداخت شد.', $transaction->order_id, $receipt->getReferenceId());

            $transaction->update(['reference_id' => $receipt->getReferenceId()]);

            Order::where('id',$transaction->order_id)->update(['status'=>'payed']);
            Reserve::where('order_id',$transaction->order_id)->update(['status'=>'payed']);


        }catch (InvalidPaymentException $exception) {
            $transaction->update(['status' => $request->post("StateCode"), 'description' => $request->post('State')]);
            $message = $exception->getMessage();
        }

        return view('theme.payment-result')->with('messages', $message);
    }
}
