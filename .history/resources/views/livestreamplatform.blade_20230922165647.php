@extends('layouts.dash')

@section('content')
<div class="middle-sidebar-left">
    <div class="row">







    </div>
</div>

<!-- JavaScript to handle video title clicks -->
<script>
    // Get the video player element
    const videoPlayer = document.getElementById('videoPlayer');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const forwardBtn = document.getElementById('forwardBtn');
    const speed1xBtn = document.getElementById('speed1xBtn');
    const speed2xBtn = document.getElementById('speed2xBtn');
    const speed3xBtn = document.getElementById('speed3xBtn');
    const volumeControl = document.getElementById('volumeControl');
    const currentTime = document.getElementById('currentTime');
    const progressBar = document.getElementById('progressBar');
    const durationLabel = document.getElementById('duration');
    const videoControls = document.querySelector('.video-controls');
    const speedButtons = document.querySelectorAll('.speed-button');

    let isPlaying = false;
    let playbackRate = 1;

    // Add click event listeners to video titles
    const videoTitles = document.querySelectorAll('.video-title');
    videoTitles.forEach(videoTitle => {
        videoTitle.addEventListener('click', function() {
            // Get the video file path from the data attribute
            const videoPath = this.getAttribute('data-video-path');

            // Log the videoPath to the browser's console
            console.log('Video file path:', videoPath);

            // Set the video player's src attribute to the selected video file path
            videoPlayer.src = videoPath;

            // Load the video
            videoPlayer.load();
            isPlaying = false;

            // Calculate the video duration and update the displayed duration
            videoPlayer.addEventListener('loadedmetadata', function() {
                // Calculate the duration in seconds
                const durationInSeconds = videoPlayer.duration;

                // Convert seconds to minutes and seconds format
                const minutes = Math.floor(durationInSeconds / 60);
                const seconds = Math.floor(durationInSeconds % 60);

                // Update the duration label
                durationLabel.textContent = `${minutes}:${seconds}`;
            });
        });
    });

    // Play/Pause button click event
    // Play/Pause button click event
    playPauseBtn.addEventListener('click', function() {
        if (isPlaying) {
            videoPlayer.pause();
            playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        } else {
            videoPlayer.play();
            playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
        }
        isPlaying = !isPlaying;
    });


    // Forward button click event (skip 10 seconds)
    forwardBtn.addEventListener('click', function() {
        videoPlayer.currentTime += 10;
    });

    // Speed buttons click events
    speedButtons.forEach(speedButton => {
        speedButton.addEventListener('click', function() {
            playbackRate = parseFloat(this.textContent);
            videoPlayer.playbackRate = playbackRate;
        });
    });

    // Volume control change event
    volumeControl.addEventListener('input', function() {
        videoPlayer.volume = volumeControl.value;
    });

    // Update current time and progress bar while video is playing
    videoPlayer.addEventListener('timeupdate', function() {
        const currentTimeInSeconds = videoPlayer.currentTime;
        const durationInSeconds = videoPlayer.duration;

        const currentMinutes = Math.floor(currentTimeInSeconds / 60);
        const currentSeconds = Math.floor(currentTimeInSeconds % 60);

        currentTime.textContent = `${currentMinutes}:${currentSeconds}`;

        const progress = (currentTimeInSeconds / durationInSeconds) * 100;
        progressBar.value = progress;
    });
</script>


@endsection
