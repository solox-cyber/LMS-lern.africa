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
                            <img alt="Logo" src="{{asset('media/logos/lern-logo1.png')}}" style="height:40px;width:60px;" class="img-fluid h-20px app-sidebar-logo-default" />
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav nav-menu float-none text-center">
        <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('allcourses') }}">Courses</a></li>
        <!--<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Course <i class="ti-angle-down"></i></a>-->
        <!--    <div class="dropdown-menu">-->
        <!--        @foreach ($courses as $course)-->
        <!--        <a class="dropdown-item" href="{{ route('viewcourse', ['id' => $course->id]) }}">{{ $course->course_name }}</a>-->
        <!--        @endforeach-->
        <!--    </div>-->
        <!--</li>-->
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


        <div class="banner-wrapper vh-md-100 layenter emaiquiteer-after app-shape" style="background-color:#fdc202">
            <div class="container">
                <div class="row">
                    <div class="col-xxxl-7 col-xl-7 vh-md-100 pt-7 pb-7 align-items-center d-flex">
                        <div class="card w-100 border-0 bg-transparent">
                            <h2 class="fw-700 text-grey-900 display5-size display4-xs-size lh-1 mb-0 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">Join <br><span class="text-current">Lern.Africa</span> for affordable top-notch Tech Courses</h2>

                        </div>
                    </div>
                    <div class="col-xxxl-5 col-xl-4 vh-md-100 align-items-center d-flex ">
                        <div class="card w-100 border-0 bg-transparent text-center d-block">
                            <img src="{{ asset('media/images/app-bg.png')}}" alt="app-bg" class="w-100 d-none d-lg-block aos-init" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="500">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="search-wrap position-relative" style="top:-50px; ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card rounded-lg p-3 border-0 bg-no-repeat bg-white shadow-lg">
                            <div class="card-body w-100 p-0">
                                <div class="form-group mt-0 p-2 mb-0 bg-white rounded-lg">
                                <form action="{{ route('searchcourse') }}" method="GET">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="form-group icon-input mb-0">
                                                <i class="ti-search font-xs text-grey-400"></i>
                                                <input type="text" name="query" class="style1-input border-0 pl-5 font-xsss mb-0 text-grey-500 fw-500" placeholder="Search online courses..">
                                            </div>
                                        </div>


                                        <div class="col-lg-3">
                                            <button type="submit" class="w-100 d-block btn bg-current text-white font-xssss fw-600 ls-3 style1-input p-0 border-0 text-uppercase ">Search</button>
                                        </div>
                                    </div>
