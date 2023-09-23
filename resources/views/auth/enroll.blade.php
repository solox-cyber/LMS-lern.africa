@php
use Torann\GeoIP\GeoIP;
use Torann\GeoIP\Services\IPApi;
use Stevebauman\Location\Facades\Location;
@endphp
@extends('layouts.auth')

@section('content')
<!--begin::Body-->
<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
    <!--begin::Form-->
    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
        <!--begin::Wrapper-->
        <div class="w-lg-500px p-10">

            <div id="registrationForm">
                <!-- begin::Form -->
                <!-- <form class="form w-100" action="{{ route('register') }}" method="POST">
                @csrf -->
                <!--begin::Heading-->
                <div class="text-center mb-11">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">
                        Sign Up
                    </h1>
                    <!--end::Title-->


                </div>
                <!--begin::Heading-->



                <meta name="csrf-token" content="{{ csrf_token() }}">
                @csrf
                <!--begin::Input group--->
                <div class="fv-row mb-8">
                    <!--begin::Name-->
                    <input type="text" placeholder="Name" name="name" autocomplete="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror bg-transparent" required />
                    <!--end::Name-->
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="fv-row mb-8">
                    <!--begin::Email-->
                    <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" class="form-control @error('email') is-invalid @enderror bg-transparent" />
                    <!--end::Email-->
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="fv-row mb-8">
                    <!--begin::Phone Number-->
                    <input id="phone_number" type="text" placeholder="Phone Number" name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number" class="form-control @error('phone_number') is-invalid @enderror bg-transparent" required />
                    <!--end::Phone Number-->
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="fv-row mb-8">
                    <select name="service" aria-label="Select a Course" data-control="select2" data-placeholder="Select a course..." class="form-select form-select-solid form-select-lg fw-semibold">
                        @if ($selectedCourse)
                        @php
                        $ipAddress = request()->ip(); 

                        $location = Location::get($ipAddress);
                        $countryCode = $location->countryCode;
                        $rate = 1 / 777.58;

                        $tuitionFee = $selectedCourse->tuition_fee;

        if (!is_numeric($tuitionFee)) {
            // Handle the case when the tuition_fee is not a valid numeric value
            $pay = 0; // Set a default value or handle the error appropriately
        } else {
            if ($countryCode === 'NG') {
                $pay = $tuitionFee * 100;
            } else {
                $pay = $tuitionFee * 100 * $rate;
            }
        }
                        @endphp

                        <option value="{{ $selectedCourse->id }}" data-tuition="{{ $pay }}">{{ $selectedCourse->course_name }}</option>
                        @endif
                    </select>
                </div>
                <!--begin::Input group-->
                <div class="fv-row mb-8" data-kt-password-meter="true">
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control @error('password') is-invalid @enderror bg-transparent" type="password" placeholder="Password" name="password" required autocomplete="password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                <i class="ki-duotone ki-eye-slash fs-2"></i> <i class="ki-duotone ki-eye fs-2 d-none"></i> </span>
                        </div>
                        <!--end::Input wrapper-->

                        <!--begin::Meter-->
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                            </div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                            </div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                            </div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                        <!--end::Meter-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Hint-->
                    <div class="text-muted">
                        Use 8 or more characters with a mix of letters, numbers & symbols.
                    </div>
                    <!--end::Hint-->
                </div>
                <!--end::Input group--->

                <!--end::Input group--->
                <div class="fv-row mb-8">
                    <!--begin::Repeat Password-->
                    <input type="password" placeholder="Repeat Password" name="password_confirmation" type="password" autocomplete="confirm-password" class="form-control bg-transparent" />
                    <!--end::Repeat Password-->
                </div>
                <!--end::Input group--->

                <!--begin::Submit button-->
                <div class="d-grid mb-10">
                    <button class="btn btn-primary" id="paymentButton">Sign Up</button>
                    <script src="https://js.paystack.co/v1/inline.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

                    <!--end::Submit button-->

                    <!-- <div class="row g-3 mb-9"> -->
                    <!--begin::Col-->

                    <!-- <div class="col-md-12">
                        <button class="btn btn-primary" id="paymentButton">Sign Up with PayStack</button>
                        <script src="https://js.paystack.co/v1/inline.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                    </div> -->

                    <!-- <div class="col-md-6">
                        <button class="btn btn-primary" id="paymentButtontwo">Sign Up with Flutter</button>

                        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                    </div> -->
                    <!-- </div> -->

                    @php




                    $ipAddress = request()->ip();

                    $location = Location::get($ipAddress);
                    $countryCode = $location->countryCode;
                    $currencySymbol = ($location->countryCode === 'NG') ? 'NGN' : 'USD';
                    @endphp


                </div>


                <!--begin::Sign up-->
                <div class="text-gray-500 text-center fw-semibold fs-6">
                    Already have an Account?

                    <a href="{{ route('login') }}" class="link-primary fw-semibold">
                        Sign in
                    </a>

                </div>
                <!--end::Sign up-->
                <div class="col-md-12">
    <img alt="Logo" src="{{ asset('media/logos/logo-paystack.png') }}" class="pt-5 img-fluid me-3" />
