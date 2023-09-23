@php
use Torann\GeoIP\GeoIP;
use Torann\GeoIP\Services\IPApi;
@endphp

@extends('layouts.wauth')

@section('content')

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>



    <div class="main-wrap">
        <!-- header wrapper -->
        <div class="header-wrapper pt-3 pb-3 shadow-none pos-fixed position-absolute">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar pt-0 pb-0">
                        <a href="{{route('welcome')}}">
                            <img alt="Logo" src="{{asset('media/logos/lern-logo1.png')}}" style="height:50px;width:60px;" class="img-fluid h-20px app-sidebar-logo-default" />
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav nav-menu float-none text-center">
                                <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Courses</a></li>

                                <li class="nav-item"><a class="nav-link" href="{{route('contactUs')}}">Contact</a></li>

                                <!-- Login and Register buttons visible only on mobile -->
                                <li class="nav-item d-sm-none d-md-none">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <!--<li class="nav-item d-sm-none d-md-none">-->
                                <!--    <a class="nav-link" href="{{ route('register') }}">Register</a>-->
                                <!--</li>-->
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-4 text-right d-lg-block d-none">
                        <a href="{{route('login')}}" class="header-btn bg-dark fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1">Login</a>
                        <!--<a href="{{route('register')}}" class="header-btn bg-current fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1">Register</a>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="page-nav bg-lightblue pt-lg--7 pb-lg--7 pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="text-grey-800 fw-700 mont-font display4-size display4-md-size">Checkout</h1>
                    </div>
                </div>
            </div>
        </div>

      <div class="cart-wrapper pt-lg--7 pb-lg--7 pb-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 offset-xl-1 col-lg-6">
                        <div class="order-details">
                            <h4 class="mont-font fw-600 font-md mb-5">Order Details</h4>
                            <div class="table-content table-responsive mb-5 card border-0 bg-greyblue p-5">
                                <table class="table order-table order-table-2 mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-0">Course</th>
                                            <th class="text-right border-0">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-grey-500 fw-500 font-xsss">{{$selectedCourse->course_name}}

                                            </th>
                                            @php
                                           $ipAddress = request()->ip();

                                            $location = Location::get($ipAddress);
                                            $countryCode = $location->countryCode;
                                            $rate = 1 / 777.58;

                                            $tuitionFee = $selectedCourse->tuition_fee;

                                            $currencySymbol = ($location->countryCode === 'NG') ? '₦' : '$';
                                            $currencySymbolPay = ($location->countryCode === 'NG') ? 'NGN' : 'USD';
                                            if (!is_numeric($tuitionFee)) {
                                            // Handle the case when the tuition_fee is not a valid numeric value
                                            $pay = 0; // Set a default value or handle the error appropriately
                                            } else {
                                            if ($countryCode === 'NG') {
                                            $pay = $tuitionFee * 100;
                                            $price = $tuitionFee;
                                            } else {
                                            $pay = $tuitionFee * 100 * $rate;
                                            $price = $tuitionFee * $rate;
                                            }
                                            }
                                            @endphp
                                            <td class="text-right text-grey-500 fw-500 font-xsss">{{$currencySymbol}}{{ number_format($price, 2) }}</td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <form id="subscriptionForm">

@csrf
<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="form-gorup">
            <label class="mont-font fw-500 font-xsss">First Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror bg-transparent" required />
            <!--end::Name-->
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


</div>

<div class="row">
    <div class="col-lg-6 mb-3">
        <div class="form-gorup">
            <label class="mont-font fw-500 font-xsss">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror bg-transparent" />
            <!--end::Email-->
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <div class="form-gorup">
            <label class="mont-font fw-500 font-xsss">Phone Number</label>
            <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror bg-transparent" required />
            <!--end::Phone Number-->
            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="form-gorup">

            <select name="service" class="form-control">
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
               
            </select>
        </div>
    </div>
    <input type="hidden" name="amount" value="{{$pay}}">

</div>

<div class="row">
    <div class="col-lg-6 mb-3">
        <div class="form-gorup">
            <label class="mont-font fw-500 font-xsss">Password</label>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <div class="form-gorup">
            <label class="mont-font fw-500 font-xsss">Repeat Password</label>
            <input type="password" name="password_confirmation" value="{{ old('password') }}" class="form-control">
        </div>
    </div>


</div>

                    </div>

                    <div class="col-xl-6 col-lg-6">
                    <div class="order-details">

                    <h4 class="mont-font fw-600 font-md mb-5">Payment Option</h4>

<div class="checkout-payment card border-0 mb-3 bg-greyblue p-5">
    <div class="payment-group mb-4">
        <div class="payment-radio">
            <input type="radio" value="full" name="payment-method" id="fullPayment" checked="">
            <label class="payment-label fw-600 text-grey-900 ml-2" for="fullPayment">Full Payment (Course Fee only)</label>
        </div>
    </div>
    <div class="payment-group mb-0">
        <div class="payment-radio">
            <input type="radio" value="instalment" name="payment-method" id="instalmentPayment">
             @if ($tuitionFee == 150000)
            <label class="payment-label fw-600 text-grey-90" for="instalmentPayment">Installment Payment (₦50,000 Monthly)
            </label>
            @else ($tuitionFee == 100000)
             <label class="payment-label fw-600 text-grey-90" for="instalmentPayment">Installment Payment (₦33,333.33 Monthly)
            </label>
            @endif
        </div>
    </div>
