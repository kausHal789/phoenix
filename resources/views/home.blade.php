<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pheonix</title>

  <meta name="csrf-token" content="{{ csrf_token() }}" id="_csrf">

  <title>{{ config('app.name', 'Laravel') }}</title>

  {{-- Vendor Style --}}
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/themify/themify.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/scrollbar/scrollbar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/cubeportfolio/css/cubeportfolio.min.css') }}">
  
  {{-- Style --}}
  <link rel="stylesheet" href="{{ asset('css/style-2.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">


  {{-- asset('js/app.js') }} --}}
</head>
<body>
  
  <!-- HEADER -->
  <header class="navbar-fixed-top s-header js__header-sticky js__header-overlay">
    <!-- Navbar -->
    <div class="s-header__navbar">
      <div class="s-header__container">
        <div class="s-header__navbar-row">
          <div class="s-header__navbar-row-col">
            <!-- Logo -->
            <div class="s-header__logo">
              <a href="#home" class="s-header__logo-link">
                <img class="s-header__logo-img s-header__logo-img-default" src="/storage/icons/logo.png" alt="Logo">
                <img class="s-header__logo-img s-header__logo-img-shrink" src="/storage/icons/logo.png" alt="Logo">
              </a>
            </div>
            <!-- End Logo -->
          </div>
          <div class="s-header__navbar-row-col">
            <!-- Trigger -->
            <a href="javascript:void(0);" id="header" class="s-header__trigger js__trigger">
              <span class="s-header__trigger-icon"></span>
              <svg x="0rem" y="0rem" width="3.125rem" height="3.125rem" viewbox="0 0 54 54">
                <circle fill="transparent" stroke="#fff" stroke-width="1" cx="27" cy="27" r="25"
                  stroke-dasharray="157 157" stroke-dashoffset="157"></circle>
              </svg>
            </a>
            <!-- End Trigger -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Navbar -->

    <!-- Overlay -->
    <div class="s-header-bg-overlay js__bg-overlay">
      <!-- Nav -->
      <nav class="s-header__nav js__scrollbar">
        <div class="container-fluid">
          <!-- Menu List -->
          <ul class="list-unstyled s-header__nav-menu">
            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider -is-active" href="#home">Corporate</a></li>
            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="#culture">About</a></li>
            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="#subscribe">Subscribe</a></li>
            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="#service">Services</a></li>
            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="#event">Events</a></li>
            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="#feedback">Leave Your Note</a></li>
            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="#contant">Contacts</a></li>
          </ul>
          <!-- End Menu List -->

          <!-- Menu List -->
          <ul class="list-unstyled s-header__nav-menu">
            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="{{ route('login') }}">Login</a></li>
            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="{{ route('register') }}">Register</a></li>
          </ul>
          <!-- End Menu List -->
        </div>
      </nav>
      <!-- End Nav -->
    </div>
    <!-- End Overlay -->
  </header>
  <!-- END HEADER -->

  <!-- SWIPER SLIDER -->
  <div id="home" class="s-swiper js__swiper-one-item">
    <!-- Swiper Wrapper -->
    <div class="swiper-wrapper">
      <div class="g-fullheight--xs g-bg-position--center swiper-slide" style="background: url('storage/img/1920x1080/02.jpg');">
        <div class="container g-text-center--xs g-ver-center--xs">
          <div class="g-margin-b-30--xs">
            <h1 class="g-font-size-35--xs g-font-size-45--sm g-font-size-55--md g-color--white">A Mobile
              Experience<br>That Inspires Travel</h1>
          </div>
        </div>
      </div>
      <div class="g-fullheight--xs g-bg-position--center swiper-slide" style="background: url('storage/img/1920x1080/01.jpg');">
        <div class="container g-text-center--xs g-ver-center--xs">
          <div class="g-margin-b-30--xs">
            <div class="g-margin-b-30--xs">
              <h2 class="g-font-size-35--xs g-font-size-45--sm g-font-size-55--md g-color--white">We Craft
                Experience<br>That Help Brands<br>Stand Out</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Swiper Wrapper -->
    
    <!-- Arrows -->
    <a href="javascript:void(0);"
      class="s-swiper__arrow-v1--right s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-right js__swiper-btn--next"></a>
    <a href="javascript:void(0);"
      class="s-swiper__arrow-v1--left s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-left js__swiper-btn--prev"></a>
    <!-- End Arrows -->

    <a href="#culture" class="s-scroll-to-section-v1--bc g-margin-b-15--xs">
      <span class="g-font-size-18--xs g-color--white ti-angle-double-down"></span>
      <p class="text-uppercase g-color--white g-letter-spacing--3 g-margin-b-0--xs">Learn More</p>
    </a>
  </div>
  <!-- END SWIPER SLIDER -->


  <!-- Parallax -->
  <div class="js__parallax-window" style="background: url(storage/img/1920x1080/03.jpg) 50% 0 no-repeat fixed;">
    <div class="container g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
      <div class="g-margin-b-80--xs">
        <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white">The Fastest Way To
          Make mood happier</h2>
      </div>
      <!-- <a href="http://keenthemes.com/" class="text-uppercase s-btn s-btn--md s-btn--white-brd g-radius--50">Learn
        More</a> -->
    </div>
  </div>
  <!-- End Parallax -->

  <!-- Culture -->
  <div class="g-promo-section" id="culture">
    <div class="container g-padding-y-80--xs g-padding-y-125--sm">
      <div class="row">
        <div class="col-md-4 g-margin-t-15--xs g-margin-b-60--xs g-margin-b-0--lg">
          <p
            class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">
            Culture</p>
          <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
            <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md">About</h2>
          </div>
          <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
            <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md">Pheonix</h2>
          </div>
        </div>
        <div class="col-md-4 col-md-offset-1">
          <p class="g-font-size-18--xs">We aim high at being focused on building relationships with our
            clients and community. Using our creative playlist, events. The time has come to
            bring those ideas and plans to life. This is where we really begin to visualize your songs to make them into beautiful pixels.</p>
          <!-- <p class="g-font-size-18--xs">Now that your brand is all dressed up and ready to party, it's time to
            release it to the world. By the way, let's celebrate already.</p> -->
        </div>
      </div>
    </div>
    <div
      class="col-sm-3 g-promo-section__img-right--lg g-bg-position--center g-height-100-percent--md js__fullwidth-img">
      <img class="img-responsive" src="img/970x970/03.jpg" alt="Image">
    </div>
  </div>
  <!-- End Culture -->

  <!-- Subscribe -->
  <div id="subscribe" class="js__parallax-window" style="background: url(storage/img/1920x1080/07.jpg) 50% 0 no-repeat fixed;">
    <div class="g-container--sm g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
      <div class="g-margin-b-80--xs">
        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">
          Subscribe</p>
        <h2 class="g-font-size-32--xs g-font-size-36--md g-color--white">Join Over 1000+ People</h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
          <form class="input-group" action="/subscription" method="POST">
            @csrf
            <input type="email" class="form-control s-form-v1__input g-radius--left-50" name="email"
              placeholder="Enter your email">
            <span class="input-group-btn">
              <button type="submit"
                class="s-btn s-btn-icon--md s-btn-icon--white-brd s-btn--white-brd g-radius--right-50"><i
                  class="ti-arrow-right"></i></button>
            </span>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Subscribe -->

  <!-- Portfolio Filter -->
  <div id="service" class="container g-padding-y-80--xs">
    <div class="g-text-center--xs g-margin-b-40--xs">
      <h2 class="g-font-size-32--xs g-font-size-36--md">Creation</h2>
    </div>
    <div class="s-portfolio">
      <div id="js__filters-portfolio-gallery" class="s-portfolio__filter-v1 cbp-l-filters-text cbp-l-filters-center">
        <div data-filter="*" class="s-portfolio__filter-v1-item cbp-filter-item cbp-filter-item-active">Show All
        </div>
        <div data-filter=".graphic" class="s-portfolio__filter-v1-item cbp-filter-item">Album</div>
        <div data-filter=".logos" class="s-portfolio__filter-v1-item cbp-filter-item">Playlist</div>
        <!-- <div data-filter=".motion" class="s-portfolio__filter-v1-item cbp-filter-item">Event</div> -->
      </div>
    </div>
  </div>
  <!-- End Portfolio Filter -->
   <!-- Portfolio Gallery -->
  <div class="container g-margin-b-100--xs">
    <div id="js__grid-portfolio-gallery" class="cbp">
      <!-- Item -->
      @foreach ($albums as $album)
        <div class="s-portfolio__item cbp-item graphic">
          <div class="s-portfolio__img-effect">
            <img src="storage/{{ $album->img_url }}" alt="Image">
          </div>
          <div class="s-portfolio__caption-hover--cc">
            <div class="g-margin-b-25--xs">
              <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">{{ $album->name }}</h4>
              <p class="g-color--white-opacity">by {{ $album->user->profile->name }}</p>
            </div>
            <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
              <li>
                <a href="storage/{{ $album->img_url }}" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle"
                  data-title="{{ $album->name }} <br/> by {{ $album->user->profile->name }}">
                  <i class="ti-fullscreen"></i>
                </a>
              </li>
              
            </ul>
          </div>
        </div>    
      @endforeach

      @foreach ($playlists as $playlist)
        <div class="s-portfolio__item cbp-item logos">
          <div class="s-portfolio__img-effect">
            <img src="storage/{{ $playlist->img_url }}" alt="Image">
          </div>
          <div class="s-portfolio__caption-hover--cc">
            <div class="g-margin-b-25--xs">
              <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">{{ $playlist->name }}</h4>
              <p class="g-color--white-opacity">by {{ $playlist->user->profile->name }}</p>
            </div>
            <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
              <li>
                <a href="storage/{{ $playlist->img_url }}" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle"
                  data-title="{{ $playlist->name }} <br/> by {{ $playlist->user->profile->name }}">
                  <i class="ti-fullscreen"></i>
                </a>
              </li>
              
            </ul>
          </div>
        </div>    
      @endforeach
    </div>
    <!-- End Portfolio Gallery -->
  </div>
  <!-- End Portfolio -->

  <!-- Testimonials -->
  <div class="js__parallax-window" style="background: url(storage/img/1920x1080/04.jpg) 50% 0 no-repeat fixed;">
    <div class="container g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
      <p
        class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-50--xs">
        PHOENIX</p>
      <div class="s-swiper js__swiper-testimonials">
        <!-- Swiper Wrapper -->
        <div class="swiper-wrapper g-margin-b-50--xs">
          <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
            <div class="g-padding-x-20--xs g-padding-x-50--lg">
              <div class="g-margin-b-40--xs">
                <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>" I have purchased
                    many great templates over the years but this product and this company have taken
                    it to the next level. Exceptional customizability. "</i></p>
              </div>
              <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs">
              </div>
              <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">
                Jake Richardson / Google</h4>
            </div>
          </div>
          <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
            <div class="g-padding-x-20--xs g-padding-x-50--lg">
              <div class="g-margin-b-40--xs">
                <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>" I have purchased
                    many great templates over the years but this product and this company have taken
                    it to the next level. Exceptional customizability. "</i></p>
              </div>
              <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs">
              </div>
              <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">
                Jake Richardson / Google</h4>
            </div>
          </div>
          <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
            <div class="g-padding-x-20--xs g-padding-x-50--lg">
              <div class="g-margin-b-40--xs">
                <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>" I have purchased
                    many great templates over the years but this product and this company have taken
                    it to the next level. Exceptional customizability. "</i></p>
              </div>
              <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs">
              </div>
              <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">
                Jake Richardson / Google</h4>
            </div>
          </div>
        </div>
        <!-- End Swipper Wrapper -->

        <!-- Arrows -->
        <div class="g-font-size-22--xs g-color--white-opacity js__swiper-fraction"></div>
        <a href="javascript:void(0);"
          class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--right s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-right js__swiper-btn--next"></a>
        <a href="javascript:void(0);"
          class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--left s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-left js__swiper-btn--prev"></a>
        <!-- End Arrows -->
      </div>
    </div>
  </div>
  <!-- End Testimonials -->

  <!-- News -->
  <div id="event" class="container g-padding-y-80--xs g-padding-y-125--sm">
    <div class="g-text-center--xs g-margin-b-80--xs">
      <p
        class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">
        Blog</p>
      <h2 class="g-font-size-32--xs g-font-size-36--md">Latest News</h2>
    </div>
    <div class="row">
      @foreach ($advertisements as $advertisement)
          
      <div class="col-sm-4 g-margin-b-30--xs g-margin-b-0--md">
        <!-- News -->
        <article>
          <img class="img-responsive" src="storage/img/970x970/01.jpg" alt="Image">
          <div
            class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-text-center--xs g-padding-x-40--xs g-padding-y-40--xs">
            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">
              advertisement</p>
            <h3 class="g-font-size-22--xs g-letter-spacing--1"><a href="{{ $advertisement->url }}">{{ $advertisement->title }}</a></h3>
          </div>
        </article>
        <!-- End News -->
      </div>

      @endforeach
    </div>
  </div>
  <!-- End News -->


  <!-- Counter -->
  <div class="js__parallax-window" style="background: url(storage/img/1920x1080/06.jpg) 50% 0 no-repeat fixed;">
    <div class="container g-padding-y-80--xs g-padding-y-125--sm">
      <div class="row justify-content-between">
        <div class="col-md-3 col-xs-6 g-full-width--xs g-margin-b-70--xs g-margin-b-0--lg">
          <div class="g-text-center--xs">
            <div class="g-margin-b-10--xs">
              <figure class="g-display-inline-block--xs g-font-size-70--xs g-color--white js__counter">6
              </figure>
              <span class="g-font-size-40--xs g-color--white">k</span>
            </div>
            <div class="center-block g-hor-divider__solid--white g-width-40--xs g-margin-b-25--xs"></div>
            <h4 class="g-font-size-18--xs g-color--white">Happy listeners</h4>
          </div>
        </div>
        
       
        <div class="col-md-3 col-xs-6 g-full-width--xs">
          <div class="g-text-center--xs">
            <div class="g-margin-b-10--xs">
              <figure class="g-display-inline-block--xs g-font-size-70--xs g-color--white js__counter">2
              </figure>
              <span class="g-font-size-40--xs g-color--white">x</span>
            </div>
            <div class="center-block g-hor-divider__solid--white g-width-40--xs g-margin-b-25--xs"></div>
            <h4 class="g-font-size-18--xs g-color--white">Faster Support</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Counter -->

  <!-- Feedback Form -->
  <div id="feedback" class="g-bg-color--sky-light">
    <div class="container g-padding-y-80--xs g-padding-y-125--sm">
      <div class="g-text-center--xs g-margin-b-80--xs">
        <p
          class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">
          Feedback</p>
        <h2 class="g-font-size-32--xs g-font-size-36--md">Send us a note</h2>
      </div>
      <form id="feedbackForm" method="POST" action="/feedback">
        @csrf
        <div class="row g-margin-b-40--xs">
          <div class="col-sm-6 g-margin-b-20--xs g-margin-b-0--md">
            <div class="g-margin-b-20--xs">
              <input type="text" name="name" value="{{ old('name') }}" required class="form-control s-form-v2__input g-radius--10 @error('name') is-invalid @enderror" placeholder="* Name">
              @error('name')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="g-margin-b-20--xs">
              <input type="text" name="email" class="form-control s-form-v2__input g-radius--10 @error('email') is-invalid @enderror" placeholder="* Email" value="{{ old('email') }}" required>
              @error('email')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="g-margin-b-20--xs">
              <input type="text" name="phone" class="form-control s-form-v2__input g-radius--10 @error('phone') is-invalid @enderror" placeholder="* Phone" value="{{ old('phone') }}" required>
              @error('phone')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <textarea class="form-control s-form-v2__input g-radius--10 g-padding-y-20--xs @error('description') is-invalid @enderror" rows="8"
              placeholder="* Your message" name="description" required>{{ old('description') }}</textarea>
              @error('description')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>
        <div class="g-text-center--xs">
          <button type="submit"
            class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <!-- End Feedback Form -->



  <footer class="g-bg-color--dark">
    <!-- Links -->
    <div class="g-hor-divider__dashed--white-opacity-lightest">
      <div class="container g-padding-y-80--xs">
        <div class="row">
          <div class="col-sm-2 g-margin-b-20--xs g-margin-b-0--md">
            <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">
              <li><a class="g-font-size-15--xs g-color--white-opacity"
                  href="#home">Home</a>
              </li>
              <li><a class="g-font-size-15--xs g-color--white-opacity"
                  href="#culture">About</a>
              </li>
              <li><a class="g-font-size-15--xs g-color--white-opacity"
                  href="#contact">Contact</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-5 col-sm-offset-1 s-footer__logo g-padding-y-50--xs g-padding-y-0--md">
            <h3 class="g-font-size-18--xs g-color--white">Phoenix</h3>
            <p class="g-color--white-opacity">We are a creative studio focusing on culture, luxury,
              musician &amp; artists. Somewhere between sophistication and simplicity.</p>
          </div>
          <div id="contant" class="col-md-4 col-sm-5 col-sm-offset-1 s-footer__logo g-padding-y-50--xs g-padding-y-0--md">
            <h3 class="g-font-size-18--xs g-color--white">Content US</h3>
            <p class="g-color--white-opacity">+(1) 2341245 <br> pheonix@pheonix.com</p>
          </div>
        </div>
      </div>
    </div>
    <!-- End Links -->
  
    <!-- Copyright -->
    <div class="container g-padding-y-50--xs">
      <div class="row">
        <div class="col-xs-6">
          <a href="/">
            {{-- <img class="g-width-100--xs g-height-auto--xs" src="/storage/icons/logo.png" alt="Logo"> --}}
            Pheonix
          </a>
        </div>
        <div class="col-xs-6 g-text-right--xs">
          <p class="g-font-size-14--xs g-margin-b-0--xs g-color--white-opacity-light"><a
              href="#home">Phoenix</a> Powered by: <a
              href="#home">Team PHOENIX</a></p>
        </div>
      </div>
    </div>
    <!-- End Copyright -->
  </footer>

  {{-- Scroll to top --}}
  <a href="javascript:void(0);" class="s-back-to-top js__back-to-top"></a>

  {{-- vendor --}}
  <script type="text/javascript" src="{{ asset('vendor/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/jquery.migrate.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/jquery.smooth-scroll.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/jquery.back-to-top.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/swiper/swiper.jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/waypoint.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/counterup.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/jquery.parallax.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/jquery.wow.min.js') }}"></script>

  {{-- General --}}
  <script type="text/javascript" src="{{ asset('js/global.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/components/header-sticky.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/components/scrollbar.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/components/magnific-popup.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/components/swiper.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/components/counter.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/components/portfolio-3-col.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/components/parallax.min.js') }}"></script>
</body>
</html>