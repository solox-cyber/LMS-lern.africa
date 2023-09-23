@extends('layouts.admin.salesdash')

@section('content')

@include('setting_methods.salesrep.menuhead')
@include('setting_methods.salesrep.navitems')

@include('setting_methods.salesrep.profile')

@include('setting_methods.salesrep.signin_method')
@include('setting_methods.salesrep.deactivate')
<!--end::Content container-->
</div>
<!--end::Content-->
</div>
<!--end::Content wrapper-->




@endsection
