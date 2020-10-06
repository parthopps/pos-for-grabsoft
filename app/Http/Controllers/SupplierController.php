<?php

namespace App\Http\Controllers;
use App\Category;
use App\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SupplierController extends Controller
{
    function supplier()
    {
        $categories = Category::all();
        return view('supplier.index', compact('categories'));
    }

    function supplyInsert(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required',
            'category_id' => 'required',
        ]);
        supplier::insert([
            'supplier_name' => $request->supplier_name,
            'supplier_description' => $request->supplier_description,
            'category_id' => $request->category_id,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('status', 'Supplier inserted successfully!!');
    }

    function supplierShow()
    {
        $suppliers = supplier::all();
        return view('supplier.show', compact('suppliers'));
    }
}
