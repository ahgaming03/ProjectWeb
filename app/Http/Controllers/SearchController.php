<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $manufacturers = Manufacturer::get();
        $categories = Category::get();
        $images = Image::get();
        if (isset($_GET['query'])) {
            $search_text = $_GET['query'];
            $products = Product::where('name', 'LIKE', '%' . $search_text . '%')->paginate(9);
            $products->appends($request->all());
            return view('customer.pages.searches.search', [
                'products' => $products,
                'search_text' => $search_text,
                'manufacturers' => $manufacturers,
                'categories' => $categories,
                'images' => $images
            ]);
        } else {
            return view('customer.pages.searches.search');
        }
    }
}