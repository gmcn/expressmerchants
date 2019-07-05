<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Express Merchants | <?php echo $title; ?></title>

    <!-- Scripts -->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" charset="utf-8" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfU2hsPF_D_DwXwxr8QEk2NU_RPzBO4YA&libraries=places&callback=initMap"></script>

    <script type="text/javascript" src="{{ asset('js/infobubble-compiled.js') }}"></script>
	   <script type="text/javascript" src="{{ asset('js/store-locator.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/em-static-ds.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('css/storelocator.css') }}"> -->
</head>
<body onload="initMap()">
    <div class="container-fluid app">
      <header>
        <!-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel"> -->
          <div class="container-fluid">

            <div class="row">
              <div class="col-3 col-md-6 d-flex flex-row">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ asset('/images/express-merchants-head_blue_logo.svg') }}" alt="Express Merchants">
                </a>
                <h1><?php echo $title; ?></h1>
              </div>
              <div class="col-9 col-md-6 nav flex-row-reverse">
                <span class="navopen" onclick="openNav()">
                  <img src="{{ asset('/images/nav_icon.svg') }}" alt="You are logged in as an Admin User">
                </span>
                <p><span class="companyname">{{ $company->companyName }}</span><br>{{ Auth::user()->name }} </p>

                  @if (Auth::user()->accessLevel == '1')
                    <a href="{{ url('/') }}">
                      <img src="{{ asset('/images/admin_user.svg') }}" alt="You are logged in as an Admin User">
                    </a>
                  @endif

                <!-- Use any element to open the sidenav -->

              </div>
            </div>
          </div>
        <!-- </nav> -->

      </header>

      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ url('/home') }}"><img src="{{ asset('/images/control-panel.svg') }}" alt="Control Panel"> Control Panel</a>
        <a href="{{ url('/merchant-find') }}"><img src="{{ asset('/images/merchant.svg') }}" alt="Find Merchants"> Find Merchants</a>
        <a href="{{ url('/po-create') }}"><img src="{{ asset('/images/create-po.svg') }}" alt="Create Purchase Order"> Create Purchase Order</a>
        <a href="{{ url('/po-list') }}"><img src="{{ asset('/images/manage-po.svg') }}" alt="Manage Purchase Orders"> Manage Purchase Orders</a>
        <a href="{{ url('/account') }}"><img src="{{ asset('/images/account-details.svg') }}" alt="User Account Details"> User Account Details</a>
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
