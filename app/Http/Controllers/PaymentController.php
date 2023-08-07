<?php

namespace App\Http\Controllers;

use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PaymentController extends Controller
{
    public function index($amount)
    {
        return Payment::purchase(
            (new Invoice)->amount($amount),
            function($driver, $transactionId) {
                // Store transactionId in database.
                // We need the transactionId to verify payment in the future.
            }
        )->pay()->render();
    }
}
