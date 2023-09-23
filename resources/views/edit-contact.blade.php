@extends('layouts.dash')

@section('content')
<div class="middle-sidebar-left">
    <div class="row">
    @include('contacts_methods.contactgroup')

        <div class="col-md-8">
        <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-lg">

                                <h4 class="font-xs text-white fw-600 ml-4 mb-0 mt-2">Edit Contact</h4>
                            </div>
                            <div class="card-body p-lg-5 p-4 w-100 border-0 mb-0">
 <!-- Display error messages -->
 @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Display success message -->
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                            <form class="form" action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss"  >Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $contact->name }}" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss"  >Nick Name</label>
                                            <input type="text" class="form-control" name="nick_name" value="{{ $contact->nickname }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss"  >Phone Number</label>
                                            <input type="text" class="form-control" name="phone_number" value="{{ $contact->phone }}" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-0 mt-2 pl-0">
                                    <button type="submit" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-lg d-inline-block" style="margin-top: 22px!important; border:none">Save</button>
                                </div>


                                </div>

                            </form>
                            </div>
                        </div>
                        <!-- <div class="card w-100 border-0 p-2"></div> -->
                    </div>
                </div>

@endsection
