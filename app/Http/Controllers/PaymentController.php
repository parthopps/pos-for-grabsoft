<?php

namespace App\Http\Controllers;
use App\Product;
use App\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentController extends Controller
{
    function index($id)
    {
        $payment = Product::findOrFail($id);
        return view('payment.index', compact('payment'));
    }

    function paymentInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'pay' => 'required',
            'due' => 'required',
        ]);
        payment::insert([
            'supplier_id' => $request->supplier_id,
            'product_name' => $request->product_name,
            'product_id' => $request->product_id,
            'pay' => $request->pay,
            'due' => $request->due,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('status', 'Payment inserted successfully!!');
    }

    public function paymentShow()
    {
        $payments = payment::all();
        return view('payment.show', compact('payments'));
    }
}
