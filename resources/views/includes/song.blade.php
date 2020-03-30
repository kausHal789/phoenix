<div class="row p-2 border-bottom align-items-center">
  <div class="col-1">{{ $cnt }}</div>
  <div class="col-6 col-sm-4 col-xl-6">{{ $song->title }}</div>
  <div class="col-1">{{ $song->duration }}</div>
  <div class="col-1 col-sm-2 col-xl-1">
    <form action="/song/{{ $song->id }}" method="get">
      <button class="delete_song_button edit btn" data-toggle="modal" data-target="#deleteSongModal" id="{{ $song->id }}-song">
        <img src="/storage/icons/edit.png" class="w-75" alt="">
      </button>
    </form>
  </div>
  <div class="col-1">{{ $song->listener }}</div>
  <div class="col-2 col-sm-1 col-xl-2">{{ date('M d, Y', strtotime($song->created_at)) }}</div>
</div>