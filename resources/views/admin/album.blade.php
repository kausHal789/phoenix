@extends('layouts.admin')

@section('content')
  <div class="container m-5">

    <div class="row mt-3 mb-3">
      <div class="col">
        <div class="h1 font-weight-bold">Albums</div>
      </div>
    </div>

    @include('admin.includes.album-playlist-header')

    @forelse ($albums as $album)
    
    @include('admin.includes.album-playlist', ['collection' => $album, 'collectionType' => 'album'])
    
    @empty
      <div class="row">
        <div class="col">No Albums Found</div>
      </div>
    @endforelse

  </div>
@endsection
