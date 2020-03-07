<div class="modal fade" role="dialog" tabindex="-1" id=@if(isset($isAlbumEdit))"editAlbumModal" @else "addAlbumModal" @endif>
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content text-black-50 font-weight-bold">
          <div class="modal-header" style="height: 40px;padding-top: 5px;padding-bottom: 0px;">
              <h4 class="modal-title" style="color:black">
                @if (isset($isAlbumEdit)) EDIT ALBUM <span class="text-black-50">{{ $album->name }}</span> @else CREATE ALBUM @endif
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeAddEditAlbumModel">
                <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body" style="height: auto;padding-top: 0px;padding-bottom: 10px;">
            <div class="row d-block">
              <div class="alert mt-3 text-center ml-2 mr-2" id="message" style="display: none"></div>
            </div>
            <div class="row p-2">
              <div class="col-6">
                <img id="album_image_preview" @if (isset($isAlbumEdit))src="/storage/{{ $album->img_url }}"@endif class="w-100 h-100 img-fluid" alt="">
              </div>
              <div class="col-6">
                {{-- @if ()@else @endif --}}
                <form action="javascript:void(0)" id=@if(isset($isAlbumEdit)) "editAlbumForm" @else "addNewAlbumForm" @endif  enctype="multipart/form-data" method="POST">
                  @if (isset($isAlbumEdit)) 
                    @method("PATCH") 
                    <input type="hidden" name="album_id" id="album_id" value="{{ $album->id }}">
                  @endif
                  @csrf
                  <div class="form-group">
                    <label class="col-form-label" for="album_image">Album Image</label>
                    <input type="file" id="album_image" class="form-control-file" name="album_image" placeholder="Album Image">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="album_name">Album Name</label>
                    <input type="text" id="album_name" @if (isset($isAlbumEdit)) value="{{ $album->name }}" @endif class="form-control" name="album_name" placeholder="Album Name" required>
                  </div>
                  <hr>
                  <div class="form-row">
                    <button class="btn btn-success btn-sm btn-block border rounded" type="submit" id=@if (isset($isAlbumEdit)) "editAlbumButton" @else "addAlbumButton" @endif>@if (isset($isAlbumEdit)) Update Album @else Save & Continue @endif</button>
                  </div>
                </form>  
              </div>
            </div>
          </div>
      </div>
  </div>
</div>