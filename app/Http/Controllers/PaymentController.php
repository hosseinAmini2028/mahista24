<?php

namespace App\Http\Controllers;

use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

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
}
