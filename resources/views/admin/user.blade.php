@extends('layouts.admin')


@section('searchBar')
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
  <div class="kt-container  kt-container--fluid ">
    <div class="kt-subheader__main">
      <h3 class="kt-subheader__title text-white">
          Users
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>

      <div class="kt-subheader__toolbar" id="kt_subheader_search">
        <span class="kt-subheader__desc text-white" id="kt_subheader_total">
            {{ $totalUser }} Total </span>

          <div class="kt-subheader__search">
            <div class="input-group">
              <input type="text" class="form-control search_box" placeholder="Search..." id="user">
            </div>
          </div>
          <div class="kt-nav__foot">
            <a class="btn btn-label-brand text-white btn-bold btn-sm" href="#enduser">End Users</a>
          </div>
          <div class="kt-nav__foot">
            <a class="btn btn-label-brand text-white btn-bold btn-sm" href="#artists">Artists</a>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<section>
<div class="container">

  <div class="row" style="display:none" id="searchTitle">
    <div class="col h4 font-weight-bold">Searching...</div>
  </div>
  <div class="row m-5" id="searchData"></div>

  <div class="row mt-5" id="enduser">
    <div class="col h4 font-weight-bold">
      End Users
    </div>
  </div>
  <div class="row" id="users">
    @foreach ($endUsers as $user)
      @include('admin.includes.profile-thumbnail', ['user' => $user])
    @endforeach
  </div>
  <div class="row mt-5" id="artists">
    <div class="col h4 font-weight-bold">
      Artist
    </div>
  </div>
  <div class="row">
    @foreach ($artists as $user)
      @include('admin.includes.profile-thumbnail', ['user' => $user])
    @endforeach
  </div>
</div>

</section>
@endsection