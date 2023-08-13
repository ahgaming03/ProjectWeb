<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function manufacturerList()
    {
        $manufacturer = Manufacturer::get();
        return view('admin.pages.manufacturers.manufacturer-list', compact('manufacturer'));
    }

    public function manufacturerAdd()
    {
        $manufacturer = Manufacturer::get();
        return view('admin.pages.manufacturers.manufacturer-add', compact('manufacturer'));
    }

    public function manufacturerSave(Request $request)
    {
        $manufacturers = new Manufacturer();
        $manufacturers->name = $request->name;
        $manufacturers->descriptions = $request->descriptions;
        $manufacturers->save();
        return redirect()->back()->with('success', 'Manufacturer added successfully!');
    }

    public function manufacturerEdit($id)
    {
        $manufacturers = Manufacturer::where('manufacturerID', '=', $id)->first();
        return view('admin.pages.manufacturers.manufacturer-edit', compact('manufacturers'));
    }

    public function manufacturerUpdate(Request $request)
    {
        Manufacturer::where('manufacturerID', '=', $request->id)
            ->update([
                'name' => $request->name,
                'descriptions' => $request->descriptions,
            ]);
        return redirect()->back()->with('success', 'Manufacturer updated successfully!');
    }
    public function manufacturerDelete($id)
    {
        Manufacturer::where('manufacturerID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Manufacturer deleted successfully');
    }

}