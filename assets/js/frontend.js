document.addEventListener("DOMContentLoaded", function () {
    const audioPlayer = document.getElementById("audio");
    const playPauseBtn = document.getElementById("play-pause-btn");
    const toggleBtn = document.getElementById("toggle-btn");
    const progressBar = document.getElementById("progress-bar");
    const audioFileNameElement = document.getElementById("audioFileName");

    // Get dynamic URLs from localized script
    const beforeAudioUrl = te_audio_urls.beforeAudio;
    const afterAudioUrl = te_audio_urls.afterAudio;

    let isPlaying = false;
    let track1Duration = 0;

    // Set initial audio source
    audioPlayer.src = beforeAudioUrl;
    audioFileNameElement.textContent = "Before Enhance.mp3";

    audioPlayer.addEventListener("loadedmetadata", function () {
        track1Duration = audioPlayer.duration;
    });

    playPauseBtn.addEventListener("click", function () {
        if (isPlaying) {
            pauseAudio();
        } else {
            playAudio();
        }
    });

    toggleBtn.addEventListener("change", function () {
        const currentTime = audioPlayer.currentTime;
        if (toggleBtn.checked) {
            audioPlayer.src = afterAudioUrl;  
            audioFileNameElement.textContent = "After Enhance.wav"; 
        } else {
            audioPlayer.src = beforeAudioUrl;  
            audioFileNameElement.textContent = "Before Enhance.mp3";
        }
        audioPlayer.currentTime = currentTime;
        if (isPlaying) {
            playAudio();
        }
    });

    audioPlayer.addEventListener("timeupdate", function () {
        updateProgressBar();
    });

    audioPlayer.addEventListener("ended", function () {
        isPlaying = false;
        playPauseBtn.innerHTML = '<i class="fa-solid fa-circle-play fa-2xl" style="color: #0b2323;border:0px transparent;"></i>';
        progressBar.style.width = "0";
    });

    function playAudio() {
        audioPlayer.play();
        isPlaying = true;
        playPauseBtn.innerHTML = '<i class="fa-solid fa-circle-pause fa-2xl" style="color: #0b2323;border:0px transparent;"></i>';
    }

    function pauseAudio() {
        audioPlayer.pause();
        isPlaying = false;
        playPauseBtn.innerHTML = '<i class="fa-solid fa-circle-play fa-2xl" style="color: #0b2323;border:0px transparent;"></i>';
    }

    function updateProgressBar() {
        const currentTime = audioPlayer.currentTime;
        const progress = (currentTime / track1Duration) * 100;
        progressBar.style.width = `${progress}%`;
    }
});
