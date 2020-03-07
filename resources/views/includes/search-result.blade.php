<div class="container mt-3">
  {{-- Artist section --}}
  <div class="row">
    <div class="col">
      <div class="row m-3">
        <div class="col text-center h4 text-uppercase">Artists</div>
      </div>
      <div class="row">
        @forelse ($artists as $artist)
          @include('includes.small-user-thumbnail', ['user' => $artist, 'userType' => 'Artist'])
        @empty
          <div class="col">
            <h5>No Artist found</h5>
          </div>
        @endforelse
      </div>
    </div>
  </div>
  {{-- Album section --}}
  <div class="row">
    <div class="col">
      <div class="row m-3">
        <div class="col text-center h4 text-uppercase">Albums</div>
      </div>
      <div class="row">
        @forelse ($albums as $album)
          @include('includes.small-album-thumbnail', ['album' => $album])
        @empty
          <div class="col">
            <h5>No albums found</h5>  
          </div>
        @endforelse
      </div>
    </div>
  </div>
  {{-- Song section --}}
  <div class="row">
    <div class="col">
      <div class="row m-3">
        <div class="col text-center h4 text-uppercase">songs</div>
      </div>
      <div class="row">
        <div class="col">
          @php($cnt = 1)
          @forelse ($songs as $song)
            @include('includes.track-row', ['song' => $song, 'cnt' => $cnt++])
          @empty
            <h5>No song found</h5>
          @endforelse
        </div>
      </div>
    </div>
  </div>
  {{-- People section --}}
  <div class="row">
    <div class="col">
      <div class="row m-3">
        <div class="col text-center h4 text-uppercase">Peoples</div>
      </div>
      <div class="row">
        @forelse ($peoples as $people)
          @include('includes.small-user-thumbnail', ['user' => $people, 'userType' => 'User'])
        @empty
          <div class="col">
            <h5>No People found</h5>
          </div>
        @endforelse
      </div>
    </div>
  </div>

</div>