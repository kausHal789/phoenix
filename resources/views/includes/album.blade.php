<div class="row">
  <div class="col-2">
    <img src="/storage/{{ $album->img_url }}" class="img-fluid h-100 w-100" alt="Album Image">
  </div>
  <div class="ml-4 col-6 pl-0" style="flex-direction: row;">
    <div class="row"><p>{{ date('Y', strtotime($album->created_at)) }}</p></div>
    <div class="row h1">{{ $album->name }}</div>
    <div class="row"><p>Edit ▪ Delete ▪ Like</p></div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-1"><p>#</p></div>
  <div class="col-8"><p>TITLE</p></div>
  <div class="col-2"><p>🕒</p></div>
  <div class="col-1"><p>❤</p></div>
</div>

<hr style="background-color: #ffffff;">     
<div class="row">
  <div class="col-1">1</div>
  <div class="col-8">Song name</div>
  <div class="col-2">2:03</div>
  <div class="col-1">💙</div>
</div>
<hr style="background-color: #ffffff;">

{{-- Don't delete it --}}

{{-- <div class="col-2">
  <div class="gridViewItem mb-4 position-relative album">
    <img src="/storage/{{ $album->img_url }}" alt="album image" 
    class="w-100 h-100 img-fluid rounded">
    <div class="gridViewInfo">{{ $album->name }}</div>
  </div>
  
</div> --}}