</div>
@endif

<img alt="Logo" src="{{ asset('media/logos/logo-paystack.png') }}" class="pt-5 img-fluid me-3" />

<div class="clearfix"></div>

<div id="paymentPopup"></div>

<div class="card shadow-none border-0">
    <button type="submit" id="paymentButton" class="w-100 p-3 mt-3 font-xsss text-center text-white bg-current rounded-lg text-uppercase fw-600 ls-3">Place Order</button>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</div>


</div>
                    </div>




                    <div class="col-xl-6 col-lg-6">
<div class="container">
<div class="page-title">
                            <!-- <h4 class="mont-font fw-600 font-md mb-5">Billing address</h4> -->





                        </div>
</div>
                    </div>


                </div>
            </div>
        </div>

        </form>



        <div class="payment-option pt-0 pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3 text-left">
                        <i class="ti-shopping-cart text-grey-900 display1-size float-left mr-3"></i>
                        <h4 class="mt-1 fw-600 text-grey-900 font-xss mb-0">100% Secure Payments</h4>
                        <p class="font-xssss fw-500 text-grey-500 lh-26 mt-0 mb-0">100% Payment Protection.</p>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-3 text-left">
                        <i class="ti-headphone-alt text-grey-900 display1-size float-left mr-3"></i>
                        <h4 class="mt-1 fw-600 text-grey-900 font-xss mb-0">Support</h4>
                        <p class="font-xssss fw-500 text-grey-500 lh-26 mt-0 mb-0">Alway online feedback 24/7</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3 text-left">
                        <i class="ti-lock text-grey-900 display1-size float-left mr-3"></i>
                        <h4 class="mt-1 fw-600 text-grey-900 font-xss mb-0">Trust pay</h4>
                        <p class="font-xssss fw-500 text-grey-500 lh-26 mt-0 mb-0">Easy Return Policy.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3 text-left">
                        <i class="ti-reload text-grey-900 display1-size float-left mr-3"></i>
                        <h4 class="mt-1 fw-600 text-grey-900 font-xss mb-0">Return and Refund</h4>
                        <p class="font-xssss fw-500 text-grey-500 lh-26 mt-0 mb-0">100% money back guarantee</p>
                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const paymentButton = document.getElementById('paymentButton');

                const selectedOption = document.querySelector('select[name="service"] option:checked');
                const tuitionFee = selectedOption.dataset.tuition;
                const subscriptionForm = document.getElementById("subscriptionForm");

                const paymentPopup = document.getElementById("paymentPopup");

                paymentButton.addEventListener('click', (event) => {
                    event.preventDefault(); // Prevent the default form submission

                    // Your form element selections here

                    const name = document.querySelector('input[name="name"]').value;
                    const email = document.querySelector('input[name="email"]').value;
                    const service = document.querySelector('select[name="service"]').value;
                    const phone_number = document.querySelector('input[name="phone_number"]').value;
                    const amount = document.querySelector('input[name="amount"]').value;
                    const password = document.querySelector('input[name="password"]').value;
                    const password_confirmation = document.querySelector('input[name="password_confirmation"]').value;


                    // Get the selected payment method
                    const paymentMethodFull = document.getElementById('fullPayment');
                    const paymentMethodInstalment = document.getElementById('instalmentPayment');
                    const selectedPaymentMethod = paymentMethodFull.checked ? 'full' : 'instalment';

                    if (selectedPaymentMethod === 'full') {

                        performFullPayment(name, email, service, phone_number, password, password_confirmation); // Call the function for full payment
                    } else if (selectedPaymentMethod === 'instalment') {
                        performInstalmentPayment(name, email, amount, service, phone_number, password, password_confirmation); // Call the function for instalment payment
                    }
                });

                function performFullPayment(name, email, service, phone_number, password, password_confirmation) {
                    if (validateForm(name, email, service, phone_number, password, password_confirmation)) {



                        // Replace PAYSTACK_PUBLIC_KEY with your Paystack test demo key
                        const publicKey = 'pk_test_aba24425e4f6cc3062196b1d4629bcfa7ed7ea03';
                        const ref = Date.now();

                        const handler = PaystackPop.setup({
                            key: publicKey,
                            email: email,
                            amount: tuitionFee, // Replace with the actual payment amount
                            currency: '{{$currencySymbolPay}}', // Replace with the appropriate currency code
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
                }

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


                function performInstalmentPayment(name, email, amount, service, phone_number, password, password_confirmation) {
                    if (validateForm(name, email, service, phone_number, password, password_confirmation)) {



                        // Replace PAYSTACK_PUBLIC_KEY with your Paystack test demo key
                        const publicKey = 'pk_test_aba24425e4f6cc3062196b1d4629bcfa7ed7ea03';
                        const ref = Date.now();

                        const handler = PaystackPop.setup({
                            key: publicKey,
                            email: email,
                            amount: Math.ceil(amount / 3), // Replace with the actual payment amount
                            currency: '{{$currencySymbolPay}}', // Replace with the appropriate currency code
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
                                    form.action = '{{ route("registerInst") }}';
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
                }


            });
        </script>
        @endsection
