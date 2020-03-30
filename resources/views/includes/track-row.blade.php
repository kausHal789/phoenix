<div class="row trackRow align-items-center" id="{{ $song->id }}">
  <div class="col-1"><span class="counter">{{ $cnt }}</span>
    <img src="/storage/icons/track_play.png" alt="play" class="w-25 trackPlayButton" id="{{ $song->id }}-track">
  </div>
  <div class="col-4 text-ellipsis text-capitalize">{{ $song->title }}</div>
  <div class="col-4 text-ellipsis text-capitalize"><span class="artistName" id="{{ $song->album->user->id }}-user">{{ $song->album->user->profile->name }}</span></div>
  <div class="col-1">
    <img src="/storage/icons/more.png"  class="w-25 optionMenuButton" alt="more" id="{{ $song->id }}-track">
    @if (auth()->user()->subscribed('download'))
      <a href="/storage/{{ $song->song_url }}" download="pheonix-music.mp3"><img src="/storage/icons/download.png" class="w-25" alt="download"></a>
    @endif
  </div>
  <div class="col-1">{{ $song->duration }}</div>
  <div class="col-1 listener">{{ $song->listener }}</div>
</div>