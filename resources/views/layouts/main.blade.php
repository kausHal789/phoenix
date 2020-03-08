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

  <script src="{{ asset('js/comman-action.js') }}"></script>
  <script src="{{ asset('js/audio.js') }}"></script>

  @yield('head-section')

</head>
<body>
  <div id="app">
    <div id="topSection">
      <div id="navBarContainer">
        <nav class="navBar ">
          <a href='/home' class="logo pb-3 text-center">
            <img src="/storage/icons/logo.png" alt="" class="">
            {{-- <span class="h2" style="text-decoration:none">{{ env('APP_NAME') }}</span> --}}
          </a>
          
          <div class="group">
            <div class="navItem p-1 font-weight-bold h5 d-block" id="browseNavItem">
              <div class="d-flex align-items-center">
                <img src="/storage/icons/browse.png" class="img-fluid icon float-left">
                <div class="navItemLink pl-3">Browse</div>
              </div>
            </div>
            <div class="navItem p-1 font-weight-bold h5 d-block" id="homeNavItem">
              <div class="d-flex align-items-center">
                <img src="/storage/icons/home.png">
                <div class="navItemLink pl-3">Home</div>
              </div>
            </div>
          </div> 
          
          <div class="group" id="profileAccordion">
            <div class="navItem p-1 font-weight-bold d-flex h6 d-block" id="profileItem">
                <div id="{{ auth()->id() }}-user" class="navItemLink pl-3 artistName" 
                data-toggle="collapse" 
                data-target="#profileCollapse" 
                aria-expanded="true"
                aria-controls="profileCollapse">
                {{ auth()->user()->profile->name }}
                </div>
            </div>
            <div id="profileCollapse" class="collapse show" aria-labelledby="profileItem" data-parent="#profileAccordion">

                <div class="col p-1 align-items-center text-white-50 settingsNavItem" id="{{ auth()->id() }}-user" style="cursor: pointer;">
                  <img src="/storage/icons/settings.png" alt="setting" style="max-width:20px">
                  <span class="font-weight-bold text-ellipsis text-capitalize ml-2">Settings</span>
                </div>

                <a class="col p-1 text-white-50" href="{{ route('logout') }}" style="text-decoration:none"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  
                  <img src="/storage/icons/log_out.png" alt="" style="max-width:20px">
                  <span class="font-weight-bold text-ellipsis text-capitalize ml-2">{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>

            </div>
          </div>


          <div class="group" id="accordion">
            <div class="navItem p-1 font-weight-bold d-flex h6 d-block" id="notificationItem">
              <div class="navItemLink pl-3" 
                data-toggle="collapse" 
                data-target="#notificationCollapse" 
                aria-expanded="true"
                aria-controls="notificationCollapse">                
                Notifications @if ($notificationsCount !== 0) <span class="badge badge-pill badge-light notificationCount">{{ $notificationsCount }}</span> @endif
              </div>
            </div>
            <div id="notificationCollapse" class="collapse notificationCollapse show" aria-labelledby="notificationItem" data-parent="#accordion">
              <div class="row">
                {{-- All notification will shown here --}}

                @forelse ($notifications as $notification)
                  @if ($notification->type === 'App\Notifications\FollowNotification')
                    @include('notification.follow', ['notification' => $notification])
                  @elseif($notification->type === 'App\Notifications\DedicateSong')
                    @include('notification.dedicate', ['notification' => $notification])
                  @elseif($notification->type === 'App\Notifications\WelcomeNotification')
                    @include('notification.welcome', ['notification' => $notification])
                  @endif
                @empty
                  <h6 class="ml-2">No Notifications!</h6>
                @endforelse

              </div>
            </div>
          </div>

          <div class="group">
            <div class="navItem p-1 font-weight-bold d-flex h6 d-block" id="yourPlaylistItem">
              <div class="navItemLink pl-3">Your Playlist</div>
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
                <img alt=""
                  class="albumArtWork">
              </span>
              
              <div class="trackInfo">
                <span class="trackName h5"></span>
                <span class="artistName"></span>
              </div>
            
            </div>
          </div>
      
          <div id="nowPlayingBarCenter">
            <!-- Content is plaing line which is bottom of container -->
            <div class="content playerControls">
      
              <div class="buttons">
                <!-- Shuffle class use in javascript -->
                <button class="controlButton shuffle" title="Shuffle" id="shuffleButton">
                  <img src="{{ asset('storage/icons/shuffle.png') }}" alt="Shuffle">
                </button>
      
                <button class="controlButton previous" title="Previous" id="previousTrackButton">
                  <img src="{{ asset('storage/icons/previous.png') }}" alt="Previous">
                </button>
      
                <button class="controlButton play" title="Play" id="playButton">
                  <img src="{{ asset('storage/icons/play.png') }}" alt="Play">
                </button>
      
                {{-- <button class="controlButton pause" title="Pause" style="display: none;">
                  <img src="{{ asset('storage/icons/pause.png') }}" alt="Pause">
                </button> --}}
      
                <button class="controlButton next" title="next" id="nextTrackButton">
                  <img src="{{ asset('storage/icons/next.png') }}" alt="Next">
                </button>
      
                <button class="controlButton repeat" title="Repeat" id="repeatTrackButton">
                  <img src="{{ asset('storage/icons/repeat.png') }}" alt="Repeat">
                </button>
              </div>
      
              <div class="playbackBar">
                <span class="progressTime current">0:00</span>
      
                <div class="progressBar">
                  <div class="progressBarbg">
                    <!-- This is for prograss bar which indicate by color #404040 -->
                    <div class="progress">
                      <!-- This for song  progress which is indicate by color #e0e0e0 -->
                    </div>
                  </div>
                </div>
      
                <span class="progressTime remaning">0:00</span>
              </div>
      
            </div>
          </div>
      
          <div id="nowPlayingBarRight">
            <div class="volumeBar">
              
              <button class="controlButton volume" title="Volume" id="volumeButton">
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
