@include('includes.album-playlist-header', ['collection' => $playlist, 'collectionType' => 'PLAYLIST'])
<div class="row m-3 mt-5">
  <div class="col">
    @include('includes.track-row-header')
    @php($cnt = 1)
        
    @foreach ($playlist->songs as $song)
      @include('includes.track-row', ['song' => $song, 'cnt' => $cnt++])
    @endforeach
  </div>
</div>
</div>
@include('playlist.delete')