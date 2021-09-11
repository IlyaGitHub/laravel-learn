@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="post-wrapper border border-dark mx-md-5 px-md-3 pb-md-3 mb-3">
                <div class="post-title mt-3 mb-3 ml-4">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ '/storage/post-images/' . $post->image }}" class="mw-100">
                    </div>
                    <div class="col-md-9 d-md-flex flex-md-column justify-content-sm-between">
                        <div class="border-bottom-2 border-secondary">
                            {{ $post->short_description }}
                        </div>
                        <div class="d-flex justify-content-around border-top border-secondary pt-2">
                            <div>{{ $post->created_at }}</div>
                            <div>by {{ $post->user->name }}</div>
                            <div><a href="{{ route('post.show', ['id' => $post->id]) }}">Read more...</a></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
