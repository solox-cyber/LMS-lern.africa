@extends('layouts.dash')

@section('content')
<div class="middle-sidebar-left">
    <div class="row">
        <div class="col-md-7">
            <div class="card border-0 mb-0 rounded-lg overflow-hidden live-stream bg-image-center bg-image-cover">
                <div class="card-body d-flex justify-content-start p-2 position-absolute top-0 w-100">
                    <!-- Video Player with Increased Height -->
                    <video id="videoPlayer" controls width="100%" height="400">
                        <source src="" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            <div class="player shadow-none">
                    <video id='videoPlayer' src='' playsinline></video>
                    <div class='play-btn-big'></div>
                    <div class='controls'>
                        <div class="time"><span class="time-current"></span><span class="time-total"></span></div>
                        <div class='progress'>
                            <div class='progress-filled'></div>
                        </div>
                        <div class='controls-main'>
                            <div class='controls-left'>
                                <div class='volume'>
                                    <div class='volume-btn loud mt-1'>
                                        <i class="feather-volume-1 font-xl text-white"></i>
                                    </div>
                                    <div class='volume-slider'>
                                        <div class='volume-filled'></div>
                                    </div>
                                </div>
                            </div>
                            <div class='play-btn paused'></div>
                            <div class="controls-right">
                                <div class='speed'>
                                    <ul class='speed-list'>
                                        <li class='speed-item' data-speed='0.5'>0.5x</li>
                                        <li class='speed-item' data-speed='0.75'>0.75x</li>
                                        <li class='speed-item active' data-speed='1'>1x</li>
                                        <li class='speed-item' data-speed='1.5'>1.5x</li>
                                        <li class='speed-item' data-speed='2'>2x</li>
                                    </ul>
                                </div>
                                <div class='fullscreen'>
                                    <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0V-1.5H-1.5V0H0ZM0 18H-1.5V19.5H0V18ZM26 18V19.5H27.5V18H26ZM26 0H27.5V-1.5H26V0ZM1.5 6.54545V0H-1.5V6.54545H1.5ZM0 1.5H10.1111V-1.5H0V1.5ZM-1.5 11.4545V18H1.5V11.4545H-1.5ZM0 19.5H10.1111V16.5H0V19.5ZM24.5 11.4545V18H27.5V11.4545H24.5ZM26 16.5H15.8889V19.5H26V16.5ZM27.5 6.54545V0H24.5V6.54545H27.5ZM26 -1.5H15.8889V1.5H26V-1.5Z" transform="translate(2 2)" fill="white" />
                                    </svg>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>
        </div>

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

            // Load and play the video
            videoPlayer.load();
            videoPlayer.play();

            // Calculate the video duration and update the displayed duration
            videoPlayer.addEventListener('loadedmetadata', function() {
                // Calculate the duration in seconds
                const durationInSeconds = videoPlayer.duration;

                // Convert seconds to minutes and seconds format
                const minutes = Math.floor(durationInSeconds / 60);
                const seconds = Math.floor(durationInSeconds % 60);

                // Get the unique identifier for the video duration element
                const videoDurationId = this.parentElement.querySelector('.video-duration').id;

                // Update the video duration element with the calculated duration
                document.getElementById(videoDurationId).textContent = `${minutes}:${seconds}`;
            });
        });
    });
</script>

@endsection
