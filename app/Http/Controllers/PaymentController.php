<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Inertia\Inertia;

class PaymentController extends Controller
{
    //Create
    public function store(Request $request) {
        $payment = new Payment();
        $payment->idEmp = $request->idEmp;
        $payment->payValue = $request->value;
        $payment->payDate = $request->date;
        $payment->edo = $request->edo;

        $payment->save();
    }

    //Read
    public function indexData() {
        $payment = Payment::all();
        return [
            'pay' => $payment
        ];
    }

     //Render view
     public function index() {
        $payment = Payment::all();
        return Inertia::render(
            'Payment', ['pay' => $payment]
        );
    }

    //Update
    public function update(Request $request) {
        $payment= Payment::findOrFail($request->id);
        $payment->idEmp = $request->idEmp;
        $payment->payValue = $request->value;
        $payment->payDate = $request->date;
        $payment->edo = $request->edo;

        $payment->save();
    }

    //delete
    public function destroy(Request $request) {
        $payment = Payment::findOrFail($request->id);
        $payment->delete();
    }
}
