$(document).ready(function() {
  // function getCSRFToken() {
  //   return $('meta[name=csrf-token]').attr("content");
  // }

  $('#addAlbumBtn').on('click', function () {
    $('#album_image').val('');
    $('#album_name').val('');
  });

  $('#addNewAlbum').on('submit', function (event) {
    event.preventDefault();

    $.ajax({
      url: "/artist/album",
      method: "POST",
      data: new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      success: function (_data) {
        // console.log(_data);
        if(_data.status === 500) {
          $('#message').addClass('alert-danger');
          $('#message').css('display', 'block');
          $('#message').text(_data.message[0]);
        } else if(_data.status === 202) {
          $('#closeAddAlbumModel').click();
          $(_data.ele).prependTo('#albums');
        }
      }
    });

  });

});