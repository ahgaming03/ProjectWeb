<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $cat = Category::get();
        return view('admin.pages.categories.category-list', compact('cat'));
    }

    public function categoryAdd(){
        $cat = Category::get();
        return view('admin.pages.categories.category-add', compact('cat'));
    }

    public function categorySave(Request $request)
    {
        $cats = new Category();
        $cats->categoryID = $request->id;
        $cats->name = $request->name;
        $cats->descriptions = $request->descriptions;
        $cats->save(); 
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function categoryEdit($id){
        $cat = Category::where('categoryID', '=', $id)->first();
        return view('admin.pages.categories.category-edit', compact('cat'));
    }

    public function categoryDelete($id){
        Category::where('categoryID', '=', $id)->delete();
        return redirect()->back()->with('success', 'category deleted successfully');
    }

    public function categoryUpdate(Request $request)
    {
        Category::where('categoryID', '=', $request->id)
        -> update([
            'name'=>$request->name,
            'descriptions'=>$request->descriptions
        ]);
        return redirect()->back()->with('success', 'category updated successfully!');
    }
}
