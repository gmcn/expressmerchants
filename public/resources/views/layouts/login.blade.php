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
</head>
<body class="login">
    <div>
      <header>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('/') }}/images/express-merchants_logo.svg" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a href="/po-create" class="dropdown-item">
                                    + PO
                                  </a>
                                  <a href="/po-list" class="dropdown-item">
                                    PO List
                                  </a>
                                    <a href="/register" class="dropdown-item">
                                      + User
                                    </a>
                                    <a href="/userlist" class="dropdown-item">
                                      User List
                                    </a>
                                    <a href="/company-create" class="dropdown-item">
                                      + Company
                                    </a>
                                    <a href="/company-list" class="dropdown-item">
                                      Company List
                                    </a>
                                    <a href="/merchant-create" class="dropdown-item">
                                      + Merchant
                                    </a>
                                    <a href="/merchant-list" class="dropdown-item">
                                      Merchant List
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
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
             <span>Built By Gary <a href="https://www.cornellstudios.com" target="_blank">Cornell</a></span>
          </div>
        </div>
      </div>

    </footer>
    <script src="{{ asset('js/junctions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.matchHeight.js') }}" type="text/javascript"></script>
  </body>
</html>
