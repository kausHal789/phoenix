<div class="row mb-4 align-items-center">
  <div class="col-1">{{ $cnt }}</div>
  <div class="col-4">{{ $song->title }}</div>
  <div class="col-2 text-center">{{ $song->duration }}</div>
  <div class="col-2 text-center">{{ $song->listener }}</div>
  <div class="col-2">{{ $song->created_at->diffForHumans() }}</div>
  <div class="col-1 text-center">
    @include('admin.includes.checkBox', ['collection' => $song, 'collectionType' => 'song'])
  </div>
</div>