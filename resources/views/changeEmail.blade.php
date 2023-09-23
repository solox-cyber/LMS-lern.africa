@extends('layouts.dash')

@section('content')
@include('setting_methods.navitems')
<div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-lg">

                                <h4 class="font-xs text-white fw-600 ml-4 mb-0 mt-2">Profile Details</h4>
                            </div>
                            <div class="card-body p-lg-5 p-4 w-100 border-0 ">


                            <form action="{{ route('update_email') }}" method="POST"  class="form">
            <!--begin::Card body-->
            @csrf
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

                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">New Email</label>

                                        </div>
                                    </div>

                                    <div class="col-lg-8 mb-3">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">

                                    <div class="col-lg-12">
                                        <button type="submit" name="submit"style="border:none" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-lg d-inline-block">Update Email</button>
                                        <button type="reset" style="border:none" class="text-center font-xsss fw-600 p-3 w175 rounded-lg d-inline-block">Discard</button>
                                    </div>
                                </div>

                            </form>
                            </div>
                        </div>
           


@endsection
