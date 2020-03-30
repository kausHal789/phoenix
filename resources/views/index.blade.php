@extends('layouts.main')

@section('head-section')

@endsection

@section('content')
<div class="container-fluid">
  <div id="mainContent">

    <div id="carouselAdd" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselAdd" data-slide-to="0" class="active"></li>
        <li data-target="#carouselAdd" data-slide-to="1"></li>
        <li data-target="#carouselAdd" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        @foreach ($advertisements as $advertisement)
            
        <div class="carousel-item">
          <a href="{{ $advertisement->url }}" target="_blank">
            <div class="row">
              <img src="/storage/{{ $advertisement->image }}" alt="advertisement">
            </div>
            <div class="row display-3 align-items-end position-absolute" style="left:50px; bottom:10px">
              <div class="font-weight-bold text-white mr-5">{{ $advertisement->title }}</div>
            </div>
          </a>
        </div>

        @endforeach

      </div>

    </div> 

    <h1 class="heading font-weight-bold" style="">You Might Also Like</h1>
    
    <div id="albumContainer">  
    <div class="row">
      @foreach ($albums as $album)
        @include('includes.album-thumbnail', ['album' => $album])
      @endforeach
    </div>
    </div>

     

{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#albumThumbnailModal">
  Launch demo modal
</button> --}}


  </div>
</div>

<div id="modals">
{{-- @include('album.show') --}}
</div>

@endsection

@section('script-section')
<script>
$(document).ready(function () {  
  $('.carousel-inner').children().first().addClass('active');
});

</script>

@endsection