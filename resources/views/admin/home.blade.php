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
    

    
    <div class="row m-5">
      <div class="col-xl-3 col-sm-6 p-2">
        <div class="card card-common">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <img src="/storage/icons/people.png" class="w-25 h-25" alt="">
              <div class="text-right text-secondary">
                <h5>Total Users</h5>
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

    <div class="row m-5">

      <div class="col-xl-3 col-sm-6 p-2">
        <div class="card card-common">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <img src="/storage/icons/block_user.png" class="w-25 h-25" alt="">
              <div class="text-right text-secondary">
                <h5>Blocked Users</h5>
                <h3 class="font-weight-bold">{{ $blockUserCount }}</h3>
              </div>
            </div>
          </div>
          <div class="card-footer font-weight-bold">
            <div class="row justify-content-between">
              <span class="pl-3">Artists</span>
              <span class="pr-3">{{ $blockArtistCount }}</span>
            </div>
            <div class="row justify-content-between">
              <span class="pl-3">End Users</span>
              <span class="pr-3">{{ $blockEndUserCount }}</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 p-2">
        <div class="card card-common">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <img src="/storage/icons/block_song.png" class="w-25 h-25" alt="">
              <div class="text-right text-secondary">
                <h5>Blocked Songs</h5>
                <h3 class="font-weight-bold">{{ $blockSongCount }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class="col-xl-3 col-sm-6 p-2">
        <div class="card card-common">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <img src="/storage/icons/block_album.png" class="w-25 h-25" alt="">
              <div class="text-right text-secondary">
                <h5>Blocked Albums</h5>
                <h3 class="font-weight-bold">{{ $blockAlbumCount }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class="col-xl-3 col-sm-6 p-2">
        <div class="card card-common">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <img src="/storage/icons/block_playlist.png" class="w-25 h-25" alt="">
              <div class="text-right text-secondary">
                <h5>Blocked Playlists</h5>
                <h3 class="font-weight-bold">{{ $blockPlaylistCount }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row m-5 ">
      <div class="col mb-3">
        <div class="card card-common text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <div class="card-title h1 text-center">Artists</div>
            <div class="card-text h4 text-center">{{ $artistCount }}</div>
          </div>
        </div>
      </div>
      
      <div class="col mb-3">
        <div class="card card-common text-white bg-dark mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <div class="card-title h1 text-center">End Users</div>
            <div class="card-text h4 text-center">{{ $endUserCount }}</div>
          </div>
        </div>
      </div>

      <div class="col mb-3">
        <div class="card card-common text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <div class="card-title h1 text-center">Subscribers</div>
            <div class="card-text h4 text-center">{{ $subscriberCount }}</div>
          </div>
        </div>
      </div>
    
      <div class="col mb-3">
        <div class="card card-common text-white bg-secondary mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <div class="card-title h1 text-center">Feedbacks</div>
            <div class="card-text h4 text-center">{{ $feedbackCount }}</div>
          </div>
        </div>
      </div>
    </div>

   
    


  </div>
@endsection