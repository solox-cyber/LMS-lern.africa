@extends('layouts.dash')

@section('content')

<div class="middle-sidebar-left">
    <div class="row">
    @include('contacts_methods.contactgroup')

        <div class="col-md-8">
            <div class="middle-wrap">
                <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-lg">

                        <h4 class="font-xs text-white fw-600 ml-4 mb-0 mt-2">Contact Information</h4>
                    </div>
                    <div class="card-body p-lg-5 p-4 w-100 border-0 mb-0">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form class="form" action="{{ route('contact.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="row">
                                <div class="col-lg-3 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Nickname</label>
                                        <input type="text" name="nick_name" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Phone Number</label>
                                        <input type="text" name="phone_number" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-3" style="margin-top:22px!important">
                                    <button type="submit" class="bg-current text-center text-white font-xsss fw-600 p-3 w170 rounded-lg d-inline-block" style="border: none;">Save</button>
                                </div>
                            </div>

                        </form>

                        <form class="form" action="{{ route('contacts.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="formFields">
                                <div class="d-flex justify-content-end">

                                </div>

                            </div>
                        </form>
                        <button href="{{route('add_contact')}}" type="button" onclick="addFormField()" class="bg-current  text-center text-white font-xsss  p-3 w800 rounded-lg d-inline-block" style="border: none;">
                            Add new contact
                        </button>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- <div class="card w-100 border-0 p-2"></div> -->



@endsection
