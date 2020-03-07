let audio = new Audio('/storage/audio/15820854125e4cb5242b321.mp3');
let mouseDown = false;
const currentlyPlayingList = [];

// How song long in min
audio.addEventListener('canplay', function() {
  $('.progressTime.remaning').text(setTimeFormat(this.duration));
});

audio.addEventListener('timeupdate', function () {
  if(this.duration) {
    updateTimeProgressBar(this);
  }
});

audio.addEventListener('volumechange', function () {
  updateVolumeProgressBar(this);
})

// It is for time
function updateTimeProgressBar(audio) {
  $('.progressTime.current').text(setTimeFormat(audio.currentTime));
  // Here we can use the how much time will be remaining (audio.duration - audio.currentTime)
  var progress = audio.currentTime / audio.duration * 100;
  $('.playbackBar .progress').width(progress + '%');

}
function updateVolumeProgressBar(audio) {
  // Here we can use the how much time will be remaining (audio.duration - audio.currentTime)
  var volume = audio.volume * 100;
  $('.volumeBar .progress').width(volume + '%');
}

function setTimeFormat(_sec) {
  var _sec = Math.round(_sec);
  var min = Math.floor(_sec / 60);
  var sec = _sec - (min * 60);
  var extraZero = (sec < 10) ? "0" : "";
  return min + ":" + extraZero + sec;
}

function playTrack() {
  audio.play();
}
function pauseTrack() {
  audio.pause();
}

function setTrack(src) {
  audio.src = src;
}

function setTrackList() {

}

function setTime(seconds) {
  audio.currentTime = Number.parseFloat(seconds);
}

$(document).ready(function () {
  // Set the volume when page load
  updateVolumeProgressBar(audio);

  // this for playbackbar
  $('.playbackBar .progressBar').mousedown(function () {
    mouseDown = true;
  })
  $('.playbackBar .progressBar').mousemove(function (e) {
    if(mouseDown) {
      // Set time of song, depending on position of mouse
      timeFromOffset(e, this);
    }
  });
  $('.playbackBar .progressBar').mouseup(function (e) {
    timeFromOffset(e, this);
  });

  // This is for volumne 
  $('.volumeBar .progressBar').mousedown(function () {
    mouseDown = true;
  })
  $('.volumeBar .progressBar').mousemove(function (e) {
    if(mouseDown) {
      // Set time of song, depending on position of mouse
      var pr = e.offsetX / $(this).width();
      if(pr >= 0 && pr <= 1) {
        audio.volume = pr;
      }
    }
  });
  $('.volumeBar .progressBar').mouseup(function (e) {
    var pr = e.offsetX / $(this).width();
    audio.volume = pr;
    if(pr >= 0 && pr <= 1) {
      audio.volume = pr;
    }
  });

  $(document).mouseup(function () {
    mouseDown = false;
  });
});


function timeFromOffset(mouse, progressBar) {
  var pr = mouse.offsetX / $(progressBar).width() * 100;
  var seconds = audio.duration * (pr / 100);
  setTime(seconds);
}