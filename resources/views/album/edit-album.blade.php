<div class="modal fade" role="dialog" tabindex="-1" id="editAlbumModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content text-black-50 font-weight-bold">
          <div class="modal-header" style="height: 40px;padding-top: 5px;padding-bottom: 0px;">
              <h4 class="modal-title" style="color:black">Edit ALBUM</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeEditAlbumModel">
                <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body" style="height: auto;padding-top: 0px;padding-bottom: 10px;">

            <div class="row">
              <div class="alert mt-3" id="message" style="display: none"></div> 
            </div>

            <div class="row">
              <div class="col-4">
                <img src="https://images.hdqwalls.com/wallpapers/scarlet-witch-2020-4k-ze.jpg" class="w-25 h-25" alt="">
              </div>
              <div class="col-8">
                <form id="editAlbum" enctype="multipart/form-data" method="POST">
                  @method('PUT')
                  @csrf
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
                    <button class="btn btn-success btn-sm btn-block border rounded" type="submit" id="editAlbumButton">Save & Continue</button>
                  </div>
                </form>
              </div>
            </div>  
          </div>
      </div>
  </div>
</div>