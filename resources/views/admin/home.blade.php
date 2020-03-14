@extends('layouts.admin')

@section('head-section')
  <style>
    .card-common {
      box-shadow: 1px 2px 5px #999;
      transition: all .4s;
    }

    .card-common:hover {
      box-shadow: 2px 3px 15px #999;
      transform: translateY(-1px);
    }
  </style>
@endsection


@section('content')
  <div class="container m-5">
    
    <div class="row ml-5">
      <div class="col-xl-3 col-sm-6 p-2">
        <div class="card card-common">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <img src="/storage/icons/people.png" class="w-25 h-25" alt="">
              <div class="text-right text-secondary">
                <h5>Users</h5>
                <h3>{{ $totleUsers }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 p-2">
        <div class="card card-common">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <img src="/storage/icons/song_dark.png" class="w-25 h-25" alt="">
              <div class="text-right text-secondary">
                <h5>Songs</h5>
                <h3>{{ $totleSongs }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 p-2">
        <div class="card card-common">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <img src="/storage/icons/album_dark.png" class="w-25 h-25" alt="">
              <div class="text-right text-secondary">
                <h5>Albums</h5>
                <h3>{{ $totleAlbums }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 p-2">
        <div class="card card-common">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <img src="/storage/icons/playlist_dark.png" class="w-25 h-25" alt="">
              <div class="text-right text-secondary">
                <h5>Playlist</h5>
                <h3>{{ $totlePlaylists }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    {{-- <div class="col-1">
      <a href="#" data-toggle="tooltip" title="<h6>edit</h6>" data-html="true" data-placement="top"><i class="fas fa-edit fa-lg text-success mr-2"></i></a>
    </div>
    <div class="col-1">
      <a href="#" data-toggle="tooltip" title="<h6>delete</h6>" data-html="true" data-placement="top"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>
    </div> --}}

  </div>
@endsection