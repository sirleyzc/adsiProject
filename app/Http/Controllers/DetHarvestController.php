<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetHarvestController extends Controller
{
    //
    public function getTimHarvest(Request $request) {
        $idDetailHarvest = $request->idDetailHarvest;
        $time = TimeHarvest::select("id", "timHarvest")
        ->where("idDetHarv",$idDetailHarvest)
        ->get();
        return [
            "time"=>$time
        ];
    }
}
