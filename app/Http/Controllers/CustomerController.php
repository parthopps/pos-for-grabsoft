<?php

namespace App\Http\Controllers;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function customer()
    {
        return view('customer.index');
    }

    public function customerInsert(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
        ]);
        customer::insert([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('status', 'customer inserted successfully!!');
    }

    function customerShow()
    {
        $customers = Customer::all();
        return view('customer.show', compact('customers'));
    }
}
