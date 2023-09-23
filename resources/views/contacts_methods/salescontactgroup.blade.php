<div class="row g-7">
    <!--begin::Contact groups-->
    <div class="col-lg-6 col-xl-3">
        <!--begin::Contact group wrapper-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Groups</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Contact groups-->
                <div class="d-flex flex-column gap-5">
                    <!--begin::Contact group-->
                    <div class="d-flex flex-stack">
                        <a href="{{route('salescontacts')}}" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">All Contacts</a>
                        <div class="badge badge-light-primary">{{ $count }}</div>
                    </div>
                    <!--begin::Contact group-->

                </div>
                <!--end::Contact groups-->

                <!--begin::Separator-->
                <div class="separator my-7"></div>
                <!--begin::Separator-->



                <!--begin::Add new contact-->
                <a href="{{route('salesadd_contact')}}" class="btn btn-primary w-100">
                    <i class="ki-duotone ki-badge fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> Add new contact
                </a>
                <!--end::Add new contact-->
            </div>
            <!--end::Card body-->

            <!--begin::Contacts-->
    <div class="card card-flush" id="kt_contacts_list" style="height:200px;overflow:scroll">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_contacts_list_header">
           <!--begin::Form-->
           <form class="d-flex align-items-center position-relative w-100 m-0" method="POST" action="{{ route('contact.search') }}" autocomplete="off">
                <!--begin::Icon-->
                @csrf
                <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span class="path1"></span><span class="path2"></span></i> <!--end::Icon-->

                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid ps-13" id="searchInput" name="search" value="" placeholder="Search contacts" />
                <!--end::Input-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body pt-5" id="kt_contacts_list_body">

        </div>
        <!--end::Card body-->
    </div>
    <!--end::Contacts-->
        </div>
        <!--end::Contact group wrapper-->
    </div>
    <!--end::Contact groups-->
