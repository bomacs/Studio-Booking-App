<?php

namespace App\Http\Controllers\admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageTestimonialController extends Controller
{
    /**
    * show single comment
    */
    public function show(Comment $comment)
    {
        return view('admin.testimonial.show',[
            'comment' => $comment,
        ]);
    }

    /**
     * delete single comment
     */
    public function destroy($id)
    {
        $commentToDelete = Comment::findOrFail($id);
        $commentToDelete->delete();

        return redirect()->back()->with("message", "Testimonial has been deleted successfully.");
    }
}
