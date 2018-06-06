<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('yl_logo.png')}}">

    <title>YoungLes</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/docs/4.1/examples/carousel/carousel.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/pricing/pricing.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/album/album.css" rel="stylesheet">

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
        <a class="navbar-brand" href="{{route('welcome')}}">YoungLes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('public.information')}}">Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('public.price')}}">Price</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('public.about')}}">About</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/home') }}" style="color:white;text-decoration:none;">Home</a>
            @else
            <a href="{{ route('login') }}" style="color:white;text-decoration:none;">Sign in</a>
            @endauth
            @endif
          </ul>
        </div>
        </div>
      </nav>
    </header>

    @yield('content')

    <!-- FOOTER -->
    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>&copy; 2017-2018 YoungLes, Inc. &middot;</p>
    </footer>
  </main>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="http://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
  <script src="http://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="http://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
