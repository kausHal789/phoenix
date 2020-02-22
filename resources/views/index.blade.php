@extends('layouts.main')

@section('head-section')

@endsection

@section('content')
<div class="container">
  <div id="mainConent">
            
    <h1 class="heading font-weight-bold" style="">You Might Also Like</h1>
    
    {{-- <div id="albumContainer">  
      <div class="row">
        @foreach ($albums as $album)
          @include('includes.album-thumbnail', ['album' => $album])
        @endforeach
      </div>

      <div id="carouselAlbum" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselAlbum" data-slide-to="0" class="active"></li>
          <li data-target="#carouselAlbum" data-slide-to="1"></li>
          <li data-target="#carouselAlbum" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              @foreach ($albums as $album)
                @include('includes.album-thumbnail', ['album' => $album])
              @endforeach
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              @foreach ($albums as $album)
                @include('includes.album-thumbnail', ['album' => $album])
              @endforeach
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              @foreach ($albums as $album)
                @include('includes.album-thumbnail', ['album' => $album])
              @endforeach
            </div>
          </div>
        </div>

      </div> --}}

    </div>

  

  </div>

</div>

@section('script-section')
  

<script>

</script>

@endsection

@endsection