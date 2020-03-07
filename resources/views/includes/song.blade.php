<div class="row">
  <div class="col-1">{{ $cnt }}</div>
  <div class="col-8">{{ $song->title }}</div>
  <div class="col-2">{{ $song->duration }}</div>
  <div class="col-1">
    <button class="delete_song_button delete_button btn" title="Delete song" data-toggle="modal" data-target="#deleteSongModal" id="{{ $song->id }}-song">
      <img src="/storage/icons/remove.png" class="w-75" alt="">
    </button>
  </div>
</div>
<hr style="background-color: #ffffff;">