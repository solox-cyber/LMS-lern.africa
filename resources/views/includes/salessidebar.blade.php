                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">


                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                         <a href="{{route('home')}}">
                            <img alt="Logo" src="{{asset('https://lern.africa/public/media/logos/lern-logo1.png')}}" class="h-50px app-sidebar-logo-default" />
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
                                        <a href="{{route('sales.profile')}}" class="menu-link py-3 {{ set_active_route('sales.profile') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Profile Overview</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item -->

                                     <!--begin::Menu item-->
                                     <div class="menu-item">
                                        <a href="{{ route('salesstatement') }}" class="menu-link py-3 {{ set_active_route('salesstatement') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">My Statements</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{ route('salespayment.payout') }}" class="menu-link py-3 {{ set_active_route('salespayment.payout') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Request Payout</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    @if(Auth::user()->upline === 'sales_rep')
                                    <!-- begin::Menu item-->
                                    <div class="menu-item">

                                        <a href="{{route('pendinguserlists')}}" class="menu-link py-3 {{ set_active_route('pendinguserlists') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Unpaid Users</span>

                                        </a>
                                    </div>
                                    <!--end::Menu item -->
@endif

                                    <span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-educare fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span class="menu-title">Invitations</span></span>
   @if(Auth::user()->upline === 'sales_rep')
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <a href="{{ route('invites.index', ['user' => auth()->user()->id]) }}" class="menu-link py-3 {{ set_active_route('invite.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Overview</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    @endif

   @if(Auth::user()->upline === 'brand_ambassador')
 <!--begin::Menu item-->
 <div class="menu-item">
                                        <a href="{{ route('salesadd_contact') }}" class="menu-link py-3 {{ set_active_route('salesadd_contact') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Create Contacts</span>
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
