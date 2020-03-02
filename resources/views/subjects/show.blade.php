@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{--                        <a class="btn btn-success" href="/students">Manage Students </a>--}}
                        {{--                        <a class="btn btn-primary" href="/students/create">Add Student </a>--}}
                        <div class="btn-group btn-group-toggle">
                            <a class="btn btn-success" href="/students">
                                <i class="fa fa-list"></i>
                            </a>
                            <a class="btn btn-primary" href="/students/create">
                                <i class="fa fa-plus"></i>
                            </a>
                            <a class="btn btn-secondary" href="">
                                <i class="fa fa-download"></i>
                            </a>
                            <a class="btn btn-warning" href="">
                                <i class="fa fa-filter"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action" id="subject-details-list" data-toggle="list" href="#subject-details" role="tab" aria-controls="messages">
                                        Subject Details
                                    </a>
                                    <a class="list-group-item list-group-item-action" id="students-list" data-toggle="list" href="#students" role="tab" aria-controls="messages">
                                        Students
                                    </a>
                                    <a class="list-group-item list-group-item-action" id="enter-marks-list" data-toggle="list" href="#enter-marks" role="tab" aria-controls="messages">
                                        Enter Marks
                                    </a>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="subject-details" role="tabpanel" aria-labelledby="subject-details-list">
                                        @include('subjects.subject-details')
                                    </div>
                                    <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="list-students-list">
                                        @include('subjects.students')
                                    </div>
                                    <div class="tab-pane fade" id="enter-marks" role="tabpanel" aria-labelledby="list-enter-marks-list">
                                        @include('subjects.enter-marks')
                                    </div>
{{--                                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">--}}
{{--                                        @include('students.payment')--}}
{{--                                    </div>--}}
{{--                                    <div class="tab-pane fade" id="payment-form" role="tabpanel" aria-labelledby="payment-form-list">--}}
{{--                                        @include('students.payment')--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}" defer></script>

@endsection
