<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Request $request, $id)
    {
        $post = Post::with('user', 'comments', 'comments.user')->findOrFail($id);

        $user = $request->user();
        $isWriter = $user && $user->role->name === 'Writer';

        return view('post', compact('post', 'isWriter'));
    }
}
