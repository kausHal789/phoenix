<div class="row p-2 border-bottom align-items-center">
  <div class="col-1">{{ $cnt }}</div>
  <div class="col-6">{{ $song->title }}</div>
  <div class="col-1">{{ $song->duration }}</div>
  <div class="col-1"></div>
  <div class="col-1 text-center">{{ $song->listener }}</div>
  <div class="col-2">{{ date('M d, Y', strtotime($song->created_at)) }}</div>
</div>