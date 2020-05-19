@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group btn-group-toggle">
                            <a class="btn btn-success" href="/students">
                                <i class="fa fa-list" title="List of Students"></i> Students
                            </a>
                            <a class="btn btn-primary" href="/students/create">
                                <i class="fa fa-plus"></i> Add
                            </a>

                        </div>
                        <span style="float: right; margin-top: 10px;">Details of  {{ $arrPersonalInfo['id_number'] }} | {{ $arrPersonalInfo['first_name'] }} {{ $arrPersonalInfo['last_name'] }}</span>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a   title="Personla Information" class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                                        <i class="fa fa-user"></i>
                                        Personal Information
                                    </a>
                                    <a title="Student Gurdain" class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                                        <i class="fa fa-user-md"  ></i>
                                        Student Gurdain
                                    </a>
                                    <a  title="Class and Subjects" class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                                        <i class="fa fa-book" ></i>
                                        Class and Subjects
                                    </a>
                                    <a   title="Calculated Fees" class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings" onclick="JavaScriptManager.getSubjectForPayment()">
                                        <i class="fa fa-check-circle-o"></i>
                                        Calculated Fees
                                    </a>

                                    <a   title="Download Profile" class="list-group-item list-group-item-action" id="studentProfile-list" data-toggle="list" href="#studentProfile" role="tab" aria-controls="">
                                        <i class="fa fa-download"></i>
                                        Download Profile
                                    </a>
                                    <a   title="Academic Report" class="list-group-item list-group-item-action" id="studentReport-list" data-toggle="list" href="#studentReport" role="tab" aria-controls="">
                                        <i class="fa fa-file"></i>
                                        Academic Report
                                    </a>
                                    <a   title="Peformance Stats" class="list-group-item list-group-item-action" id="" data-toggle="" href="" role="tab" aria-controls="">
                                        <i class="fa fa-pie-chart"></i>
                                        Peformance Stats
                                    </a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="tab-content" id="nav-tabContent" style="margin-left: -13%;">
                                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                        @include('students.personal-info')
                                    </div>
                                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                        @include('students.next-of-keen')
                                    </div>
                                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                                        @include('students.student-subject')
                                    </div>
                                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                                        @include('students.payment')
                                    </div>
                                    <div class="tab-pane fade" id="studentProfile" role="tabpanel" aria-labelledby="studentProfile-list">
                                        <iframe src="/studentProfile/{{ $arrPersonalInfo['id'] }}" height="500px" width="100%" />
                                    </div>
                                    <div class="tab-pane fade" id="studentReport" role="tabpanel" aria-labelledby="studentReport-list">
                                        <iframe src="/studentReport/{{ $arrPersonalInfo['id'] }}" height="500px" width="100%" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}" defer></script>
    <script >
        $(document).on('load', function(){
            $('input[type=text]').addClass('view');
        });
    </script>
    <style>
        .form-control {

            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1px solid #03a8f45e;
            padding: 5px 15px;
            outline: none;
            display: block;
            width: 100%;
            height: calc(2.19rem + 2px);
            /*padding: .375rem .75rem;*/
            font-size: .9rem;
            line-height: 1.6;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            /*border: 1px solid #ced4da;*/
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>

@endsection
