<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('images.index', [
            'galleryImages' => Image::with('user')->get(),
        ]);
    }

    public function create()
    {
        return view('images.create');
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

        Image::create([
            'title' => $request->input('title'),
            'user_id' => auth()->user()->id,
            'description' => $request->input('description'),
            'image_path' => $newImageName
        ]);

        return redirect(route('gallery.create'))->with('message', 'Image was uploaded successfullly.');

    }
}
