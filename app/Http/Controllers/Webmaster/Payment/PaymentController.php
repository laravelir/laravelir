<?php

namespace App\Http\Controllers\Webmaster\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::latest()->paginate(20);
        return view('webmaster.financials.payments.all', compact('payments'));
    }
}
