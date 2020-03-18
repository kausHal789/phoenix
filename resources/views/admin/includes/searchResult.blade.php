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
    
@endif




