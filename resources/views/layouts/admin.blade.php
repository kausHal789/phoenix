<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" id="_csrf">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @yield('head-section')


  <style>
    .slow .toggle-group { transition: left 0.7s; -webkit-transition: left 0.7s; }
  </style>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <style>
    body {
      background-color: #f8fafc;
      color: #212529;
    }
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
      transition: all .4s;
    }

    .navItem:hover {
      text-decoration: underline;
      cursor: pointer;
      color: #f8fafc;
    }

    main {
      margin-left: 250px;
      width: calc(100% - 250px);
      margin-bottom: 10rem;
    }
    .sidebar {
      height: 100vh;
      background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .9)), url(images/img1.jpeg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      box-shadow: 5px 7px 25px #999;
    }

    .bottom-border {
      border-bottom: 1px groove #eee;
    }

    .sidebar-link {
      transition: all .4s;
      cursor: pointer;
    }

    .sidebar-link:hover {
      background-color: #444;
      cursor: pointer;
      border-radius: 5px;
    }

    .current {
      background-color: #28a745;
      border-radius: 7px;
      box-shadow: 2px 5px 10px #111;
      transition: all .3s;
    }

    .current:hover {
      background-color: #38c172;
      border-radius: 7px;
      box-shadow: 2px 5px 20px #111;
      transform: translateY(-1px);
    }

    .search-input {
      background: transparent;
      border: none;
      border-radius: 0;
      border-bottom: 2px solid #999;
      transition: all .4s;
    }

    .search-input:focus {
      background: transparent;
      box-shadow: none;
      border-bottom: 2px solid #dc3545;
    }

    .search-button {
      border-radius: 50%;
      padding: 10px 16px;
      transition: all .4s;
    }

    .search-button:hover {
      background-color: #eee;
      transform: translateY(-1px);
    }

    .icon-parent {
      position: relative;
    }

    .icon-bullet::after {
      content: "";
      position: absolute;
      top: 7px;
      left: 15px;
      height: 12px;
      width: 12px;
      background-color: #f44336;
      border-radius: 50%;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: static;
        height: auto;
      }

      .top-navbar {
        position: static;
      }
    }
 
  </style>

</head>
<body>
  <div id="app">
    @guest
      {{-- Show add here --}}
    @else
    {{-- <div id="navBarContainer">
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

        <div class="row m-2 h5">
          <div class="col d-block">
            <div class="mt-1 mb-1"><a href="{{ route('artist.home') }}" class="navItem">Home</a></div>
            <div class="mt-1 mb-1"><a href="{{ route('artist.audience') }}" class="navItem">Audience</a></div>
            <div class="mt-1 mb-1"><a href="{{ route('artist.albums') }}" class="navItem">Albums</a></div>
            <div class="mt-1 mb-1 navItem"><a href="{{ route('artist.songs') }}" class="navItem">Songs</a></div>
          </div>
        </div>
      </nav>
    </div> --}}
    @endguest

    <nav class="navbar navbar-expand-md navbar-light">
      <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="container-fluid">
          <div class="row">
            <!-- sidebar -->
            <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
              <div class="row mt-3 m-1 border-bottom align-items-end pb-3">
                <div class="col-4 mr-0">
                  <img src="{{ auth()->user()->profile->profileImage() }}" class="rounded-circle w-100 h-auto float-right">
                </div>
                <div class="col-6">
                  <div class="text-white h3 text-capitalize">{{ auth()->user()->profile->name }}</div>
                </div>
              </div>
              <ul class="navbar-nav flex-column mt-4">
                    
                <li class="nav-item"><a href="{{ route('admin.home') }}" class="nav-link text-white p-3 mb-2 @if (isset($isAdminHome)) current @endif sidebar-link"><img src="/storage/icons/admin_home.png" class="mr-2" width="25" alt=""> Home</a></li>
                <li class="nav-item"><a href="{{ route('admin.user') }}" class="nav-link text-white p-3 mb-2 @if (isset($isAdminUser)) current @endif sidebar-link"><img src="/storage/icons/user_light.png" class="mr-2" width="25" alt=""> Users</a></li>
                <li class="nav-item"><a href="{{ route('admin.album') }}" class="nav-link text-white p-3 mb-2 sidebar-link @if (isset($isAdminAlbum)) current @endif"><img src="/storage/icons/album.png" class="mr-2" width="25" alt=""> Albums</a></li>
                <li class="nav-item"><a href="{{ route('admin.playlist') }}" class="nav-link text-white p-3 mb-2 sidebar-link @if (isset($isAdminPlaylist)) current @endif"><img src="/storage/icons/playlist.png" class="mr-2" width="25" alt=""> Playlists</a></li>
                <li class="nav-item"><a href="{{ route('admin.song') }}" class="nav-link text-white p-3 mb-2 sidebar-link @if (isset($isAdminSong)) current @endif"><img src="/storage/icons/song.png" class="mr-2" width="25" alt=""> Tracks</a></li>
                <li class="nav-item"><a href="{{ route('admin.song.categories') }}" class="nav-link text-white p-3 mb-2 sidebar-link"><img src="/storage/icons/category.png" class="mr-2" width="25" alt=""> Chategories</a></li>
                {{-- <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-wrench text-light fa-lg mr-3"></i>Settings</a></li> --}}
              </ul>
            </div>
            <!-- end of sidebar -->
          </div>
        </div>
      </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
  </div>
  <div>
    @yield('script-section')
  </div>

  <script>
    $(document).ready(function () {
      $('.toggle-group').click(function () {
        var data = $(this).siblings('input').attr('id').split('-', 2);
        var id = data[0];
        var type = data[1];

        var root = $(this).parent('.toggle.btn.btn-sm');
        
        if(root.hasClass('off')) {
          // make activate
          var url = "/" + type + "/activate/" + id + "/admin";
          activate_deactivate(url);

        } else {
          // make deactivate
          var url = "/" + type + "/deactivate/" + id + "/admin";
          activate_deactivate(url);
        }

      });
    });

    function activate_deactivate(_url) {
      $.ajax({
        url: _url,
        method: "GET",
        cache: false,
        success: function (_data) {
          console.log(_data);
        }, 
        error: function (err) {
          console.log(err);
        }
      })
    }

  </script>
</body>
</html>
