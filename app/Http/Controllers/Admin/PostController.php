<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */

    public function index()
    {
        $posts = Post::with(['user'])->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required',
            'text' => 'required',
            'short_description' => 'required|max:200',
            'image' => 'required|image'
        ]);

        $fileNameToStore = $this->uploadImage($request);

        Post::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'text' => $request->text,
            'short_description' => $request->short_description,
            'image' => $fileNameToStore,
        ]);

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        return "Post $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $users = User::all();
        $post = Post::with('user')->findOrFail($id);
        return view('posts.edit', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required',
            'text' => 'required',
            'short_description' => 'required|max:200',
            'image' => 'sometimes|image'
        ]);

        $post = Post::findOrFail($id);
        $image = $post->image;

        if ($request->image) {
            Storage::delete('/public/post-images/' . $image);
            $image = $this->uploadImage($request);
        }

        $post->update(array_merge($request->all(), ['image' => $image]));

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $imageName = $post->image;

        Storage::delete('/public/post-images/' . $imageName);

        $post->delete();

        return redirect()->back();
    }

    private function uploadImage(Request $request)
    {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $request->file('image')->storeAs('public/post-images', $fileNameToStore);

        return $fileNameToStore;
    }
}
