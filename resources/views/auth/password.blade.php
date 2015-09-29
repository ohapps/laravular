<!DOCTYPE html>
<html>
<head>
  <title>Laravular</title>
</head>
<body>
  <form method="POST" action="/password/email">
    {!! csrf_field() !!}

    <div>
      Email
      <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
      <button type="submit">
        Send Password Reset Link
      </button>
    </div>
  </form>
</body>
</html>
