@include('includes.album-playlist-header', ['collection' => $album, 'collectionType' => $collectionType])

<div class="row m-3 mt-5">
  <div class="col">
    @include('includes.track-row-header', ['collectionType' => $collectionType])
    @php($cnt = 1)
    @foreach ($album->songs as $song)
      @include('includes.track-row', ['song' => $song, 'cnt' => $cnt++])
    @endforeach
  </div>
</div>
</div>