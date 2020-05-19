@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <!-- Image and text -->
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel" style="background: rgb(39, 49, 60);color: #fff !important;" >
            <div class="container" >

                <a class="navbar-brand" href="{{ url('/Portal') }}">
                    {{ \Config::get('my_values.CLIENT') }} - Portal
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">

                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i> {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">
                                        {{\Auth::user()->getRole(\Auth::user()->role_id)}}
                                    </a>
                                    <a class="dropdown-item" href="/logout">
                                        {{ __('Logout') }}
                                    </a>
                                </div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <i class="fa fa-user"></i> Profile
                    </a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <i class="fa fa-cogs"></i> Settings
                    </a>
                    <a class="nav-link" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="false">
                        <i class="fa fa-history"></i> History
                    </a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" style="cursor: pointer;" onclick="event.preventDefault();window.location='/logout';" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <i class="fa fa-power-off"></i> Logout
                    </a>
                    <hr/>
                    <a class="nav-link" id="" data-toggle="pill" href="" onclick="event.preventDefault();" role="tab" aria-controls="" aria-selected="false">
                        &copy; 2020. All right reserved
                    </a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="card">
                            <div class="card-header">Dashboard</div>
                            <div class="card-body">
                                <div class="row">
                                    @include('portal.students')
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="card">
                            <div class="card-header">Profile</div>
                            <div class="card-body">
                                @include('portal.user-profile')
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="card">
                            <div class="card-header">Settings</div>
                            <div class="card-body">
                                @include('portal.change-password')
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                        <div class="card">
                            <div class="card-header">User Activity</div>
                            <div class="card-body">
                                @include('portal.user-history')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="{{ asset('bootstrap/js/bootstrap.js') }}" defer></script>
@endsection
