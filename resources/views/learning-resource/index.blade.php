@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group btn-group-toggle row">
                            <a class="btn btn-success" href="/calender">
                                <i class="fa fa-list"></i> Calender
                            </a>
                            <a class="btn btn-primary" href="">
                                <i class="fa fa-mail-forward"></i> {{ count($events) }} Number of Event(s)
                            </a>
                            <a id="events-loader" class="btn btn-primary" onclick="JavaScriptManager.loadCalenderEvents('{{ $date }}')">
                                <i class="fa fa-bell"></i> {{ count($upcoming_events) }} Upcoming Event(s)
                            </a>
                            <a id="events-loader" class="btn btn-primary" onclick="JavaScriptManager.addEventToCalender()">
                                <i class="fa fa-plus"></i> Add Event
                            </a>
                        </div>
                    </div>


                    <div class="card-body">
                        <div id="calender" class="table-responsive">
                            {!! $strwidgetTags !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="calender-events-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width:800px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upcoming Events</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="calender-events">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add-events-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width:800px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="add-events">
                            <form action="/add-calender-event" id="add-calender-event" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="calender_date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                                    <div class="col-md-6">
                                        <input id="calender_date" type="date" class="form-control" name="calender_date" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="time_start" class="col-md-4 col-form-label text-md-right">{{ __('Time Start') }}</label>
                                    <div class="col-md-6">
                                        <input id="time_start" type="time" class="form-control" name="time_start" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="time_stop" class="col-md-4 col-form-label text-md-right">{{ __('Time Stop') }}</label>
                                    <div class="col-md-6">
                                        <input id="time_stop" type="time" class="form-control" name="time_stop" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="description" rows="6" cols="3" class="form-control" name="description" value="" required autofocus></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="$('#add-calender-event').submit();" class="btn btn-primary" >Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
