<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function adminList()
    {
        return view('admin.pages.admins.admin-list');
    }





}
