<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uitheme.net/elomoas/home-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2023 23:04:57 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lern.Africa</title>

    <link rel="stylesheet" href="{{ asset('css/themify-icons.css')}}">

    <link rel="stylesheet" href="{{ asset('css/feather.css')}}">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('media/logos/lern-logo1.png') }}" />
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.min.css') }}">


</head>
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
                                <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">Home</a></li>
 <li class="nav-item"><a class="nav-link" href="{{route('allcourses')}}">Courses</a></li>

                                <!--<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Course <i class="ti-angle-down"></i></a>-->
                                <!--    <div class="dropdown-menu">-->

                                <!--    </div>-->
                                <!--</li>-->
                                <li class="nav-item"><a class="nav-link" href="{{route('contactUs')}}">Contact</a></li>
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
        <!-- header wrapper -->
<br><br><br>
        <div class="course-details pt-lg--7 pb-lg--7 pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-xxl-9 col-lg-8">
                        <div class="card border-0 mb-0 rounded-lg overflow-hidden">
                              @if ($course->bannerPicture)
                                        <img src="{{ asset('storage/' . ($course->bannerPicture->path)) }}"  alt="Course Logo">
                                        @endif
                            <!-- <div class="player shadow-none">
                               <video id='video' src='images/video4.mp4' playsinline></video>
                                    <div class='play-b tn-big'></div>
                                    <div class='controls'>
                                        <div class="time"><span class="time-current"></span><span class="time-total"></span></div>
                                        <div class='progress'>
                                            <div class='progress-filled'></div>
                                        </div>
                                        <div class='controls-main'>
                                            <div class='controls-left'>
                                                <div class='volume'>
                                                    <div class='volume-btn loud mt-1'>
                                                        <i class="feather-volume-1 font-xl text-white"></i>
                                                    </div>
                                                    <div class='volume-slider'>
                                                        <div class='volume-filled'></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='play-btn paused'></div>
                                            <div class="controls-right">
                                                <div class='speed'>
                                                    <ul class='speed-list'>
                                                        <li class='speed-item' data-speed='0.5'>0.5x</li>
                                                        <li class='speed-item' data-speed='0.75'>0.75x</li>
                                                        <li class='speed-item active' data-speed='1'>1x</li>
                                                        <li class='speed-item' data-speed='1.5'>1.5x</li>
                                                        <li class='speed-item' data-speed='2'>2x</li>
                                                    </ul>
                                                </div>
                                                <div class='fullscreen'>
                                                    <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 0V-1.5H-1.5V0H0ZM0 18H-1.5V19.5H0V18ZM26 18V19.5H27.5V18H26ZM26 0H27.5V-1.5H26V0ZM1.5 6.54545V0H-1.5V6.54545H1.5ZM0 1.5H10.1111V-1.5H0V1.5ZM-1.5 11.4545V18H1.5V11.4545H-1.5ZM0 19.5H10.1111V16.5H0V19.5ZM24.5 11.4545V18H27.5V11.4545H24.5ZM26 16.5H15.8889V19.5H26V16.5ZM27.5 6.54545V0H24.5V6.54545H27.5ZM26 -1.5H15.8889V1.5H26V-1.5Z" transform="translate(2 2)" fill="white"/>
                                                    </svg>
                                                </div>
                                            </div>


                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="card d-block border-0 rounded-lg overflow-hidden dark-bg-transparent bg-transparent mt-4 pb-3">
                            <div class="row">
                                <div class="col-10"><h2 class="fw-700 font-md d-block lh-4 mb-2">{{$course->course_name}}</h2></div>
                                <div class="col-2">
                                    <a href="#" class="btn-round-md mb-1 ml-3 d-inline-block float-right rounded-lg bg-danger"><i class="feather-bookmark font-sm text-white"></i></a>
                                    <a href="#" class="btn-round-md mb-1 ml-0 d-inline-block float-right rounded-lg bg-greylight" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="feather-share-2 font-sm text-grey-700"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right p-3 border-0 shadow-xss" x-placement="left-start" aria-labelledby="dropdownMenu2">
                                        <ul class="d-flex align-items-center mt-0 float-left">
                                            <li class="mr-2"><h4 class="fw-600 font-xss text-grey-900  mt-2 mr-3">Share: </h4></li>
                                            <li class="mr-2"><a href="#" class="btn-round-md bg-facebook"><i class="font-xs ti-facebook text-white"></i></a></li>
                                            <li class="mr-2"><a href="#" class="btn-round-md bg-twiiter"><i class="font-xs ti-twitter-alt text-white"></i></a></li>
                                            <li class="mr-2"><a href="#" class="btn-round-md bg-linkedin"><i class="font-xs ti-linkedin text-white"></i></a></li>
                                            <li class="mr-2"><a href="#" class="btn-round-md bg-instagram"><i class="font-xs ti-instagram text-white"></i></a></li>
                                            <li class="mr-2"><a href="#" class="btn-round-md bg-pinterest"><i class="font-xs ti-pinterest text-white"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <span class="font-xssss fw-700 text-grey-900 d-inline-block ml-0 text-dark">{{$course->instructor_name}}</span>
                            <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey"></span>

                            <span class="font-xssss fw-600 text-grey-500 d-inline-block ml-1">{{$course->course_tag}}</span>

                            <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey"></span>
                            <span class="font-xssss fw-700 text-primary d-inline-block ml-0 ">Follow Author</span>
                        </div>

                        <div class="card d-block border-0 rounded-lg overflow-hidden mt-2">
                            
                            <!-- <div id="accordion" class="accordion mb-0">
                                <div class="card shadow-xss mb-0">
                                    <div class="card-header bg-greylight theme-dark-bg" id="headingOne">
                                        <h5 class="mb-0"><button class="btn font-xsss fw-600 btn-link " data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> Development  to the Course </button></h5>
                                    </div>
                                    <div id="collapseOne" class="collapse p-3 show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">1</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Introduction to the course</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">12:34</span>
                                        </div>

                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">2</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos in HD mode only</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">10:34</span>
                                        </div>

                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">3</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos in HD mode only</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">10:34</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow-xss mb-0">
                                    <div class="card-header bg-greylight theme-dark-bg" id="headingTwo">
                                        <h5 class="mb-0"><button class="btn font-xsss fw-600 btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Creating a sliding down menu </button></h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse p-3" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">1</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Introduction to the course</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">12:34</span>
                                        </div>

                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">2</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos in HD mode only</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">10:34</span>
                                        </div>

                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">3</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos in HD mode only</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">10:34</span>
                                        </div>

                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">4</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos in HD mode only</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">10:34</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-xss mb-0">
                                    <div class="card-header bg-greylight theme-dark-bg" id="headingTwo">
                                        <h5 class="mb-0"><button class="btn font-xsss fw-600 btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> People chart infographics Animation </button></h5>
                                    </div>
                                    <div id="collapseThree" class="collapse p-3" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">1</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Introduction to the course</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">12:34</span>
                                        </div>

                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">2</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos in HD mode only</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">10:34</span>
                                        </div>

                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">3</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos in HD mode only</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">10:34</span>
                                        </div>

                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">4</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos in HD mode only</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">10:34</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-xss mb-0">
                                    <div class="card-header bg-greylight theme-dark-bg" id="headingTwo">
                                        <h5 class="mb-0"><button class="btn font-xsss fw-600 btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour"> Creating a clock animation with rotation property of shapes</button></h5>
                                    </div>
                                    <div id="collapsefour" class="collapse p-3" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">1</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Introduction to the course</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">12:34</span>
                                        </div>

                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">2</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos in HD mode only</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">10:34</span>
                                        </div>

                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">3</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos in HD mode only</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">10:34</span>
                                        </div>

                                        <div class="card-body d-flex p-2">
                                            <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">4</span>
                                            <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos in HD mode only</span>
                                            <span class="ml-auto font-xssss fw-500 text-grey-500">10:34</span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

   <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
                            <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Description</h2>

                            <p class="font-xssss fw-500 lh-28 text-grey-600 mb-0 pl-2">  {!! nl2br(strip_tags($course->about_course)) !!}</p>
                        </div>
                        
                        <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4 alert-success">
                            <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 text-success mb-4">Key Learning Objectives</h2>
                            <h4 class="font-xssss fw-600 text-grey-600 mb-3 pl-30 position-relative lh-24">    {!! nl2br(strip_tags($course->course_obj)) !!}</h4>

                        </div>


                        <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4 mb-5">
                            <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Who Should Attend</h2>
                            <p class="font-xssss fw-500 lh-28 text-grey-600 mb-0 pl-2">{!! nl2br(strip_tags($course->other_information)) !!}</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-xxl-3 col-lg-4">
                        <div class="card p-4 mb-4 bg-primary border-0 shadow-xss rounded-lg">
                            <div class="card-body">
                                <!-- <h2 class="text-white font-xsssss fw-700 text-uppercase ls-3 ">Starter</h2> -->
                                <h2 class="text-white fw-700" style="font-size:28px">₦{{ number_format($course->tuition_fee, 2) }}</h2>
                                <h4 class="text-white font-xssss mb-2"><i class="ti-check mr-2 text-white"></i> Full lifetime access</h4>
                                <h4 class="text-white font-xssss mb-2"><i class="ti-check mr-2 text-white"></i> Private share links</h4>
                                <h4 class="text-white font-xssss mb-4"><i class="ti-check mr-2 text-white"></i>Certificate of completion</h4>
                                 <a href="{{route('checkout', ['course_id' => $course->id])}}" class="btn btn-block border-0 w-100 bg-white p-3 text-primary fw-600 rounded-lg d-inline-block font-xssss btn-light">Enroll</a>

                            </div>
                        </div>


                        <!-- <div class="card shadow-xss rounded-lg border-0 p-4 mb-4">
                            <h4 class="font-xs fw-700 text-grey-900 d-block mb-3">Modul <a href="#" class="float-right"><i class="ti-arrow-circle-right text-grey-500 font-xss"></i></a></h4>
                            <div class="card-body d-flex p-0">
                                <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">1</span>
                                <span class="font-xssss fw-500 text-grey-500 ml-2">Introduction</span>
                                <span class="ml-auto font-xssss fw-500 text-grey-500">12:34</span>
                            </div>
                            <div class="card-body d-flex p-0 mt-3">
                                <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">2</span>
                                <span class="font-xssss fw-500 text-grey-500 ml-2">Watch the videos</span>
                                <span class="ml-auto font-xssss fw-500 text-grey-500">22:34</span>
                            </div>

                            <div class="card-body d-flex p-0 mt-3">
                                <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">3</span>
                                <span class="font-xssss fw-500 text-grey-500 ml-2"> Creating a sliding</span>
                                <span class="ml-auto font-xssss fw-500 text-grey-500">34:34</span>
                            </div>

                            <div class="card-body d-flex p-0 mt-3">
                                <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">4</span>
                                <span class="font-xssss fw-500 text-grey-500 ml-2">Make a  Dropdown</span>
                                <span class="ml-auto font-xssss fw-500 text-grey-500">40:34</span>
                            </div>

                            <div class="card-body d-flex p-0 mt-3">
                                <span class="bg-current btn-round-xs rounded-lg font-xssss text-white fw-600">5</span>
                                <span class="font-xssss fw-500 text-grey-500 ml-2">Conclusion</span>
                                <span class="ml-auto font-xssss fw-500 text-grey-500">2:34</span>
                            </div>
                        </div> -->
                    </div>

                </div>
            </div>
        </div>





          <!-- footer wrapper -->
     <!--<div class="footer-wrapper">-->
     <!--       <div class="container">-->
     <!--           <div class="row">-->
     <!--               <div class="col-sm-6 col-xs-12">-->

     <!--                   <p class="copyright-text">© 2023 copyright. All rights reserved.</p>-->
     <!--               </div>-->
     <!--               <div class="col-sm-6 col-xs-12 text-right">-->

     <!--                           <li class="list-inline-item mr-3"><a href="#"><i class="ti-facebook"></i></a></li>-->
     <!--                           <li class="list-inline-item mr-3"><a href="#"><i class="ti-twitter-alt"></i></a></li>-->
     <!--                           <li class="list-inline-item mr-3"><a href="#"><i class="ti-linkedin"></i></a></li>-->
     <!--                           <li class="list-inline-item"><a href="#"><i class="ti-instagram"></i></a></li>-->

     <!--               </div>-->
     <!--           </div>-->
     <!--       </div>-->
     <!--   </div>-->
     <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <p class="copyright-text">© 2023 Copyright. All rights reserved.</p>
            </div>
            <div class="col-md-6 col-xs-12 text-right">
                <ul class="social-icons-list list-inline">
                    <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                    <!--<li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>-->
                    <li class="list-inline-item"><a href="https://www.linkedin.com/company/lern-africa" target="_blank"><i class="ti-linkedin"></i></a></li>
                    <!--<li class="list-inline-item"><a href="#"><i class="ti-instagram"></i></a></li>-->
                </ul>
            </div>
        </div>
        <!-- footer wrapper -->

    </div>




    <script src="{{ asset('js/plugin.js')}}"></script>
    <script src="{{ asset('js/aos.min.js')}}"></script>
    <script src="{{ asset('js/scripts.js')}}"></script>
    <script>
        AOS.init();
    </script>

</body>


<!-- Mirrored from uitheme.net/elomoas/home-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2023 23:05:02 GMT -->

</html>
