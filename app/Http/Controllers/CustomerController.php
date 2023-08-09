<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Feedback; // Add the import for the Feedback model
use Illuminate\Support\Facades\DB;
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
    public function orderDelete($id)
    {
        Order::where('orderID', '=', $id)->delete();
        return redirect()->back()->with('success', 'An order deleted successfully');
    }
    public function orderDetail($id)
    {
        $information = DB::table('orders')
         ->where('orderID','=', $id)
            ->join('customers', 'customers.customerID', 'orders.customerID')
            ->join('payment_methods','payment_methods.paymentMethodID','orders.paymentMethodID')
            ->select(
                'orders.orderID',
                'customers.customerID',
                'customers.firstName',
                'customers.lastName',
                'customers.phoneNumber',
                'customers.address',
                'orders.created_at',
                'payment_methods.paymentType'
            )
            ->get();
        $orderDetails = Order::join('order_details', 'orders.orderID', 'order_details.orderID')
            ->join('products', 'products.productID', 'order_details.productID')
            ->select(
                'order_details.orderID',
                'products.name',
                'order_details.quantity',
                'products.price',
                'orders.totalPrice'
            )
            ->where('order_details.orderID', $id)
            ->get();

        return view('admin.pages.customers.order-detail', compact('orderDetails', 'information'));
    }

    public function feedbackList()
    {
        // Fetch all feedbacks for the currently logged-in customer
        $feedbacks = Feedback::all();

        return view('admin.pages.Customers.feedback-list', compact('feedbacks'));
    }
    public function index()
    {
        return view('customer.index');
    }
    public function login()
    {
        return view('customer.page.login');
    }
    public function register()
    {
        return view('customer.page.register');
    }
}
