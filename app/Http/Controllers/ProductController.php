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
        $pro = Product::get();
        $cat = Category::get();
        return view('admin.pages.products.product-list', compact('pro', 'cat'));
    }

    public function productAdd()
    {
        $cat = Category::get();
        $manufacturers = Manufacturer::get();
        return view('admin.pages.products.product-add', compact('cat', 'manufacturers'));
    }

    public function productSave(Request $request)
    {
        $pros = new Product();
        $pros->productID = $request->id;
        $pros->categoryID = $request->category;
        $pros->manufacturerID = $request->id;
        $pros->name = $request->name;
        $pros->price = $request->price;
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
        return view('admin.pages.products.product-edit', compact('pro', 'cat', 'manufacturers'));
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
            ->oroductupdate([
                'productName' => $request->name,
                'productPrice' => $request->price,
                'productImage' => $img,
                'productDetails' => $request->details,
                'catID' => $request->cat
            ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    // dashboard
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