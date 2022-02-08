<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    //Create
    public function store(Request $request) {
        $payment = new Payment();
        $payment->idEmplo = $request->idEmp;
        $payment->payValue = $request->value;
        $payment->payDate = $request->date;

        $payment->save();
    }

    //Read
    public function index() {
        $payment = Payment::join('employees','payments.idEmplo','=','employees.id')
        ->select('employees.namEmployee as emp','payments.payValue', 'payments.payDate')
        ->get();
        return [
            'pay' => $payment
        ];
    }
}
