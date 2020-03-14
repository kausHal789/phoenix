@extends('layouts.admin')

@section('content')
<div class="container m-5">

  <div class="row mt-3 mb-3">
    <div class="col">
      <div class="h1 font-weight-bold">Playlists</div>
    </div>
  </div>

  @include('admin.includes.album-playlist-header')

  @forelse ($playlists as $playlist)
  
  @include('admin.includes.album-playlist', ['collection' => $playlist, 'collectionType' => 'playlist'])
  
  @empty
  <div class="row">
    <div class="col">No Playlist Found</div>
  </div>
  @endforelse

</div>
@endsection