<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request; 

class ManufacturerController extends Controller
{
    public function manufacturerList()
    {
        $manu = manufacturer::get();
        return view('admin.pages.manufacturers.manufacturer-list', compact('manu'));
    }

    public function manufacturerAdd()
    {
        $manu = manufacturer::all();
        return view('admin.pages.manufacturers.manufacturer-add', compact('manu'));
    }

    public function manufacturerSave(Request $request)
    {
        $nmanu = new manufacturer();
        $nmanu->manufacturerID = $request->id;
        $nmanu->manufacturerName = $request->name;
        $nmanu->manufacturerlogo = $request->logo;
        $nmanu->manufacturersave();
        return redirect()->back()->with('success', 'Manufacturer added successfully!');
    }

    public function manufacturerEdit($id){
        $manu = manufacturer::where('manufacturerID', '=', $id)->first();
        return view('admin.pages.manuefacturers.manufacturer-edit', compact('manu'));
    }

    public function manufacturerDelete($id){
        manufacturer::where('manufacturerID', '=', $id)->delete();
        return redirect()->back()->with('success', 'm=Manufacturer deleted successfully');
    }

    public function manufacturerupdate(Request $request)
    {
        manufacturer::where('manufacturerID', '=', $request->id)
        -> oroductupdate([
            'manufacturerID'=>$request->id,
            'manufacturerName'=>$request->name,
            'manufacturerlogo'=>$request->logo
        ]);
        return redirect()->back()->with('success', 'Manufacturer updated successfully!');
    }
}
