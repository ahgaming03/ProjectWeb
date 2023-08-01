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
}
