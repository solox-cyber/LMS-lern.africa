<div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-lg">
        <h4 class="font-xs text-white fw-600 ml-4 mb-0 mt-2">Deactivate Account</h4>
    </div>
    <div class="card-body p-lg-5 p-4 w-100 border-0 ">

        <form method="POST" action="{{ route('deactivate.account') }}" class="form">
            @csrf
            <!--begin::Card body-->

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <div class="row">

                <div class="col-lg-12 mb-3">
                    <h4 class="text-gray-900 fw-bold">You Are Deactivating Your Account</h4>

                    <div class="fs-6 text-gray-700 ">For extra security, this requires you to confirm your email or phone number when you reset yousignr password. <br /></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="form-group">
                        <input name="deactivate" class="form-check-input" type="checkbox" value="" id="deactivate" />
                        <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my account deactivation</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="form-group">
                        <button type="submit" onclick="return confirm('Are you sure you want to deactivate your account?');" class="btn btn-danger fw-semibold">Deactivate Account</button>
                    </div>
                </div>
            </div>





        </form>
    </div>
</div>
<!-- <div class="card w-100 border-0 p-2"></div> -->
</div>
</div>
