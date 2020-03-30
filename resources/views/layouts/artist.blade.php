<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" id="_csrf">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }} " defer></script>
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @yield('head-section')

  <style>
    body {
      background-color: #f8fafc;
      color: #212529;
    }
  </style>

  @guest
  
  @else  
  <style>
    #navBarContainer {
      background-color: #000000;
      color: #f8fafc;
      width: 250px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      letter-spacing: 1px;
    }
    .navBar {
      padding: 25px;
      display: flex;
      flex-direction: column;
      -ms-flex-direction: column;
    }

    .navItem{
      text-decoration: none;
      color: #f8fafc;
    }

    .navItem:hover {
      text-decoration: underline;
      cursor: pointer;
      color: #f8fafc;
    }
    .card-common {
      box-shadow: 1px 2px 5px #999;
      transition: all .4s;
    }

    .card-common:hover {
      box-shadow: 2px 3px 15px #999;
      transform: translateY(-1px);
    }

    main {
      margin-left: 250px;
      width: calc(100% - 250px);
      margin-bottom: 10rem;
    }
  </style>
  @endguest

</head>
<body>
  <div id="app">
    {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
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
              @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->username }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  @can('view', App\Artist::class)
                  <a class="dropdown-item" href="{{ route('artist.home') }}">
                    {{ __('Home') }}
                  </a>  
                  @endcan

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
    </nav> --}}

    @guest
      {{-- Show add here --}}
    @else
    <div id="navBarContainer">
      <nav class="navBar">
        <a href='/home' class="logo pb-3 text-center">
          <img src="/storage/icons/logo.png" alt="" class="">
        </a>

        <div class="row align-item-start font-weight-bold">
          <div class="col-5 shadow-lg">
            <img src="{{ auth()->user()->profile->profileImage() }}" class="w-100 h-auto rounded-circle" alt="">
          </div>
          <div class="col-6">
            <span class="h3 text-capitalize mt-1">{{ auth()->user()->profile->name }}</span>
          </div>
        </div>

        <div class="row mt-3 m-2 h5">
          <div class="col text-white-50">STATS</div>
        </div>

        <div class="row m-2 h5">
          <div class="col d-block">
            <div class="mt-1 mb-1"><a href="{{ route('artist.home') }}" class="navItem">Home</a></div>
            <div class="mt-1 mb-1"><a href="{{ route('artist.audience') }}" class="navItem">Audience</a></div>
            <div class="mt-1 mb-1"><a href="{{ route('artist.albums') }}" class="navItem">Albums</a></div>
            <div class="mt-1 mb-1"><a href="{{ route('artist.songs') }}" class="navItem">Songs</a></div>
            <div class="mt-1 mb-1"><a href="{{ route('home') }}" class="navItem">Pheonix Home</a></div>
            <div class="mt-1 mt-5 border-top">
              <a class="navItem p-5 align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              <span class="mr-0">{{ __('Logout') }}</span>
              <span><img src="/storage/icons/log_out.png" style="max-width:20px" alt=""></span>
            </a>
            </div>
            
            
          </div>
        </div>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </nav>
    </div>
    @endguest

    <main class="py-4">
        @yield('content')
    </main>
  </div>
  <div>
    @yield('script-section')
  </div>
</body>
</html>
