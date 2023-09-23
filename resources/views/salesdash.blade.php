@extends('layouts.admin.salesdash')

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


                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Chart widget 10-->
<div class="card card-flush h-xxl-100">
    <!--begin::Header-->
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold text-gray-800">Salesrep Dashboard</span>
			<!-- <span class="text-gray-400 mt-1 fw-semibold fs-6">3,567,457 tons</span> -->
		</h3>
        <!--end::Title-->


    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body d-flex flex-column justify-content-between pb-5 px-0">


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
        labels: ['Assigned Contacts', 'Converted Contacts'],
        datasets: [{
            data: [
                {{ $totalContacts }},
                {{ $totalUsers }},

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

                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">

<!--begin::Card widget 17-->
<div class="card card-flush h-md-50 mb-5 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Currency-->
                <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">₦</span>
                <!--end::Currency-->

                <!--begin::Amount-->

                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{$WalletAmount}}</span>

                <!--end::Amount-->

                <!--begin::Badge-->
                <span class="badge badge-light-success fs-base">
                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>

                </span>
                <!--end::Badge-->


            </div>

            <!--end::Info-->

            <!--begin::Subtitle-->
            <span class="text-gray-400 pt-1 fw-semibold fs-6">Current Earnings</span>
            <!--end::Subtitle-->
        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->

    <!--begin::Card body-->
    <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
        <!--begin::Chart-->
        <div class="d-flex flex-center me-5 pt-2">
            <div id="kt_card_widget_17_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70" data-kt-line="11">
            </div>
        </div>
        <!--end::Chart-->


        <!--begin::Labels-->
        <div class="d-flex flex-column content-justify-center flex-row-fluid">
            <!--begin::Label-->
            <div class="d-flex fw-semibold align-items-center">
                <!--begin::Bullet-->
                <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>
                <!--end::Bullet-->

                <!--begin::Label-->
                <div class="text-gray-500 flex-grow-1 me-4">Total Number of Registered Contacts </div>
                <!--end::Label-->

                <!--begin::Stats-->
                <div class="fw-bolder text-gray-700 text-xxl-end">{{$Contacts}}</div>
                <!--end::Stats-->
            </div>
            <!--end::Label-->


 <!--begin::Label-->
 <div class="d-flex fw-semibold align-items-center">
                <!--begin::Bullet-->
                <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>
                <!--end::Bullet-->

                <!--begin::Label-->
                <div class="text-gray-500 flex-grow-1 me-4">Total Number of Assigned Contacts </div>
                <!--end::Label-->

                <!--begin::Stats-->
                <div class="fw-bolder text-gray-700 text-xxl-end">{{$totalContacts}}</div>
                <!--end::Stats-->
            </div>
            <!--end::Label-->

            <!--begin::Label-->
            <div class="d-flex fw-semibold align-items-center">
                <!--begin::Bullet-->
                <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
                <!--end::Bullet-->

                <!--begin::Label-->
                <div class="text-gray-500 flex-grow-1 me-4">Number of Converted Contacts/Users</div>
                <!--end::Label-->

                <!--begin::Stats-->
                <div class="fw-bolder text-gray-700 text-xxl-end">{{$totalUsers}}</div>

                <!--end::Stats-->
            </div>
            <!--end::Label-->

        </div>
        <!--end::Labels-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card widget 17-->




</div>
<!--end::Col-->

                </div>
                <!--end::Row-->


            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->



    @endsection
