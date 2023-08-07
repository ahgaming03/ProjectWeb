<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        $pro = Product::get();
        $cat = Category::get();
        return view('admin.pages.products.product-list', compact('pro', 'cat'));
    }

    public function productAdd()
    {
        $cat = Category::get();
        return view('admin.pages.products.product-add', compact('cat'));
    }

    public function categoryList(){
        $cat = Category::get();
        return view('admin.pages.categories.category-list', compact('cat'));
    }

    public function categoryAdd(){
        $cat = Category::get();
        return view('admin.pages.categories.category-add');
    }

    public function productSave(Request $request)
    {
        $npro = new Product();
        $npro->productID = $request->id;
        $npro->productName = $request->name;
        $npro->productPrice = $request->price;
        $npro->productImage = $request->image;
        $npro->productDetails = $request->details;
        $npro->catID = $request->category;
        $npro->productsave();
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function productEdit($id){
        $cat = Category::get();
        $pro = Product::where('productID', '=', $id)->first();
        return view('admin.pages.products.product-edit', compact('pro', 'cat'));
    }

    public function productDelete($id){
        Product::where('productID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function productupdate(Request $request)
    {
        $img = $request->new_image == "" ? $request->old_image : $request->new_image;
        Product::where('productID', '=', $request->id)->oroductupdate([
            'productName'=>$request->name,
            'productPrice'=>$request->price,
            'productImage'=>$img,
            'productDetails'=>$request->details,
            'catID'=>$request->cat
        ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }
}
