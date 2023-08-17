<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
        $request->validate([
            'id' => 'required|unique:products,productID',
            'name' => 'required',
            'cover' => 'required|image|max:2048',
        ]);

        $productID = Str::upper($request->id);
        $name = $request->name;
        $price = $request->price;
        $categoryID = $request->category;
        $manufacturerID = $request->manufacturer;
        $details = $request->details;

        if ($request->hasFile('cover') && $productID) {
            $file = $request->file('cover');
            $imageName = $productID . '_C.png';
            $destinationPath = public_path('admjn/images/uploads/products/');
            $file->move($destinationPath, $imageName);

            $pros = new Product([
                'productID' => $productID,
                'name' => $name,
                'price' => $price,
                'categoryID' => $categoryID,
                'manufacturerID' => $manufacturerID,
                'details' => $details,
                'cover' => $imageName,
            ]);
            $pros->save();

            if ($request->hasFile('images')) {
                $index = 0;
                $files = $request->file('images');
                foreach ($files as $file) {
                    $imageName = $request->id . '_' . $index++ . '.png';
                    $file->move($destinationPath, $imageName);
                    $img = new Image([
                        'productID' => $request->id,
                        'imageName' => $imageName,
                    ]);
                    $img->save();
                }
            }

            return redirect()->back()->with('success', 'Product added successfully!');
        }
    }

    public function productEdit($id)
    {
        $cat = Category::get();
        $manufacturers = Manufacturer::get();
        $pro = Product::where('productID', '=', $id)->first();
        $images = Image::where('productID', '=', $id)->get();
        return view('admin.pages.products.product-edit', compact('cat', 'manufacturers', 'pro', 'images'));
    }

    public function productUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cover' => 'image|max:2048',
            'images.*' => 'image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $imageName = $request->id . '_C.png';
            $destinationPath = public_path('admjn/images/uploads/products/');
            $file->move($destinationPath, $imageName);      

            Product::where('productID', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'categoryID' => $request->category,
                    'manufacturerID' => $request->manufacturer,
                    'details' => $request->details,
                    'cover' => $imageName,
                ]);
        } else {
            Product::where('productID', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'categoryID' => $request->category,
                    'manufacturerID' => $request->manufacturer,
                    'details' => $request->details,
                ]);
        }

        if ($request->hasFile('images')) {
            $index = 0;
            $files = $request->file('images');
            $destinationPath = public_path('admjn/images/uploads/products/');
            
            $images = Image::where('productID', '=', $request->id);
            foreach ($images as $image) {
                if (File::exists(public_path('admjn/images/uploads/products/' . $image->imageName)))
                    File::delete(public_path('admjn/images/uploads/products/' . $image->imageName));
            }
            Image::where('productID', '=', $request->id)->delete();

            foreach ($files as $file) {
                $imageName = $request->id . '_' . $index++ . '.png';
                $file->move($destinationPath, $imageName);
                $img = new Image([
                    'productID' => $request->id,
                    'imageName' => $imageName,
                ]);
                $img->save();
            }
        }

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function deleteImage($id)
    {
        $image = Image::where('imageID', '=', $id)->first();
        if (File::exists(public_path('admjn/images/uploads/products/' . $image->imageName)))
            File::delete(public_path('admjn/images/uploads/products/' . $image->imageName));
        Image::where('imageID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
    public function deleteCover($id)
    {
        $cover = Product::where('productID', '=', $id)->first()->cover;
        if (File::exists(public_path('admjn/images/uploads/products/' . $cover)))
            File::delete(public_path('admjn/images/uploads/products/' . $cover));

        Product::where('productID', '=', $id)
            ->update([
                'cover' => NULL,
            ]);
        return redirect()->back()->with('success', 'Cover deleted successfully!');
    }

    public function productDelete($id)
    {
        $product = Product::where('productID', '=', $id)->first();
        if (File::exists(public_path('admjn/images/uploads/products/' . $product->cover)))
            File::delete(public_path('admjn/images/uploads/products/' . $product->cover));

        $images = Image::where('productID', '=', $id)->get();
        foreach ($images as $image) {
            if (File::exists(public_path('admjn/images/uploads/products/' . $image->imageName)))
                File::delete(public_path('admjn/images/uploads/products/' . $image->imageName));
        }

        Product::where('productID', '=', $id)->delete();
        return redirect()->back()->with('success', 'A product deleted successfully');
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