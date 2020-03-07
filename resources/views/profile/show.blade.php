<div class="container-fluid">

  <div class="row align-items-end p-5" style="background-image: url('{{ $user->profile->converImg() }}')">
    <div class="col-2">
      <img src="{{ $user->profile->profileImage() }}" class="img-fluid rounded-circle w-100 h-100" alt="">
    </div>
    <div class="col-6">
    
      @if (auth()->id() !== $user->id)
      <div class="row">
        <div class="col-3">
          <button type="submit" id="{{ $user->id }}-user" class="btn btn-sm btn-block rounded-pill btn-success followButton">
          @if (!$follows)
            Follow
          @else
            Unfollow               
          @endif
          </button>
        </div>
      </div>  
      @endif
      
      <div class="row align-items-center">
        <div class="col-1 mr-2 text-uppercase float-left">{{ $userType }}</div>
        @if ($userType === 'ARTIST')
          <div class="col-1"><img src="/storage/icons/approval-2.png" class="w-75 h-auto float-left" style="" alt=""></div>
        @endif
      </div>
      <div class="row"><div class="col h1 text-capitalize font-weight-bold" style="font-size:50px">{{ $user->profile->name }}</div></div>
      <div class="row text-capitalize font-weight-bold">
        <div class="col-4">Follower <span class="follower">{{ $followersCount }}</span></div>
        <div class="col-4">Following <span class="following">{{ $followingCount }}</span></div>
        <div class="col-4 totalSongs">Total Songs {{ $user->song()->count() }}</div>
      </div>
    </div>
  </div>

  @if (isset($latestRealeasAlbums))
  <div class="row m-2">
    <div class="col">
      <div class="row mt-2 mb-2">
        <div class="h3 text-capitalize">Latest Realease</div>
      </div>
      <div class="row">
        @foreach ($latestRealeasAlbums as $album)
          @include('includes.small-album-thumbnail', ['album' => $album])
        @endforeach
      </div>
    </div>
  </div>
  @endif

  @if (isset($songs))
  <div class="row m-2">
    <div class="col">
      <div class="row mt-2 mb-2">
        <div class="h3 text-capitalize">Popular Songs</div>
      </div>
      <div class="row">
        <div class="col">
          @include('includes.track-row-header')
          @php($cnt = 1)
          @foreach ($songs as $song)
            @include('includes.track-row', ['song' => $song, 'cnt' => $cnt++])
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endif

  @if (isset($albums))
  <div class="row m-2">
    <div class="col">
      <div class="row mt-2 mb-2">
        <div class="h3 text-capitalize">Albums</div>
      </div>
      <div class="row">
        @foreach ($albums as $album)
          @include('includes.album-thumbnail', ['album' => $album])
        @endforeach
      </div>
    </div>
  </div>
  @endif

</div>

