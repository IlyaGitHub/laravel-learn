@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('roles.update', ['role' => $role->id]) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="name" class="form-control" id="role" value="{{ $role->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
