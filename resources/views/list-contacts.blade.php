@extends('layouts.dash')

@section('content')
<div class="middle-sidebar-left">
    <div class="row">
        @include('contacts_methods.contactgroup')

        <div class="col-md-8">
            <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-lg">
                    <h4 class="font-xs text-white fw-600 ml-4 mb-0 mt-2">My Contacts</h4>
                </div>
                <div class="card-body p-lg-5 p-4 w-100 border-0 mb-0">
                    <!-- Your form goes here -->
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
                    <!-- Table to display User, Nickname, Phone Number, and Actions -->

                    <!--begin::User details-->




                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Nickname</th>
                                <th>Phone Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <!-- Example row, replace with dynamic data -->
                            <tr>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('edit_contact', ['contact' => $contact->id]) }}" class="text-gray-800 text-hover-primary mb-1">{{ $contact->name }}</a>
                                        <span>{{ $contact->email }}</span>
                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <td>{{$contact->nickname}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>
                                    <a href="{{ route('edit_contact', ['contact' => $contact->id]) }}" class="menu-link px-3">Edit</a>
                                    <a href="#" class="btn bg-current text-center text-white" onclick="event.preventDefault(); document.getElementById('delete-contact-form-{{$contact->id}}').submit();">
                                        Delete
                                    </a>
                                    <form id="delete-contact-form-{{$contact->id}}" action="{{ route('deleteContactUser', ['contactId' => $contact->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            <!-- Repeat rows for each contact -->
                            @endforeach


                        </tbody>
                        @push('styles')
                        <link rel="stylesheet" href="{{ asset('css/custom-pagination.css') }}">
                        @endpush


                        {{ $contacts->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
