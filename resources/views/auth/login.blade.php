<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('yl_logo.png')}}">

    <title>SPB</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/docs/4.0/examples/floating-labels/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="POST" action="{{ route('login') }}">
      {{csrf_field()}}
      <div class="text-center mb-4">
        <img class="mb-4" src="{{asset('yl_logo.png')}}" alt="" width=100 height="120">
      </div>

      <div class="form-label-group">
        <input id="inputEmail" type="email" class="form-control" placeholder="Email address" name="email" value="{{ old('email') }}" autocomplete="off" required>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input id="inputPassword" type="password" class="form-control" placeholder="Password" name="password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <label for="inputPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">Copyright &copy;2018 Bootstrap.</p>
    </form>
  </body>
</html>
