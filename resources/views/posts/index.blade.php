@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Short description</th>
                <th scope="col">Image</th>
                <th scope="col">User</th>
                <th scope="col">Create at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->short_description }}</td>
                    <td><img class="w-50" src="{{ '/storage/post-images/' . $post->image }}"></td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" type="button"
                           class="btn btn-success">Edit</a>
                        <a href="{{ route('post.comments', ['post' => $post->id]) }}" class="btn btn-primary mt-2 mb-2">Comments</a>
                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post"
                              class="delete-role-form">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
