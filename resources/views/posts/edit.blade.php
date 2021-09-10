@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.validation-errors')
        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="user_id">User</label>
                <select class="custom-select" name="user_id" id="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"
                                @if($user->id == $post->user->id) selected @endif>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" class="form-control" id="text">{{ $post->text }}</textarea>
            </div>
            <div class="form-group">
                <label for="short_description">Short description</label>
                <textarea name="short_description" class="form-control" id="short_description">{{ $post->short_description }}</textarea>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="image">
                <label class="custom-file-label" for="image"></label>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection


