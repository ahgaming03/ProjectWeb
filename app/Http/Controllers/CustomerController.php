<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Feedback; // Add the import for the Feedback model

class CustomerController extends Controller
{
    public function customerList()
    {
        // Fetch all customers
        $customers = Customer::all();

        return view('admin.pages.Customers.customer-list', compact('customers'));
    }

    public function orderList()
    {
        // Fetch all orders
        $orders = Order::all();
        
        return view('admin.pages.Customers.order-list', compact('orders'));
    }

    public function feedbackList()
    {
        // Fetch all feedbacks for the currently logged-in customer
        $feedbacks = Feedback::all();
        
        return view('admin.pages.Customers.feedback-list', compact('feedbacks'));
    }
}
