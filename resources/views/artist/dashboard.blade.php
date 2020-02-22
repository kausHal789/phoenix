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
                <p style="height: 10px;margin-bottom: 0;font-size: 14px;">0</p>
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
      <div class="col-8">
        <div class="h1 ml-3">ALBUMS</div>
      </div>
      <div class="col-4">
        <button class="btn btn-outline-primary btn-block btn-sm text-truncate border rounded float-none float-sm-none add-another-btn font-weight-bold" 
          type="button" id="addAlbumBtn" title="ADD  ALBUM" data-toggle="modal" data-target="#addAlbumModal">
          ADD NEW ALBUMS
          <i class="fas fa-plus-circle float-right edit-icon" data-toggle="modal" data-target="#addAlbumModal" style="padding-top: 3px;" title="ADD ALBUM"></i>
        </button>
      </div>
    </div>

    <div class="mt-5" id="albums">

      @foreach ($artistAlbums as $album)
      @include('includes.album', ['$album', $album])   
      @endforeach
      
    </div>
  </div>
</section>


{{-- <button data-toggle="modal" data-target="#editAlbumModal">Click</button> --}}
{{-- Add album modal --}}
{{-- @includeIf('includes.modal.add-album') --}}
{{-- Delete album modal --}}
@includeIf('includes.modal.delete-album')


@endsection

@section('script-section')
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/artist-board.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> --}}

{{-- <script src="{{ asset('js/jquery.form.min.js') }}"></script> --}}


<script>
$(document).ready(function() {

  // $(document).on('click', '.album_edit_btn', function () {
  //   // $("#addAlbumBtn").click();
  //   alert('click');
  // });
    
    // $(document).on('click', '#addSongBtn', function () {
    //   $.ajax({
    //     url: "/artist/song",
    //     method: "GET", 
    //     cache: false,
    //     // dataType: "JSON",
    //     success: function(_data) {
    //       // console.log('Success', _data);

    //       $("#addSongForm").html(_data);
    //     },
    //     error: function(req) {
    //       console.log('Error', req);
    //     }
    //   });
    // });



    







  // $(document).on('click', '#addSong', function () {
  //     console.log('enter');
  //     // $.ajax({
  //     //   url: "/artist/test", 
  //     //   method: "GET", 
  //     //   cache: false,
  //     //   success: function (_data) {
  //     //     alert(_data);
  //     //   },
  //     // });
  //   });
});


// $.ajax({
//       url: "/artist/album",
//       method: "POST",
//       data: new FormData(this),
//       dataType: "JSON",
//       contentType: false,
//       cache: false,
//       processData: false,
//       success: function (_data) {
//         // console.log(_data);
//         if(_data.status === 500) {
//           $('#message').addClass('alert-danger');
//           $('#message').css('display', 'block');
//           $('#message').text(_data.message[0]);
//         } else if(_data.status === 202) {
//           $('#closeAddAlbumModel').click();
//           $(_data.ele).prependTo('#albums');
//         }
//       }
</script>

@endsection
