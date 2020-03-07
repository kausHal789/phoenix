<div class="row align-items-end mt-5 ml-0 mr-0 mb-0 p-0 collectionHeader">
  <div class="col-4">
    <img src="/storage/{{ $collection->img_url }}" class="w-75 h-75 img-fluid float-right" alt="">
  </div>
  <div class="col-8">
    <div class="row mb-0 pb-0"><div class="col text-uppercase text-white-50">{{ $collectionType }}</div></div>
    <div class="row">
      <div class="col" style="font-size: 60px;">
        {{ $collection->name }} 
        @if($collectionType == 'PLAYLIST')
        <span>
          <button  title="Edit Playlist" class="edit btn playlist_edit_btn" id="{{ $collection->id }}">
            <img src="/storage/icons/edit.png" alt="Edit">
          </button>
        </span>
        <span>
          <button  title="Delete Playlist" class="playlist_delete_btn delete_button btn" data-toggle="modal" data-target="#deletePlaylistModal" id="{{ $collection->id }}-delete">
            <img src="/storage/icons/remove.png" alt="Delete">
          </button>
        </span>
        @endif
      </div>
    </div>
    <div class="row"><div class="col h6 text-white-50 text-capitalize">By <strong class="artistName" id="{{ $collection->user->id }}-artist">{{ $collection->user->profile->name }}</strong></div></div>
    <div class="row">
      <div class="col font-weight-bold text-white-50">
        <span class="pr-2">{{ date('Y', strtotime($collection->created_at)) }}</span>▪<span class="pl-2 pr-2">{{ $collection->songs()->count() }} songs</span></span> 
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-3">
        <div class="btn btn-block rounded-pill btn-success @if ($collectionType == 'PLAYLIST') playlistPlaybutton @else albumPlayButton @endif " id="{{ $collection->id }}-album">PLAY</div>
      </div>
    </div>

  </div>
</div>