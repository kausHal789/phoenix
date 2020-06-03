@if (isset($userSearch))

@foreach ($users as $user)
  @include('admin.includes.profile-thumbnail', ['user' => $user])
@endforeach

@elseif(isset($albumSearch))

@foreach ($albums as $album)
  @include('admin.includes.album-playlist', ['collection' => $album, 'collectionType' => 'album'])
@endforeach

@elseif(isset($playlistSearch))

@foreach ($playlists as $playlist)
  @include('admin.includes.album-playlist', ['collection' => $playlist, 'collectionType' => 'playlist'])
@endforeach

@elseif(isset($songSearch))
@php($cnt = 1)
@foreach ($songs as $song)
  {{-- collectionType is not used variavble it'ds just for surety --}}
  @include('admin.includes.song-row', ['song' => $song, 'collectionType' => 'song', 'cnt'=>$cnt++])
@endforeach

@endif




