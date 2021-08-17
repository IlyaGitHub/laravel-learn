<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function __construct(Request $request)
    {
//        dump($request->route()->getName());
    }

    /**
     * Display a listing of the resource.
     *
     */

    public function index()
    {
//        DB::insert("INSERT INTO posts (title, text, short_description) VALUES (?,?,?)", ['post 3', 'text for post 3', 'short_description 3']);
//        return DB::select("SELECT * FROM posts WHERE id > :id", ['id' => 2]);
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        redirect(route('posts.index'));
        dd($request);
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
        return view('posts.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dump($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : \Illuminate\Http\Response
    {
        return new Response("Post number $id has deleted");
    }
}
