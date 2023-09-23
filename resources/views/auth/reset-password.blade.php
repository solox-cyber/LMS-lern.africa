<!-- resetpassword.blade.php -->

@extends('layouts.auth')

@section('content')
<!--begin::Body-->
<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
    <!--begin::Form-->
    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
        <!--begin::Wrapper-->
        <div class="w-lg-500px p-10">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <!--begin::Form-->
            <form class="form w-100" method="POST" action="{{ route('password.update') }}">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">
                        Forgot Password ?
                    </h1>
                    <!--end::Title-->

                    <!--begin::Link-->
                    <div class="text-gray-500 fw-semibold fs-6">
                        Enter your email to reset your password.
                    </div>
                    <!--end::Link-->
                </div>
                <!--begin::Heading-->

                <input type="hidden" name="token" value="{{ $token }}">

                <!--begin::Input group--->
                <div class="fv-row mb-8">
                    <!--begin::Email-->
                    <input type="email" placeholder="Email" name="email" autocomplete="email" value="{{ $email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror bg-transparent" required autofocus />
                    <!--end::Email-->
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!--begin::Input group--->
                <div class="fv-row mb-8">
                    <!--begin::Email-->
                    <input type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror bg-transparent" required autofocus />
                    <!--end::Email-->
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!--begin::Input group--->
                <div class="fv-row mb-8">
                    <!--begin::Email-->
                    <input type="password" placeholder="Confirm password" name="password_confirmation" class="form-control bg-transparent" required autofocus />
                    <!--end::Email-->

                </div>

                <!--begin::Actions-->
                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="submit" class="btn btn-primary me-4">

                        <!--begin::Indicator label-->
                        <span class="indicator-label">
                            Submit</span>
                        <!--end::Indicator label-->

                    </button>

                    <a href="{{ route('login') }}" class="btn btn-light">Cancel</a>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Form-->

    <!--begin::Footer-->
    <div class="d-flex flex-center flex-wrap px-5">
        <!--begin::Links-->
        <div class="d-flex fw-semibold text-primary fs-base">
            <a href="https://keenthemes.com/" class="px-5" target="_blank">Terms</a>

            <a href="https://devs.keenthemes.com/" class="px-5" target="_blank">Plans</a>

            <a href="https://themes.getbootstrap.com/product/keen-the-ultimate-bootstrap-admin-theme/" class="px-5" target="_blank">Contact Us</a>
        </div>
        <!--end::Links-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Body-->
@endsection('content')
