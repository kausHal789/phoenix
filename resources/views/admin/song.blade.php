@extends('layouts.admin')


@section('head-section')
  
@endsection

@section('searchBar')
@include('admin.includes.searchBox', ['collection' => $songs, 'collectionType' => 'song'])
@endsection




@section('content')
<div class="container m-5">

  <div class="row" style="display:none" id="searchTitle">
    <div class="col h4 font-weight-bold">Searching...</div>
  </div>
  <div class="row m-5" id="searchData"></div>

  <div class="row h4 font-weight-bold">
    <div class="col-1">#</div>
    <div class="col-4">Title</div>
    <div class="col-2 text-center">Duration</div>
    <div class="col-2 text-center">Listener</div>
    <div class="col-2">Realease</div>
    {{-- <div class="col-1 text-center">Active/Deactive</div> --}}
  </div>

  @php($cnt = 1)
  @forelse ($songs as $song)
  
  <div class="row mb-4 align-items-center">
    <div class="col-1">{{ $cnt++ }}</div>
    <div class="col-4">{{ $song->title }}</div>
    <div class="col-2 text-center">{{ $song->duration }}</div>
    <div class="col-2 text-center">{{ $song->listener }}</div>
    <div class="col-2">{{ $song->created_at->diffForHumans() }}</div>
    <div class="col-1 text-center">
      @include('admin.includes.checkBox', ['collection' => $song, 'collectionType' => 'song'])
    </div>
  </div>
  
  @empty
    <div class="row">
      <div class="col">No Songs Found</div>
    </div>
  @endforelse

</div>
@endsection