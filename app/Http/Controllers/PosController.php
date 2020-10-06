<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Pos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PosController extends Controller
{
    function index()
    {
        $customers = Customer::all();
        $posinfo = Pos::all();
        $products = Product::all();
        return view('pos.index', compact('products', 'posinfo', 'customers'));
    }

    function posInsert(Request $request)
    {
        // dd($request->all());
        
        $find_product_id = Pos::where('product_id', $request->product_id)->first();
        if($find_product_id)
        {
            Pos::where('product_id', $request->product_id)->increment('quantity', 1);  
            return back();   
        }
        else
        {
            pos::insert([
                'product_name' => $request->product_name,
                'product_id' => $request->product_id,
                'description' => $request->description,
                'category_name' => $request->category_name,
                'category_id' => $request->category_id,
                'buying_price' => $request->buying_price,
                'selling_price' => $request->selling_price,
                'quantity' => $request->quantity,
                'supplier_id' => $request->supplier_id,
                'created_at' => Carbon::now(),
            ]);
            return back();
        }
    }


    function posDelete($pos_id)
    {
        pos::findOrFail($pos_id)->delete();
        return back();
    }

    function posUpdate(Request $request, $id)
    {
        // dd($request->all());
        Pos::findOrFail($request->id)->update([
            'quantity' => $request->quantity,
            'selling_price' => $request->selling_price,
        ]);
        return back();
    }
}
