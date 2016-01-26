@extends('layouts.master')

@section('navbar')

@endsection

@section('content')
<div class="small-form">

    <form method="POST" action="/password/reset" class="form">
      {!! csrf_field() !!}

      @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
              <div class="alert alert-danger" role="alert">{{ $error }}</div>
          @endforeach
      @endif

      <h2 class="form-signin-heading">Reset Password</h2>

      <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group">
          <label for="email" class="control-label">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-control">
      </div>

      <div class="form-group">
          <label for="password" class="control-label">Password</label>
          <input type="password" name="password" class="form-control">
      </div>

      <div class="form-group">
          <label for="password_confirmation" class="control-label">Confirm Password</label>
          <input type="password" name="password_confirmation" class="form-control">
      </div>

      <div>
        <button type="submit" class="btn btn-primary">
          Reset Password
        </button>
      </div>
    </form>

</div>
@endsection
