@extends('layouts.app')

<div class="container">
    <div>{{ $post->title }}</div>
    <img src="{{ '/storage/post-images/' . $post->image }}" class="float-md-left mw-25">
    <div class="border border-bottom-2 border-secondary">{{ $post->text }}</div>
    <div>{{ $post->created_at }} by {{ $post->user->name }}</div>
    <textarea name="" id="" cols="30" rows="10" placeholder="comment"></textarea>
    <button type="submit">Comment</button>
    @foreach($comments as $comment)
        <div class="mx-2">
            {{ $comment->text }}
        </div>
    @endforeach
</div>



