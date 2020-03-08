<div class="row p-2 border-bottom align-items-center">
  <div class="col-1">{{ $cnt }}</div>
  <div class="col-6">{{ $song->title }}</div>
  <div class="col-1">{{ $song->duration }}</div>
  <div class="col-1">
    <form action="/song/{{ $song->id }}" method="get">
      <button class="delete_song_button edit btn" title="Delete song" data-toggle="modal" data-target="#deleteSongModal" id="{{ $song->id }}-song">
        <img src="/storage/icons/edit.png" class="w-75" alt="">
      </button>
    </form>
  </div>
  <div class="col-1 text-center">{{ $song->listener }}</div>
  <div class="col-2">{{ date('M d, Y', strtotime($song->created_at)) }}</div>
</div>