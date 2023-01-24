<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hero;

class ManageHeroController extends Controller
{
    public function create()
    {
        return view('admin.hero.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:128', 'unique:heroes'],
            'heading_1' => ['required', 'string' , 'max:255'],
            'heading_2' => ['string', 'max:255'],
            'video' => ['required', 'mimetypes:video/avi,video/mp4,video/mpeg,video/quicktime', 'max:102400']
        ]);

        if($request->video)  
        {
            $newVideoName = time() . '-' . $request->title . '.' . $request->video->extension();
            $request->file('video')->move(public_path('videos\heros'), $newVideoName);
        }else
        {
            $newVideoName = 'defaultVideo.mp4';
        }

        Hero::create([
            'title' => $request->title,
            'heading_1' => $request->heading_1,
            'heading_2' => $request->heading_2,
            'video_path' => $newVideoName
        ]);

        return redirect(route('admin.dashboard'))->with("message", "New detail for hero has been saved successfully!");
    }
}
