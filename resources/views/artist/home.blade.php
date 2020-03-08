@extends('layouts.app')

@section('head-section')
@endsection

@section('content')
  <div class="container">

    <div class="row mt-5">
      <div class="col h1 font-weight-bold">
        Home
      </div>
    </div>

    <div class="row m-3">
      <div class="col mb-3">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <div class="card-title h1 text-center">Total Albums</div>
            <div class="card-text h4 text-center">{{ auth()->user()->album->count() }}</div>
          </div>
        </div>
      </div>
      <div class="col mb-3">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <div class="card-title h1 text-center">Total Playlists</div>
            <div class="card-text h4 text-center">{{ auth()->user()->playlist->count() }}</div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-white bg-primary  mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <div class="card-title h1 text-center">Total Songs</div>
            <div class="card-text h4 text-center">{{ auth()->user()->song->count() }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection