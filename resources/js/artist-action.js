$(document).ready(function() {
  // Get scrf token from meta tag
  function getCSRFToken() {
    return $('meta[name=csrf-token]').attr("content");
  }

  // Edit and Delete button are hovered
  $(document).on('mouseenter', '.edit', function () {
      $(this).find('img').attr('src', '/storage/icons/edit_filled.png');
    }).on('mouseleave', '.edit', function () {
      $(this).find('img').attr('src', '/storage/icons/edit.png');
    } 
  );
  $(document).on('mouseenter', '.delete_button', function () {
      $(this).find('img').attr('src', '/storage/icons/remove_filled.png');
    }).on('mouseleave', '.delete_button', function () {
      $(this).find('img').attr('src', '/storage/icons/remove.png');
    } 
  );


  $(document).on('submit', '#editAlbumForm', function() {
    const album_id = $(this).find('#album_id').val();
    const album_name = $(this).find('#album_name').val();
    // console.log(album_id);
    $.ajax({
      url: "/artist/album/" + album_id,
      method: "POST",
      dataType: "JSON",
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,
      success: function(_data) {
        // console.log('success', _data);
        if(_data.status === 202) {
          $("#album-" + album_id).replaceWith(_data.newAlbum);
          $("#closeAddEditAlbumModel").click();
        } else if(_data.status === 400) {
          $('#message').addClass('alert-danger');
          $('#message').css('display', 'block');
          $('#message').text(_data.message[0]);
        }
      },
      error: function(req) {
        alert('Somthing went wrong, Please try again');
        // console.log('fail', req);
      }
    })
  });
  // Get Edit album modal
  $(document).on('click', '.album_edit_btn', function () {
    $('#editAlbumModal').remove();
    // alert('click');
    const id = $(this).attr('id');
    const album_id = id.split('-', 1);
    $.ajax({
      url: "/artist/album/" + album_id + "/edit",
      method: 'GET',
      dataType: "JSON",
      cache: false,
      success: function(_data) {
        // console.log(_data);
        if(_data.status === 202) {
          $(_data.modal).appendTo('body');
          $('#editAlbumModal').modal('show');
        }
      },
      error: function (err) {
        console.log(err);
      }
    });
  });


  // Add data in delete album modal on button click
  $(document).on('click', '.album_delete_btn', function() {
    let id = $(this).attr('id');
    var arr = id.split('-', 2);
    const album_id = arr[0];
    const album_name = arr[1];
    $('#delete_album_name').text(album_name);
    $('#album_id_in_delete_modal').attr('value', album_id);
  });
  // Delete album
  $(document).on('click', '#deleteAlbumButton', function() {
    // alert('click');
    const album_name = $('#delete_album_name').text();
    const inputedDeleteAlbumName = $('#inputedDeleteAlbumName').val();
    if(inputedDeleteAlbumName === album_name) {
      const album_id = $('#album_id_in_delete_modal').attr('value');
      let isDashboard = true;
      if($('#deleteAlbumButton').val()) {
        // Use also in create song page so it is necessary
        isDashboard = true;
        // console.log('dashboard');
        $('#deleteAlbumForm').submit();
        return;
      }
      // This is run only in dashboard page
      $.ajax({
        url: "/artist/album/" + album_id, 
        method: "DELETE",
        cache: false,
        dataType: "JSON",
        data: {
          // album_id: album_id,
          isDashboard: isDashboard,
          _token: getCSRFToken()
        },
        
        success: function(_data) {
          // alert(_data);
          // console.log(_data);
          if(_data.status === 202) {
            $('#album-' + album_id).fadeIn('1000').empty();
            $('#closeDeleteAlbumModal').click();  
          } else if(_data.status === 404) {
            alert('Album is already deleted, Please refresh the page');
          } else {
            alert('Sorry, there was some problem. Please try again later.');
          }
        },
        error: function(req) {
          if(req.status === 404) {
            alert('Album is already deleted, Please refresh the page');
            $('#closeDeleteAlbumModal').click();  
          }
          console.log(req);
        }
      });
    } else {
      $('#inputedDeleteAlbumName').addClass('is-invalid');
    }
  });


  // Add new album
  $(document).on('submit', '#addNewAlbumForm', function (event) {
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
        if(_data.status === 400) {
          $('#message').addClass('alert-danger');
          $('#message').css('display', 'block');
          $('#message').text(_data.message[0]);
        } else if(_data.status === 202) {
          $('#closeAddEditAlbumModel').click();
          $(_data.ele).prependTo('#albums');
        }
      }
    });
  });
  // Get Add Album Modal
  $(document).on('click', '#addAlbumBtn', function () {
    // $('#addAlbumModal').modal('dispose');
    // alert('click');
    $.ajax({
      url: "/artist/album/",
      method: 'GET',
      dataType: "JSON",
      cache: false,
      success: function(_data) {
        if(_data.status === 202) {
          $('#addAlbumModal').remove();
          $(_data.modal).appendTo('body');
          $('#addAlbumModal').modal('show');
        }
      },
      error: function (err) {
        console.log(err);
      }
    });
  });
  // Remove previous data
  $(document).on('click', '#addAlbumBtn', function () {
    $('#album_image').val('');
    $('#album_name').val('');
  });
  // Remove modal from DOM when modal close
  $(document).on('hidden.bs.modal', '#addAlbumModal',function () {
    $(this).remove();
  });
  
 
});