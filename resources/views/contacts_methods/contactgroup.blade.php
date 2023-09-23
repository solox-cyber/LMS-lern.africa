<div class="col-md-4">
            <div class="middle-wrap">
                <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-lg">

                        <h4 class="font-xs text-white fw-600 ml-4 mb-0 mt-2">Groups</h4>
                    </div>
                    <div class="card-body p-lg-5 p-4 w-100 border-0 mb-0">

                    <a href="{{route('allcontacts')}}" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">All Contacts</a>
                        <div class="badge badge-light-primary">{{ $count }}</div>
                       

                        <form class="d-flex align-items-center position-relative w-100 m-0" method="POST" action="{{ route('contact.search') }}" autocomplete="off">
                <!--begin::Icon-->
                @csrf
                <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span class="path1"></span><span class="path2"></span></i> <!--end::Icon-->

                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid ps-13" id="searchInput" name="search" value="" placeholder="Search contacts" />
                <!--end::Input-->
            </form>

            <div class="card-body pt-5" id="kt_contacts_list_body">

</div>
                    </div>
                </div>

                </form>
            </div>
        </div>

