@extends('layouts.app')

@section('head-section')
<link rel="stylesheet" href="{{ asset('css/artist-board.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"> --}}
<link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css') }}">
@endsection

@section('content')
{{-- It only for artist --}}
<section>
  <div class="container">
    <div class="row" style="position: relative;">
      <div class="col" style="position: relative;">
        <div class="row">
          <div class="col"><img class="img-fluid d-flex" src="{{ $artistProfile->converImg() }}" style="position: relative;"></div>
        </div>
        <div class="row profile-section">
          <div class="col-4 offset-1">
            <div class="row no-gutters align-items-end">
              <div class="col-4 col-sm-4">
                <p class="d-flex float-right artist">ARTIST</p>
              </div>
              <div class="col-2 col-sm-2 col-md-2"><img class="rounded-circle img-fluid" src="{{ asset('storage/icons/approval.png') }}" width="20px" height="20px" loading="eager"></div>
              <div class="col-6 col-sm-4"><button class="btn btn-success btn-sm border rounded border-success shadow" type="button">FOLLOW</button></div>
            </div>
            <div class="row">
              <div class="col"><img class="img-thumbnail img-fluid border rounded" src="{{ $artistProfile->profileImage() }}"></div>
            </div>
          </div>
          <div class="col-4 align-self-end artist-name-container">
            <div class="row">
              <div class="col">
                <p class="lead text-capitalize text-white artist-name">{{ $artistProfile->name }}</p>
              </div>
            </div>
          </div>
          <div class="col-2 text-left align-self-center">
            <div class="row">
              <div class="col">
                <p style="font-size: 10px;margin-bottom: 0;height: 10px;">TOTAL LISTENERS</p>
                <p style="height: 10px;margin-bottom: 0;font-size: 14px;">100,000</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section style="margin-top: 10rem;">
  <div class="container">
    <div class="row">
      <div class="col">
        <button class="btn btn-outline-primary btn-block btn-sm text-truncate border rounded float-none float-sm-none add-another-btn font-weight-bold" 
          type="button" id="addAlbumBtn" data-toggle="modal" data-target="#addAlbumModal">
          ALBUMS
          <i class="fas fa-plus-circle float-right edit-icon" data-toggle="modal" data-target="#addAlbumModal" style="padding-top: 3px;" title="ADD ALBUM"></i>
        </button>
      </div>
    </div> 
  
  {{-- </div> --}}

    <div class="mt-5" id="albums">

      @foreach ($artistAlbums as $album)
      @include('includes.album')   
      @endforeach
      
    </div>
  </div>
</section>
<div class="modal fade" role="dialog" tabindex="-1" id="addAlbumModal">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content text-black font-weight-bold">
          <div class="modal-header" style="height: 40px;padding-top: 5px;padding-bottom: 0px;">
              <h4 class="modal-title" style="color:black">ADD NEW ALBUM</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeAddAlbumModel">
                <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body" style="height: auto;padding-top: 0px;padding-bottom: 10px;">

            <div class="alert mt-3" id="message" style="display: none"></div>

            <form id="addNewAlbum" enctype="multipart/form-data" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-form-label" for="album_image">Album Image</label>
                <input type="file" id="album_image" class="form-control-file" name="album_image" placeholder="Album Image">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="album_name">Album Name</label>
                <input type="text" id="album_name" class="form-control" name="album_name" placeholder="Album Name">
              </div>
              <hr>
              <div class="form-row">
                <button class="btn btn-success btn-sm btn-block border rounded" type="submit" id="addAlbumButton">Save & Continue</button>
              </div>
            </form>  
          </div>
          {{-- <div class="modal-footer" style="padding-top: 5px;padding-bottom: 5px;height: 45px;">
            <button class="btn btn-light btn-sm border rounded" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-success btn-sm border rounded" type="submit" id="addAlbumButton" data-dismiss="modal">Save</button>
          </div> --}}
      </div>
  </div>
</div>

@endsection

@section('script-section')
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/artist-board.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> --}}

<script>
$(document).ready(function() {
    // $('.album').hover(
    //   function () {
    //     $('.edit-delete-album').css('display', 'block');
    // },
    //   function () {
    //     $('.edit-delete-album').css('display', 'none');
    // });
});
</script>

@endsection
