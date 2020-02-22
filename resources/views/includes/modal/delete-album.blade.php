<div class="modal fade" role="dialog" tabindex="-1" id="deleteAlbumModal">
  <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content font-weight-bold" style="color:black">
          <div class="modal-header ml-3 mr-3 mt-1">
              <h4 class="modal-title">Are you sure to delete <span id="delete_album_name" class="text-danger">Album</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeDeleteAlbumModal">
                <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body pt-0 ml-3 mr-3" style="height: auto;padding-bottom: 10px;">
            <p class="text-black-50">
              <span class="text-warning">Note:</span>
              Your all song which is belong to this album are also remove from our database.
            </p>
            <div class="form-row">
              <label for="deleteAlbumName" class="form-label">Confirm Your Album Name</label>
              <input type="hidden" name="albumId" id="album_id_in_delete_modal">
              <input type="text" name="deleteAlbumName" id="inputedDeleteAlbumName" placeholder="Album Name" class="form-control">
            </div>             
          </div>
          <div class="modal-footer m-3" style="padding-top: 5px;padding-bottom: 5px;height: 45px;">
            <button class="btn btn-light btn-sm border rounded" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-danger btn-sm border rounded" type="submit" id="deleteAlbumButton">Delete</button>
          </div>
      </div>
  </div>
</div>