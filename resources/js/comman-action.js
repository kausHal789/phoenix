$(document).ready(function () {
  // Get albums
  $(document).on('click', '#homeNavItem', function () {
    $.ajax({
      url: "/",
      method: 'GET', 
      cache: false,
      success: function (_data) {
        // console.log(_data);
        if(_data.status === 200) {
          $("#mainContent").empty();
          $(_data.data).appendTo("#mainContent");
        }
      },
      error: function (err) {
        console.log(err);
      }
    })
  });
  
  // Get Search page
  $(document).on('click', '#browseNavItem', function () {
    $.ajax({
      url: "/search",
      method: 'GET', 
      cache: false,
      success: function (_data) {
        // console.log(_data);
        if(_data.status === 200) {
          $("#mainContent").empty();
          $(_data.data).appendTo("#mainContent");
        }
      },
      error: function (err) {
        console.log(err);
      }
    })
  });  
  
  // Get Album Page
  $(document).on('click', '.albumName', function() {
    // alert('click');
    const id = $(this).attr('id');
    const album_id = id.split('-', 1);
    $.ajax({
      url: "/album/" + album_id,
      method: 'GET',
      cache: false,
      dataType: "JSON",
      success: function (_data) {
        if(_data.status === 200) {
          $("#mainContent").empty();
          $(_data.data).appendTo("#mainContent");
        }
      },
      error: function (err) {
        console.log(err);
      }
    });
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

  $(document).on('mousedown touchstart mousemove touchmove', '#app', function (e) {
    e.preventDefault();
  });

  // Play specific track
  $(document).on('click', '.trackPlayButton', function () {
    var id = $(this).attr('id');
    const song_id = id.split('-', 1);
    getTrackFromDataBase(song_id);
    // $.ajax({  
    //   url: "/songJSON/" + song_id,
    //   method: "GET",
    //   cache: false,
    //   success: function(_data) {
    //     // console.log(_data);
    //     if(_data.status === 200) {
    //       $('.trackInfo .trackName').text(_data.data.track.track_title);
    //       $('.trackInfo .artistName').text(_data.data.track_artist_name);
    //       $('.albumLink img').attr('src', '/storage/' + _data.data.track_album_img);
    //       $('.trackRow#' + song_id).find('.listener').text(_data.data.track.track_listener);
    //       setTrack("/storage/" + _data.data.track.track_song_url);
    //       playTrack();
    //       changePlayButtonToPauseButton($('#playButton'));
    //     }
    //   },
    //   error: function(err) {
    //     console.log(err);
    //   }
    // });
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
        console.log(_data, _data.data.songs[0].id);

        console.log(currentlyPlayingList);
        setTrackList(_data.data.songs);
        currentlyPlayingListIndex = 0;
        console.log(currentlyPlayingList, currentlyPlayingListIndex);

        var song_id = _data.data.songs[0].id
        getTrackFromDataBase(song_id);
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

  

});

function changePlayButtonToPauseButton(btn) {
  $(btn).removeClass('play').addClass('pause').attr('title', 'Pause').attr('id', 'pauseButton');
  $(btn).find('img').attr('src', '/storage/icons/pause.png').attr('alt', 'pause');
}

function changePauseButtonToPlayButton(btn) {
  $(btn).removeClass('pause').addClass('play').attr('title', 'Play').attr('id', 'playButton');
  $(btn).find('img').attr('src', '/storage/icons/play.png').attr('alt', 'play');
}

function getTrackFromDataBase(song_id) {
  // The ajax call will be here
  $.ajax({  
    url: "/songJSON/" + song_id,
    method: "GET",
    cache: false,
    success: function(_data) {
      // console.log(_data);
      if(_data.status === 200) {
        $('.trackInfo .trackName').text(_data.data.track.track_title);
        $('.trackInfo .artistName').text(_data.data.track_artist_name);
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

function setTrackList(trackList) {
  currentlyPlayingList = trackList;
}