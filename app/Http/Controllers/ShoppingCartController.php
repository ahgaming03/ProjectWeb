<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::where('productID', $id)->first();

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'cover' => $product->cover,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function cart()
    {
        return view('customer.pages.carts.cart');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function cartUpdate(Request $request)
    {
        if ($request->has('productId') && $request->has('quantity')) {
            $cart = session()->get('cart');
            $cart[$request->productId]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
    public function cartInfoOrder()
    {
        if (!session()->has('customer.ID')) {
            return redirect()->route('customer-login')->with('error', 'You must login to continue');
        }
        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        $customer = Customer::where('customerID', '=', session()->get('customer.ID'))->first();
        $paymentMethods = PaymentMethod::get();
        return view('customer.pages.carts.cart-info-order', compact('cart', 'total', 'customer', 'paymentMethods'));
    }
    public function checkout(Request $request)
    {
        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }

        $request->validate([
            'fullName' => 'required|min: 3',
            'phoneNumber' => 'required|regex:/^0[0-9]{2}[0-9]{3}[0-9]{4}$/',
            'address' => 'required',
        ]);

        $customerID = session()->get('customer.ID');
        $fullName = $request->fullName;
        $phoneNumber = $request->phoneNumber;
        $address = $request->address;
        $paymentMethod = $request->paymentMethod;

        session(['customer.fullName' => $fullName]);
        session(['customer.phoneNumber' => $phoneNumber]);
        session(['customer.address' => $address]);

        $order = new Order;
        $order->customerID = $customerID;
        $order->totalPrice = $total;
        $order->orderStatus = 1;
        $order->fullName = $fullName;
        $order->phoneNumber = $phoneNumber;
        $order->address = $address;
        $order->paymentMethodID = $paymentMethod;
        $order->save();

        foreach ($cart as $item => $details) {
            $orderDetail = new OrderDetail;
            $orderDetail->orderID = $order->id;
            $orderDetail->productID = $item;
            $orderDetail->quantity = $details['quantity'];
            $orderDetail->save();
        }

        session()->forget('cart');
        return redirect()->route('product-index');
    }
}