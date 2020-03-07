<div class="row align-items-center mb-3">
  <div class="col-1">#</div>
  <div class="col-4 text-ellipsis">Title</div>
  <div class="col-4 text-ellipsis">Artist</div>
  <div class="col-1"></div>
  <div class="col-1"><img src="/storage/icons/clock.png" class="w-25" alt="play"></div>
  <div class="col-1">Listener</div>
</div>

{{-- Option menu for track --}}
<li class="nav-item border-dark shadow-lg dropdown optionMenu">
  <input type="hidden" name="song_id" id="option_menu_song_id">
  <a id="playlsitDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    Playlist<span class="caret"></span>
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"></div>
  @if($collectionType == 'PLAYLIST')
    <div class="dropdown-item removeFromPlaylist" style="color:#fff; padding: 5px 0 15px 15px;" value="{{ $playlist->id }}">Remove from this playlist</div>
  @endif
  <div class="dropdown-item dedicateButton" data-toggle="modal" data-target="#dadicateModal" style="color:#fff; padding: 5px 0 15px 15px;" value="">Dadicate</div>
</li>

{{-- Dadicate Modal --}}
@include('includes.dadicate-modal')