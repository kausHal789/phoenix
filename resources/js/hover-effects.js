$(document).ready(function () {
  // Navbar hover
  $(document).on('mouseenter', '#homeNavItem', function() {
    $(this).find('img').attr('src', '/storage/icons/home_filled.png');
  }).on('mouseleave', '#homeNavItem', function () {
    $(this).find('img').attr('src', '/storage/icons/home.png');
  });
  $(document).on('mouseenter', '#browseNavItem', function() {
    $(this).find('img').attr('src', '/storage/icons/browse_filled.png');
  }).on('mouseleave', '#browseNavItem', function () {
    $(this).find('img').attr('src', '/storage/icons/browse.png');
  });
  
  // Edit and Delete album hover
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
});