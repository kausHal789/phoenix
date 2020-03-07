<div class="modal fade" role="dialog" tabindex="-1" id="deletePlaylistModal">
  <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
      <div class="modal-content font-weight-bold" style="color:black">
          <div class="modal-body m-1">
            <div class="row">
              <div class="col text-center">
                <div class="h3">Do you really want to delete this playlist</div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <button id="closeDeletePlaylistModal" class="btn btn-block rounded-pill btn-secondary" data-dismiss="modal" aria-label="Close">CANCEL</button>
              </div>
              <div class="col-6">
                <form action="javascript:void(0)" method="POST" id="deletePlaylistForm">
                  @method('DELETE')
                  @csrf
                  <input type="hidden" name="playlist_id" id="playlist_id_in_model">
                  <button class="btn btn-danger btn-block rounded-pill deletePlaylistButton" type="submit">DELETE</button>
                </form>
              </div>
            </div>             
          </div>
      </div>
  </div>
</div>