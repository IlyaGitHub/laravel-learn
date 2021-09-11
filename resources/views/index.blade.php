@extends('layouts.app')

@section('content')
    <div class="container">
        @each('partials.post', $posts, 'post', 'partials.posts-empty')
    </div>
@endsection
