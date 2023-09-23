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
