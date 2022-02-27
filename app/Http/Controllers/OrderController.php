<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\detOrder;

class OrderController extends Controller
{
    // Create
    public function store(Request $request) {
        try { 
            //Begin the transaction in the database
            DB::beginTransaction();
            $date = carbon::now('America/Bogota');

            //Store the master
            $order = new Order();
            $order->idCustomer = $request->idCustomer;
            $order->orDate = $date;
            $order->totOrder = $request->total;
            $order->edo = $request->edo;

            $order->save();

            //Store details
            $details = $request->data;
            foreach ($details as $ep => $det) {
                $detail = new DetOrder();
                $detail->idOrder = $order->id;
                $detail->amount = $det['amount'];
                $detail->variety = $det['variety'];
                $detail->loadValue = $det['value'];
                $detail->description = $det['desc'];

                $detail->save();
            }
            DB::commit();
        }catch (Exception $e) {
            DB::rollback();
            console.log($e);
        }
    }
}
