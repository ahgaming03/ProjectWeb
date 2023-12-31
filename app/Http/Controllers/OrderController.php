<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Models\OrderDetail;


class OrderController extends Controller
{
    public function orderList()
    {

        $orders = Order::all();

        return view('admin.pages.Customers.order-list', compact('orders'));
    }
    public function orderDelete($id)
    {
        OrderDetail::where('orderID', 2)
            ->delete();
        return redirect()->route('order-list')->with('success', 'An order deleted successfully');
    }
    public function orderDetail($id)
    {
        $information = DB::table('orders')
            ->where('orderID', '=', $id)
            ->join('customers', 'customers.customerID', 'orders.customerID')
            ->join('payment_methods', 'payment_methods.paymentMethodID', 'orders.paymentMethodID')
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

    
}
