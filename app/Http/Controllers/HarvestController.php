<?php

namespace App\Http\Controllers;

use App\Models\Harvest;
use App\Models\detHarvest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HarvestController extends Controller
{
    //Create
    public function store(Request $request) {
        try {
            // Begin the transaction in the database
            DB::beginTransaction();
            $date = carbon::now('America/Bogota');

            //Store the master
            $harvest = new Harvest();
            $harvest->idEmp = $request->idEmp;
            $harvest->idUser = $request->idUser;
            $harvest->datHarvest = $date;
            $harvest->dayValue = $request->value;

            $harvest->save();

            //detalles
            $details = $request->data;
            foreach ($details as $ep => $det) {
                $detail = new DetHarvest();
                $detail->idHarvest = $harvest->id;
                $detail->timHarvest = $det['timHar'];
                $detail->kilos = $det['kilos'];
                $detail->timValue = $det['timVal'];
                
                $detail->save();
            }
            DB::commit();
        }catch (Exception $e) {
            DB:rollback();
            console.log($e);
        }
    }
}
