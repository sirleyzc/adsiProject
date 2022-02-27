<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    //Render view
    public function index() {
        $employee = Employee::all();
        /* return [
            'emp'=>$employee
        ]; */
        return Inertia::render('Employee', ['emp' => $employee]);
    }

    //IndexData
    public function indexData() {
        $employee = Employee::all();
        return [
            'emp'=>$employee
        ];
    }

    //Create
    public function store(Request $request) {
        $employee = new Employee();
        $employee->idEmployee = $request->idEmp;
        $employee->namEmployee = $request->name;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->datAdmission = $request->datAdmission;
        $employee->edo = $request->edo;

        $employee->save();
    }

    //Update
    public function update(Request $request) {
        $employee = Employee::findOrFail($request->id);
        $employee->idEmployee = $request->idEmp;
        $employee->namEmployee = $request->name;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->datAdmission = $request->datAdmission;
        $employee->edo = $request->edo;

        $employee->save();
    }

    //Delete
    public function destroy(Request $request) {
        $employee = Employee::findOrFail($request->id);
        $employee->delete();
    }

    //get data
    public function getEmployee(Request $request){
        
        $employee= Employee::select('id','namEmployee')
        ->where('edo',1)->get();
        return [
            'emp'=>$employee
        ];
    }

}


