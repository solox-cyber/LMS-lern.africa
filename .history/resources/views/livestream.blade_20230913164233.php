@extends('layouts.dash')

@section('content')

<div class="middle-sidebar-left">
    <div class="row">


        <div class="col-md-8">
        <div class="card d-block border-0 rounded-lg overflow-hidden mt-2">
    <h3 class="mb-0 p-4"><b>Course Content</b></h3>
    <div id="accordion" class="accordion mb-0">
        <div class="card shadow-xss mb-0">
            <div class="card-header bg-greylight theme-dark-bg" id="heading{{ $course->id }}">
                <h5 class="mb-0">
                    <button class="btn font-xsss fw-600 btn-link" data-toggle="collapse" data-target="#collapse{{ $course->id }}" aria-expanded="false" aria-controls="collapse{{ $course->id }}">
                        {{ $course->course_name }}
                    </button>
                </h5>
            </div>
            <div id="collapse{{ $course->id }}" class="collapse p-3" aria-labelledby="heading{{ $course->id }}" data-parent="#accordion">
                <div class="card-body">
                    <!-- Loop through syllabus titles for this course -->
                    @foreach ($course->syllabusTitles as $syllabusTitle)
                    <h6>{{ $syllabusTitle->title }}</h6>
                    <!-- Loop through subtitles for this syllabus title -->
                    @foreach ($syllabusTitle->subtitles as $subtitle)
                    <div class="card shadow-xss mb-0">
                        <div class="card-header bg-greylight theme-dark-bg" id="heading{{ $syllabusTitle->id }}-{{ $subtitle->id }}">
                            <h5 class="mb-0">
                                <button class="btn font-xsss fw-600 btn-link" data-toggle="collapse" data-target="#collapse{{ $syllabusTitle->id }}-{{ $subtitle->id }}" aria-expanded="false" aria-controls="collapse{{ $syllabusTitle->id }}-{{ $subtitle->id }}">
                                    {{ $subtitle->title }}
                                </button>
                            </h5>
                        </div>
                        <div id="collapse{{ $syllabusTitle->id }}-{{ $subtitle->id }}" class="collapse p-3" aria-labelledby="heading{{ $syllabusTitle->id }}-{{ $subtitle->id }}" data-parent="#accordion">
                            <div class="card-body">
                                <!-- Loop through videos for this subtitle -->
                                @foreach ($subtitle->videos as $video)
                                <div class="card-body d-flex p-2">
                                    <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">{{ $video->order }}</span>
                                    <span class="font-xssss fw-500 text-grey-500 ml-2">{{ $video->title }}</span>
                                    <span class="ml-auto font-xssss fw-500 text-grey-500">{{ $video->duration }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

        </div>

    </div>
</div>
@endsection
