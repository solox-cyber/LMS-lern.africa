
   <!--begin::Nav items-->
   <div id="kt_user_profile_nav" class="rounded bg-gray-200 d-flex flex-stack flex-wrap mb-9 p-2" data-kt-sticky="true" data-kt-sticky-name="sticky-profile-navs" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{target: '#kt_user_profile_panel'}" data-kt-sticky-left="auto" data-kt-sticky-top="70px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                    <!--begin::Nav-->
                    <ul class="nav flex-wrap border-transparent">
                        <!--begin::Nav item-->
                        <!-- <li class="nav-item my-1">
                            <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1
                            {{ set_active_route('overview') }}" href="{{ route('overview') }}">

                                Overview </a>
                        </li> -->
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item my-1">
                            <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1 {{ set_active_route('setting') }}
                    " href="{{ route('setting') }}">

                             <b> Edit Account Details</b> </a>
                        </li>
                        <!--end::Nav item-->


                        <!--begin::Nav item-->
                        <li class="nav-item my-1">
                            <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1 {{ set_active_route('payout') }}
                    " href="{{route('payout')}}">

                               <b>Request Payout</b> </a>
                        </li>
                        <!--end::Nav item-->

                           <!--begin::Nav item-->
                           <li class="nav-item my-1">
                            <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1 {{ set_active_route('statement') }}
                    " href="{{route('statement')}}">

                               <b>Statement</b> </a>
                        </li>
                        <!--end::Nav item-->

 <!--begin::Nav item-->
 <li class="nav-item my-1">
 <form action="{{ route('logout') }}" method="POST">
                                                    @csrf

                                                    <button type="submit" class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1" style="background-color:none;border:none;"> <b>Sign Out</b></button>
                                                </form>
                        </li>
                        <!--end::Nav item-->


                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::Nav items-->
