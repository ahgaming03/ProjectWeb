<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Feedback; // Add the import for the Feedback model

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;


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
        $request->validate([
            'username' => 'required|min:5|max:32|unique:customers',
            'firstName'=> 'required|min:3|max:32',
            'password' => 'required|min:8|max:32|confirmed',
            'email' => 'required|email',
 
        ]);


        // Create a new customer record
        $customer = new Customer;
        $customer->username = $request->username;
        $customer->firstName= $request->firstName;
        $customer->lastName =$request->lastName;
        $customer->password = Hash::make($request->password);
        $customer->email= $request-> email;
        $customer->save();

        // Check whether customer has been saved
        if ($customer) {
            return redirect()->route('customer-login')->with('success', 'Registration successful. You may now login.');
        } else {
            return back()->with('error', 'Registration unsuccessful. Please try again.');
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
                return redirect()->route('product-index'); // Update with your desired route
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
            return redirect()->route('product-index'); // Update with your desired route
        }
    }

    // profile
    public function profile()
    {
        if (session()->has('customer')) {
            $customer = Customer::where('customerID', '=', session('customer.ID'))->first();
            if ($customer) {
                return view('customer.pages.profiles.profile', compact('customer'));
            } else {
                return redirect()->route('product-index')->with('error', 'Customer not found.');
            }
        }
    }
   //customer edit
public function customerEdit()
{
    $customer = Customer::where('ID', '=', session('customer.ID'))->first();
    return view('customer.pages.profiles.customer-edit', compact('customer'));
}

// customer save 
public function customerSave(Request $request)
    {
        $request->validate([
            'firstName' => 'required|min:3',
            'lastName' => 'min:4',
            'username' => 'required|min:5|unique:admins',
            'birthday' => 'required|date|before:' ,now()->subYears(18)->toDateString(),
            'phoneNumber' => 'required|regex:/^0[0-9]{2}[0-9]{3}[0-9]{4}$/',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $photo = "default_profile_photo.jpg"; // Default photo
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $username = $request->username;
        $password = 'Abc@2023'; // Default password
        $birthday = $request->birthday;
        $phoneNumber = $request->phoneNumber;
        $email = $request->email;
        $gender = $request->gender;
        $address = $request->address;

        $customer = new Customer();
        $customer->firstName = $firstName;
        $customer->lastName = $lastName;
        $customer->username = $username;
        $customer->password = Hash::make($password);
        $customer->birthday = $birthday;
        $customer->phoneNumber = $phoneNumber;
        $customer->email = $email;
        $customer->gender = $gender;
        $customer->photo = $photo;
        $customer->address = $address;
        $customer->save();

        return redirect()->back()->with('success', 'Customer account added successfully');
    }
    // changePassword
    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8|max:32',
            'new_password' => 'required|confirmed|min:8|max:32',
        ]);

        $customer = Customer::where('customerID', '=', Session('customer.customerID'))->first();
        if (Hash::check($request->old_password, $customer->password)) {
            customer::where('customerID', '=', Session('customer.customerID'))->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->back()->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid password');
        }
    }
   


    // upload image
    public function uploadImage(Request $request)
    {
        $request->validate([
            'photo' => [
                'image',
                'max:2048',
            ],
            [
                'photo.required' => 'A photo is required',
                'photo.image' => 'The file must be an image',
                'photo.max' => 'The image size must not exceed 5MB',
            ],
        ]);

        $customerID = $request->customer;
        // photo
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photo = 'admin_' . $customerID . '.png';
            $file->move(public_path('customer/images/uploads/faces'), $photo);

            customer::where('customer', '=', $request->customerID)->update([
                'photo' => $photo,
            ]);
            if (session('customer.customerID') == $customerID) {
                Session::put('customerID.photo', $photo);
            }
            return redirect()->back()->with('success', 'Photo changed successfully.');
        }

        return redirect()->back()->with('error', 'Invalid photo.');
    }
}

