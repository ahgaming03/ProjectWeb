<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::get();
        if (isset($_GET['search'])){
            echo 'get text';
        }else{
            return view('customer.pages.searches.search',);
        }
    }
}
