<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function create() {
        return view('package.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'includes' => 'required',
            'price' => 'required|integer|min:0',
            'discount' => 'required|min:0'
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
}
