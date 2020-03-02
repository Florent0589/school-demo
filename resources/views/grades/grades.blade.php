@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="btn-group btn-group-toggle">
                        <a class="btn btn-success" href="/grades">
                            <i class="fa fa-list"></i> Grades
                        </a>
                        <a class="btn btn-primary" href="/grades/create">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>


                <div class="card-body">
                <div class="card-header">
                        List of Grades/Classes
                    </div>
                @if(count($grades) > 0)
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>#</th>
                            <th>NAME</th>
                            <th>CODE</th>
                            <th>STUDENT</th>
                            <th>CLASSES</th>
                            <th>PASSING MARK</th>
                            <th>FEES (R)</th>
                            <th>OPTIONS</th>
                            </thead>
                            <tbody>
                                @foreach($grades as $index => $grade)
                                @php
                                    $total_fees = $grade->tution_fee + $grade->book_fee + $grade->exam_fee + $grade->projects_fee;
                                @endphp
                                <tr>

                                    <td>{{$index+1}}</td>
                                    <td>{{ $grade->name }}</td>
                                    <td>{{ $grade->code }}</td>
                                    <td>{{ $grade->passing_mark }}</td>
                                    <td>{{ $grade->number_of_classes }}</td>
                                    <td>{{ $grade->passing_mark }}</td>
                                    <td> R {{ $total_fees }}</td>
                                    <td>
                                        <a title="Edit Grade" class="btn btn-primary btn-sm" href="/grades/{{ $grade->id }}/edit"><i class="fa fa-edit"></i></a>
                                        <a title="More Details" class="btn btn-warning btn-sm" href=""><i class="fa fa-history"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>no grades yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
