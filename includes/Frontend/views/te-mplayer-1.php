<div class="audio-player">
        <div class="player-controls">
            <div class="wraper">
                <button id="play-pause-btn">
                    <span id="play-icon"><i class="fa-solid fa-circle-play fa-2xl" style="color: #093e61;"></i></span>
                    <span id="pause-icon"><i class="fa-solid fa-circle-pause fa-2xl" style="color: #093e61;"></i></span>
                </button>
                <div class="progress-bar-container">
                    <div class="progress-bar" id="progress-bar"></div>
                </div>
            </div>
            <div class="sp-text">
                <span id="audioFileName" style="color:#093e61;">TechyPark.mp3</span>
            </div>
            <div class="toggle-labels">
                <label style="color:#093e61; font-size:18px"> Before Enhancing</label>
                <label class="toggle-label">
                    <input type="checkbox" id="toggle-btn" />
                    <span class="toggle-slider"></span>
                </label>
                <label style="color:#093e61; font-size:18px"> After Enhancing</label>
            </div>
        </div>
        <audio id="audio">
            <source src="<?php echo $before_audio; ?>" type="audio/mpeg" />
            <source src="<?php echo $after_audio; ?>" type="audio/wav" />
        </audio>
    </div>