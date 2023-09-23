@php
use Torann\GeoIP\GeoIP;
use Torann\GeoIP\Services\IPApi;
use Stevebauman\Location\Facades\Location;
@endphp

@extends('layouts.dash')

@section('content')

<div class="row">
    @foreach ($courses as $course)
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
        <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 course-card">
            <div class="card-image w-100 mb-3">
                <a href="{{ route('course.details', ['id' => $course->id]) }}" class="video-bttn position-relative d-block">

                    @if ($course->profilePicture)
                    <img src="{{ asset('storage/' . str_replace('public/', '', $course->profilePicture->path)) }}" alt="image" class="w-100" alt="Course Logo">
                    @endif

                </a>
            </div>
            <div class="card-body pt-0">
                <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-danger d-inline-block text-danger mr-1">{{$course->course_cat}}</span>
                <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right">
                    @php
                    $ipAddress = '102.89.46.250';

                    $location = Location::get($ipAddress);
                    $countryCode = $location->countryCode;
                    $rate = 1 / 777.58;
                    $currencySymbol = ($location->countryCode === 'NG') ? 'NGN' : 'USD';
                    if($countryCode === 'NG') {
                    $pay = number_format($course->tuition_fee, 2);
                    } else {
                    $pay = number_format($course->tuition_fee * $rate, 2);
                    }
                    @endphp
                    <span class="font-xsssss">{{$currencySymbol}} </span>
                    {{$pay}}</span>
                <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="{{ route('course.details', ['id' => $course->id]) }}" class="text-dark text-grey-900">{{$course->course_name}}</a></h4>
                <!-- <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2"> 23 Lesson </h6> -->
                <a href="#" class="btn btn-danger">Enroll now</a>
                <!--end::Button-->
                <!--begin::Button-->
                <a href="{{ route('course.details', ['id' => $course->id]) }}" class="btn btn-primary">Details</a>
                <!--end::Button-->
            </div>
        </div>
    </div>

    @endforeach
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
    {{ $courses->links() }}
    </div>
</div>
@endsection
