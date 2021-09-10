@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.validation-errors')
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            </div>
            <div class="form-group">
                <label for="role_id">Role</label>
                <select class="custom-select" name="role_id" id="role_id">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" @if($user->role->id === $role->id) selected @endif>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection


