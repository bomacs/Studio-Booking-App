<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request) 
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->file('image')->move(public_path('imgs\gallery'), $newImageName);

        Gallery::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $newImageName
        ]);

        return redirect(route('create.gallery'))->with('message', 'Image was uploaded successfullly.');

    }

}
