@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.validation-errors')
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">User</label>
                <select class="custom-select" name="user_id" id="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" class="form-control" id="text"></textarea>
            </div>
            <div class="form-group">
                <label for="short_description">Short description</label>
                <textarea name="short_description" class="form-control" id="short_description"></textarea>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection


