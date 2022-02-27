<?php

namespace App\Http\Controllers;

use App\Models\Harvest;
use App\Models\detHarvest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Inertia\Inertia;

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
            $harvest->idUser = 1;
            $harvest->datHarvest = $date;
            $harvest->dayValue = 0;
            $harvest->edo = 1;

            $harvest->save();

            //detalles
            $details = $request->data;
            foreach ($details as $ep => $det) {
                $detail = new DetHarvest();
                $detail->idHarvest = $harvest->id;
                $detail->timHarv = $det['timHarv'];
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

    //
    public function index(){
        $harvest= Harvest::all();
        return inertia::render(
            'Harvest', ['harv'=>$harvest]
        );
    }

    //IndexData
    public function indexData() {
        $harvest = Harvest::all();
        return [
            'harv'=>$harvest
        ];
    }

    //Update
    public function update(Request $request){
        try {
        DB::beginTransaction();
        $date = carbon::now('America/Bogota');
        $harvest= Harvest:: findOrFail($request->id);
        $harvest->idEmp = $request->idEmp;
        $harvest->idUser = $request->idUser;
        $harvest->datHarvest = $date;
        $harvest->datValue = $request->value;

        $harvest->save();

        $details = $request->data;
            foreach ($details as $ep => $det) {
                $detail = DetHarvest::findOrFail($request->id);
                $detail->timHarv = $det['timHarv'];
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

    //Delete
    public function destroy(Request $request){
        try {
            DB::beginTransaction();
            $date = carbon::now('America/Bogota');
            $harvest= Harvest:: findOrFail($request->id);
    
            $harvest->delete();
    
            $details = $request->data;
                foreach ($details as $ep => $det) {
                    $detail = DetHarvest::findOrFail($request->id);
                    $detail->delete();
                }
                DB::commit();
            }catch (Exception $e) {
                DB:rollback();
                console.log($e);
            }
    }
}
