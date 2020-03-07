<div class="container-fluid mt-5">
  
  <div class="row">
    <div class="col text-center">
      <div class="h1">Your Playlists</div>
    </div>
  </div>
  
  <div class="row m-5">
    <div class="col-4 offset-4">
      <button class="btn btn-block btn-success rounded-pill" id="createPlaylistBtn">create new playlist</button>   
    </div>
  </div>

  <div class="row" id="playlists">
    @forelse ($playlists as $playlist)
      @include('includes.playlist-thumbnail', ['playlist' => $playlist])
    @empty
      {{-- <div class="col text-center">
        <h5>No Playlist yet</h5>
      </div> --}}
    @endforelse
  </div>

</div>

