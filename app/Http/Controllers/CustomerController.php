<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Feedback; // Add the import for the Feedback model
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{
    /**
     * admin role 
     */

    // admin customer management
    public function customerList()
    {
        // Fetch all customers
        $customers = Customer::all();
        return view('admin.pages.Customers.customer-list', compact('customers'));
    }

    public function feedbackList()
    {
        // Fetch all feedbacks for the currently logged-in customer
        $feedbacks = Feedback::all();
        return view('admin.pages.Customers.feedback-list', compact('feedbacks'));
    }

    /**
     * customer role
     */
    // dashboard
    public function index()
    {
        $products = Product::join('manufacturers', 'products.manufacturerID', 'manufacturers.manufacturerID')
            ->select('products.*', 'manufacturers.name as manufacturerName')
            ->get();
        $categories = Category::get();
        $manufacturers = Manufacturer::get();
        return view('customer.index', compact('products', 'categories', 'manufacturers'));
    }
    //function login
    public function login()
    {
        return view('customer.pages.login');
    }
    // register
    public function register()
    {
        return view('customer.pages.register');
    }

    public function registerProcess(Request $request)
    {
        // Validate the received data
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:8|max:32',
            'email' => 'required|email',
            'address' => 'required'
        ]);


        // Create a new customer record
        $customers = new Customer;
        $customers->username = $validatedData['username'];
        $customers->password = Hash::make($validatedData['password']);
        $customers->email = $validatedData['email'];
        $customers->address = $validatedData['address'];
        $customers->save();

        // Check whether customer has been saved
        if ($customers) {
            return redirect()->route('login')->with('Success', 'Registration successful. You may now login.');
        } else {
            return back()->with('Fail', 'Registration unsuccessful. Please try again.');
        }
    }


    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:8|max:32',
        ]);

        $username = $request->username;
        $password = $request->password;

        $customer = Customer::where('username', '=', $username)->first();
        if ($customer) {
            if (Hash::check($password, $customer->password)) {
                $customer = [
                    'ID' => $customer->customerID,
                    'firstName' => $customer->firstName,
                    'lastName' => $customer->lastName,
                    'photo' => $customer->photo,
                ];
                session(['customer' => $customer]);
                return redirect()->route('customer-index'); // Update with your desired route
            } else {
                return redirect()->back()->with('error', 'Username or password is incorrect');
            }
        } else {
            return redirect()->back()->with('error', 'Username or password is incorrect');
        }
    }

    public function logout()
    {
        if (session()->has('customer')) {
            session()->pull('customer');
            return redirect()->route('customer-index'); // Update with your desired route
        }
    }

    // profile
    public function profile()
    {

        $customer = Customer::where('customerID', '=', session('customersID'))->first();
        return view('customer.pages.profiles.profile', compact('customer'));
    }



}