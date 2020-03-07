<div class="modal fade" role="dialog" tabindex="-1" id=@if(isset($isPlaylistEdit))"editPlaylistModal" @else "addPlaylistModal" @endif>
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content text-black-50 font-weight-bold">
          <div class="modal-body" style="background-color:#242424;color:#fff;">
            <div class="container-fluid">
              <div class="row">
                <div class="col text-center">
                  <div class="h2 p-2">
                    @if(isset($isPlaylistEdit)) EDIT PLAYLIST @else CREATE PLAYLIST  @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCreateEditPlaylistModel">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                </div>
              </div>

              <div class="row d-block">
                <div class="col p-3">
                  <div class="alert mt-3 text-center ml-2 mr-2" id="message" style="display: none"></div>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <img id="playlist_image_preview" @if (isset($isPlaylistEdit))src="/storage/{{ $playlist->img_url }}"@endif class="w-100 h-100 img-fluid" alt="">
                </div>
                <div class="col-6">
                  <form action="javascript:void(0)" id=@if(isset($isPlaylistEdit)) "editPlaylistForm" @else "addNewPlaylistForm" @endif  enctype="multipart/form-data" method="POST">
                    @if (isset($isPlaylistEdit)) 
                      @method("PATCH") 
                      <input type="hidden" name="playlist_id" id="playlist_id" value="{{ $playlist->id }}">
                    @endif
                    @csrf
                    <div class="form-group">
                      <label class="col-form-label" for="playlist_image">Playlist Image</label>
                      <input type="file" id="playlist_image" class="form-control-file" name="playlist_image" placeholder="playlist Image">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label" for="playlist_name">Playlist Name</label>
                      <input type="text" id="playlist_name" @if (isset($isPlaylistEdit)) value="{{ $playlist->name }}" @endif class="form-control" name="playlist_name" placeholder="playlist Name" required>
                    </div>
                  </form>
                </div>
              </div>

              <div class="row m-2">
                <div class="col text-center">
                  <button class="btn btn-success btn-block rounded-pill" type="submit" id=@if (isset($isPlaylistEdit)) "editPlaylistButton" @else "addPlaylistButton" @endif>@if (isset($isPlaylistEdit)) SAVE & CONTINUE @else CREATE @endif</button>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>