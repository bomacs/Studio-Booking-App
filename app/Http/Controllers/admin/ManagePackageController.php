<?php

namespace App\Http\Controllers\admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagePackageController extends Controller
{
    /**
     * show create new package form
     */
    public function create() {
        return view('admin.package.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'includes' => 'required',
            'price' => 'required|integer|min:0',
            'discount' => 'min:0'
        ]);

        Package::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'includes' => $request->input('includes'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount')
        ]);

        return redirect(route('admin.dashboard'))->with('message', 'Package was created successfullly.');
    }
    /**
     * show single package
     */
    public function show($id)
    {
        return view('admin.package.show',[
            'package' => Package::findOrFail($id),
        ]);
    }

    /**
    * edit single package
    */
    public function edit($id)
    {
        return view('admin.package.edit',[
            'package' => Package::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    { 
        $attributes = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'includes' => 'required',
            'price' => 'required|integer|min:0',
            'discount' => 'min:0'
        ]);

        $package = Package::findOrFail($id);
        $package->update($attributes);

        return redirect()->back()->with("message", "Package was updated successfully.");
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->back()->with("message", "Package was deleted.");
    }

}
