<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('testimonials.index', [
            'comments' => Comment::with('user.userprofile')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:2200'
        ]);

        if (auth()->user())
        {
            Comment::create([
                 'user_id' => auth()->user()->id,
                 'comment' => $request->comment,
            ]);

            return redirect()->back()->with("message", "Thank you for your comments/suggestions.");
        } else
        {
            abort(403, 'Make sure you are logged in.');
        }
    }
}
