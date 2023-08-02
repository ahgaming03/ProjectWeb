<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function adminList()
    {
        $admin = Admin::get();
        return view('admin.pages.admins.admin-list', compact('admin'));
    }

    public function adminAdd()
    {
        return view('admin.pages.admins.admin-add');
    }





}
