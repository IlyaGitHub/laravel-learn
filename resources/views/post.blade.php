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
            @include('partials.comment', ['comment' => $comment, 'isWriter' => $isWriter])
        @endforeach
    </div>
@endsection
