@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="btn-group btn-group-toggle">
                        <a class="btn btn-success" href="/subjects">
                            <i class="fa fa-list"></i> Subjects
                        </a>
                        <a class="btn btn-primary" href="/subjects/create">
                            <i class="fa fa-plus"></i> Add
                        </a>
                        <a class="btn btn-secondary" href="">
                            <i class="fa fa-download"></i> Export
                        </a>
                        <a class="btn btn-warning" onclick="event.preventDefault();JavaScriptManager.getFilters();">
                            <i class="fa fa-filter"></i> Filters
                        </a>
                    </div>
                </div>


                <div class="card-body">
                <div class="card-header">
                        List of Subjects
                    </div>
                @if(count($subjects) > 0)
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>#</th>
                            <th>NAME</th>
                            <th> CLASS
                            </th>
                            <th>CODE</th>
                            <th>CA MARK</th>
                            <th>NUMBER OF CA TEST</th>
                            <th>PASSING MARK</th>
                            <th>EXAM MARK</th>
                            <th>OPTIONS</th>
                            </thead>
                            <tbody>
                                @foreach($subjects as $index => $subject)

                                <tr>

                                    <td>{{$index+1}}</td>
                                    <td>{{ $subject->name }}<br>{{ $subject->other_name }}</td>
                                    <td>{{ $subject->getGrade($subject->grade_id) }}</td>
                                    <td>{{ $subject->code }}</td>
                                    <td>{{ $subject->ca_mark }}</td>
                                    <td>{{ $subject->number_of_ca }}</td>
                                    <td>{{ $subject->passing_mark }}</td>
                                    <td> {{ $subject->exam_mark }}</td>
                                    <td>
                                        <div class="btn-group btn-group-toggle">
                                            <a class="btn btn-success btn-sm" href="/subjects/{{ $subject->id }}/show">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="/subjects/{{ $subject->id }}/edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="/subjects/{{ $subject->id }}/delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $subjects->links() }}
                    @else
                        <p>no subjects yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
