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
