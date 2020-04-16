
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group btn-group-toggle">
                            <a class="btn btn-success" href="/subjects?g={{$grade->id}}&y=timetable">
                                <i class="fa fa-list"></i> {{ $grade->name }} Timetable Subject(s)
                            </a>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="card-header">
                            List of Subject(s)
                        </div>
                        @if(count($subjects) > 0)
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>#</th>
                                <th>NAME</th>
                                <th>CODE</th>
                                <th>PASSING_MARK</th>
                                <th>CA MARK</th>
                                <th>EXAM MARK</th>
                                <th>NUMBER OF CA TEST</th>
                                <th>OPTIONS</th>
                                </thead>
                                <tbody>
                                @foreach($subjects as $index => $grade)
                                    <tr>

                                        <td>{{$index+1}}</td>
                                        <td>{{ $grade->name }}</td>
                                        <td>{{ $grade->code }}</td>
                                        <td>{{ $grade->passing_mark }}</td>
                                        <td>{{ $grade->ca_mark }}</td>
                                        <td>{{ $grade->exam_mark }}</td>
                                        <td>{{ $grade->number_of_ca }}</td>
                                        <td>
                                            <a title="Add Lesson Period" class="btn btn-primary btn-sm" href=""><i class="fa fa-calendar-plus-o"></i></a>
                                            <a title="Weekly Peroid" class="btn btn-primary btn-sm" href=""><i class="fa fa-calendar-check-o"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>no subjects yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

