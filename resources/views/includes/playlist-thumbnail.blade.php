<div class="col-sm-6 col-md-4 col-lg-3 text-center">
  <div class="gridViewItem p-0 mb-4 position-relative playlist card-common">
      <img src="/storage/{{ $playlist->img_url }}" alt="playlist image" class="w-100 h-100 img-fluid rounded">
      <div class="gridViewInfo playlistName" id="{{ $playlist->id }}-playlist">{{ $playlist->name }}</div>
  </div>
</div>