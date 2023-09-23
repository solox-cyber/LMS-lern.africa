                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">


                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                        <a href="{{route('home')}}">
                        <img alt="Logo" src="{{asset('https://lern.africa/public/media/logos/lern-logo.png')}}" class="h-50px app-sidebar-logo-default" />
                        </a>
                        <!--end::Logo image-->

                        <!--begin::Sidebar toggle-->
                        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-sm h-30px w-30px rotate " data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">

                            <i class="ki-duotone ki-double-left fs-2 rotate-180"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
                            <!--begin::Menu-->
                            <div class="
                menu
                menu-column
                menu-rounded
                menu-sub-indention
                fw-semibold
                px-3
            " id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">

                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{route('dashboard')}}" class="menu-link py-3 {{ set_active_route('dashboard') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Home</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!-- begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{route('admin.profile')}}" class="menu-link py-3 {{ set_active_route('admin.profile') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Profile Overview</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item -->
                                    @if(Auth::user()->usertype !== 'subadmin' && Auth::user()->upline === '0')
                                    <!-- begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{route('admin.list')}}" class="menu-link py-3 {{ set_active_route('admin.list') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Admin List</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item -->

                                    <span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-educare fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span class="menu-title">User Management</span></span>

                                    <!-- begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{route('userlist')}}" class="menu-link py-3 {{ set_active_route('userlist') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Paid Users</span>

                                        </a>
                                        <a href="{{route('Puserlist')}}" class="menu-link py-3 {{ set_active_route('Puserlist') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Unpaid Users</span>

                                        </a>
                                        <a href="{{route('pcusers')}}" class="menu-link py-3 {{ set_active_route('pcusers') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Peculiar Case Users</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item -->

                                    <span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-educare fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span class="menu-title">Commission Management</span></span>

                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{route('admin.commissions')}}" class="menu-link py-3 {{ set_active_route('admin.commissions') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">View Commission List</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    @endif

                                    @if(Auth::user()->usertype !== 'admin' && Auth::user()->upline === '2' || Auth::user()->usertype !== 'subadmin')
                                    <span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-educare fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span class="menu-title">Sales Rep</span></span>

                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{route('admin.salesrep')}}" class="menu-link py-3 {{ set_active_route('admin.salesrep') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Create Sales Rep</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{route('view.salesrep')}}" class="menu-link py-3 {{ set_active_route('view.salesrep') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">View Sales Rep List</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{route('sales.commissions')}}" class="menu-link py-3 {{ set_active_route('sales.commissions') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Commission List</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    @endif

                                    @if(Auth::user()->usertype !== 'subadmin' && Auth::user()->upline === '0')
                                    <span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-educare fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span class="menu-title">Invitations</span></span>

                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{route('invite.index')}}" class="menu-link py-3 {{ set_active_route('invite.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Overview</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                @endif

                                @if(Auth::user()->usertype !== 'admin' && Auth::user()->upline === '1' || Auth::user()->usertype !== 'subadmin')
                                    <span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-abstract-25 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Courses</span></span>
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{route('course.create')}}" class="menu-link py-3 {{ set_active_route('course.create') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Create Course</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                     <!--begin::Menu item-->
                                     <div class="menu-item">
                                        <a href="{{route('syllabus.create')}}" class="menu-link py-3 {{ set_active_route('syllabus.create') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Create Course Topic</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                     <!--begin::Menu item-->
                                     <div class="menu-item">
                                        <a href="{{route('subtopics.create')}}" class="menu-link py-3 {{ set_active_route('subtopics.create') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Create Course Sub Topic</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                     <!--begin::Menu item-->
                                     <div class="menu-item">
                                        <a href="{{route('course.create')}}" class="menu-link py-3 {{ set_active_route('videos.create') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Create Course Videos</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{route('course.list')}}" class="menu-link py-3 {{ set_active_route('course.list') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">View Course List</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    @endif
                                </div>


                            </div>
                            <!--end::Menu-->

                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::sidebar menu-->
                </div><!--end::Sidebar-->
