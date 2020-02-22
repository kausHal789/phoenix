<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/playing-bar.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">



  @yield('head-section')

</head>
<body>
  <div id="app">
    {{-- <div id="topSection">
      <nav class="navBar ">
        <a href='#' class="logo pb-3">
          <img src="/storage/icons/logo.png" alt="">
        </a>

        <div class="group">
          <div class="navItem p-1 font-weight-bold h5 d-block">
            <a href="#" class="navItemLink">
              <span>Search</span>
              <img src="/storage/icons/search.png" alt="Search" class="img-fluid icon float-right">
            </a>
          </div>
        </div>
        
        <div class="group">
          <div class="navItem p-1 font-weight-bold h5 d-block">
            <a href="#" class="navItemLink">Browse</a>
          </div>
          
          <div class="navItem p-1 font-weight-bold h5 d-block">
            <a href="#" class="navItemLink">Your Music</a>
          </div>
          
          <div class="navItem p-1 font-weight-bold h5 d-block">
            <a href="#" class="navItemLink">Temp</a>
          </div>
        </div>
      </nav>
      <main class="py-4">
          @yield('content')
      </main>
    </div> --}}
    <div id="topSection">
      <div id="navBarContainer">
        <nav class="navBar ">
          <a href='#' class="logo pb-3 text-center">
            <img src="/storage/icons/logo.png" alt="" class="">
            {{-- <span class="h2" style="text-decoration:none">{{ env('APP_NAME') }}</span> --}}
          </a>
          <div class="group">
            <div class="navItem p-1 font-weight-bold h5 d-block">
              <a href="#" class="navItemLink">
                <span>Search</span>
                <img src="/storage/icons/search.png" alt="Search" class="img-fluid icon float-right">
              </a>
            </div>
          </div>          
          <div class="group">
            <div class="navItem p-1 font-weight-bold h5 d-block">
              <a href="#" class="navItemLink">Browse</a>
            </div>
            
            <div class="navItem p-1 font-weight-bold h5 d-block">
              <a href="#" class="navItemLink">Your Music</a>
            </div>
            
            <div class="navItem p-1 font-weight-bold h5 d-block">
              <a href="#" class="navItemLink">Temp</a>
            </div>
          </div>
        </nav>
      </div>
      <main id="mainViewContainer">
        @yield('content')
      </main>
    </div>
    <div class="bottomSection">
      @auth        
      <footer id="nowPlayingBarContainer">
        <div id="nowPlayingBar">
          <div id="nowPlayingBarLeft"> 
            <div class="content">
              
              <span class="albumLink">
                <img src="https://images.hdqwalls.com/wallpapers/abstract-colorful-texture-square-7f.jpg" alt=""
                  class="albumArtWork">
              </span>
              
              <div class="trackInfo">
                <span class="trackName h5">Alone</span>
                <span class="artistName text-muted">Alon Walker</span>
              </div>
            
            </div>
          </div>
      
          <div id="nowPlayingBarCenter">
            <!-- Content is plaing line which is bottom of container -->
            <div class="content playerControls">
      
              <div class="buttons">
                <!-- Shuffle class use in javascript -->
                <button class="controlButton shuffle" title="Shuffle">
                  <img src="{{ asset('storage/icons/shuffle.png') }}" alt="Shuffle">
                </button>
      
                <button class="controlButton previous" title="Previous">
                  <img src="{{ asset('storage/icons/previous.png') }}" alt="Previous">
                </button>
      
                <button class="controlButton play" title="Play">
                  <img src="{{ asset('storage/icons/play.png') }}" alt="Play">
                </button>
      
                <button class="controlButton pause" title="Pause" style="display: none;">
                  <img src="{{ asset('storage/icons/pause.png') }}" alt="Pause">
                </button>
      
                <button class="controlButton next" title="next">
                  <img src="{{ asset('storage/icons/next.png') }}" alt="Next">
                </button>
      
                <button class="controlButton repeat" title="Repeat">
                  <img src="{{ asset('storage/icons/repeat.png') }}" alt="Repeat">
                </button>
              </div>
      
              <div class="playbackBar">
                <span class="progressTime current">0.00</span>
      
                <div class="progressBar">
                  <div class="progressBarbg">
                    <!-- This is for prograss bar which indicate by color #404040 -->
                    <div class="progress">
                      <!-- This for song  progress which is indicate by color #e0e0e0 -->
                    </div>
                  </div>
                </div>
      
                <span class="progressTime remaning">0.00</span>
              </div>
      
            </div>
          </div>
      
          <div id="nowPlayingBarRight">
            <div class="volumeBar">
              
              <button class="controlButton volume" title="Volume">
                <img src="{{ asset('storage/icons/volume.png') }}" alt="Volume">
              </button>
          
              <div class="progressBar">
                <div class="progressBarbg">
                  <!-- This is for prograss bar which indicate by color #404040 -->
                  <div class="progress">
                    <!-- This for song  progress which is indicate by color #e0e0e0 -->
                  </div>
                </div>
              </div>
      
            </div>
          </div>
        </div>
      </footer>
      @endauth
    </div>
  </div>
  <div>
    @yield('script-section')
  </div>
</body>
</html>
