<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class ManageVideoController extends Controller
{
    /**
     * Show single video
     */
    public function show(Video $video)
    {
        return view('admin.videos.show', [
            'video' => $video,
        ]);
    }

    /**
     * Delete single video
     */
    public function destroy($video)
    {
        $video = Video::findOrFail($video);
        $video->delete();

        return redirect()->back()->with("message", "Video was deleted successfully.");
    }
}
