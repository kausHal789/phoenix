@extends('layouts.admin')

@section('content')
<div class="container m-5">

  <div class="row mt-3 mb-3">
    <div class="col">
      <div class="h1 font-weight-bold">Users</div>
    </div>
  </div>

  <div class="row h4 font-weight-bold">
    <div class="col-1"></div>
    <div class="col-1">#</div>
    <div class="col-2">Username</div>
    <div class="col-2">Name</div>
    <div class="col-2">Type</div>
    <div class="col-1 text-center">Playlists</div>
    <div class="col-2 text-center">Joined</div>
    <div class="col-1 text-center">Active/Deactive</div>
  </div>

  @php($cnt = 1)
  @forelse ($users as $user)
    <div class="row mb-4 align-items-center">
      <div class="col-1"></div>
      <div class="col-1">{{ $cnt++ }}</div>
      <div class="col-2">{{ $user->username }}</div>
      <div class="col-2">{{ $user->profile->name }}</div>
      <div class="col-2">{{ $user->role->name }}</div>
      <div class="col-1 text-center">{{ $user->playlist->count() }}</div>
      <div class="col-2 text-center">{{ $user->created_at->diffForHumans() }}</div>
      <div class="col-1 text-center">
        @include('admin.includes.checkBox', ['collection' => $user, 'collectionType' => 'user'])
      </div>
    </div>
  @empty
    <div class="row">
      <div class="col">No Users Found</div>
    </div>
  @endforelse

</div>
@endsection