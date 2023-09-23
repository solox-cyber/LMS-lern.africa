<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Lern.Africa</title>
    <meta charset="utf-8" />
    <meta name="description" content="Lern.Africa is an innovative edutech startup poised at offering top quality tech training programs to the african community." />
    <meta name="keywords" content="Lern.Africa, tech education, tech courses, online learning, web development, programming, data science, artificial intelligence, machine learning, cybersecurity, digital marketing, UX/UI design, video tutorials, online courses, e-learning, IT training, tech career, software development, coding bootcamp, tech skills, online education, tech videos, coding tutorials, technology learning, software engineering, tech enthusiasts" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Lern.Africa is an innovative edutech startup" />
    <meta property="og:url" content="https://lern.africa" />
    <meta property="og:site_name" content="Lern Africa" />
    <link rel="canonical" href="https://lern.africa" />
    <link rel="shortcut icon" href="{{ asset('media/logos/lern-logo1.png') }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
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

    <!--Begin::Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
    </script>
    <!--End::Google Tag Manager -->
    <style>
        @media (min-width: 992px) {
            .background-image-container {
                background-image: url(media/misc/auth-bgg.png);
            }
        }

        @media (max-width: 991px) {
            .background-image-container {
                background-image: none;
            }
        }
    </style>
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "dark";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                // themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                themeMode = defaultThemeMode;
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    // themeMode = localStorage.getItem("data-bs-theme");
                    themeMode = defaultThemeMode;
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "dark";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center background-image-container">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center p-6 p-lg-10 w-100">
                    <!--begin::Logo-->
                    <!-- <a href="../../../index.html" class="mb-0 mb-lg-20">
            <img alt="Logo" src="{{ asset('media/logos/default-white.svg') }}" class="h-40px h-lg-50px" />
        </a> -->
                    <!--end::Logo-->

                    <!--begin::Image-->
                    <!-- <img class="d-none d-lg-block mx-auto w-300px w-lg-75 w-xl-500px mb-10 mb-lg-20"
            src="{{ asset('media/logos/lern-auth.png') }}" alt="" /> -->
                    <div class="logo-container d-block d-lg-none mx-auto text-center" style="background-image: url('{{ asset('media/misc/auth.png') }}'); margin-bottom: -50px; background-size: cover; background-position: center;border-radius:50%">
                        <!--begin::Image-->
                        <img class="w-100px" style="border-radius: 50%;" src="{{ asset('media/misc/auth.png') }}" alt="" />
                        <!--end::Image-->
                    </div>


                    <!--end::Image-->
                </div>
                <!--end::Content-->
            </div>
            <!--begin::Aside-->
            @yield('content')

        </div>
        <!--end::Authentication - Sign-up-->



    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "../../../assets/index.html";
    </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->


    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

</body>
<!--end::Body-->


</html>
