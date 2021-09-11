@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.validation-errors')
        <p>User: {{ $comment->user->name }}</p>
        <p>Post: {{ $comment->post->title }}</p>
        <p>Created at: {{ $comment->created_at }}</p>
        <form action="{{ route('post.comments.update', ['comment' => $comment->id]) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" class="form-control" id="text">{{ $comment->text }}</textarea>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection


