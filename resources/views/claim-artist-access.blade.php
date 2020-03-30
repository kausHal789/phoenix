<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->

  <title>{{ env('APP_NAME') }} - Claim an artist profile</title>

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/grayscale.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('js/grayscale.min.js') }}" rel="stylesheet"> --}}

  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
  
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  {{-- <script src="{{ asset('js/jquery-3.4.1.min.js') }}"> </script> --}}

</head>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger text-capitalize" href="{{ route('claim.artist') }}">{{ env('APP_NAME') }} for artist</a>
    </div>
  </nav>

  <section class="projects-section bg-black" style="background-image:url(/storage/img/featured.png)">
    <div class="container">

      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        
      </div>
      <!-- Project Two Row -->
      <div class="row justify-content-center no-gutters">
        <div class="col-lg-6 order-lg-first">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-center">
                <div class="text-white h1">Claim an artist profile</div>
                <p class="mb-0 text-white-50">If you already have music on Spotify, you can get access to stats, pitch tracks to our editors, and more.</p>
                <a href="{{ route('claim.access.artist') }}">
                  <button class="btn-lg m-2 btn rounded-pill pl-4 pr-4 text-uppercase btn-info">Continue</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | {{ env('APP_NAME') }}
    </div>
  </footer>
</body>

</html>
