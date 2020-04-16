@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                        Profile of {{ \Auth::user()->username }}
                    </div>
                    <div class="card-body">

                        @if(isset($user->id))
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-hover">
                                    <thead>
                                    <th>Personal Information</th>
                                    <th></th>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                            First Name
                                            </td>
                                            <td>
                                            {{ $user->first_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            Last Name
                                            </td>
                                            <td>
                                            {{ $user->last_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            Username
                                            </td>
                                            <td>
                                            {{ $user->username }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            ID Number
                                            </td>
                                            <td>
                                            {{ $user->id_number }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                            <table class="table table-hover">
                                <thead>
                                <th>Personal Information</th>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                        <img src="/images/{{ $user->avatar }}"  width="100" height="100" style=""/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Contact</th>
                                <th></th>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                          Email
                                        </td>
                                        <td>
                                         {{ $user->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                          Mobile
                                        </td>
                                        <td>
                                         {{ $user->mobile }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <div class="col-md-6">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="card-header active " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="card-header" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Change Username</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="card-header" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">History</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <th>Change Password</th>
                                            <th></th>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>
                                                    New Password
                                                </td>
                                                <td>
                                                    <input type="password" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Confirm Password
                                                </td>
                                                <td>
                                                    <input type="password" class="form-control">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <th>Change Username</th>
                                            <th></th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    Username
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">history</div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="export-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:1200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-export"></i>Export Wizard</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/export-list" id="export-form">
                        @csrf

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="event.preventDefault();$('#export-form').submit()" class="btn btn-secondary">Export</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}" defer></script>
@endsection
