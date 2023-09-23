@extends('layouts.dash')

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
                        Getting Started
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
                            Contacts </li>
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
                <!--begin::Contacts App- Getting Started-->


                @include('contacts_methods.contactgroup')

                @include('contacts_methods.search')
                <!--begin::Content-->
                <div class="col-xl-5">

                    <!--begin::Card-->
                    <div class="card card-flush h-lg-100" id="kt_contacts_main">
                        <!--begin::Card body-->
                        <div class="card-body p-0">
                            <!--begin::Wrapper-->
                            <div class="card-px text-center py-20 my-10">
                                <!--begin::Title-->
                                <h2 class="fs-2x fw-bold mb-10">Welcome to the Contacts App</h2>
                                <!--end::Title-->

                                <!--begin::Description-->
                                <p class="text-gray-400 fs-4 fw-semibold mb-10">
                                    It's time to expand our contacts.<br />
                                    Kickstart your contacts growth by adding a your next contact.
                                </p>
                                <!--end::Description-->

                                <!--begin::Action-->
                                <a href="{{route('add_contact')}}" class="btn btn-primary">Add New Contact</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Illustration-->
                            <div class="text-center px-4">
                                <img class="mw-100 mh-300px" alt="" src="../../assets/media/illustrations/sketchy-1/5.png" />
                            </div>
                            <!--end::Illustration-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                </div>
                <!--end::Content-->
            </div>
            <!--end::Contacts App- Getting Started-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
<!--end::Content wrapper-->
@endsection
