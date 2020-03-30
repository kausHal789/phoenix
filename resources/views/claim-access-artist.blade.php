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

  <style>
    .updateProfileInput{
      background-color: #1f1f1f;
      border: none;
      color: #ffffff;
      padding: 0 20px;
      font-weight: 300;
      font-size: 18px;
      letter-spacing: 1px;
      height: 40px;
      width: 100%;
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

      <div class="row justify-content-center no-gutters">
        <div class="col-lg-12 order-lg-first">
          <div class="text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-center">
                <div class="text-white display-4 font-weight-bold">What profile are you claiming?</div>
                <p class="mb-3 text-white-50">If you already have music on Spotify, you can get access to stats, pitch tracks to our editors, and more.</p>

                <div class="project">
                  <div class="row text-center">
                    <div class="col">
                      <input type="text" name="name" id="searchInput"
                        class="updateProfileInput" 
                            placeholder="Search for an artist name" 
                            {{-- value="{{ $user->profile->name ??  old('name') }}"  --}}
                            required
                            autocomplete="name" 
                            autofocus>
                    </div>
                    {{-- <input type="text" name="name" id="name" placeholder=""> --}}
                  </div>
                  <div class="row mt-4 text-center" id="searchResult">
                    
                  </div>
                </div>
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
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"> </script>
  <script>

    $(function() {
      var timer;
      // Wait 2 sec after user stop typing
      $(document).on('keyup', '#searchInput', function() {
        clearTimeout(timer);
        timer = setTimeout(function () {
          data = {
            term: $('#searchInput').val()
          };
          searchForData('/claim/access/artist/search', data);
        }, 100);
      });
    });


    function searchForData(_url, _data) {
      $.ajax({
        url: _url,
        method: 'GET',
        data: _data,
        cache: false,
        dataType: "JSON",
        success: function(_data) {
          // console.log(_data);
          if(_data.status === 200) {
            // console.log('success');
            $('#searchResult').html(_data.data);
          }
        },
        error: function(err) {
          console.log(err);
        }
      })
    }
  </script>
</body>

</html>
