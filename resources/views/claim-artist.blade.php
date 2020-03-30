<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->

  <title>{{ env('APP_NAME') }}</title>

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/grayscale.min.css') }}" rel="stylesheet">
  <link href="{{ asset('js/grayscale.min.js') }}" rel="stylesheet">

  <script src="{{ asset('js/app.js') }}" defer></script>
  
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"> </script>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger text-capitalize" href="{{ route('claim.artist') }}">{{ env('APP_NAME') }} for artist</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger font-weight-bold" href="{{ route('claim.artist.access') }}">Claim Your Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger font-weight-bold" href="{{ route('login') }}">Log In</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Make {{ env('APP_NAME') }} Yours</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">Millions of fans are waiting for you. Claim your profile to access {{ env('APP_NAME') }} for Artists.</h2>
        {{-- <a href="#about" class="btn btn-primary js-scroll-trigger">Get Started</a> --}}
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="about-section text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="text-white mb-4 display-1">Let's Go.</div>
          <p>If you’re an artist or part of their management team, we’ll show you how to get the most out of {{ env('APP_NAME') }}.</p>
        </div>
      </div>
      {{-- <img src="/storage/img/ipad.png" class="img-fluid" alt=""> --}}
    </div>
  </section>

  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-black">
    <div class="container">

      <!-- Featured Project Row -->
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
          <img class="img-fluid mb-3 mb-lg-0" src="/storage/img/bg-masthead.jpg" alt="">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4>Building Your Artist Profile</h4>
            <p class="text-white-50 mb-0">Your profile is the first impression you make on your fans. Learn how to spruce things up, with tips and best practices from other artists.</p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center no-gutters">
        <div class="col-lg-6">
          <img class="img-fluid" src="/storage/img/demo-image-01.jpg" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-right">
                <h4 class="text-white">Getting Your Music Up</h4>
                <p class="mb-0 text-white-50">Before you do anything else, you've got to get your music up on the platform. Here's everything you need to get started.</p>
                <hr class="d-none d-lg-block mb-0 mr-0">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  {{-- <!-- Signup Section -->
  <section id="signup" class="signup-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">

          <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
          <h2 class="text-white mb-5">Subscribe to receive updates!</h2>

          <form class="form-inline d-flex">
            <input type="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="Enter email address...">
            <button type="submit" class="btn btn-primary mx-auto">Subscribe</button>
          </form>

        </div>
      </div>
    </div>
  </section> --}}

  <!-- Contact Section -->
  <section class="contact-section bg-black text-dark">
    <div class="container">

      <div class="row">

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-map-marked-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Address</h4>
              <hr class="my-4">
              <div class="small text-black-50">4923 Market Street, Orlando FL</div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <div>{{ env('MAIL_FROM_ADDRESS') }}</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Phone</h4>
              <hr class="my-4">
              <div class="small text-black-50">+1 (555) 902-8832</div>
            </div>
          </div>
        </div>
      </div>

      

    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | {{ env('APP_NAME') }}
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  {{-- <script src="{{ asset('js/jquery.easing.min.js') }}"></script> --}}

</body>

</html>
