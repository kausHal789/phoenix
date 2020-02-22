<div class="col-sm-6 col-md-4 col-lg-3">
  <div class="gridViewItem p-0 mb-4 position-relative album">
    <a href="/album/show/{{ $album->id }}">
      <img src="/storage/{{ $album->img_url }}" alt="album image" class="w-100 h-100 img-fluid rounded">
      <div class="gridViewInfo navItemLink" style="text-decoration:none">{{ $album->name }}</div>
    </a>
    
  </div>
</div>