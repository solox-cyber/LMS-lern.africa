@extends('layouts.admin.salesdash')

@section('content')



@include('setting_methods.salesrep.menuhead')
@include('setting_methods.salesrep.navitems')

<!--begin::Basic info-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold mr-3 ">Pay Out Details</h3>
            <!--begin::Badge-->
            <span class="badge badge-light-success fs-base ml-5">

                Current Balance: ₦ {{ number_format($walletAmount, 2, '.', ',') }}
            </span>
            <!--end::Badge-->
        </div>
        <!--end::Card title-->

    </div>
    <!--begin::Card header-->

    <!--begin::Content-->
    <div class="collapse show">
        <!--begin::Form-->
        <form action="{{ route('salespayment.payout') }}" method="POST" enctype="multipart/form-data" class="form">
            <!--begin::Card body-->
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="card-body border-top p-9">


                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Amount</span>


                        <span class="ms-1" data-bs-toggle="tooltip" title="Serial number must be active">
                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span> </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-6 fv-row">
                        <input type="text" name="amount" class="form-control form-control-lg form-control-solid" placeholder="amount" value="" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->











            </div>
            <!--end::Card body-->

            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Basic info-->


<!--end::Content container-->
</div>
<!--end::Content-->
</div>
<!--end::Content wrapper-->




@endsection
