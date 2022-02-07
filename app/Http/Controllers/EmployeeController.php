<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //Read
    public function index() {
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

        $employee->save();
    }

    //Delete
    public function destroy(Request $request) {
        $employee = Employee::findOrFail($request->id);
        $employee->delete();
    }

}
