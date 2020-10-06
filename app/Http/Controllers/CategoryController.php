<?php

namespace App\Http\Controllers;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function category()
    {
        return view('category.index');
    }

    function categoryInsert(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        category::insert([
            'category_name' => $request->category_name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('status', 'Category inserted successfully!!');
    }

    function categoryShow()
    {
        $categories = Category::all();
        return view('category.show', compact('categories'));
    }

    function CategoryEdit($category_id)
    {
        $category_info = Category::findOrFail($category_id);
        return view('category.edit', compact('category_info'));
    }

    function categoryUpdate(Request $request, $id)
    {
        Category::findOrFail($request->id)->update([
            'category_name' => $request->category_name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
        ]);
        return back()->with('status', 'Category edited successfully!!');
    }

    function categoryDelete($category_id)
    {
        category::findOrFail($category_id)->delete();
        return back()->with('deletestatus', 'Packages deleted successfully!!');
    }
}
