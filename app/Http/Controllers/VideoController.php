<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return view('videos.index', [
            'galleryVideos' => Video::with('user')->get(),
        ]);
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:128', 'unique:heroes'],
            'description' => ['required', 'string' , 'max:255'],
            'video' => ['required', 'mimetypes:video/avi,video/mp4', 'max:102400']
        ]);

        if($request->video)  
        {
            $newVideoName = time() . '-' . $request->title . '.' . $request->video->extension();
            $request->file('video')->move(public_path('videos\gallery_videos'), $newVideoName);
        }else
        {
            $newVideoName = 'defaultVideo.mp4';
        }

        Video::create([
            'user_id' => auth()->user()->id, 
            'title' => $request->title,
            'description' => $request->description,
            'video_path' => $newVideoName
        ]);

        return redirect(route('photographer.dashboard'))->with("message", "New video has been saved successfully!");
    }
}
