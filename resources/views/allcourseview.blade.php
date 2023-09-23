
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
        <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Courses</a></li>
        <!-- <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Course <i class="ti-angle-down"></i></a>
            <div class="dropdown-menu">
                @foreach ($courses as $course)
                <a class="dropdown-item" href="{{ route('viewcourse', ['id' => $course->id]) }}">{{ $course->course_name }}</a>
                @endforeach
            </div>
        </li> -->
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

        <!-- header wrapper -->
<br><br><br>


        <div class="blog-page pt-lg--7 pb-lg--7 pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card rounded-xxl p-lg--5 border-0 bg-no-repeat" style=" background-color: #fdc202; ">
                            <div class="card-body w-100 p-4">
                                <div class="form-group mt-3 p-3 border-light border p-2 bg-white rounded-lg">
                                <form action="{{ route('searchcourse') }}" method="GET">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group icon-input mb-0">
                                                <i class="ti-search font-xs text-grey-400"></i>
                                                <input type="text" name="query" class="style1-input border-0 pl-5 font-xsss mb-0 text-grey-500 fw-500" placeholder="Search online courses..">
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                        <button type="submit" class="w-100 d-block btn bg-current text-white font-xssss fw-600 ls-3 style1-input p-0 border-0 text-uppercase ">Search</button>
                                        </div>
                                    </div>
                                </form>
                                </div>

                            </div>
                        </div>
                    </div>




                    <div class="how-to-work pb-lg--7 pt-3">
            <div class="container">

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="{{ str_replace(' ', '', $course->course_cat) }}">
                        <div class="row">
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

                            @push('styles')
                        <link rel="stylesheet" href="{{ asset('css/custom-pagination.css') }}">
                        @endpush

                        <div class="col-lg-12">
                        <ul class="pagination justify-content-center d-flex pt-5">
                            {{ $courses->links() }}
                        </ul>
                        </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>


                </div>
            </div>
        </div>

     <!-- footer wrapper -->
     <div class="footer-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">

                        <p class="copyright-text">© 2023 copyright. All rights reserved.</p>
                    </div>
                    <div class="col-sm-6 col-xs-12 text-right">

                                <li class="list-inline-item mr-3"><a href="#"><i class="ti-facebook"></i></a></li>
                                <li class="list-inline-item mr-3"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                <li class="list-inline-item mr-3"><a href="#"><i class="ti-linkedin"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="ti-instagram"></i></a></li>

                    </div>
                </div>
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