</div>

                <!-- </form> -->
            </div>
            <!--end::Form-->

        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Form-->


</div>
<!--end::Body-->

<style>
    /* Customize Paystack pop-up styles */
    .paystack-inline-widget-overlay {
        background-color: black !important;
    }
</style>

<script>
    const paymentButton = document.getElementById('paymentButton');
    const registrationForm = document.getElementById('registrationForm');

    paymentButton.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent the default form submission

        // Make an API call to your backend to retrieve the payment information
        // Generate a unique reference for this payment
        // Get the values from the input fields
        const name = document.querySelector('input[name="name"]').value;
        const email = document.querySelector('input[name="email"]').value;
        const service = document.querySelector('select[name="service"]').value;
        const phone_number = document.querySelector('input[name="phone_number"]').value;
        const password = document.querySelector('input[name="password"]').value;
        const password_confirmation = document.querySelector('input[name="password_confirmation"]').value;

        if (validateForm(name, email, service, phone_number, password, password_confirmation)) {

            const selectedOption = document.querySelector('select[name="service"] option:checked');
            const tuitionFee = selectedOption.dataset.tuition;



            // Replace PAYSTACK_PUBLIC_KEY with your Paystack test demo key
            const publicKey = 'pk_test_aba24425e4f6cc3062196b1d4629bcfa7ed7ea03';
            const ref = Date.now();

            const handler = PaystackPop.setup({
                key: publicKey,
                email: email,
                amount: tuitionFee, // Replace with the actual payment amount
                currency: '{{$currencySymbol}}', // Replace with the appropriate currency code
                ref: ref.toString(), // Replace with a unique reference for this payment
                metadata: {
                    custom_fields: [{
                        display_name: 'Full Name',
                        variable_name: 'full_name',
                        value: name,
                    }, ],
                },
                embed: true, // Set embed to true to display the cancel button
                callback: (response) => {
                    // Handle the response from Paystack after successful payment

                    // Create a hidden form and submit it with the necessary data
                    if (response.status === 'success') {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '{{ route("register") }}';
                        form.style.display = 'none';

                        // Add the CSRF token
                        const csrfToken = document.createElement('input');
                        csrfToken.type = 'hidden';
                        csrfToken.name = '_token';
                        csrfToken.value = '{{ csrf_token() }}';
                        form.appendChild(csrfToken);

                        const inputName = document.createElement('input');
                        inputName.type = 'hidden';
                        inputName.name = 'name';
                        inputName.value = name;
                        form.appendChild(inputName);

                        const inputEmail = document.createElement('input');
                        inputEmail.type = 'hidden';
                        inputEmail.name = 'email';
                        inputEmail.value = email;
                        form.appendChild(inputEmail);

                        const inputService = document.createElement('input');
                        inputService.type = 'hidden';
                        inputService.name = 'service';
                        inputService.value = service;
                        form.appendChild(inputService);

                        const inputPhone = document.createElement('input');
                        inputPhone.type = 'hidden';
                        inputPhone.name = 'phone_number';
                        inputPhone.value = phone_number;
                        form.appendChild(inputPhone);

                        const inputPassword = document.createElement('input');
                        inputPassword.type = 'hidden';
                        inputPassword.name = 'password';
                        inputPassword.value = password;
                        form.appendChild(inputPassword);

                        const inputPasswordConfirmation = document.createElement('input');
                        inputPasswordConfirmation.type = 'hidden';
                        inputPasswordConfirmation.name = 'password_confirmation';
                        inputPasswordConfirmation.value = password_confirmation;
                        form.appendChild(inputPasswordConfirmation);

                        document.body.appendChild(form);
                        form.submit();
                    } else if (response.status === 'declined') {
                        toastr.error('Payment declined. Please try again.');
                        check(name, email, service, phone_number, password, password_confirmation);
                    } else if (response.status === 'cancelled') {
                        // Payment was cancelled by the user
                        toastr.error('Payment was cancelled by the user.');
                        check(name, email, service, phone_number, password, password_confirmation);
                    } else {
                        toastr.error('Payment failed or declined. Please try again.');
                        check(name, email, service, phone_number, password, password_confirmation);
                    }
                },
                onClose: function() {
                       toastr.error('Payment was cancelled by the user.');
                    check(name, email, service, phone_number, password, password_confirmation);
                },
            });


            handler.openIframe();
        }
    });

    function validateForm(name, email, service, phone_number, password, password_confirmation) {
        // Perform your form validation logic here
        // Return true if the form is valid, false otherwise

        // Example validation logic: Check if all fields are filled
        if (name.trim() === '' || email.trim() === '' || service.trim() === '' || phone_number.trim() === '' || password.trim() === '' || password_confirmation.trim() === '') {
            toastr.error('Please fill in all the required fields.')
            return false;
        }

        // Check if password meets the minimum length requirement
        if (password.length < 8) {
            toastr.error('Password should be at least 8 characters long.')
            return false;
        }
        // Example validation logic: Check if password and password confirmation match
        if (password !== password_confirmation) {
            toastr.error('Password and password confirmation do not match.');
            return false;
        }

        return true;
    }

    function check(name, email, service, phone_number, password, password_confirmation) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("save-user-data") }}';
        form.style.display = 'none';

        // Add the CSRF token
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        form.appendChild(csrfToken);

        const inputName = document.createElement('input');
        inputName.type = 'hidden';
        inputName.name = 'name';
        inputName.value = name;
        form.appendChild(inputName);

        const inputEmail = document.createElement('input');
        inputEmail.type = 'hidden';
        inputEmail.name = 'email';
        inputEmail.value = email;
        form.appendChild(inputEmail);

        const inputService = document.createElement('input');
        inputService.type = 'hidden';
        inputService.name = 'service';
        inputService.value = service;
        form.appendChild(inputService);

        const inputPhone = document.createElement('input');
        inputPhone.type = 'hidden';
        inputPhone.name = 'phone_number';
        inputPhone.value = phone_number;
        form.appendChild(inputPhone);

        const inputPassword = document.createElement('input');
        inputPassword.type = 'hidden';
        inputPassword.name = 'password';
        inputPassword.value = password;
        form.appendChild(inputPassword);

        const inputPasswordConfirmation = document.createElement('input');
        inputPasswordConfirmation.type = 'hidden';
        inputPasswordConfirmation.name = 'password_confirmation';
        inputPasswordConfirmation.value = password_confirmation;
        form.appendChild(inputPasswordConfirmation);

        document.body.appendChild(form);
        form.submit();
    }
</script>


@endsection


