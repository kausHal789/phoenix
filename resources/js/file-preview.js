$(document).ready(function () {
  $('#image').change(function () {
    preview(this, '#image_preview');
  });
  $(document).on('change', '#album_image', function () {
    preview(this, '#album_image_preview');
  });
  $(document).on('change', '#playlist_image', function () {
    preview(this, '#playlist_image_preview');
  });
  $(document).on('change', '#profileImage', function () {
    preview(this, '#profile_image_preview');
  });
  $(document).on('change', '#coverImage', function () {
    preview(this, '#cover_image_preview');
  });

  $('#audio').change(function () {
    preview(this, '#audio_preview');
  });

  function preview(original, preview) {
    var render = new FileReader();
    render.onload = function (e) {
      $(preview).css('display', 'inline');
      $(preview).attr('src', e.target.result);
    };
    render.readAsDataURL(original.files[0]);
  }

});
