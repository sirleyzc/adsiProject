<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Inertia\Inertia;

class CustomerController extends Controller
{
    //Create
    public function store(Request $request) {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->edo = $request->edo;

        $customer->save();
    }

    //IndexData
    public function indexData() {
        $customer = Customer::all();
        return [
            'cus'=>$customer
        ];
    }

    //Read
    public function index(){
        $customer = Customer::all();
        return Inertia::render(
            'Customer', ['cus' => $customer]);
    }

    //Update
    public function update(Request $request) {
        $customer = Customer::findOrFail($request->id);
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;

        $customer->save();
    }

    //Delete
    public function destroy(Request $request) {
        $customer = Customer::findOrFail($request->id);
        $customer->delete();
    }
}
