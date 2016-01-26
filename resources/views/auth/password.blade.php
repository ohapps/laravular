@extends('layouts.master')

@section('navbar')

@endsection

@section('content')
<div class="small-form">

    <form method="POST" action="/password/email" class="form">
      {!! csrf_field() !!}

      @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
              <div class="alert alert-danger" role="alert">{{ $error }}</div>
          @endforeach
      @endif

      <h2 class="form-signin-heading">Reset Password</h2>

      <div class="form-group">
          <label for="email" class="control-label">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-control">
      </div>

      <div>
        <button class="btn btn-primary" type="submit">
          Send Password Reset Link
        </button>
      </div>
    </form>

</div>
@endsection
