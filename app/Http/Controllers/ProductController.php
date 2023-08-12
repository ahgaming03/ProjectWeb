<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        $pro = Product::join('categories', 'products.categoryID', 'categories.categoryID')
            ->join('manufacturers', 'products.manufacturerID', 'manufacturers.manufacturerID')
            ->select('products.*', 'categories.name as categoryName', 'manufacturers.name as manufacturerName')
            ->get();
        return view('admin.pages.products.product-list', compact('pro'));
    }

    public function productAdd()
    {
        $cat = Category::get();
        $pro = Product::get();
        $manufacturers = Manufacturer::get();
        return view('admin.pages.products.product-add', compact('cat', 'manufacturers', 'pro'));
    }

    public function productSave(Request $request)
    {
        $pros = new Product();
        $pros->productID = $request->id;
        $pros->name = $request->name;
        $pros->price = $request->price;
        $pros->categoryID = $request->category;
        $pros->manufacturerID = $request->manufacturer;
        $pros->stock = $request->stock;
        $pros->details = $request->details;
        $pros->updated_at = $request->updated_at;
        $pros->created_at = $request->created_at;
        $pros->save();
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function productEdit($id)
    {
        $cat = Category::get();
        $manufacturers = Manufacturer::get();
        $pro = Product::where('productID', '=', $id)->first();
        return view('admin.pages.products.product-edit', compact( 'cat', 'manufacturers', 'pro'));
    }

    public function productDelete($id)
    {
        Product::where('productID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function productUpdate(Request $request)
    {
        $img = $request->new_image == "" ? $request->old_image : $request->new_image;
        Product::where('productID', '=', $request->id)
            ->update([
                'name' => $request->name,
                'price' => $request->price,
                'details' => $request->details,
                'categoryID' => $request->category,
                'manufacturerID'=>  $request->manufacturer,
                'stock' => $request->stock
            ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    // customer dashboard
    public function index()
    {
        $products = Product::join('manufacturers', 'products.manufacturerID', 'manufacturers.manufacturerID')
            ->select('products.*', 'manufacturers.name as manufacturerName')
            ->get();
        $categories = Category::get();
        $manufacturers = Manufacturer::get();
        $images = Image::get();
        return view('customer.index', compact('products', 'categories', 'manufacturers', 'images'));
    }
    public function productDetails($id)
    {
        $product = Product::join('manufacturers', 'products.manufacturerID', 'manufacturers.manufacturerID')
        ->select('products.*', 'manufacturers.name as manufacturerName')
        ->where('productID', $id)
        ->first();
        $products = Product::join('manufacturers', 'products.manufacturerID', 'manufacturers.manufacturerID')
            ->select('products.*', 'manufacturers.name as manufacturerName')
            ->where('categoryID', $product->categoryID)
            ->whereNotIn('productID', [$id])
            ->take(10)
            ->get();
        $images = Image::get();
        return view('customer.pages.products.product-details', compact('products', 'images', 'product'));
    }


}