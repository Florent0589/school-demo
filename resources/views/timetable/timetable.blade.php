@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group btn-group-toggle row">
                            <a class="btn btn-success" href="">
                                <i class="fa fa-list"></i> {{ $grade->name }} Timetable
                            </a>
                        </div>
                    </div>


                    <div class="card-body">
                        <div id="calender" class="table-responsive">
                            <div>
                                <ul>
                                    <li style="list-style: none;">
                                        <i class="fa fa-calendar"></i>
                                        <strong> April 8th, 2020</strong>
                                        <input onchange="JavaScriptManager.getMyDate(this.value)" type="date" name="my_date" id="my_date" value="2020-04-08" style="float: right; cursor: pointer;">
                                    </li>
                                </ul>
                            </div>
                            <table class="table" style="padding: 5px; min-height: 80px; color: #f1f7ff">
                                <thead class="thead-dark">
                                <tr><th scope="col">PERIOD</th>
                                    <th scope="col">TIME</th>
                                    <th scope="col">MO</th>
                                    <th scope="col">TU</th>
                                    <th scope="col">WE</th>
                                    <th scope="col">TH</th>
                                    <th scope="col">FR</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($periods = 0; $periods <= 6; $periods++)
                                    <tr style="padding: 10px;">
                                        <td onclick="JavaScriptManager.getTimeTablePeriod()" style="background-color: rgb(12, 84, 96); cursor: pointer; font-weight: bold; padding: 20px; text-align: center;">
                                            <input type="hidden" id="clicked_date" name="clicked_date" value="2020-04-0-1"><br>
                                            @php
                                                $time_period = '';
                                                $header  = '';
                                                $period_count = $periods;
                                                if($periods == 0)
                                                {
                                                    $period_count = '';
                                                    $time_period = '07h40 to 08h00';
                                                    $header  = 'General Assembly';
                                                }
                                            @endphp
                                            {{ $period_count }}
                                        </td>
                                        <td onclick="JavaScriptManager.getTimeTablePeriod()" style="background-color: rgb(12, 84, 96); cursor: pointer; font-weight: bold; padding: 20px; text-align: center;">
                                            <input type="hidden" id="clicked_date" name="clicked_date" value="2020-04-0-1"><br>
                                            {{ $time_period }}
                                        </td>
                                        <td onclick="JavaScriptManager.getTimeTablePeriod()" style="background-color: rgb(12, 84, 96); cursor: pointer; font-weight: bold; padding: 20px; text-align: center;">
                                            <input type="hidden" id="clicked_date" name="clicked_date" value="2020-04-0-1"><br>
                                            {{ $header }}
                                        </td>
                                        <td onclick="JavaScriptManager.getTimeTablePeriod()" style="background-color: rgb(12, 84, 96); cursor: pointer; font-weight: bold; padding: 20px; text-align: center;">
                                            <input type="hidden" id="clicked_date" name="clicked_date" value="220-04-00"><br>
                                            {{ $header }}
                                        </td>
                                        <td onclick="JavaScriptManager.getTimeTablePeriod()" style="background-color: rgb(12, 84, 96); cursor: pointer; font-weight: bold; padding: 20px; text-align: center;">
                                            <input type="hidden" id="clicked_date" name="clicked_date" value="2020-04-01">1<br>
                                            {{ $header }}
                                        </td>
                                        <td onclick="JavaScriptManager.getTimeTablePeriod()" style="background-color: rgb(12, 84, 96); cursor: pointer; font-weight: bold; padding: 20px; text-align: center;">
                                            <input type="hidden" id="clicked_date" name="clicked_date" value="2020-04-02">2<br>
                                            {{ $header }}
                                        </td>
                                        <td onclick="JavaScriptManager.getTimeTablePeriod()" style="background-color: rgb(12, 84, 96); cursor: pointer; font-weight: bold; padding: 20px; text-align: center;">
                                            <input type="hidden" id="clicked_date" name="clicked_date" value="2020-04-03">3<br>
                                            {{ $header }}
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="TimeTablePeriod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:1200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-clock-o"></i>TimeTable Period</h5>
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
@endsection
