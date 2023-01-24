<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ManageImageController extends Controller
{
    /**
     * Show single image
     */
    public function show(Image $image)
    {
        return view('admin.image.show', [
            'image' => $image,
        ]);
    }

    /**
     *  Delete single Image
     */
    public function destroy($image)
    {
        $image = Image::findOrFail($image);
        $image->delete();

        return redirect()->back()->with("message", "Image was deleted successfully.");
    }

}
