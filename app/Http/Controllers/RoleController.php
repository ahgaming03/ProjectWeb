<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Exception;


class RoleController extends Controller
{
    public function roleList()
    {
        $roles = Role::get();
        return view('admin.pages.admins.role-list', compact('roles'));
    }
    public function roleAdd()
    {
        $roles = Role::get();
        return view('admin.pages.admins.role-add');
    }
    public function roleSave(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:roles'
        ]);
        $role = new role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        return redirect()->back()->with('success', 'Role account added successfully');
    }
    public function roleEdit($id)
    {
        $role = role::where('roleID', '=', $id)->first();
        return view('admin.pages.admins.role-edit', compact('role'));
    }
    public function roleUpdate(Request $request)
    {
        Role::where('roleID', '=', $request->roleID)
            ->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
        return redirect()->back()->with('success', 'Role updated successfully!');
    }
    public function roleDelete($id)
    {
        try {
            Role::where('roleID', '=', $id)->delete();
            return redirect()->back()->with('success', 'Role deleted successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'This role is being used by another account!');
        }
    }
}