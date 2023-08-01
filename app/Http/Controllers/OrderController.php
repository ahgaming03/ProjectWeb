<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer; // Add the import for the Customer model
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderList()
    {
        $orders = Order::get();
        $customers = Customer::get();
        return view('admin.pages.customers.order-list', compact('orders', 'customers'));
    }
}
