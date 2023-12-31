    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">


            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">


                <!--begin::Header-->
                <div id="kt_app_header" class="app-header ">

                    <!--begin::Header container-->
                    <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between " id="kt_app_header_container">

                        <!--begin::sidebar mobile toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n3 me-2" title="Show sidebar menu">
                            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                                <i class="ki-duotone ki-abstract-14 fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                        </div>
                        <!--end::sidebar mobile toggle-->


                        <!--begin::Mobile logo-->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <a href="{{route('home')}}">
                            <img alt="Logo" src="{{asset('https://lern.africa/public/media/logos/lern-logo1.png')}}" class="h-40px app-sidebar-logo-default" />
                        </a>
                        </div>
                        <!--end::Mobile logo-->

                        <!--begin::Header wrapper-->
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">


                            <!--begin::Menu wrapper-->
                            <div class="
app-header-menu
app-header-mobile-drawer
align-items-stretch
" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                                <!--begin::Menu-->
                                <div class="
menu
menu-rounded
menu-column
menu-lg-row
my-5
my-lg-0
align-items-stretch
fw-semibold
px-2 px-lg-0
" id="kt_app_header_menu" data-kt-menu="true">


                                    <!--end:Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->


                            <!--begin::Navbar-->
                            <div class="app-navbar flex-shrink-0">
                                <!--begin::Search-->
                                <div class="app-navbar-item align-items-stretch ms-1 ms-lg-3">


                                </div>
                                <!--end::Search-->

                                <!--begin::Activities-->
                                <div class="app-navbar-item ms-1 ms-lg-3">
                                    <!--begin::Drawer toggle-->
                                    <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" id="kt_activities_toggle">
                                        <i class="ki-duotone ki-notification-on fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                    </div>
                                    <!--end::Drawer toggle-->
                                </div>
                                <!--end::Activities-->







                                <!--begin::Theme mode-->
                                <div class="app-navbar-item ms-1 ms-lg-3">

                                    <!--begin::Menu toggle-->
                                    <a href="#" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-night-day theme-light-show fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i> <i class="ki-duotone ki-moon theme-dark-show fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                                    <!--begin::Menu toggle-->

                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-duotone ki-night-day fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i> </span>
                                                <span class="menu-title">
                                                    Light
                                                </span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-duotone ki-moon fs-2"><span class="path1"></span><span class="path2"></span></i> </span>
                                                <span class="menu-title">
                                                    Dark
                                                </span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-duotone ki-screen fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i> </span>
                                                <span class="menu-title">
                                                    System
                                                </span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->

                                </div>
                                <!--end::Theme mode-->

                                <!--begin::User menu-->
                                <div class="app-navbar-item ms-2 ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                    <!--begin::Menu wrapper-->
                                    <div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                        @if (Auth::user()->profilePicture)

                                        <img src="{{ asset('public/storage/' . str_replace('public/', '', Auth::user()->profilePicture->path)) }}" alt="user" />

                                        @else
                                        <!-- Display a default image or placeholder if the user doesn't have a profile picture -->
                                        <div style="width:100%;height:100%;font-size:20px;font-weight:bold">{{ substr(Auth::user()->name, 0, 1) }}</div>


                                        @endif

                                    </div>

                                    <!--begin::User account menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px me-5">

                                                    @if(Auth::user()->profilePicture)
                                                    <img src="{{ asset('public/storage/' . str_replace('public/', '', Auth::user()->profilePicture->path)) }}" alt="user" />

                                                    @else
                                                    <!-- Display a default profile picture if no profile picture is set -->
                                                    <div style="width:100%;height:100%;font-size:20px;font-weight:bold">{{ substr(Auth::user()->name, 0, 1) }}</div>
                                                    @endif

                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Username-->
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bold d-flex align-items-center fs-5">
                                                        @auth
                                                        {{ Auth::user()->name }}
                                                        @endauth <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                                    </div>

                                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                                        @auth
                                                        {{ Auth::user()->email }}
                                                        @endauth </a>
                                                </div>
                                                <!--end::Username-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="{{route('admin.profile')}}" class="menu-link px-5">
                                                My Profile
                                            </a>
                                        </div>
                                        <!--end::Menu item-->


                                        <!--begin::Menu item-->
                                        <!-- <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                            <a href="#" class="menu-link px-5">
                                                <span class="menu-title">My Subscription</span>
                                                <span class="menu-arrow"></span>
                                            </a>


                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">

                                                <div class="menu-item px-3">
                                                    <a href="account/referrals.html" class="menu-link px-5">
                                                        Referrals
                                                    </a>
                                                </div>



                                                <div class="menu-item px-3">
                                                    <a href="account/billing.html" class="menu-link px-5">
                                                        Billing
                                                    </a>
                                                </div>

                                                <div class="menu-item px-3">
                                                    <a href="account/statements.html" class="menu-link px-5">
                                                        Payments
                                                    </a>
                                                </div>

                                                <div class="menu-item px-3">
                                                    <a href="account/statements.html" class="menu-link d-flex flex-stack px-5">
                                                        Statements

                                                        <span class="ms-2 lh-0" data-bs-toggle="tooltip" title="View your statements">
                                                            <i class="ki-duotone ki-information-5 fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                                    </a>
                                                </div>

                                                <div class="separator my-2"></div>



                                            </div>

                                        </div> -->
                                        <!--end::Menu item-->



                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->


                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">



                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5 my-1">
                                            <a href="{{route('sales.setting')}}" class="menu-link px-5">
                                                Account Settings
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="" class="menu-link px-5">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf

                                                    <button type="submit" style="background-color:#ff2a2a;color:#fff;border:none;"> Sign Out</button>
                                                </form>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::User account menu-->
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::User menu-->

                                <!--begin::Header menu toggle-->
                                <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                                    <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
                                        <i class="ki-duotone ki-element-4 fs-1"><span class="path1"></span><span class="path2"></span></i>
                                    </div>
                                </div>
                                <!--end::Header menu toggle-->
                            </div>
                            <!--end::Navbar-->
                        </div>
                        <!--end::Header wrapper-->
                    </div>
                    <!--end::Header container-->
                </div>
                <!--end::Header-->
