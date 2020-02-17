<footer id="nowPlayingBarContainer">
  <div id="nowPlayingBar">
    <div id="nowPlayingBarLeft"> 
      <div class="content">
        
        <span class="albumLink">
          <img src="https://images.hdqwalls.com/wallpapers/abstract-colorful-texture-square-7f.jpg" alt=""
            class="albumArtWork">
        </span>
        
        <div class="trackInfo">
          <span class="trackName h5">Alone</span>
          <span class="artistName text-muted">Alon Walker</span>
        </div>
      
      </div>
    </div>

    <div id="nowPlayingBarCenter">
      <!-- Content is plaing line which is bottom of container -->
      <div class="content playerControls">

        <div class="buttons">
          <!-- Shuffle class use in javascript -->
          <button class="controlButton shuffle" title="Shuffle">
            <img src="./assets/img/icons/shuffle.png" alt="Shuffle">
          </button>

          <button class="controlButton previous" title="Previous">
            <img src="./assets/img/icons/previous.png" alt="Previous">
          </button>

          <button class="controlButton play" title="Play">
            <img src="./assets/img/icons/play.png" alt="Play">
          </button>

          <button class="controlButton pause" title="Pause" style="display: none;">
            <img src="./assets/img/icons/pause.png" alt="Pause">
          </button>

          <button class="controlButton next" title="next">
            <img src="./assets/img/icons/next.png" alt="Next">
          </button>

          <button class="controlButton repeat" title="Repeat">
            <img src="./assets/img/icons/repeat.png" alt="Repeat">
          </button>
        </div>

        <div class="playbackBar">
          <span class="progressTime current">0.00</span>

          <div class="progressBar">
            <div class="progressBarbg">
              <!-- This is for prograss bar which indicate by color #404040 -->
              <div class="progress">
                <!-- This for song  progress which is indicate by color #e0e0e0 -->
              </div>
            </div>
          </div>

          <span class="progressTime remaning">0.00</span>
        </div>

      </div>
    </div>

    <div id="nowPlayingBarRight">
      <div class="volumeBar">
        
        <button class="controlButton volume" title="Volume">
          <img src="./assets/img/icons/volume.png" alt="Volume">
        </button>
    
        <div class="progressBar">
          <div class="progressBarbg">
            <!-- This is for prograss bar which indicate by color #404040 -->
            <div class="progress">
              <!-- This for song  progress which is indicate by color #e0e0e0 -->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</footer>