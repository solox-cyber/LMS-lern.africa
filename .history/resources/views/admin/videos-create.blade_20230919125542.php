@extends('layouts.admin.dash')

@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Course Syllabus Video Upload
                    </h1>
                    <!--end::Title-->


                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../index.html" class="text-muted text-hover-primary">
                                Home </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            Careers </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">

                    <!--begin::Secondary button-->
                    <!--end::Secondary button-->

                    <!--begin::Primary button-->
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">


            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">
                <!--begin::Careers main-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Content-->
                    <div class="card bg-body me-xl-12 mb-9 mb-xl-0">
                        <div class="card-body">
                            <!--begin::Blog-->
                            <div class="mb-11 ">



                            </div>
                            <!--end::Blog-->
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <!--begin::Form-->
                            <form action="{{ route('videos.store') }}" class="form mb-15" method="POST" id="kt_careers_form" enctype="multipart/form-data">
                                @csrf

                                <!--begin::Input group-->
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Course Name</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <select name="course_id" id="course_id" class="form-control form-control-solid">
                                            <option value=""></option>
                                            @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                            @endforeach
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->


                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Select a Syllabus Title</label>
                                        <!--end::Label-->

                                        <select name="syllabus_title_id" id="syllabus_title_id" class="form-control form-control-solid">
                                            <!-- Options will be populated dynamically using JavaScript -->
                                            <option value="">Select a course first</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->


                                </div>
                                <!--end::Input group-->


                                <!--begin::Input group-->
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Select a Course Sub Topic</label>
                                        <!--end::Label-->

                                        <select name="subtopic_id" id="course_subtopic_id" class="form-control form-control-solid">
                                            <!-- Options will be populated dynamically using JavaScript -->
                                            <option value="">Select a Syllabus Title first</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->


                                </div>
                                <!--end::Input group-->


                                <!-- Add this within your <form> element -->
                                <div class="row mb-5">
                                    <div class="col-md-12 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">Upload Video File</label>
                                        <input type="file" name="video" class="form-control-file">
                                    </div>
                                </div>

                                <div id="uploadStatus"></div>

                                <!--begin::Separator-->
                                <div class="separator mb-8"></div>
                                <!--end::Separator-->

                                <!--begin::Submit-->
                                <button type="submit" class="btn btn-primary">

                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">
                                        Upload Video</span>
                                    <!--end::Indicator label-->

                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">
                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                    <!--end::Indicator progress--> </button>
                                <!--end::Submit-->
                            </form>
                            <!--end::Form-->



                        </div>
                    </div>
                    <!--end::Content-->

                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px">




                    </div>
                    <!--end::Sidebar-->
                </div>
                <!--end::Careers main-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!-- Include jQuery or your preferred JavaScript library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
                    // Listen for the change event on the course selection dropdown
                    $('#course_id').on('change', function() {
                        // Get the selected course ID
                        var courseId = $(this).val();

                        // Send an AJAX request to fetch syllabus titles for the selected course
                        $.ajax({
                            url: '{{ route('
                            fetch.course ', ['
                            courseId ' => ': courseId ']) }}'.replace(':courseId', courseId),
                            type: 'GET',
                            success: function(data) {
                                // Clear and update the syllabus title selection dropdown
                                $('#syllabus_title_id').empty();

                                // Check if data is received and not empty
                                if (Object.keys(data).length > 0) {
                                    // Populate the dropdown with retrieved data
                                    $.each(data, function(key, value) {
                                        $('#syllabus_title_id').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                } else {
                                    // Handle the case when no syllabus titles are available for the selected course
                                    $('#syllabus_title_id').append('<option value="">No titles available</option>');
                                }
                            },
                            error: function() {
                                // Handle errors if the request fails
                                console.error('Failed to fetch syllabus titles.');
                            }
                        });
                    });


                    $('#syllabus_title_id').on('change', function() {
                        // Get the selected course ID
                        var courseId = $(this).val();

                        // Send an AJAX request to fetch syllabus titles for the selected course
                        $.ajax({
                            url: '{{ route('
                            fetch.subtitle ', ['
                            syllabusId ' => ': syllabusId ']) }}'.replace(':syllabusId', syllabusId),
                            type: 'GET',
                            success: function(data) {
                                // Clear and update the syllabus title selection dropdown
                                $('#course_subtopic_id').empty();

                                // Check if data is received and not empty
                                if (Object.keys(data).length > 0) {
                                    // Populate the dropdown with retrieved data
                                    $.each(data, function(key, value) {
                                        $('#course_subtopic_id').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                } else {
                                    // Handle the case when no syllabus titles are available for the selected course
                                    $('#course_subtopic_id').append('<option value="">No titles available</option>');
                                }
                            },
                            error: function() {
                                // Handle errors if the request fails
                                console.error('Failed to fetch course sub titles.');
                            }
                        });


                        

                    });


    </script>


    @endsection
