<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
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
            'username' => 'required|min:5',
            'password' => 'required|min:8|max:32',
            'email' => 'required'
        ]);


        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $username = $request->username;
        $password = $request->password;
        $email = $request->email;
        $fileName = $request->photo;
        if ($fileName != null) {
            $fileName = $request->photo;
        } else {
            $fileName = "default_profile_photo.jpg";
        }
        $address = $request->address;

        $admin = new Admin();
        $admin->firstName = $firstName;
        $admin->lastName = $lastName;
        $admin->username = $username;
        $admin->password = $password;
        $admin->email = $email;
        $admin->photo = $fileName;
        $admin->address = $address;
        $admin->save();

        return redirect()->back()->with('success', 'Admin account added successfully');

    }

    public function adminEdit($id)
    {
        $admin = Admin::where('adminID', '=', $id)->first();
        return view('admin.pages.admins.admin-edit', compact('admin'));
    }




}