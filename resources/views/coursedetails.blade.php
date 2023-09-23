@php
use Torann\GeoIP\GeoIP;
use Torann\GeoIP\Services\IPApi;
use Stevebauman\Location\Facades\Location;
@endphp

@extends('layouts.dash')

@section('content')
<div class="row">
<div class="col-md-12">
<div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden mb-4 p-5">
<div class="card-body mb-lg-3 pb-0"><h2 class="fw-400 font-lg d-block">  <b>Course Details</b></h2></div>
                                <div class="card-body pb-0">
<h4 class="font-sm fw-600 text-grey-600 mb-3 pl-30 position-relative lh-24">
<div class="row">
<div class="col-md-5">Course Name</div>
<div class="col-md-7">{{$course->course_name}} </div>
</div>
</h4>

<h4 class="font-sm fw-600 text-grey-600 mb-3 pl-30 position-relative lh-24">
<div class="row">
<div class="col-md-5">About Course</div>
<div class="col-md-7">{!! $course->about_course !!} </div>
</div>
</h4>

<h4 class="font-sm fw-600 text-grey-600 mb-3 pl-30 position-relative lh-24">
<div class="row">
<div class="col-md-5">Course Category</div>
<div class="col-md-7">{!! $course->course_cat !!}</div>
</div>
</h4>

<h4 class="font-sm fw-600 text-grey-600 mb-3 pl-30 position-relative lh-24">
<div class="row">
<div class="col-md-5">Course Objectives</div>
<div class="col-md-7">{!! $course->course_obj !!}</div>
</div>
</h4>

<h4 class="font-sm fw-600 text-grey-600 mb-3 pl-30 position-relative lh-24">
<div class="row">
<div class="col-md-5">Tuition Fee</div>
<div class="col-md-7">@php
                                $ipAddress = '102.89.46.250';

                                            $location = Location::get($ipAddress);
                                            $countryCode = $location->countryCode;
                                            $rate = 1 / 777.58;

                                            if($countryCode === 'NG') {
                                            $pay = '₦' . number_format($course->tuition_fee, 2);
                                            } else {
                                            $pay = '$' . number_format($course->tuition_fee * $rate, 2);
                                            }
                                            @endphp
                                            {{$pay}}
                                        </div>
</div>
</h4>

<h4 class="font-sm fw-600 text-grey-600 mb-3 pl-30 position-relative lh-24">
<div class="row">
<div class="col-md-5">Course Syllabus</div>
<div class="col-md-7">{!!$course->course_syllabus !!}</div>
</div>
</h4>

<h4 class="font-sm fw-600 text-grey-600 mb-3 pl-30 position-relative lh-24">
<div class="row">
<div class="col-md-5">Instructor Name</div>
<div class="col-md-7">{{$course->instructor_name}}</div>
</div>
</h4>


<h4 class="font-sm fw-600 text-grey-600 mb-3 pl-30 position-relative lh-24">
<div class="row">
<div class="col-md-5">Instructor Bio</div>
<div class="col-md-7">{!! $course->instructor_bio !!}</div>
</div>
</h4>

<h4 class="font-sm fw-600 text-grey-600 mb-3 pl-30 position-relative lh-24">
<div class="row">
<div class="col-md-5">Start Date</div>
<div class="col-md-7">{{ date_format(date_create_from_format('Y-m-d', $course->start_date), 'jS \of F, Y')}}</div>
</div>
</h4>
<a href="{{ route('live.streamid', ['courseid' => $course->id]) }}" class="btn bg-current text-white">View videos</a>
                                </div>
</div>
</div>
    </div>

    @endsection
