@extends('layouts.artist')

@section('head-section')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-8">
        <div class="h1 ml-3">ALBUMS</div>
      </div>
      <div class="col-4">
        <button class="btn btn-outline-primary btn-block rounded-pill font-weight-bold" 
          type="button" id="addAlbumBtn" title="CREATE ALBUM" data-toggle="modal" data-target="#addAlbumModal">CREATE ALBUM</button>
      </div>
    </div>
    
    <div class="mt-5" id="albums">
    
      @foreach ($albums as $album)
      @include('includes.album', ['$album', $album])   
      @endforeach
      
    </div>
  </div>

@includeIf('album.delete')

@endsection