</form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="category-wrapper pb-lg--7 pb-5">
            <div class="container">
                <div class="row">
                    <div class="page-title style1 col-xl-4 col-lg-4 col-md-6 text-left">
                        <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 mt-1 d-block lh-3">Browse <br>     by Category</h2>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-4 ">
                        <div class="owl-carousel category-card owl-theme overflow-visible nav-none">
                            <div class="item">
                                <div class="card mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #fcf1eb;">
                                    <div class="card-body p-2 ml-1 ">
                                        <a href="#" class="btn-round-xl bg-white"><img src="images/download1.png" alt="icon" class="p-2"></a>
                                        <h4 class="fw-600 font-xsss mt-3 mb-0">Bootstrap <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">32 Course</span></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #fff9eb;">
                                    <div class="card-body p-2 ml-1 ">
                                        <a href="#" class="btn-round-xl bg-white"><img src="images/download2.png" alt="icon" class="p-2"></a>
                                        <h4 class="fw-600 font-xsss mt-3 mb-0">HTML <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">32 Course</span></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #e5f4fb;">
                                    <div class="card-body p-2 ml-1 ">
                                        <a href="#" class="btn-round-xl bg-white"><img src="images/download3.png" alt="icon" class="p-2"></a>
                                        <h4 class="fw-600 font-xsss mt-3 mb-0">Jquery <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">32 Course</span></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #dcf4f8;">
                                    <div class="card-body p-2 ml-1 ">
                                        <a href="#" class="btn-round-xl bg-white"><img src="images/download4.png" alt="icon" class="p-2"></a>
                                        <h4 class="fw-600 font-xsss mt-3 mb-0">Sass <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">32 Course</span></h4>
                                    </div>
                                </div>
                            </div>


                            <div class="item">
                                <div class="card mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #fcf1eb;">
                                    <div class="card-body p-2 ml-1 ">
                                        <a href="#" class="btn-round-xl bg-white"><img src="images/download5.png" alt="icon" class="p-2"></a>
                                        <h4 class="fw-600 font-xsss mt-3 mb-0">React <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">32 Course</span></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #fff9eb;">
                                    <div class="card-body p-2 ml-1 ">
                                        <a href="#" class="btn-round-xl bg-white"><img src="images/download6.png" alt="icon" class="p-2"></a>
                                        <h4 class="fw-600 font-xsss mt-3 mb-0">JAVA <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">32 Course</span></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #e5f4fb;">
                                    <div class="card-body p-2 ml-1 ">
                                        <a href="#" class="btn-round-xl bg-white"><img src="images/download7.png" alt="icon" class="p-2"></a>
                                        <h4 class="fw-600 font-xsss mt-3 mb-0">Python<span class="d-block font-xsssss fw-500 text-grey-500 mt-2">32 Course</span></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #fcf1eb;">
                                    <div class="card-body p-2 ml-1 ">
                                        <a href="#" class="btn-round-xl bg-white"><img src="images/mongodb.png" alt="icon" class="p-2"></a>
                                        <h4 class="fw-600 font-xsss mt-3 mb-0">Mongodb <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">32 Course</span></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #fcf1eb;">
                                    <div class="card-body p-2 ml-1 ">
                                        <a href="#" class="btn-round-xl bg-white"><img src="images/download1.png" alt="icon" class="p-2"></a>
                                        <h4 class="fw-600 font-xsss mt-3 mb-0">Desinger <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">32 Course</span></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #fff9eb;">
                                    <div class="card-body p-2 ml-1 ">
                                        <a href="#" class="btn-round-xl bg-white"><img src="images/download2.png" alt="icon" class="p-2"></a>
                                        <h4 class="fw-600 font-xsss mt-3 mb-0">Desinger <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">32 Course</span></h4>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="how-to-work pb-lg--7 pt-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center mb-5">


                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        <div class="row">
                       <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                       <h2>Search Results for "{{ $searchQuery }}"</h2>
                       </div>

        @if ($courses->isEmpty())
            <p>No results found.</p>
        @else


                            @foreach ($courses as $course)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                                <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 course-card">
                                    <div class="card-image w-100 mb-3">
                                        <a href="{{ route('viewcourse', ['id' => $course->id]) }}" class="video-bttn position-relative d-block">

                                            @if ($course->profilePicture)
                                            <img src="{{ asset('storage/' . ($course->profilePicture->path)) }}" alt="image" class="w-100">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-danger d-inline-block text-danger mr-1">{{$course->course_cat}}</span>
                                        <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss">₦</span> {{$course->tuition_fee}}</span>
                                        <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="{{ route('viewcourse', ['id' => $course->id]) }}" class="text-dark text-grey-900">{{$course->course_name}}</a></h4>
                                        <!-- <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2"> 23 Lesson </h6> -->

                                    </div>
                                </div>
                            </div>

                            @endforeach

                            @endif
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    </div>



    <!-- <div class="feature-wrapper pt-lg--7 pt-7">
            <div class="container">
                <div class="row justify-content-center">



                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="banner-slider owl-carousel owl-theme owl-nav-link dot-style3 text-left-dot rounded-lg overflow-visible nav-none">
                            <div class="owl-items text-center" >
                                <span class="btn-round-xxxl bg-warning mb-4"><i class="ti-quote-right display1-size text-white"></i></span>
                                <h4 class="fw-500 lh-5 font-md mb-3 text-grey-700">Quite simply the best theme we’ve ever purchased. The customisation and flexibility are superb. Speed is awesome. Not a criticism we can make. Fun to use the theme, easy installation, super easy to use. Excellent work.”</h4>

                                <div class="clearfix"></div>
                                <div class="card-body pl-0 pt-0 mt-4 mb-5 pb-4 d-block">
                                    <img src="images/user-6.png" alt="user" class="w45 mr-auto ml-auto mb-3">
                                    <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Goria Coast</h4>
                                    <h5 class="font-xssss fw-500 mb-1 text-grey-500">Digital Marketing Executive</h5>
                                </div>

                            </div>

                            <div class="owl-items text-center" >
                                <span class="btn-round-xxxl bg-twiiter mb-4"><i class="ti-twitter-alt font-xl text-white"></i></span>
                                <h4 class="fw-500 lh-5 font-md mb-3 text-grey-700">Quite simply the best theme we’ve ever purchased. The customisation and flexibility are superb. Speed is awesome. Not a criticism we can make. Fun to use the theme, easy installation, super easy to use. Excellent work.”</h4>

                                <div class="clearfix"></div>
                                <div class="card-body pl-0 pt-0 mt-4 mb-5 pb-4 d-block">
                                    <img src="images/user-6.png" alt="user" class="w45 mr-auto ml-auto mb-3">
                                    <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Goria Coast</h4>
                                    <h5 class="font-xssss fw-500 mb-1 text-grey-500">Digital Marketing Executive</h5>
                                </div>

                            </div>

                            <div class="owl-items text-center" >
                                <span class="btn-round-xxxl bg-danger mb-4"><i class="feather-slack font-xl text-white"></i></span>
                                <h4 class="fw-500 lh-5 font-md mb-3 text-grey-700">Quite simply the best theme we’ve ever purchased. The customisation and flexibility are superb. Speed is awesome. Not a criticism we can make. Fun to use the theme, easy installation, super easy to use. Excellent work.”</h4>

                                <div class="clearfix"></div>
                                <div class="card-body pl-0 pt-0 mt-4 mb-5 pb-4 d-block">
                                    <img src="images/user-6.png" alt="user" class="w45 mr-auto ml-auto mb-3">
                                    <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Goria Coast</h4>
                                    <h5 class="font-xssss fw-500 mb-1 text-grey-500">Digital Marketing Executive</h5>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div> -->





    <!-- <div class="brand-wrapper pt-5 pb-7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-slider owl-carousel owl-theme overflow-visible dot-none">
                            <div class="owl-items text-center"><img src="images/b-1.png" alt="icon" class="w75 ml-auto mr-auto"></div>
                            <div class="owl-items text-center"><img src="images/b-2.png" alt="icon" class="w75 ml-auto mr-auto"></div>
                            <div class="owl-items text-center"><img src="images/b-3.png" alt="icon" class="w75 ml-auto mr-auto"></div>
                            <div class="owl-items text-center"><img src="images/b-4.png" alt="icon" class="w75 ml-auto mr-auto"></div>
                            <div class="owl-items text-center"><img src="images/b-5.png" alt="icon" class="w75 ml-auto mr-auto"></div>
                            <div class="owl-items text-center"><img src="images/b-6.png" alt="icon" class="w75 ml-auto mr-auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->




     <!-- footer wrapper -->
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
