@extends('layouts.master')

@section('content')

<div class="small-form">

    <form method="POST" action="/auth/register" class="form">
        {!! csrf_field() !!}

        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif

        <h2 class="form-signin-heading">Modify Account</h2>

        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="password" class="control-label">Change Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="control-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div>
            <button class="btn btn-primary" type="submit">Register</button>
        </div>

    </form>

</div>

@endsection
