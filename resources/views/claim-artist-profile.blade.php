<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" id="_csrf">

  <title>{{ env('APP_NAME') }} - Claim an artist profile</title>

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/grayscale.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('js/grayscale.min.js') }}" rel="stylesheet"> --}}

  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
  
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  {{-- <script src="{{ asset('js/jquery-3.4.1.min.js') }}"> </script> --}}

  <style>
    textarea, input{
      background-color: #1f1f1f;
      border: 1px solid #ffffff;
      border-radius: 5px;
      color: #ffffff;

      padding: 0 20px;
      /* font-weight: 300; */
      /* font-size: 18px; */
      /* letter-spacing: 1px; */
      width: 100%;
    }
    textarea{
      padding: 20px;
    }
    input{
      height: 40px;
    }
  </style>
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
        <div class="col-lg-12 order-lg-first">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-center">
                <div class="text-white h1 mb-4">Is this the right {{ env('APP_NAME') }} account?</div>
                <div class="row">
                  <div class="col h4">INFO REQUIRED</div>
                </div>
                <div class="row mb-3">
                  <div class="col h5">Verify by connecting to the artist’s social accounts.</div>
                </div>
                <div class="row bg-dark rounded p-2 justify-content-between">
                  <div class="col-4">
                    Name : <span class="font-weight-bold">{{ $user->profile->name }}</span>
                  </div>
                  <div class="col-4">
                    Email : <span class="font-weight-bold">{{ $user->email }}</span>
                  </div>
                  <div class="col-4">
                    Username : <span class="font-weight-bold">{{ $user->username }}</span>
                  </div>
                </div>

                <form action="{{ route('claim.profile.request') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $user->id }}">
                  <input type="hidden" name="email" value="{{ $user->email }}">
                  <div class="row mt-2 mb-2">
                    <div class="col-6">About You</div>
                    <div class="col-6">Social link (e.g Facebook, Instagram)</div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <textarea class="@error('about') is-invalid @enderror" name="about" rows="5" id="about" required>{{ old('about') }}</textarea>
                      @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-6">
                      <input type="url" class="@error('link') is-invalid @enderror" name="link" id="link" value="{{ old('link') }}" required>
                      @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row m-3">
                    <div class="col"><button type="submit" class="btn btn-lg btn-success rouneded-pill">Claim Profile</button></div>
                  </div>
                </form>
                
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
