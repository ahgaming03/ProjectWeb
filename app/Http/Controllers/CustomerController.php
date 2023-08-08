<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Feedback; // Add the import for the Feedback model
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Session;


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
    public function index()
    {
        return view('customer.index');
    }
    
    // function register
    public function register()
    {
        return view('customer.page.register');
    }

    public function RegisterCustomer(Request $request)
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
    //function login
    public function login()
    {
        
        return view('customer.page.login');
    }
    

    public function loginProcessCustomer(Request $request)
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
                $request->session()->put('customersID', $customer->customerID);
                $request->session()->put('customersUserName', $customer->username);
                $request->session()->put('customersEmail', $customer->email); // Update with your column name
                $request->session()->put('customersGender', $customer->gender); // Update with your column name
                return redirect()->route('index'); // Update with your desired route
            } else {
                return redirect()->back()->with('error', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid username');
        }
    }
    
    public function logout()
    {
        if (session()->has('customersID')) {
            session()->pull('customersID');
            session()->pull('customersName');
            session()->pull('customersPhoto');
            return redirect()->route('customer.page.login'); // Update with your desired route
        }
    }

    //customer profile
    public function profile()
    {
        
        $customer = Customer::where('customerID', '=', Session()->get('customerID'))->first();
        return view('customer.profiles.profile', compact('customer'));
    }


//     public function editProfile()
// {
//     $customerID = session('customer');
//     $customer = Customer::find($customerID);
    
//     return view('customer.edit_profile', compact('customer'));
// }

// public function updateProfile(Request $request)
// {
//     $customerID = session('customer');
//     $customer = Customer::find($customerID);

//     $request->validate([
//         'firstName' => 'required',
//         'lastName' => 'required',
//         'birthday' => 'required|date',
//         'gender' => 'required|in:1,0',
//         'phoneNumber' => 'required',
//         'address' => 'required',
//     ]);

//     $customer->firstName = $request->firstName;
//     $customer->lastName = $request->lastName;
//     $customer->birthday = $request->birthday;
//     $customer->gender = $request->gender;
//     $customer->phoneNumber = $request->phoneNumber;
//     $customer->address = $request->address;

//     $customer->save();

//     return redirect()->route('editProfile')->with('success', 'Profile updated successfully');
// }


    }





    
 
    

