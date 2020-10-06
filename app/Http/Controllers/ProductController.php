<?php

namespace App\Http\Controllers;

use App\Category;
use App\Supplier;
use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    function index($id)
    {
        $categories = Category::all();
        $supplier_name = Supplier::findOrFail($id);
        return view('product.index', compact('supplier_name', 'categories'));
    }

    function productInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required|numeric',
            'buying_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'supplier_id' => 'required',
            'category_id' => 'required',
        ]);
        product::insert([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'supplier_id' => $request->supplier_id,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('status', 'Product inserted successfully!!');
    }

  

    public function productShow()
    {
        $categories = Category::all();
        $products = product::all();
        return view('product.show', compact('products', 'categories'));
    }

    
}
