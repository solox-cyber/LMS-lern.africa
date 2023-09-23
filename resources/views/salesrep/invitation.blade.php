@extends('layouts.admin.salesdash')

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
                        Contact List
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
                            Contact Management </li>
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

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">


            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-2 mr-4">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i>
                                <form action="{{ route('searchsalesContact') }}" method="GET">
                                    <input type="text" name="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Contact" />
                                </form>
                            </div>
                            <!-- end::Search -->
                            <!-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif -->

                            <form action="{{ route('contacts.assign') }}" method="POST">
                                @csrf


                        </div>
                        <!--end::Card title-->



                        <!--begin::Card body-->
                        <div class="card-body py-4">

                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <thead>


                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">

                                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" />

                                            </div>
                                        </th>

                                        <th class="min-w-125px">Name</th>
                                        <th class="min-w-125px">Nickname</th>
                                        <th class="min-w-125px">Phone Number </th>
                                        <th class="min-w-125px">Upline </th>
                                        <th class="min-w-125px">Date Created</th>
                                        <th class="text-end min-w-100px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach ($contacts as $contact)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" name="contact_ids[]" type="checkbox" value="{{ $contact->id }}" />
                                            </div>
                                        </td>


                                        <td>
                                            {{ $contact->name }}
                                        </td>
                                        <td>
                                            {{ $contact->nickname }}
                                        </td>
                                        <td>
                                            <span class="badge badge-success" style="color:#fff!important"> <a href="tel:{{ $contact->phone }}"><i class="fa fa-phone"></i></a></span>
                                            {{ $contact->phone }}
                                        </td>
                                        <td>
                                            @if ($contact->user)
                                            {{ $contact->user->name }}
                                            @else
                                            N/A
                                            @endif
                                        </td>


                                        <td>
                                            {{ date('d M Y, h:i a', strtotime($contact->created_at)) }}
                                        </td>

                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('salescontact.show', ['id' => $contact->id]) }}" class="menu-link px-3">
                                                        View
                                                    </a>

                                                </div>
                                                <!--begin::Menu item-->
                                                <!-- <div class="menu-item px-3">
                                                    <a href="{{ route('send.contacts.email', ['sales_id' => Auth::id(), 'contact_id' => $contact->id]) }}" class="menu-link px-3">
                                                        Referral Code
                                                    </a>
                                                </div> -->
                                                <!--end::Menu item-->

                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <!-- <div class="menu-item px-3">

                                                    <form action="{{ route('contact.destroy', ['id' => $contact->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="menu-link px-3" style="background-color: transparent; border-color: transparent;">
                                                            Delete
                                                        </button>
                                                    </form>

                                                </div> -->
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>

                                    </tr>



                                    @endforeach
                                </tbody>
                            </table>
                            <!--end::Table-->
                            </form>
                            @push('styles')
                            <link rel="stylesheet" href="{{ asset('css/custom-pagination.css') }}">
                            @endpush


                            {{ $contacts->links() }}
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        @endsection
