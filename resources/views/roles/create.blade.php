@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.validation-errors')
        <form method="post" action="{{ route('roles.store') }}">
            @csrf
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="name" class="form-control" id="role">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
