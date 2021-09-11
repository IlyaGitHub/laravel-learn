@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.validation-errors')
        <div>{{ $post->title }}</div>
        <div class="row">
            <div class="col-md-3">
                <div class="p-3">
                    <img src="{{ '/storage/post-images/' . $post->image }}" class="mw-100">
                </div>
            </div>
            <div class="col-md-9">
                <div class="">{{ $post->text }}</div>
                <div class="d-flex justify-content-end">{{ $post->created_at }} by {{ $post->user->name }}</div>
            </div>
        </div>
        <form action="{{ route('post.save-comment', ['id' => $post->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="text" id="" placeholder="Your comment..."></textarea>
            </div>
            <div class="form-group">
                <div class="d-md-flex justify-content-md-end w-100">
                    <button type="submit" class="btn btn-secondary mt-md-2">Comment</button>
                </div>
            </div>
        </form>
        @foreach($post->comments as $comment)
            <div class="mt-md-4 border border-dark p-md-1">
                <div class="d-md-flex justify-content-md-end">
                    {{ $comment->created_at }}
                    {{ $comment->user->name }}
                </div>
                <div class="mx-2">
                    {{ $comment->text }}
                </div>
                @if($isWriter)
                    <a href="{{ route('post.comments.edit', ['comment' => $comment->id]) }}" type="button"
                       class="btn btn-success">Edit</a>
                    <form action="{{ route('post.comments.destroy', ['comment' => $comment->id]) }}" method="post"
                          class="delete-role-form">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endsection
