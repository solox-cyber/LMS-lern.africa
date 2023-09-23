@extends('layouts.dash')

@section('content')

<div class="middle-sidebar-left">
    <div class="row">

    <div class="col-md-7">
    <div class="card border-0 mb-0 rounded-lg overflow-hidden live-stream bg-image-center bg-image-cover" style="background-image: url(images/video-bg.jpg);">
        <div class="card-body d-flex justify-content-start p-2 position-absolute top-0 w-100 bg-gradiant-top">
            <!-- Video Player -->
            <video id="videoPlayer" controls width="100%">
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <!-- Video Controls -->
        <div class="card-body text-center p-2 position-absolute w-100 bottom-0 bg-gradiant-bottom">
            <a href="#" class="btn-round-xl d-md-inline-block d-none bg-blur m-3 mr-0 z-index-1"><i class="feather-grid text-white font-md"></i></a>
            <a href="#" class="btn-round-xl d-md-inline-block d-none bg-blur m-3 z-index-1"><i class="feather-mic-off text-white font-md"></i></a>
            <a href="#" class="btn-round-xxl bg-danger z-index-1"><i class="feather-phone-off text-white font-md"></i></a>
            <a href="#" class="btn-round-xl d-md-inline-block d-none bg-blur m-3 z-index-1"><i class="ti-video-camera text-white font-md"></i></a>
            <a href="#" class="btn-round-xl d-md-inline-block d-none bg-blur m-3 ml-0 z-index-1"><i class="ti-settings text-white font-md"></i></a>
            <span class="p-2 bg-blur z-index-1 text-white fw-700 font-xssss rounded-lg right-15 position-absolute mb-4 bottom-0">44:00</span>
        </div>
    </div>
    <div class="card d-block border-0 rounded-lg overflow-hidden dark-bg-transparent bg-transparent mt-4 pb-4">
        

        <span class="font-xssss fw-700 text-grey-900 d-inline-block ml-0 text-dark"><b>Cassica Vanni</b></span>
        <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey"></span>
        <span class="font-xssss fw-600 text-grey-500 d-inline-block ml-1">Developer</span>
        <span class="font-xssss fw-600 text-grey-500 d-inline-block ml-1">Design</span>
        <span class="font-xssss fw-600 text-grey-500 d-inline-block ml-1">Developer</span>
        <span class="font-xssss fw-600 text-grey-500 d-inline-block ml-1">HTML5</span>
        <span class="font-xssss fw-600 text-grey-500 d-inline-block ml-1">Jquery</span>
        <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey"></span>
        <span class="font-xssss fw-700 text-primary d-inline-block ml-0 "><b>Follow Author</b></span>
    </div>
    <div class="card d-block border-0 bg-transparent dark-bg-transparent">
        <ul class="memberlist mt-0 mb-2 ml-0">
            <li class="w20"><a href="#"><img src="images/user-6.png" alt="user" class="w40 d-inline-block"></a></li>
            <li class="w20"><a href="#"><img src="images/user-7.png" alt="user" class="w40 d-inline-block"></a></li>
            <li class="w20"><a href="#"><img src="images/user-8.png" alt="user" class="w40 d-inline-block"></a></li>
            <li class="w20"><a href="#"><img src="images/user-3.png" alt="user" class="w40 d-inline-block"></a></li>
            <li class="w20"><a href="#"><img src="images/user-5.png" alt="user" class="w40 d-inline-block"></a></li>
            <li class="w20"><a href="#"><img src="images/user-4.png" alt="user" class="w40 d-inline-block"></a></li>

            <li class="pl-4 w-auto"><a href="#" class="fw-500 text-grey-500 font-xssss">Member already downloaded</a></li>
        </ul>
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
                                            @foreach ($subtitle->videos as $video)
                                            @php
                                            $count = 1;
                                            @endphp


                                            <div class="card-body d-flex p-2">
                                                <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">{{ $count }}</span>
                                                <span class="font-xssss fw-500 text-grey-500 ml-2">{{ $video->title }}</span>
                                                <span class="ml-auto font-xssss fw-500 text-grey-500">44</span>
                                            </div>
                                            @php
                                    $count++;
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
@endsection
