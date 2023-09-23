@php
use Torann\GeoIP\GeoIP;
use Torann\GeoIP\Services\IPApi;
use Stevebauman\Location\Facades\Location;
@endphp

@extends('layouts.dash')

@section('content')
<div class="row">
    <div class="col-lg-12">
<a href="{{route('allCourses')}}" class="btn bg-current text-white">Add New Course</a>
    </div>
</div>
<br>
<div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">
    @foreach($courses as $course)

    <div class="item">
        <div class="card course-card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
            <div class="card-image w-100 mb-3">
                <a href="{{ route('live.streamid', ['courseid' => $course->id]) }}" class="video-bttn position-relative d-block">
                    @if ($course->profilePicture)
                    <img src="{{ asset('storage/' . str_replace('public/', '', $course->profilePicture->path)) }}" alt="image" class="w-100" alt="Course Logo">

                    @endif
                </a>
            </div>
            <div class="card-body pt-0">
                <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 bg-current d-inline-block text-white mr-1">{{$course->course_cat}}</span>
                <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right">
                    @php
                    $ipAddress = '102.89.46.250';
                    $location = Location::get($ipAddress);
                    $countryCode = $location->countryCode;
                    $currencySymbol = ($location->countryCode === 'NG') ? '₦' : '$';
                    $rate = 1 / 777.58;
                    if($countryCode === 'NG') {
                    $pay = number_format($course->tuition_fee, 2);
                    } else {
                    $pay = number_format($course->tuition_fee * $rate, 2);
                    }
                    @endphp

                    <span class="font-xsssss">{{$currencySymbol}}</span> {{$pay}}</span>
                <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="{{ route('live.streamid', ['courseid' => $course->id]) }}" class="text-dark text-grey-900">{{$course->course_name}}</a></h4>
                <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2"> 32 Lesson </h6>

            </div>
        </div>
    </div>

    @endforeach
    {{ $courses->links() }}
</div>

@endsection
