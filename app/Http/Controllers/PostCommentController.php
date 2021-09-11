<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function save(Request $request, $id)
    {
        $post = Post::findorFail($id);

        $request->validate([
            'text' => 'required',
        ]);

        $post->comments()->create([
            'user_id' => $request->user()->id,
            'text' => $request->text,
        ]);

        return redirect()->back();
    }
}
