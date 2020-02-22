$(document).ready(function () {
  $('#image').change(function () {
    preview(this, '#image_preview');
  });
  $(document).on('change', '#album_image', function () {
    preview(this, '#album_image_preview');
  });
  $('#audio').change(function () {
    preview(this, '#audio_preview');
    // var render = new FileReader();
    // render.onload = function (e) {
    //   $('#audio_preview').css('display', 'inline');
    //   $('#audio_preview').attr('src', e.target.result);
    // };
    // render.readAsDataURL(this.files[0]);
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
