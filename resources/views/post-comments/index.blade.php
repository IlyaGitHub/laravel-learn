@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Comments for post "{{ $post->title }}"</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Text</th>
                <th scope="col">Create at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($post->comments as $comment)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->text }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td>{{ $comment->updated_at }}</td>
                    <td>
                        <a href="{{ route('post.comments.edit', ['comment' => $comment->id]) }}" type="button"
                           class="btn btn-success">Edit</a>
                        <form action="{{ route('post.comments.destroy', ['comment' => $comment->id]) }}" method="post"
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
