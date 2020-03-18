@forelse ($playlists as $playlist)
  <div value="{{ $playlist->id }}" class="dropdown-item w-100 pl-3 pr-3 pt-2 pb-2 font-weight-normal item playlistItem">{{ $playlist->name }}</div>
@empty
  <div class="m-3">Not Playlist yet</div>
@endforelse
