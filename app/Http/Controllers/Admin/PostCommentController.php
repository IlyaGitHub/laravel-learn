<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Update\PostCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function comments($id)
    {
        $post = Post::with('comments', 'comments.user')->findOrFail($id);
        return view('post-comments.index', compact('post'));
    }

    public function edit($id)
    {
        $comment = Comment::with('post', 'user')->findOrFail($id);
        return view('post-comments.edit', compact('comment'));
    }

    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->back();
    }

    public function update(PostCommentRequest $request, $id)
    {
        $comment = Comment::with('post')->findOrFail($id);
        $comment->update($request->all());

        return redirect()->route('post.comments', ['post' => $comment->post->id]);
    }
}
