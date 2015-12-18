@extends('layouts.master')

@section('navbar')
    
@endsection

@section('content')
    <form method="POST" action="/auth/login" class="form-signin">
    {!! csrf_field() !!}

    <h2 class="form-signin-heading">Please sign in</h2>

    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email address" required autofocus>

    <label for="password" class="sr-only">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

    <div class="checkbox">
      <label>
        <input type="checkbox" name="remember"> Remember me
      </label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>

    </form>
@endsection
