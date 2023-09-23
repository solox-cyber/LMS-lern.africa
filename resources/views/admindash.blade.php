@extends('layouts.admin.dash')

@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack ">



                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Default
                    </h1>
                    <!--end::Title-->


                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">
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
                            Dashboards </li>
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
            <div id="kt_app_content_container" class="app-container  container-fluid ">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

<!--begin::Chart widget 10-->
<div class="card card-flush h-xxl-100">
    <!--begin::Header-->
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold text-gray-800">Admin Dashboard</span>
			<!-- <span class="text-gray-400 mt-1 fw-semibold fs-6">3,567,457 tons</span> -->
		</h3>
        <!--end::Title-->


    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body d-flex flex-column justify-content-between pb-5 px-0">
        <!--begin::Nav-->
        <ul class="nav nav-pills nav-pills-custom mb-3 mx-9">
                            <!--begin::Item-->
                <li class="nav-item mb-3 me-3 me-lg-6">
                    <!--begin::Link-->
                    <a class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2
                        active" data-bs-toggle="pill"
                        href="{{route('userlist')}}">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <i class="ki-duotone ki-user fs-1 p-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Title-->
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1"> Users   </span>
                        <!--end::Title-->

                        <!--begin::Bullet-->
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                        <!--end::Bullet-->
                    </a>
                    <!--end::Link-->
                </li>
                <!--end::Item-->
                            <!--begin::Item-->
                <li class="nav-item mb-3 me-3 me-lg-6">
                    <!--begin::Link-->
                    <a class="nav-link btn btn-outline btn-flex btn-active-color-primary active flex-column overflow-hidden w-80px h-85px pt-5 pb-2
                        " data-bs-toggle="pill" id="kt_charts_widget_10_tab_2"
                        href="#kt_charts_widget_10_tab_content_2">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <i class="ki-duotone ki-user-square fs-1 p-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Title-->
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                            SalesRep                        </span>
                        <!--end::Title-->

                        <!--begin::Bullet-->
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                        <!--end::Bullet-->
                    </a>
                    <!--end::Link-->
                </li>
                <!--end::Item-->
                            <!--begin::Item-->
                <li class="nav-item mb-3 me-3 me-lg-6">
                    <!--begin::Link-->
                    <a class="nav-link btn btn-outline btn-flex btn-active-color-primary active flex-column overflow-hidden w-80px h-85px pt-5 pb-2
                        " data-bs-toggle="pill" id="kt_charts_widget_10_tab_3"
                        href="#kt_charts_widget_10_tab_content_3">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <i class="ki-duotone ki-phone fs-1 p-0"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Title-->
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                            Contacts                        </span>
                        <!--end::Title-->

                        <!--begin::Bullet-->
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                        <!--end::Bullet-->
                    </a>
                    <!--end::Link-->
                </li>
                <!--end::Item-->
                            <!--begin::Item-->
                <li class="nav-item mb-3 me-3 me-lg-6">
                    <!--begin::Link-->
                    <a class="nav-link btn btn-outline btn-flex active btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2
                        " data-bs-toggle="pill" id="kt_charts_widget_10_tab_4"
                        href="#kt_charts_widget_10_tab_content_4">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <i class="ki-duotone ki-book fs-1 p-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Title-->
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                            Courses                        </span>
                        <!--end::Title-->

                        <!--begin::Bullet-->
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                        <!--end::Bullet-->
                    </a>
                    <!--end::Link-->
                </li>
                <!--end::Item-->

        </ul>
        <!--end::Nav-->

        <!--begin::Tab Content-->
        <div class="tab-content ps-4 pe-6">
                            <!--begin::Tap pane-->
                <div class="tab-pane fade active show" id="kt_charts_widget_10_tab_content_1">

                <canvas id="chartWidget1" class="min-h-auto" style="height: 270px"></canvas>

                <!-- Display the total number of users -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Get the chart canvas element
    var ctx = document.getElementById('chartWidget1').getContext('2d');

    // Define the chart data
    var chartData = {
        labels: ['Users', 'Contacts', 'Sales Reps'],
        datasets: [{
            data: [
                {{ $totalUsers }},
                {{ $totalContacts }},
                {{ $totalSalesReps }}
            ],
            backgroundColor: [
                'rgba(0, 123, 255, 0.5)', // Customize the colors as needed
                'rgba(255, 0, 0, 0.5)',
                'rgba(0, 255, 0, 0.5)'
            ],
            borderColor: [
                'rgba(0, 123, 255, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(0, 255, 0, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Set the chart options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Create and render the chart
    var chart = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: chartOptions
    });
</script>


                </div>
                <!--end::Tap pane-->
                            <!--begin::Tap pane-->
                <div class="tab-pane fade " id="kt_charts_widget_10_tab_content_2">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_10_chart_2" class="min-h-auto" style="height: 270px"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Tap pane-->
                            <!--begin::Tap pane-->
                <div class="tab-pane fade " id="kt_charts_widget_10_tab_content_3">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_10_chart_3" class="min-h-auto" style="height: 270px"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Tap pane-->
                            <!--begin::Tap pane-->
                <div class="tab-pane fade " id="kt_charts_widget_10_tab_content_4">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_10_chart_4" class="min-h-auto" style="height: 270px"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Tap pane-->

        </div>
        <!--end::Tab Content-->
    </div>
    <!--end: Card Body-->
</div>
<!--end::Chart widget 10-->




                </div>
                <!--end::Row-->


            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->



    @endsection
