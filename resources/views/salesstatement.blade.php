@extends('layouts.admin.salesdash')

@section('content')


@include('setting_methods.salesrep.menuhead')

@include('setting_methods.salesrep.navitems')
<!--begin::Row-->
<div class="row g-xxl-9">
    <!--begin::Col-->
    <div class="col-xxl-8">

        <!--begin::Referral program-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Body-->
            <div class="card-body py-10">
                <!-- <h2 class="mb-9">
            Referral Program
        </h2> -->


                <!--begin::Stats-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col">
                        <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                            <span class="fs-4 fw-semibold text-info pb-1 px-2">Net Earnings</span>
                            <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                ₦<span data-kt-countup="true" data-kt-countup-value="{{$WalletAmountGross}}">0</span>
                            </span>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col">
                        <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                            <span class="fs-4 fw-semibold text-success pb-1 px-2">Balance</span>
                            <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                ₦<span data-kt-countup="true" data-kt-countup-value="{{$balance}}">0</span>
                            </span>
                        </div>
                    </div>
                    <!--end::Col-->




                </div>
                <!--end::Stats-->




                <!--begin::Notice-->
                <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-bank fs-2tx text-primary me-4"><span class="path1"></span><span class="path2"></span></i> <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                        <!--begin::Content-->
                        <div class="mb-3 mb-md-0 fw-semibold">
                            <h4 class="text-gray-900 fw-bold">Withdraw Your Money to a Bank Account</h4>

                            <div class="fs-6 text-gray-700 pe-7">Withdraw money securily to your bank account.</div>
                        </div>
                        <!--end::Content-->

                        <!--begin::Action-->
                        <a href="{{route('salespayment.payout')}}" class="btn btn-primary px-6 align-self-center text-nowrap">
                            Withdraw Money </a>
                        <!--end::Action-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Referral program-->
    </div>
    <!--end::Col-->

    <!--begin::Statements-->
    <div class="card  ">
        <!--begin::Header-->
        <div class="card-header card-header-stretch">
            <!--begin::Title-->
            <div class="card-title">
                <h3 class="m-0 text-gray-800">Statement</h3>
            </div>
            <!--end::Title-->

            <!--begin::Toolbar-->
            <div class="card-toolbar m-0">
                <!--begin::Tab nav-->
                <ul class="nav nav-stretch fs-5 fw-semibold nav-line-tabs border-transparent" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a id="kt_referrals_year_tab" class="nav-link text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#kt_referrals_1">
                            This Year
                        </a>
                    </li>


                </ul>
                <!--end::Tab nav-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header-->

        <!--begin::Tab Content-->
        <div id="kt_referred_users_tab_content" class="tab-content">
            <!--begin::Tab panel-->
            <div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                        <!--begin::Thead-->
                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                            <tr>
                                <th class="min-w-175px ps-9">Date</th>
                                <th class="min-w-125px">Amount</th>
                                <th class="min-w-125px">Type</th>
                                <th class="min-w-350px">Payment Status</th>
                                <th class="min-w-125px text-center">Invoice</th>
                            </tr>
                        </thead>
                        <!--end::Thead-->

                        <!--begin::Tbody-->
                        <tbody class="fs-6 fw-semibold text-gray-600">

                            @foreach ($statements as $statement)
                            <tr>
                                <td class="ps-9">{{ Carbon\Carbon::parse($statement->created_at)->format('M d, Y') }}</td>
                                <td>₦{{ number_format($statement->amount, 2, '.', ',') }}</td>
                                <td>{{ $statement->type }}</td>



                                @if($statement->payment_status === 'pending')
                                <td class="text-danger">{{ $statement->payment_status }}</td>
                                @elseif($statement->payment_status === 'In Progress')
                                <td class="text-primary">{{ $statement->payment_status }}</td>
                                @elseif($statement->payment_status === 'Paid')
                                <td class="text-success">{{ $statement->payment_status }}</td>
                                @elseif($statement->payment_status === 'Expired')
                                <td class="text-danger">{{ $statement->payment_status }}</td>
                                @endif

                                <td class="text-center"><button class="btn btn-light btn-sm btn-active-light-primary">Download</button></td>
                            </tr>
                            @endforeach
                            <!-- <tr>
                                            <td class="ps-9">Nov 01, 2020</td>
                                            <td class="ps-0">102445788</td>
                                            <td>Darknight transparency 36 Icons Pack</td>
                                            <td class="text-success">$38.00</td>
                                            <td class="text-center"><button class="btn btn-light btn-sm btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-9">Oct 24, 2020</td>
                                            <td class="ps-0">423445721</td>
                                            <td>Seller Fee</td>
                                            <td class="text-danger">$-2.60</td>
                                            <td class="text-center"><button class="btn btn-light btn-sm btn-active-light-primary">Download</button></td>
                                        </tr>

 -->

                        </tbody>
                        <!--end::Tbody-->
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Tab panel-->

            <!--begin::Tab panel-->
            <div id="kt_referrals_3" class="card-body p-0 tab-pane fade " role="tabpanel">
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                        <!--begin::Thead-->
                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">

                        </thead>
                        <!--end::Thead-->

                        <!--begin::Tbody-->
                        <tbody class="fs-6 fw-semibold text-gray-600">

                            <tr>
                                <td class="ps-9">Oct 08, 2020</td>
                                <td class="ps-0">312445984</td>
                                <td>Cartoon Mobile Emoji Phone Pack</td>
                                <td class="text-success">$76.00</td>
                                <td class="text-center"><button class="btn btn-light btn-sm btn-active-light-primary">Download</button></td>
                            </tr>
                            <tr>
                                <td class="ps-9">May 30, 2020</td>
                                <td class="ps-0">523445943</td>
                                <td>Seller Fee</td>
                                <td class="text-danger">$-1.30</td>
                                <td class="text-center"><button class="btn btn-light btn-sm btn-active-light-primary">Download</button></td>
                            </tr>
                            <tr>
                                <td class="ps-9">Apr 22, 2020</td>
                                <td class="ps-0">231445943</td>
                                <td>Parcel Shipping / Delivery Service App</td>
                                <td class="text-success">$204.00</td>
                                <td class="text-center"><button class="btn btn-light btn-sm btn-active-light-primary">Download</button></td>
                            </tr>

                        </tbody>
                        <!--end::Tbody-->
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Tab panel-->

        </div>
        <!--end::Tab Content-->
    </div>
    <!--end::Statements-->
</div>
<!--end::Content container-->
</div>
<!--end::Content-->
</div>
<!--end::Content wrapper-->



@endsection
