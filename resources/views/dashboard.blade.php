@php
use Torann\GeoIP\GeoIP;
use Torann\GeoIP\Services\IPApi;
@endphp
@extends('layouts.dash')

@section('content')
<style>
    /* CSS Styles */
.btn-round-xxxl {
    font-size: 1rem; /* Adjust the font size to control the circle size */
    width: 50px; /* Adjust the width to match the desired size */
    height: 50px; /* Adjust the height to match the desired size */
    line-height: 40px; /* Center the content vertically */
    border-radius: 50%; /* Make the element a circle */
    display: inline-block;
    text-align: center;
}

    .step {
        text-align: center;
        position: relative;
    }

    .step.active .step-number {
        background-color: #007bff;
        color: #fff;
    }

    .step.active .step-label {
        color: #007bff;
    }

    .step-number {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #f2f2f2;
        color: #555;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto 1px;
    }

    .check-sign {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 14px;
        color: #007bff;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card w-100 bg-lightblue p-lg-5 p-4 border-0 rounded-lg d-block float-left">
            <img src="images/world-cup.png" alt="icon" class="sm-mt-2 w75 position-relative top--10 float-left mr-2 mt--1 ">
            <h2 class="display1-size display2-md-size d-inline-block float-left mb-0 text-grey-900 fw-700"><span class="font-xssss fw-600 text-grey-500 d-block mb-2 ml-1">Welcome back</span> Hi, @auth
                {{ Auth::user()->name }}
                @endauth<br> Your Serial Number: {{ $serial_number }}
            </h2>
            <img src="images/bg-2.png" alt="icon" class="w250 right-15 top-0 position-absolute d-none d-xl-block">
        </div>
    </div>
    <div class="col-xl-4 col-lg-12 ">
        <div class="card w-100 p-1 border-0 mt-4 rounded-lg bg-white shadow-xs overflow-hidden">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-7">
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2"></span>

                        <!--end::Amount-->



                        <h4 class="fw-700 text-success font-xssss mt-0 mb-0 ">{{ $commissionPercentage }}%</h4>
                        <h6 class="text-grey-900 fw-700 display1-size mt-2 mb-2 ls-3 lh-1" style="font-size:20px!important">₦{{ number_format($WalletAmount, 2, '.', ',') }}</h6>

                        <h4 class="fw-700 text-grey-500 font-xsssss ls-3 text-uppercase mb-0 mt-0"> YOUR CURRENT EARNINGS</h4>
                    </div>
                    <div class="col-5 text-left">
                        <div id="chart-users-blue"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-12 ">
        <div class="card w-100 p-1 border-0 mt-4 rounded-lg bg-white shadow-xs overflow-hidden">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-7">
                        <!-- <h4 class="fw-700 text-success font-xssss mt-0 mb-0 ">-27%</h4> -->
                        <h2 class="text-grey-900 fw-700 display1-size mt-2 mb-2 ls-3 lh-1">{{$userCount }} </h2>

                        <h4 class="fw-700 text-grey-500 font-xsssss ls-3 text-uppercase mb-0 mt-0">Total Number of Registered Users</h4>
                    </div>
                    <div class="col-5 text-left">
                        <div id="chart-users-blue1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-12 ">
        <div class="card w-100 p-1 border-0 mt-4 rounded-lg bg-white shadow-xs overflow-hidden">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-7">
                        <!-- <h4 class="fw-700 text-success font-xssss mt-0 mb-0 ">-15%</h4> -->
                        <h2 class="text-grey-900 fw-700 display1-size mt-2 mb-2 ls-3 lh-1">{{$contactCount }} </h2>
                        <h4 class="fw-700 text-grey-500 font-xsssss ls-3 text-uppercase mb-0 mt-0"> Number of Uploaded Contacts</h4>
                    </div>
                    <div class="col-5 text-left">
                        <div id="chart-users-blue2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfx"></div>





    <div class="col-xxl-4 col-xl-6 col-md-12 mt-2">
        <div class="card mb-4 d-block w-100 shadow-xss bg-current rounded-lg p-md-5 p-4 border-0 text-center text-white">

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                {{ $error }}
                @endforeach
            </div>
            @endif

            <!-- Countdown Timer -->
            @if(Auth::user()->payment_status === 'paid')

            <h1 class="text-white"><b>Payment Status: Paid</b></h1>
            @foreach($courseDetails as $course)
            <h3>
                @php
                $ipAddress = '102.89.46.250';

                $location = Location::get($ipAddress);
                $countryCode = $location->countryCode;
                $rate = 1 / 777.58;

                if($countryCode === 'NG') {
                $pay = '₦' . number_format($course->tuition_fee, 2);
                } else {
                $pay = '$' . number_format($course->tuition_fee * $rate, 2);
                }
                @endphp

                <h4 class="text-white">Course Selected: {{ $course->course_name }}</h4>
                <h4 class="text-white">Tuition Fee: {{ $pay }}</h4>
                @if ($Sub_amount != NULL && $Sub_amount < $course->tuition_fee)
                    @php
                    $ipAddress = '102.89.46.250';

                    $location = Location::get($ipAddress);
                    $countryCode = $location->countryCode;
                    $rate = 1 / 777.58;

                    if($countryCode === 'NG') {
                    $Sub_amount = '₦' . number_format(ceil($Sub_amount), 2);
                    $Sub_balance = '₦' . number_format($Sub_balance, 2);
                    } else {
                    $Sub_amount = '₦' . number_format(ceil($Sub_amount), 2);
                    $Sub_balance = '$' . number_format($Sub_balance * $rate, 2);
                    }
                    @endphp
                    <h4 class="text-white">Amount Paid: {{ $Sub_amount }}</h4>
                    <h4 class="text-white">Pending Balance: {{ $Sub_balance }}</h4>
                    <button class="btn btn-primary" id="paymentButton">Pay Now</button>
                    @endif

            </h3>
            @endforeach


            @else
            <div class="text-center">
                <h2 class="text-white"><b>Countdown Timer</b></h2>
                <div class="container">
                    <div id="countdown" class="mb-4 text-white display-6"></div>
                    <h5 class="text-white">Click the button below to complete registration and reserve your position</h5>
                    <button class="btn btn-primary" id="paymentButton">Pay Now</button>
                </div>
            </div>
            @endif

            <script src="https://js.paystack.co/v1/inline.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <script>
                @if($course)
                // Get the course date from the PHP variable in the view
                var courseDate = new Date("{{ $course }}");

                // Calculate the time remaining until the course date
                var countdownDate = courseDate.getTime() - new Date().getTime() + (72 * 60 * 60 * 1000);

                // Update the countdown timer every second
                var countdownTimer = setInterval(function() {
                    countdownDate -= 1000;

                    // Calculate remaining time
                    var days = Math.floor(countdownDate / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((countdownDate % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((countdownDate % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((countdownDate % (1000 * 60)) / 1000);

                    // Display the remaining time
                    document.getElementById("countdown").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

                    // If the countdown is finished, clear the interval and perform an action (e.g., enable payment button)
                    if (countdownDate < 0) {
                        clearInterval(countdownTimer);
                        document.getElementById("countdown").innerHTML = "Time's up!";
                        // document.getElementById("paymentButton").disabled = true;
                    }
                }, 1000);
                @endif
            </script>

            @foreach($courseDetails as $course)
            @php
            $ipAddress = '102.89.46.250';

            $location = Location::get($ipAddress);
            $currencySymbol = ($location->countryCode === 'NG') ? 'NGN' : 'USD';
            if ($location->countryCode === 'NG') {
            $feeAmount = number_format($course->tuition_fee, 2, "", "");
            $instalPay = ceil($feeAmount/3);
            } else {
            $calcAmount = $course->tuition_fee*(1 / 777.58);
            $feeAmount =number_format($calcAmount, 2, "", "");
            $instalPay = ceil($feeAmount/3);
            }
            @endphp

            <script>
                const paymentButton = document.getElementById('paymentButton');

                paymentButton.addEventListener('click', () => {
                    // Make an API call to your backend to retrieve the payment information
                    // Generate a unique reference for this payment
                    // var InstalPay = Math.ceil(feeAmount/3);

                    // Replace PAYSTACK_PUBLIC_KEY with your Paystack test demo key
                    const publicKey = 'pk_live_cef1f00c7e03b7802aaad964cdd3b61e13ace542';
                    const ref = Date.now();

                    const handler = PaystackPop.setup({
                        key: publicKey,
                        email: '{{ Auth::user()->email }}',
                        amount: '{{$instalPay}}', // Replace with the actual payment amount
                        currency: '{{$currencySymbol}}', // Replace with the appropriate currency code
                        ref: ref.toString(), // Replace with a unique reference for this payment,
                        metadata: {
                            custom_fields: [{
                                display_name: 'Full Name',
                                variable_name: 'full_name',
                                value: '{{ Auth::user()->name }}',
                            }],
                        },
                        callback: (response) => {
                            if (response.status === 'success') {
                                // Make an AJAX request to update sub_amount in the backend
                                fetch('{{ route('update-sub-amount') }}', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            },
                                            body: JSON.stringify({
                                                user_id: '{{ Auth::user()->id }}', // Replace with the user's ID
                                                amount: '{{$instalPay/100}}', // Divide by 100 to convert to naira
                                            }),
                                        })
                                    .then(response => response.json())
                                    .then(data => {
                                        // Redirect to the success page with a query parameter indicating payment success
                                        window.location.href = '/success?status=success';
                                    })
                                    .catch(error => {
                                        console.error('Error updating sub_amount:', error);
                                        // Redirect to the success page with a query parameter indicating payment success
                                        window.location.href = '/success?status=success';
                                    });
                            } else {
                                // Redirect to the success page with a query parameter indicating payment failure
                                window.location.href = '/success?status=failure';
                            }
                        },
                    });


                    handler.openIframe();
                });
            </script>


        </div>
    </div>


    <div class="col-xxl-4 col-xl-6 col-md-12 mt-2">
        <div class="card mb-4 d-block w-100 shadow-xss rounded-lg p-md-5 p-4 border-0 text-center text-white"> <!--begin::Body-->

            <!--begin::Item-->
            <div class="d-flex flex-stack">
                <!--begin::Section-->
                <a href="{{route('setting')}}" class="text-primary fw-semibold fs-6 me-2">Add Account Details</a>
                <!--end::Section-->


            </div>
            <!--end::Item-->

            <!--begin::Separator-->
            <div class="separator separator-dashed my-3"></div>
            <!--end::Separator-->

            <!--begin::Item-->
            <div class="d-flex flex-stack">
                <!--begin::Section-->
                <a href="{{route('payout')}}" class="text-primary fw-semibold fs-6 me-2">Request Payout</a>
                <!--end::Section-->

            </div>
            <!--end::Item-->

            <!--begin::Separator-->
            <div class="separator separator-dashed my-3"></div>
            <!--end::Separator-->

            <!--begin::Item-->
            <div class="d-flex flex-stack">
                <!--begin::Section-->
                <a href="{{route('statement')}}" class="text-primary fw-semibold fs-6 me-2">My Statements</a>
                <!--end::Section-->
            </div>
            <!--end::Item-->

        </div>
        <!--end::Body-->

    </div>
</div>




<div class="col-xxl-8 col-xl-12 col-md-12">
    <div class="card mb-4 d-block w-100 shadow-xss rounded-lg p-5 border-0 text-left question-div">
        <div class="card-body p-0" id="question1">
            <h2 class="font-xssss text-uppercase text-current fw-700 fh-300 ls-3">
                Learning Center <br>
            </h2>
            <span class="card-label fw-bold text-gray-600">
                My Courses </span>
            @foreach($courseDetails as $course)
            <h6 class="p-0 pb-3 min-w-150px pt-50 text-start text-gray-600">
                Course Start Date: {{ date_format(date_create_from_format('Y-m-d', $course->start_date), 'jS \of F, Y')}}</h6>
            @endforeach


            @foreach($courseDetails as $course)
            <!--begin::Item-->
            <li class="nav-item mb-3 me-3 me-lg-6">
                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2
                        " id="kt_stats_widget_16_tab_link_5" data-bs-toggle="pill" href="#{{$course->course_name}}">
                    <div class="nav-icon mb-3">
                        @if ($course->profilePicture)
                        <img src="{{ asset('storage/' . ($course->profilePicture->path)) }}" alt="image" class="p-3" alt="Course Logo" style="height:60px!important;width:60px!important">
                        @endif
                    </div>

                </a>
            </li>
            <!--end::Item-->
            @endforeach




            </ul>
            <!--end::Nav-->

            <!--begin::Tab Content-->
            <div class="tab-content">
                @foreach($courseDetails as $course)
                <!--begin::Tap pane-->
                <div class="tab-pane fade show active" id="{{$course->course_name}}">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                    <!-- <th class="p-0 pb-3 min-w-150px text-start">
                                                            Course Overview</th> -->

                                </tr>


                                <!--begin::Table body-->
                            <tbody>

                                <tr>
                                    <h6 class="p-0 pb-3 min-w-150px text-start text-gray-600">
                                        Course Overview</h6>
                                    <h3 class="mb-3">{{$course->course_name}}</h3>
                                    <p class="fw-bold text-gray-600 mb-3">About This Course</p>
                                    <p>{!! Str::limit($course->about_course, 500) !!} <br><br><a href="{{ route('course.details', ['id' => $course->id]) }}" class="btn btn-primary btn-sm">Read More</a></p>
                                </tr>


                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                        @endforeach




                        <h3>Course Enrollment Status</h3>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 p-4 text-center arrow-right">
                                    <span class="btn-round-xxxl  text-primary {{$enrollment_status == 1 ? 'alert-primary' : ''}} display1-size open-font fw-900">1</span>
                                    <h2 class="fw-700 font-xss text-grey-900 mt-4">Registration</h2>
                                </div>
                                <div class="col-lg-3 p-4 text-center arrow-right">
                                    <span class="btn-round-xxxl  {{$enrollment_status == 2 ? 'alert-primary' : ''}} display1-size open-font fw-900">2</span>
                                    <h2 class="fw-700 font-xss text-grey-900 mt-4">Payment</h2>
                                </div>
                                <div class="col-lg-3 p-4 text-center arrow-right">
                                    <span class="btn-round-xxxl  {{$enrollment_status == 3 ? 'alert-primary' : ''}}  display1-size open-font fw-900">3</span>
                                    <h2 class="fw-700 font-xss text-grey-900 mt-4">Progress</h2>
                                </div>
                                <div class="col-lg-3 p-4 text-center">
                                    <span class="btn-round-xxxl {{$enrollment_status == 4 ? 'alert-primary' : ''}}  text-warning display1-size open-font fw-900">4</span>
                                    <h2 class="fw-700 font-xss text-grey-900 mt-4">Certificate</h2>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="card-body p-0" id="question2" style="display: none;">
                    </div>
                </div>
            </div>

            <div class="card-body p-0" id="question3" style="display: none;">
                <h4 class="font-xssss text-uppercase text-current fw-700 ls-3">QUEStion 3</h4>
                <h3 class="font-sm text-grey-800 fw-700 lh-32 mt-4 mb-0">What is the name of the first page you encounter after logging into your web page?</h3>
                <p class="bg-lightblue theme-dark-bg  float-left w__48 d-inline-block mt-3 question-ans style3 rounded-lg font-xssss fw-600 lh-28 text-grey-700 mb-0"><span class="pt-2 pb-2 pl-3 pr-3 mr-4 d-block w-100 rounded-lg bg-lightblue theme-dark-bg  text-current font-xssss fw-700 ">TRUE</span></p>
                <p class="bg-lightblue theme-dark-bg  float-right w__48 d-inline-block mt-3 question-ans style3 rounded-lg font-xssss fw-600 lh-28 text-grey-700 mb-0"><span class="pt-2 pb-2 pl-3 pr-3 mr-4 d-block w-100 rounded-lg bg-lightblue theme-dark-bg  text-current font-xssss fw-700 ">FLASE</span></p>
                <div class="clearfix"></div>
                <a href="#" data-question="question4" class="next-bttn p-2 mt-3 d-inline-block text-white fw-700 lh-30 rounded-lg w200 text-center font-xsssss ls-3 bg-current">NEXT</a>
            </div>
            <div class="card-body text-center p-3 bg-no-repeat bg-image-topcenter" id="question4" style="display: none; background-image: url(images/user-pattern.png);">
                <img src="images/world-cup.png" alt="icon" class="d-inline-block">
                <h2 class="fw-700 mt-5 text-grey-900 font-xxl">Congratulation</h2>
                <p class="font-xssss fw-600 lh-30 text-grey-500 mb-0 p-2">I have a Business Management degree from Bangalore University and a long time Excel expert. I create professional Excel reports/dashboards for clients and conduct Excel workshops for business professionals.</p>
                <a href="home-9.html" data-question="question4" class="next-bttn p-2 mt-3 d-inline-block text-white fw-700 lh-30 rounded-lg w200 text-center font-xsssss ls-3 bg-current">VIEW SCORE</a>
            </div>
        </div>

    </div>
</div>



@endforeach


@endsection
