@extends('layouts.dash')

@section('content')
<div class="middle-sidebar-left">
    <div class="row">
    <div class="col-md-12 col-xl-7">
    <div class="card border-0 mb-0 rounded-lg overflow-hidden live-stream bg-image-center bg-image-cover">
        <div class="card-body d-flex justify-content-start p-2 position-absolute top-0 w-100">
            <!-- Video Player with Increased Height -->
            <div class="video-container">
    <video id="videoPlayer" preload="metadata">
        <source src="" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

            <div class="video-controls">
            <button id="playPauseBtn" class="control-button"><i class="fas fa-play"></i></button>
                <button id="forwardBtn" class="control-button"><i class="fas fa-forward"></i></button>
                <div class="speed-control">
                    <span class="speed-label">Speed:</span>
                    <button id="speed1xBtn" class="speed-button btn btn-primary">1x</button>
                    <button id="speed2xBtn" class="speed-button btn btn-primary">2x</button>
                    <button id="speed3xBtn" class="speed-button btn btn-primary">3x</button>
                </div>
                <input id="volumeControl" class="volume-control" type="range" min="0" max="1" step="0.1" value="1">
                <span id="currentTime" class="time-label">0:00</span>
                <progress id="progressBar" class="progress-bar" value="0" max="100"></progress>
                <span id="duration" class="time-label">0:00</span>
            </div>
        </div>
    </div>
</div>


<style>
    /* Style for the video player container */
    .card-body {
        position: relative;
    }

    /* Style for the video player */
    .video-container {
    max-width: 100%;
    height: 600px; /* Set your desired fixed height here */
    overflow: hidden;
}

#videoPlayer {
    width: 100%;
    height: 100%;
    background-color: #000;
}


    /* Default styles for the video controls */
.video-controls {
    position: absolute;
    bottom: 10px;
    left: 0.6;
    width: 97%;
    display: flex;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 9px;
}

/* Default styles for the control buttons */
.control-button {
    background-color: transparent;
    border: none;
    color: #fff;
    cursor: pointer;
    margin-right: 10px;
    font-size: 16px;
}

/* Default styles for the volume control input */
.volume-control {
    width: 80px;
}

/* Default styles for the time labels */
.time-label {
    color: #fff;
    margin-right: 10px;
    font-size: 14px;
}

/* Default styles for the progress bar */
.progress-bar {
    flex: 1;
    height: 6px;
    border: none;
    background-color: #666;
}

/* Default styles for the progress bar value */
.progress-bar::-webkit-progress-value {
    background-color: #00a0e4;
}

/* Responsive styles for smaller screens (adjust as needed) */
@media (max-width: 768px) {
    .video-controls {
        bottom: 0;
        padding: 5px;
    }

    .control-button {
        font-size: 14px;
        margin-right: 5px;
    }

    .volume-control {
        width: 60px;
    }

    .time-label {
        font-size: 12px;
    }
}

</style>


        <div class="col-xl-5 col-xxl-4">
            <div class="card d-block border-0 rounded-lg overflow-hidden mt-2">
                <h3 class="mb-0 p-4"><b>Course Content</b></h3>
                <div id="accordion" class="accordion mb-0">
                    <!-- Loop through syllabus titles for all courses -->
                    @foreach ($course->syllabusTitles as $syllabusTitle)
                    <div class="card shadow-xss mb-0">
                        <div class="card-header bg-greylight theme-dark-bg" id="heading{{ $syllabusTitle->id }}">
                            <h5 class="mb-0">
                                <button class="btn font-xsss fw-600 btn-link" data-toggle="collapse" data-target="#collapseSyllabus{{ $syllabusTitle->id }}" aria-expanded="false" aria-controls="collapseSyllabus{{ $syllabusTitle->id }}">
                                    {{ $syllabusTitle->title }}
                                </button>
                            </h5>
                        </div>
                        <div id="collapseSyllabus{{ $syllabusTitle->id }}" class="collapse p-3" aria-labelledby="heading{{ $syllabusTitle->id }}" data-parent="#accordion">
                            <div class="card-body">
                                <!-- Loop through subtitles for this syllabus title -->
                                @foreach ($syllabusTitle->coursesubtopic as $subtitle)
                                <div class="card shadow-xss mb-0">
                                    <div class="card-header bg-greylight theme-dark-bg" id="headingSubtitle{{ $syllabusTitle->id }}-{{ $subtitle->id }}">
                                        <h5 class="mb-0">
                                            <button class="btn font-xsss fw-600 btn-link" data-toggle="collapse" data-target="#collapseSubtitle{{ $syllabusTitle->id }}-{{ $subtitle->id }}" aria-expanded="false" aria-controls="collapseSubtitle{{ $syllabusTitle->id }}-{{ $subtitle->id }}">
                                                {{ $subtitle->title }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSubtitle{{ $syllabusTitle->id }}-{{ $subtitle->id }}" class="collapse p-3" aria-labelledby="headingSubtitle{{ $syllabusTitle->id }}-{{ $subtitle->id }}" data-parent="#collapseSyllabus{{ $syllabusTitle->id }}">
                                        <div class="card-body">
                                            <!-- Loop through videos for this subtitle -->

                                            @php
                                            $count = 1; // Initialize the count outside the loop
                                            @endphp

                                            @foreach ($subtitle->videos as $video)
                                            <div class="card-body d-flex p-2">
    <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">{{ $count }}</span>
    <!-- Add a data attribute with the video file path to the video title -->
    <span class="font-xssss fw-500 text-grey-500 ml-2 video-title" data-video-path="{{ asset('storage/' . substr($video->file_path, 7)) }}">{{ $video->title }}</span>
    <!-- Add a unique identifier for each video duration element -->
    <span class="ml-auto font-xssss fw-500 text-grey-500 video-duration" id="video-duration-{{ $count }}">44</span>
</div>

                                            @php
                                            $count++; // Increment the count for the next video
                                            @endphp
                                            @endforeach



                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
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
