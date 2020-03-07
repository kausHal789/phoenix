$(document).ready(function () {

  // Hide notification area
  $('.collapse').collapse('hide');
  // Get albums
  $(document).on('click', '#homeNavItem', function () {
    getRoutePage('/album');
  });
  
  // Get Search page
  $(document).on('click', '#browseNavItem', function () {
    getRoutePage('/search');
  });  
  
  // Get Stting page
  $(document).on('click', '.settingsNavItem', function () {
    // getRoutePage('/search');
    var user_id = $(this).attr('id').split('-', 1)[0];
    getRoutePage('/profile/' + user_id + '/edit');
    // console.log(user_id);
    // alert('click');
  });  
  
  // Notification
  // NOT in use
  // $(document).on('click', '#notificationItem', function () {
  //   $('.collapse.notificationCollapse').collapse('toggle');
  // });  
  
  // Get Album Page
  $(document).on('click', '.albumName', function() {
    const id = $(this).attr('id');
    const album_id = id.split('-', 1);
    getRoutePage("/album/" + album_id);
  });

  // Get Your Playlist Page
  $(document).on('click', '#yourPlaylistItem', function() {
    getRoutePage('/playlist');
  });
  
  // Get Playlist page
  $(document).on('click', '.playlistName', function() {
    // console.log('sdfasd');
    const id = $(this).attr('id');
    const playlist_id = id.split('-', 1);
    getRoutePage('/playlist/' + playlist_id);
  });

  $(document).on('click', '.artistName', function() {
    const id = $(this).attr('id');
    // Actully artist is also a user so consider as user for show profile
    const user_id = id.split('-', 1);
    getRoutePage("/profile/" + user_id);
  });

  $(document).on('click', '#playButton', function() {
    changePlayButtonToPauseButton(this);
    playTrack();
  });

  $(document).on('click', '#pauseButton', function() {
    changePauseButtonToPlayButton(this),
    pauseTrack();
  });

  $(document).on('click', '#nextTrackButton', function() {
    nextTrack();
  });

  $(document).on('click', '#previousTrackButton', function() {
    previousTrack();
  });

  $(document).on('click', '#repeatTrackButton', function() {
    repeatTrack();
  });

  $(document).on('click', '#volumeButton', function() {
    setMute();
  });

  $(document).on('click', '#shuffleButton', function() {
    setShuffle();
  });

  $(document).on('mousedown touchstart mousemove touchmove', '#app', function (e) {
    e.preventDefault();
  });

  // Play specific track
  $(document).on('click', '.trackPlayButton', function () {
    var id = $(this).attr('id');
    const song_id = id.split('-', 1);
    getTrackFromDataBase(song_id);
  });

  // Play Album
  $(document).on('click', '.albumPlayButton', function () {
    var id = $(this).attr('id');
    const album_id = id.split('-', 1);
    $.ajax({  
      url: "/albumJSON/" + album_id,
      method: "GET",
      cache: false,
      success: function(_data) {
        if(_data.status === 200) {

          var trackIdsList = _data.data.songs.map(function(item) {
            return item.id;
          });
          setTrackList(trackIdsList);
          currentlyPlayingListIndex = 0;

          var song_id = _data.data.songs[0].id
          getTrackFromDataBase(song_id);
        }
        // $.ajax({  
        //   url: "/songJSON/" + song_id,
        //   method: "GET",
        //   cache: false,
        //   success: function(_data) {
        //     console.log(_data);
        //     if(_data.status === 200) {
        //       $('.trackInfo .trackName').text(_data.data.track.track_title);
        //       $('.trackInfo .artistName').text(_data.data.track_artist_name);
        //       $('.albumLink img').attr('src', '/storage/' + _data.data.track_album_img);
        //       setTrack("/storage/" + _data.data.track.track_song_url);
        //       playTrack();
        //       changePlayButtonToPauseButton($('#playButton'));
        //     }
        //   },
        //   error: function(err) {
        //     console.log(err);
        //   }
        // });
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  // Play Playlist
  $(document).on('click', '.playlistPlaybutton', function () {
    var id = $(this).attr('id');
    const playlist_id = id.split('-', 1);
    $.ajax({  
      url: "/playlistJSON/" + playlist_id,
      method: "GET",
      cache: false,
      success: function(_data) {
        if(_data.status === 200) {

          var trackIdsList = _data.data.songs.map(function(item) {
            return item.id;
          });
          setTrackList(trackIdsList);
          currentlyPlayingListIndex = 0;

          var song_id = _data.data.songs[0].id
          getTrackFromDataBase(song_id);
        }
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  $(document).on('click', '.playlistItem', function() {
    var song_id = $('#option_menu_song_id').val();
    var playlist_id = $(this).attr('value');
    $.ajax({  
      url: "/playlist/" + playlist_id + "/song/" + song_id +"/attach",
      method: "GET",
      cache: false,
      success: function(_data) {
        if(_data.status === 200) {
          alert('Add, Successfully');
        }
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  $(document).on('click', '.removeFromPlaylist', function() {
    var song_id = $('#option_menu_song_id').val();
    var playlist_id = $(this).attr('value');
    $.ajax({  
      url: "/playlist/" + playlist_id + "/song/" + song_id + "/detach",
      method: "GET",
      cache: false,
      success: function(_data) {
        console.log(_data);
        if(_data.status === 200) {
          // $('#' + song_id).remove();
          alert('Remove, Successfully');
        }
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  // Focus on click
  $(document).on('click', '.searchInput', function() {
    $(this).focus();
  });

  // Wait for user typing something
  $(function() {
    var timer;
    // Wait 2 sec after user stop typing
    $(document).on('keyup', '#searchInput', function() {
      clearTimeout(timer);
      timer = setTimeout(function () {
        data = {
          term: $('#searchInput').val()
        };
        searchForData('/search/result', data);
      }, 2000);
    });
  });

  // Playlist section
  function getCSRFToken() {
    return $('meta[name=csrf-token]').attr("content");
  }
  
  $(document).on('click', '#addPlaylistButton', function () {
    // manually submitting form because submit button is outside of the form
    $('#addNewPlaylistForm').submit();
  });

  $(document).on('click', '#editPlaylistButton', function () {
    // manually submitting form because submit button is outside of the form
    $('#editPlaylistForm').submit();
  });

  // create Playlist 
  $(document).on('submit', '#addNewPlaylistForm', function (event) {
    event.preventDefault();
    $.ajax({
      url: "/playlist",
      method: "POST",
      data: new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      success: function (_data) {
        // console.log(_data)
        if(_data.status === 400) {
          $('#message').addClass('alert-danger');
          $('#message').css('display', 'block');
          $('#message').text(_data.message[0]);
        } else if(_data.status === 202) {
          $('#closeCreateEditPlaylistModel').click();
          $(_data.ele).prependTo('#playlists');
        }
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  // Playlist modal
  $(document).on('click', '#createPlaylistBtn', function () {
    $.ajax({
      url: "/playlist/create",
      method: 'GET',
      dataType: "JSON",
      cache: false,
      success: function(_data) {
        if(_data.status === 202) {
          $('#addPlaylistModal').remove();
          $(_data.modal).appendTo('body');
          $('#addPlaylistModal').modal('show');
        }
      },
      error: function (err) {
        console.log(err);
      }
    });
  });

  // Edit Playlist modal
  $(document).on('click', '.playlist_edit_btn', function () {
    $('#editPlaylistModal').remove();
    const id = $(this).attr('id');
    const playlist_id = id.split('-', 1);
    $.ajax({
      url: "/playlist/" + playlist_id + "/edit",
      method: 'GET',
      dataType: "JSON",
      cache: false,
      success: function(_data) {
        // console.log(_data);
        if(_data.status === 202) {
          $(_data.modal).appendTo('body');
          $('#editPlaylistModal').modal('show');
        }
      },
      error: function (err) {
        console.log(err);
      }
    });
  });

  // Update playlist
  $(document).on('submit', '#editPlaylistForm', function() {
    const playlist_id = $(this).find('#playlist_id').val();
    // const album_name = $(this).find('#album_name').val();
    // console.log(playlist_id);
    $.ajax({
      url: "/playlist/" + playlist_id,
      method: "POST",
      dataType: "JSON",
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,
      success: function(_data) {
        console.log('success', _data);
        if(_data.status === 200) {
          $('.collectionHeader').replaceWith(_data.newPlaylist);
          $("#closeCreateEditPlaylistModel").click();
        } else if(_data.status === 400) {
          $('#message').addClass('alert-danger');
          $('#message').css('display', 'block');
          $('#message').text(_data.message[0]);
        }
      },
      error: function(err) {
        alert('Somthing went wrong, Please try again');
        console.log(err);
      }
    })
  });

  // Add data in delete playlsit modal on button click
  $(document).on('click', '.playlist_delete_btn', function() {
    let id = $(this).attr('id');
    var playlist_id = id.split('-', 1);
    $('#playlist_id_in_model').val(playlist_id);
  });

  // Delete Playlist
  $(document).on('submit', '#deletePlaylistForm', function() {
    playlist_id = $(this).find('#playlist_id_in_model').val();

    $.ajax({
      url: "/playlist/" + playlist_id,
      method: "POST",
      dataType: "JSON",
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,
      success: function(_data) {
        if(_data.status === 200) {
          $('#deletePlaylistModal').modal('hide');
          $('#deletePlaylistModal').on('hidden.bs.modal', function () {
            $('#mainContent').html(_data.data);
          });  
        }
      },
      error: function(err) {
        if(req.status === 404) {
          alert('Playlist is already deleted, Please refresh the page');
          $('#closeDeletePlaylistModal').click();  
        }
      }
    })



    // $.ajax({
    //   url: "/playlist/" + playlist_id, 
    //   method: "DELETE",
    //   cache: false,
    //   dataType: "JSON",
    //   data: new FormData(this),
    //   success: function(_data) {
    //     // alert(_data);
    //     console.log(_data);
    //     if(_data.status === 202) {
    //       $('#album-' + album_id).fadeIn('1000').empty();
    //       $('#closeDeleteAlbumModal').click();  
    //     } else if(_data.status === 404) {
    //       alert('Album is already deleted, Please refresh the page');
    //     } else {
    //       alert('Sorry, there was some problem. Please try again later.');
    //     }
    //   },
    //   error: function(req) {
    //     if(req.status === 404) {
    //       alert('Playlist is already deleted, Please refresh the page');
    //       $('#closeDeletePlaylistModal').click();  
    //     }
    //     console.log(req);
    //   }
    // });
  });

  // Option menu
  $(document).on('click', '.optionMenuButton', function() {
    var menu = $('.optionMenu');
    //  ADD this song id to option menu
    menu.find('#option_menu_song_id').val($(this).attr('id').split('-', 1));

    $.ajax({
      url: '/playlistListJSON',
      method: 'GET',
      dataType: "JSON",
      cache: false,
      success: function (_data) {
        if(_data.status === 200) {
          $(".dropdown-menu.dropdown-menu-right").empty().append(_data.data.playlists);
        }
      },
      error: function (err) {
        console.log(err);
      }
    })

    var scrollTop = $(window).scrollTop(); // Distance from top of the window to top of document
    var elementOffset = $(this).offset().top;  // Return distance from top to track row

    var top = elementOffset - scrollTop;
    var left = $(this).position().left + 1200;
    menu.css({
      'top': top + 'px',
      'left': left + 'px',
      'display': 'inline'
    });
  });

  // Follow-Unfollow
  $(document).on('click', '.followButton', function () {
    var text = $(this).text();
    var user_id = $(this).attr('id').split('-', 1);
    $.ajax({
      url: '/follow/' + user_id,
      method: 'POST',
      cache: false,
      data: {
        _token: getCSRFToken()
      },
      dataType: 'JSON',
      success: function(_data) {
        if(_data.status === 200) {
          var newText = (text == 'Follow') ? 'Unfollow' : 'Follow' ;
          $('.followButton').text(newText);
          var followers = Number.parseInt($('.follower').text());
          if(newText == 'Follow') {
            $('.follower').text(followers - 1);
          } else if(_data.data > 0) {
            $('.follower').text(followers + 1);
          }
        }
      },
      error: function (err) {
        if(err.status == 404) {
          alert('404! Not Found');
        }
      }
    });
  });

  // Dadicate
  $(document).on('click', '.dedicateButton', function() {
    // console.log('click');
    var song_id = $('.optionMenu').find('#option_menu_song_id').val();
    // console.log(song_id);
    $('#song_id_in_dadicade_modal').val(song_id);
  });

  // Search for dadicate user
  $(function() {
    var timer;
    // Wait 2 sec after user stop typing
    $(document).on('keyup', '.searchInput-sm', function() {
      clearTimeout(timer);
      timer = setTimeout(function () {
        data = {
          term: $('.searchInput-sm').val()
        };
        searchForData('/dadicate/search/', data);
      }, 2000);
    });
  });

  // Dadicate song
  $(document).on('click', '.dadicateButton', function() {
    var song_id = $('#dadicateModal').find('#song_id_in_dadicade_modal').val();
    var to = $(this).attr('id').split('-', 1);
    $.ajax({
      url: '/dadicate',
      method: 'POST', 
      cache: false,
      data: {
        song_id: song_id,
        _token: getCSRFToken(),
        to: to
      },
      dataType: 'JSON',
      success: function(_data) {
        console.log(_data);
      },
      error: function (err) {
        console.log(err);
      }
    });
  });

  // Save Profile
  $(document).on('submit', '#updateProfile', function() {
    alert('click');
    var user_id = $(this).find('#user_id').val();
    $.ajax({
      url: "/profile/" + user_id,
      method: "POST",
      cache: false,
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,
      dataType: "JSON",
      success: function(_data) {
        // console.log(_data);
        if(_data.status === 202) {
          $('.settingsNavItem').click();
        } else if(_data.status === 400) {
          $('#message').addClass('alert-danger');
          $('#message').css('display', 'block');
          $('#message').text(_data.message[0]);
        }
      },
      error: function(err) {
        console.log(err);
      }

    });
  });


});

$(window).scroll(function () {
  hideOptionMenu();
});

$(document).click(function (clickEvent) {
  var target = $(clickEvent.target);
  if(!target.hasClass('item') && !target.hasClass('optionMenuButton')) {
    hideOptionMenu();
  }
});


function getRoutePage(_url) {
  $.ajax({
    url: _url,
    method: 'GET',
    dataType: "JSON",
    cache: false,
    success: function (_data) {
      if(_data.status === 200) {
        $("#mainContent").html(_data.data);
      }
    },
    error: function (err) {
      console.log(err);
    }
  })
}

function getTrackFromDataBase(song_id) {
  // The ajax call will be here
  // console.log(song_id);
  $.ajax({  
    url: "/songJSON/" + song_id,
    method: "GET",
    cache: false,
    success: function(_data) {
      // console.log(_data);
      if(_data.status === 200) {
        $('.trackInfo .trackName').text(_data.data.track.track_title);
        $('.trackInfo .artistName').text(_data.data.track_artist_name);
        $('.trackInfo .artistName').attr('id', _data.data.track_artist_id + '-artist');
        $('.albumLink img').attr('src', '/storage/' + _data.data.track_album_img);
        $('.trackRow#' + song_id).find('.listener').text(_data.data.track.track_listener);

        setTrack("/storage/" + _data.data.track.track_song_url);
        playTrack();
        changePlayButtonToPauseButton($('#playButton'));
      }
    },
    error: function(err) {
      console.log(err);
    }
  });
}

function getNewTrackIdFromDataBase() {
  $.ajax({
    url: "/song",
    method: "GET",
    cache: false,
    dataType: "JSON",
    success: function(_data) {
      getTrackFromDataBase(_data.data.new_track_id);
      return;
    },
    error: function(err) {
      console.log(err);
    }
  });
}

function setTrackList(trackList) {
  currentlyPlayingList = trackList;
}

function changePlayButtonToPauseButton(btn) {
  $(btn).removeClass('play').addClass('pause').attr('title', 'Pause').attr('id', 'pauseButton');
  $(btn).find('img').attr('src', '/storage/icons/pause.png').attr('alt', 'pause');
}

function changePauseButtonToPlayButton(btn) {
  $(btn).removeClass('pause').addClass('play').attr('title', 'Play').attr('id', 'playButton');
  $(btn).find('img').attr('src', '/storage/icons/play.png').attr('alt', 'play');
}

function searchForData(_url, _data) {
  $.ajax({
    url: _url,
    method: 'GET',
    data: _data,
    cache: false,
    dataType: "JSON",
    success: function(_data) {
      console.log(_data);
      if(_data.status === 200) {
        console.log('success');
        $('#searchResult').html(_data.data);
      }
    },
    error: function(err) {
      console.log(err);
    }
  })
}

function hideOptionMenu() {
  var menu = $('.optionMenu');
  if(menu.css('diplay') != 'none') {
    menu.css('display', 'none');
  }
}