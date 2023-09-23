@php
use Torann\GeoIP\GeoIP;
use Torann\GeoIP\Services\IPApi;
use Stevebauman\Location\Facades\Location;
@endphp

@extends('layouts.dash')

@section('content')

<style>
    /* CSS Styles */
.fs-4 {
    font-size: 1.5rem; /* Increase the font size to your desired value */
    /* Other styles for the class */
}

</style>

@include('setting_methods.navitems')
<!--begin::Row-->
<div class="row g-xxl-9">
    <!--begin::Col-->
    <div class="col-xxl-8">

        <!--begin::Referral program-->
        <div class="card w-100 p-1 border-0 mt-1 rounded-lg bg-white shadow-xs overflow-hidden">
            <!--begin::Body-->
            <div class="card-body py-10">
                <!-- <h2 class="mb-9">
            Referral Program
        </h2> -->


                <!--begin::Stats-->
                <div class="row">
                    <!--begin::Col-->
                    @php




                    $ipAddress = '102.89.46.250';
$location = Location::get($ipAddress);
$currencySymbol = ($location->countryCode === 'NG') ? '₦' : '$';
@endphp
                    <div class="col">
                        <div class="card card w-100 bg-success p-1 border-0 mt-4 rounded-lg text-white shadow-xs overflow-hidden flex-center my-3 p-6">
                            <span class="fs-2 fw-semibold text-white pb-1 px-2">Net Earnings</span>
                            <span class="fs-lg-2tx fs-4 fw-bold d-flex justify-content-center">
                                {{$currencySymbol}}<span data-kt-countup="true" data-kt-countup-value="{{$WalletAmountGross}}"><b>{{ number_format($WalletAmountGross, 2, '.', ',') }}</b></span>
                            </span>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col">
                        <div class="card card w-100 bg-current p-1 border-0 mt-4 rounded-lg text-white shadow-xs overflow-hidden flex-center my-3 p-6">
                            <span class="fs-2 fw-semibold text-white pb-1 px-2">Balance</span>
                            <span class="fs-lg-2tx fs-4 fw-bold d-flex justify-content-center">
                                {{$currencySymbol}}<span data-kt-countup="true" data-kt-countup-value="{{$balance}}"><b>{{ number_format($balance, 2, '.', ',') }}</b></span>
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
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-wrap">
                        <!--begin::Content-->
                        <div class="mb-md-0 fw-semibold p-4">
                            <h4 class="text-gray-900 fw-bold">Withdraw Your Money to a Bank Account</h4>

                            <div class="fs-6 text-gray-700 pe-7">Withdraw money securily to your bank account.</div>
                        </div>
                        <!--end::Content-->

                        <!--begin::Action-->
                        <div class="mb-3 mb-md-0 fw-semibold p-4">
                        <a href="{{route('payout')}}" class="btn bg-current text-white px-6 align-self-center text-nowrap">
                            Withdraw Money </a>
                        </div>
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
    <div class="card card w-100 bg-current p-1 border-0 mt-4 rounded-lg text-white shadow-xs overflow-hidden flex-center my-3 p-6 ">
        <!--begin::Header-->
        <div class="card-header card-header-stretch text-white">
            <!--begin::Title-->
            <div class="card-title text-white">
                <h3 class="m-0 text-gray-800 text-white">Statement</h3>
            </div>
            <!--end::Title-->

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
                            <tr class="text-white">
                                <th class="min-w-175px ps-9">Date</th>
                                <th class="min-w-125px">Amount</th>
                                <th class="min-w-125px">Type</th>
                                <th class="min-w-350px">Payment Status</th>
                                <th class="min-w-125px text-center">Invoice</th>
                            </tr>
                        </thead>
                        <!--end::Thead-->

                        <!--begin::Tbody-->
                        <tbody class="fs-6 fw-semibold text-white">

                            @foreach ($statements as $statement)
                            <tr>
                                <td class="ps-9">{{ Carbon\Carbon::parse($statement->created_at)->format('M d, Y') }}</td>

                                @php
                                if ($location->countryCode === 'NG') {
                                $currencyAmount = number_format($statement->amount, 2, ".", ",");
                                } else {
                                $currencyAmount = $statement->amount;
                                }
                                @endphp

                                <td>{{$currencySymbol}}{{ $currencyAmount }}</td>
                                <td>{{ $statement->type }}</td>



                                @if($statement->payment_status === 'pending')
                                <td class="text-danger"><b>{{ $statement->payment_status }}</b></td>
                                @elseif($statement->payment_status === 'In Progress')
                                <td class="text-primary"><b>{{ $statement->payment_status }}</b></td>
                                @elseif($statement->payment_status === 'Paid')
                                <td class="text-success"><b>{{ $statement->payment_status }}</b></td>
                                @elseif($statement->payment_status === 'Expired')
                                <td class="text-danger"><b>{{ $statement->payment_status }}</b></td>
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
