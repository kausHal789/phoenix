let audio = new Audio();
let mouseDown = false;
let currentlyPlayingList = [];
let orginalPlayingList = [];
let shufflePlayingList = [];
let currentlyPlayingListIndex;
let repeat = false;
let shuffle = false;

// How song long in min
audio.addEventListener("canplay", function() {
    $(".progressTime.remaning").text(setTimeFormat(this.duration));
});

audio.addEventListener("timeupdate", function() {
    if (this.duration) {
        updateTimeProgressBar(this);
    }
});

audio.addEventListener("volumechange", function() {
    updateVolumeProgressBar(this);
});

audio.addEventListener("ended", function() {
    // changePlayButtonToPauseButton('#pauseButton')
    nextTrack();
});

// It is for time
function updateTimeProgressBar(audio) {
    $(".progressTime.current").text(setTimeFormat(audio.currentTime));
    // Here we can use the how much time will be remaining (audio.duration - audio.currentTime)
    var progress = (audio.currentTime / audio.duration) * 100;
    $(".playbackBar .progress").width(progress + "%");
}
function updateVolumeProgressBar(audio) {
    // Here we can use the how much time will be remaining (audio.duration - audio.currentTime)
    var volume = audio.volume * 100;
    $(".volumeBar .progress").width(volume + "%");
}

function setTimeFormat(_sec) {
    var _sec = Math.round(_sec);
    var min = Math.floor(_sec / 60);
    var sec = _sec - min * 60;
    var extraZero = sec < 10 ? "0" : "";
    return min + ":" + extraZero + sec;
}

function setTrack(src) {
    audio.src = src;
}

function setTime(seconds) {
    audio.currentTime = Number.parseFloat(seconds);
}

function setMute() {
    audio.muted = !audio.muted;
    var imgSrc = audio.muted
        ? "/storage/icons/volume-mute.png"
        : "/storage/icons/volume.png";
    $("#volumeButton")
        .find("img")
        .attr("src", imgSrc);
}

function setShuffle() {
    shuffle = !shuffle;
    var imgSrc = shuffle
        ? "/storage/icons/shuffle-active.png"
        : "/storage/icons/shuffle.png";
    $("#shuffleButton")
        .find("img")
        .attr("src", imgSrc);

    if (shuffle) {
        // Randomize playlist
        orginalPlayingList = currentlyPlayingList.slice();
        setTrackList(shuffleArray(currentlyPlayingList));
    } else {
        // Regulare
        setTrackList(orginalPlayingList);
    }
}

function playTrack() {
    audio.play();
}

function pauseTrack() {
    audio.pause();
}

function repeatTrack() {
    repeat = !repeat;
    var imgSrc = repeat
        ? "/storage/icons/repeat-active.png"
        : "/storage/icons/repeat.png";
    $("#repeatTrackButton")
        .find("img")
        .attr("src", imgSrc);
}

function nextTrack() {
    if (repeat) {
        setTime(0);
        playTrack();
        return;
    }

    if (
        currentlyPlayingListIndex === currentlyPlayingList.length - 1 ||
        currentlyPlayingList.length === 0
    ) {
        // If the track is last of index then set track to 0
        // currentlyPlayingListIndex = 0;
        // Or get new songs from database
        // Here we get rendom song_id from database
        getNewTrackIdFromDataBase();
        return;
    } else {
        currentlyPlayingListIndex++;
    }
    getTrackFromDataBase(currentlyPlayingList[currentlyPlayingListIndex]);
}

function previousTrack() {
    if (audio.currentTime >= 3 || currentlyPlayingListIndex === 0) {
        setTime(0);
        return;
    } else {
        currentlyPlayingListIndex--;
    }
    getTrackFromDataBase(currentlyPlayingList[currentlyPlayingListIndex].id);
}

$(document).ready(function() {
    // Set the volume when page load
    updateVolumeProgressBar(audio);

    // this for playbackbar
    $(".playbackBar .progressBar").mousedown(function() {
        mouseDown = true;
    });
    $(".playbackBar .progressBar").mousemove(function(e) {
        if (mouseDown) {
            // Set time of song, depending on position of mouse
            timeFromOffset(e, this);
        }
    });
    $(".playbackBar .progressBar").mouseup(function(e) {
        timeFromOffset(e, this);
    });

    // This is for volumne
    $(".volumeBar .progressBar").mousedown(function() {
        mouseDown = true;
    });
    $(".volumeBar .progressBar").mousemove(function(e) {
        if (mouseDown) {
            // Set time of song, depending on position of mouse
            var pr = e.offsetX / $(this).width();
            if (pr >= 0 && pr <= 1) {
                audio.volume = pr;
            }
        }
    });
    $(".volumeBar .progressBar").mouseup(function(e) {
        var pr = e.offsetX / $(this).width();
        audio.volume = pr;
        if (pr >= 0 && pr <= 1) {
            audio.volume = pr;
        }
    });

    $(document).mouseup(function() {
        mouseDown = false;
    });
});

function timeFromOffset(mouse, progressBar) {
    var pr = (mouse.offsetX / $(progressBar).width()) * 100;
    var seconds = audio.duration * (pr / 100);
    setTime(seconds);
}

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1)); // random index from 0 to i
        // swap elements array[i] and array[j]
        // we use destructuring assignment syntax to achieve that
        [array[i], array[j]] = [array[j], array[i]];
    }
    // console.log('in shuffle function', array);
    return array;
}
