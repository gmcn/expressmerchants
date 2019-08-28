<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Express Merchants</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/ico" href="{{ url('/favicon.ico') }}"/>
    <link rel="shortcut" type="image/ico" href="{{ url('/favicon.ico') }}"/>
    <link rel="apple-touch-icon" sizes="128x128" href="{{ url('/favicon.ico') }}">
</head>
<body class="login">
    <div>
      <header>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
          <div class="container-fluid">
              <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('/images/express-merchants-head_logo.svg') }}" alt="Express Merchants">
              </a>
          </div>
        </nav>
      </header>
      <main class="py-4">
          @yield('content')
      </main>
    </div>
    <footer>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            © Express Merchants  |  <a href="#" target="_blank">Data Policy</a>
          </div>
          <div class="col-md-6 byline">
             <span>Built By <a href="https://www.cornellstudios.com" target="_blank">Cornell</a></span>
          </div>
        </div>
      </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/functions.js') }}" defer></script>
    <script src="{{ asset('js/jquery.matchHeight.js') }}" defer></script>
  </body>
</html>
