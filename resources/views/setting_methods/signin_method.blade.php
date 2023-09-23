<div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-lg">
        <h4 class="font-xs text-white fw-600 ml-4 mb-0 mt-2">Sign-In Method</h4>
    </div>
    <div class="card-body p-lg-5 p-4 w-100 border-0 ">


        <form action="#">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label class="mont-font fw-600 font-xsss">Email Address</label><br>
                        {{ Auth::user()->email}}
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <a href="{{route('show_email')}}" name="submit" style="border:none" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-lg d-inline-block">Change Email</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label class="mont-font fw-600 font-xsss">Password</label><br>
                        ************
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <a href="{{ route('password.request')}}" name="submit" style="border:none" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-lg d-inline-block">Reset Password</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

