<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    if (session()->has("adminID")) {
        $data = Admin::where('adminID', '=', session('adminID'))->first();
        // store to session array
        session()->put('adminName', $data->firstName . " " . $data->lastName);
        session()->put('adminPhoto', $data->photo);
    }
    return view('admin.dashboard')->with('data', $data ?? null); // Pass $data to the view or null if it's not set
}


    public function adminList()
    {
        $admins = Admin::get();
        return view('admin.pages.admins.admin-list', compact('admins'));
    }

    public function adminAdd()
    {
        return view('admin.pages.admins.admin-add');
    }

    public function adminSave(Request $request)
    {
        $request->validate([
            'firstName' => 'required|min:3',
            'username' => 'required|min:5' | 'unique:admins',
            'password' => 'required|min:8|max:32',
            'email' => 'required|email',
        ]);


        $photo = "default_profile_photo.jpg";
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $username = $request->username;
        $password = $request->password;
        $email = $request->email;
        $address = $request->address;

        $admin = new Admin();
        $admin->firstName = $firstName;
        $admin->lastName = $lastName;
        $admin->username = $username;
        $admin->password = $password;
        $admin->email = $email;
        $admin->photo = $photo;
        $admin->address = $address;
        $admin->save();

        return redirect()->back()->with('success', 'Admin account added successfully');
    }

    public function adminEdit($id)
    {
        $admin = Admin::where('adminID', '=', $id)->first();
        return view('admin.pages.admins.admin-edit', compact('admin'));
    }


    public function adminUpdate(Request $request)
    {
        $request->validate([
            'firstName' => 'required|min:3',
            'username' => 'required|min:5',
            'password' => 'required|min:8|max:32',
            'email' => 'required|email',
        ]);

        // photo
        $photo = "default_profile_photo.jpg";
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photo = time() . "_" . $file->getClientOriginalName();
            $file->move('uploads', $photo);
        }
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $username = $request->username;
        $password = $request->password;
        $email = $request->email;
        $address = $request->address;

        $admin = Admin::where('adminID', '=', $request->adminID)->first();
        $admin->firstName = $firstName;
        $admin->lastName = $lastName;
        $admin->username = $username;
        $admin->password = Hash::make($password);
        $admin->email = $email;
        $admin->photo = $photo;
        // move to uploads folder
        $admin->address = $address;
        $admin->save();

        return redirect()->back()->with('success', 'Admin account updated successfully');
    }

    public function adminDelete($id)
    {
        Admin::where('adminID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Admin account deleted successfully');
    }



}