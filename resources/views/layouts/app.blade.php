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
<body>
    <div class="container-fluid app">
      <header>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
          <div class="container-fluid">
              <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ asset('/images/express-merchants-head_blue_logo.svg') }}" alt="Express Merchants">

              </a>

                <h1>User Command <span>Console</span></h1>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                      <p class="companyname">{{ $company->companyName }}</p>
                      <p class="username">{{ Auth::user()->name }}</p>

                        @if (Auth::user()->accessLevel == '1')
                        Admin
                        @endif
                        @if (Auth::user()->accessLevel == '2')
                        Company Admin
                        @endif
                        @if (Auth::user()->accessLevel == '3')
                        User
                        @endif

                      <!-- Use any element to open the sidenav -->
                      <span onclick="openNav()">open</span>

                        <!-- Authentication Links -->
                        @guest
                        <!-- No guest access -->
                        @else

                          <!-- <li class="nav-item dropdown">
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

                            </div>
                          </li> -->
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

      </header>

      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="/home"><img src="{{ asset('/images/control-panel.svg') }}" alt="Control Panel"> Control Panel</a>
        <a href="/merchants"><img src="{{ asset('/images/merchant.svg') }}" alt="Find Merchants"> Find Merchants</a>
        <a href="/po-create"><img src="{{ asset('/images/create-po.svg') }}" alt="Create Purchase Order"> Create Purchase Order</a>
        <a href="/po-list"><img src="{{ asset('/images/manage-po.svg') }}" alt="Manage Purchase Orders"> Manage Purchase Orders</a>
        <a href="#"><img src="{{ asset('/images/account-details.svg') }}" alt="User Account Details"> User Account Details</a>
        <a href="#" onclick="return confirm('Coming Soon')"><img src="{{ asset('/images/get-help.svg') }}" alt="Express Merchants"> Get Help</a>
        <a href="#" onclick="return confirm('Coming Soon')"><img src="{{ asset('/images/user-guide.svg') }}" alt="Express Merchants"> User Guide</a>
        <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             {{ __('Logout') }} <img src="{{ asset('/images/account-details.svg') }}" alt="Express Merchants">
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>


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
