<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function categoryList(){
        $cat = Category::get();
        return view('admin.pages.categories.category-list', compact('cat'));
    }

    public function categoryAdd(){
        $cat = Category::get();
        return view('admin.pages.categories.category-add');
    }
}
