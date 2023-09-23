<!--begin::Content-->
<div id="kt_app_content" class="app-content  flex-column-fluid ">


    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>

                        <form action="{{ route('searchContact') }}" method="GET">
                            <input type="text" name="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Contact" />
                        </form>

                    </div>
                    <!--end::Search-->

                    <form action="{{ route('contacts.assign') }}" method="POST">
                        @csrf

                        <div class="d-flex align-items-center">
                            <!-- Select -->
                            <select name="sales_rep_id" id="sales_rep_id" class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select Sales Rep" data-kt-table-widget-4="filter_status">

                                <option value=""></option>
                                @foreach ($salesReps as $salesRep)
                                <option value="{{ $salesRep->id }}">{{ $salesRep->name }}</option>
                                @endforeach
                            </select>
                            <!-- End Select -->

                            <!-- Button -->
                            <button type="submit" class="btn btn-primary ms-3 flex-grow-1">Re-assign Contacts</button>
                            <!-- End Button -->
                        </div>


                </div>
                <!--end::Card title-->



                <!--begin::Card body-->
                <div class="card-body py-4">

                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>


                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">

                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" />

                                    </div>
                                </th>

                                <th class="min-w-125px">Name</th>

                                <th class="min-w-125px">Phone Number </th>
                                <th class="min-w-125px">Upline </th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @foreach ($salescontacts as $salesRep)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" name="contact_ids[]" type="checkbox" value="{{ $salesRep->id }}" />
                                    </div>
                                </td>


                                <td>
                                    {{ $salesRep->name }}
                                </td>

                                <td>
                                    {{ $salesRep->phone }}
                                </td>
                                <td>
                                    @if ($salesRep->user)
                                    {{ $salesRep->user->name }}
                                    @else
                                    N/A
                                    @endif
                                </td>



                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('contact.show', ['id' => $salesRep->id]) }}" class="menu-link px-3">
                                                View
                                            </a>

                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <!-- <div class="menu-item px-3">



                                    </div> -->
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>

                            </tr>



                            @endforeach
                        </tbody>
                    </table>
                    <!--end::Table-->
                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
