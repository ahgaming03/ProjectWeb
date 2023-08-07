<?php

namespace App\Http\Controllers;

use App\Models\Admin;
<<<<<<< Updated upstream
use App\Models\Customer;
use App\Models\Role;
use Carbon\Carbon;
=======
use Illuminate\Contracts\Session\Session as SessionSession;
>>>>>>> Stashed changes
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
<<<<<<< Updated upstream
use Illuminate\Validation\Rule;
=======
use Illuminate\Support\Facades\Session as FacadesSession;
>>>>>>> Stashed changes
use Session;

class AdminController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:8|max:32',
        ]);

        $username = $request->username;
        $password = $request->password;

        $admin = Admin::where('username', '=', $username)->first();
        if ($admin) {
            if (Hash::check($password, $admin->password)) {
                $request->session()->put('adminID', $admin->adminID);
                return redirect()->route('admin-dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid username');
        }
    }
    public function logout()
    {
        if (session()->has('adminID')) {
            session()->pull('adminID');
            session()->pull('adminName');
            session()->pull('adminPhoto');
            return redirect()->route('admin-login');
        }
    }

    public function dashboard()
    {
        if (Session()->has("adminID")) {
            $data = Admin::where('adminID', '=', Session('adminID'))->first();
            // store to array session
            Session::put('adminName', $data->firstName . " " . $data->lastName);
            Session::put('adminPhoto', $data->photo);
            session()->put('adminRole', $data->roleID);
        }

        $orders = DB::table('customers')
            ->join('orders', 'customers.customerID', '=', 'orders.customerID')
            ->select('orders.*', 'customers.firstName', 'customers.lastName')
            ->orderBy('orders.updated_at', 'desc')
            ->take(5)
            ->get();

        $customers = Customer::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('data', 'orders', 'customers'));
    }

    public function adminList()
    {
        $admins = Admin::join('roles', 'admins.roleID', '=', 'roles.roleID')
            ->select('admins.*', 'roles.name as roleName')
            ->get();
        $roles = Role::get();
        return view('admin.pages.admins.admin-list', compact('admins', 'roles'));
    }

    public function adminAdd()
    {
        $roles = Role::get();
        return view('admin.pages.admins.admin-add', compact('roles'));
    }

    public function adminSave(Request $request)
    {
        $request->validate([
            'firstName' => 'required|min:3',
            'lastName' => 'min:4',
            'username' => 'required|min:5|unique:admins',
            'birthday' => 'required|date|before:' . Carbon::now()->subYears(18)->toDateString(),
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
        $role = $request->role;
        $address = $request->address;

        $admin = new Admin();
        $admin->firstName = $firstName;
        $admin->lastName = $lastName;
        $admin->username = $username;
        $admin->password = Hash::make($password);
        $admin->birthday = $birthday;
        $admin->phoneNumber = $phoneNumber;
        $admin->email = $email;
        $admin->gender = $gender;
        $admin->roleID = $role;
        $admin->photo = $photo;
        $admin->address = $address;
        $admin->save();

        return redirect()->back()->with('success', 'Admin account added successfully');
    }

    public function adminEdit($id)
    {
        $admin = Admin::where('adminID', '=', $id)->first();
        $roles = Role::get();
        return view('admin.pages.admins.admin-edit', compact('admin', 'roles'));
    }


    public function adminUpdate(Request $request)
    {
        $request->validate([
            'firstName' => 'required|min:3',
            'lastName' => 'min:4',
            'birthday' => 'required|date|before:' . Carbon::now()->subYears(18)->toDateString(),
            'phoneNumber' => 'required|regex:/^0[0-9]{2}[0-9]{3}[0-9]{4}$/',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $birthday = $request->birthday;
        $phoneNumber = $request->phoneNumber;
        $email = $request->email;
        $gender = $request->gender;
        $role = $request->role;
        $address = $request->address;

        Admin::where('adminID', '=', $request->adminID)->update([
            "firstName" => $firstName,
            "lastName" => $lastName,
            "birthday" => $birthday,
            "phoneNumber" => $phoneNumber,
            "email" => $email,
            "gender" => $gender,
            "roleID" => $role,
            "address" => $address,
        ]);
        return redirect()->back()->with('success', 'An account updated successfully');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8|max:32',
            'new_password' => 'required|confirmed|min:8|max:32',
        ]);

        $admin = Admin::where('adminID', '=', Session('adminID'))->first();
        if (Hash::check($request->old_password, $admin->password)) {
            $admin->password = Hash::make($request->new_password);
            $admin->save();
            return redirect()->back()->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid password');
        }
    }
    public function adminDelete($id)
    {
        Admin::where('adminID', '=', $id)->delete();
        return redirect()->back()->with('success', 'An account deleted successfully');
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

        $adminID = $request->adminID;
        // photo
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $photo = 'admin_' . $adminID . '.' . $extension;
            $file->move(public_path('admjn/images/uploads/faces'), $photo);

            Admin::where('adminID', '=', $request->adminID)->update([
                'photo' => $photo,
            ]);
            if (session('adminID') == $adminID) {
                Session::put('adminPhoto', $photo);
            }
            return redirect()->back()->with('success', 'Photo changed successfully.');
        }

        return redirect()->back()->with('error', 'Invalid photo.');
    }

}