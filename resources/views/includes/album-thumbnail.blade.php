<div class="col-sm-6 col-md-4 col-lg-3 text-center">
  <div class="gridViewItem p-0 mb-4 position-relative album card-common">
    {{-- <a href="/album/show/{{ $album->id }}"> --}}
      <img src="/storage/{{ $album->img_url }}" alt="album image" class="w-100 h-100 img-fluid rounded">
      <div class="gridViewInfo albumName" id="{{ $album->id }}-album">{{ $album->name }}</div>
    {{-- </a> --}}
    
  </div>
</div>