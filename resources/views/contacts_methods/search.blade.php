<!-- begin::Search -->
<div class="col-lg-4 col-xl-4">
    <!--begin::Contacts-->
    <div class="card card-flush" id="kt_contacts_list">
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
<!-- end::Search -->

