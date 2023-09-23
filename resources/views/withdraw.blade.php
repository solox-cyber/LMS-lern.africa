@php
use Torann\GeoIP\GeoIP;
use Torann\GeoIP\Services\IPApi;
use Stevebauman\Location\Facades\Location;
@endphp

@extends('layouts.dash')

@section('content')


@include('setting_methods.navitems')

<div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-lg">

                                <h4 class="font-xs text-white fw-600 ml-4 mb-0 mt-2">Payout Details</h4><br>
                                <h3 class="font-xs text-white fw-600 ml-4 mb-0 mt-2"> @php




$ipAddress = '102.89.46.250';
$location = Location::get($ipAddress);
$currencySymbol = ($location->countryCode === 'NG') ? '₦' : '$';
@endphp

    Current Balance: {{$currencySymbol}} {{ number_format($walletAmount, 2, '.', ',') }}</h3>
                            </div>

                            <div class="card-body p-lg-5 p-4 w-100 border-0 ">


                            <form action="{{ route('payment.payout') }}" method="POST" enctype="multipart/form-data" class="form">
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


                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Amount</label>

                                        </div>
                                    </div>

                                    <div class="col-lg-8 mb-3">
                                        <div class="form-group">
                                            <input type="text" name="amount" class="form-control">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">

                                    <div class="col-lg-12">
                                        <button type="submit" name="submit"style="border:none" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-lg d-inline-block">Save Changes</button>
                                        <button type="reset" style="border:none" class="text-center font-xsss fw-600 p-3 w175 rounded-lg d-inline-block">Discard</button>
                                    </div>
                                </div>

                            </form>
                            </div>
                        </div>





@endsection
