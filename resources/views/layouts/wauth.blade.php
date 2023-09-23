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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('b3591ef119a7e34f2755', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('popup-channel');
        channel.bind('user-register', function(data) {
            toastr.success(JSON.stringify(data.message) + ' has joined the Lern.Africa Train');
        });
    </script>

    <style>
  .popular-wrapper{
    overflow: hidden;
  }
    </style>
</head>

@yield('content')

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


    <!-- Include jQuery (required by Owl Carousel) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Owl Carousel JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Initialize Owl Carousel -->
    <script>
    $(document).ready(function() {
        $('.feedback-slider').owlCarousel({
            items: 3, // Number of items to show in the carousel
            loop: true, // Loop the carousel
            margin: 20, // Margin between items
            // Show navigation arrows
            nav: true,
            navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
            navClass: ['owl-prev text-black', 'owl-next text-white'],

            dots: false, // Hide navigation dots
            autoplay: true, // Enable autoplay
            autoplayTimeout: 2000, // Autoplay interval in milliseconds
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    });
</script>


    <script src="{{ asset('js/plugin.js')}}"></script>
    <script src="{{ asset('js/aos.min.js')}}"></script>
    <script src="{{ asset('js/scripts.js')}}"></script>


<!-- Toastr JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
        AOS.init();
    </script>

</body>


<!-- Mirrored from uitheme.net/elomoas/home-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2023 23:05:02 GMT -->

</html>
