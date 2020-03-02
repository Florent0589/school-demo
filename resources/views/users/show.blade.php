@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group btn-group-toggle">
                            <a title="List of Users" class="btn btn-success" href="/users">
                                <i class="fa fa-list"></i> Users
                            </a>
                            <a title="Add New User" class="btn btn-primary" href="/users/create">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    <span style="float: right;"> Profile of {{ $user->first_name }} {{ $user->last_name }}</span>

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
