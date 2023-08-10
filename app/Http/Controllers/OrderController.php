<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function orderList()
    {
        // Fetch all orders
        $orders = Order::get();
        return view('admin.pages.Orders.order-list', compact('orders'));
    }
}
