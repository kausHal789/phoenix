<div class="col-6 smallAlbum">
  <div class="row p-2 align-items-end">
    <div class="col-2">
      <img src="/storage/{{ $album->img_url }}" class="w-100 h-100" alt="">
    </div>
    <div class="col-6">
      <div class="row"><div class="col albumName text-ellipsis h5" id="{{ $album->id }}-album">{{ $album->name }}</div></div>
      <div class="row"><div class="col h6 text-uppercase">{{ date('M d, Y', strtotime($album->created_at)) }}</div></div>
    </div>
  </div>
</div>