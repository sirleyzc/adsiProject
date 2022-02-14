<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HarvestCustomerController extends Controller
{
    //Create
    public function store(Request $request){
        $harvestCustomer = new HarvestCustomer();
        $harvestCustomer->idHarvest = $request->idHarvest;
        $harvestCustomer->idCustomers = $request->idCustomer;

        $harvestCustomer->save();
    }
}
