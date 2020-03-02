@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group btn-group-toggle">
                            <a class="btn btn-success" href="/students">
                                <i class="fa fa-list"></i> Students
                            </a>
                            <a class="btn btn-primary" href="/students/create">
                                <i class="fa fa-plus"></i> Add
                            </a>
                            <a class="btn btn-secondary" href="" onclick="event.preventDefault();$('#export-data').modal('show');">
                                <i class="fa fa-download"></i> Export
                            </a>
                            <a class="btn btn-warning" href="">
                                <i class="fa fa-filter"></i> Filters
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                    <div class="card-header">
                        List of Students
                    </div>
                        @if(count($students) > 0)
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>#</th>
                                <th>ID NUMBER</th>
                                <th>NAMES</th>
                                <th>CONTACT</th>
                                <th>GRADE</th>
                                <th>GURDIAN</th>
                                <th>BALANCE</th>
                                <th>STATUS</th>
                                <th>OPTIONS</th>
                                </thead>
                                <tbody>
                                @foreach($students as $index => $student)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$student->id_number}}</td>
                                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                        <td>{{ $student->email }} {{ $student->mobile }}</td>
                                        <td>{{ $student->getGrade($student->grade_id) }}</td>
                                        <td>{{ $student->getGurdian($student->gurdian_id) }}</td>
                                        <td>SZL {{ $student->balance }}</td>
                                        <td></td>
                                        <td>
                                            <div class="btn-group btn-group-toggle">
                                                <a class="btn btn-success btn-sm" href="/students/{{ $student->id }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-primary btn-sm" href="/students/{{ $student->id }}/edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="/students/{{ $student->id }}/delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>no students yet</p>
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
                        <div class="form-group row">
                            <label for="status_id" class="col-md-4 col-form-label text-md-right">{{ __('Filter by Status') }}</label>

                            <div class="col-md-6">
                                <select name="status_id[]" class="form-control" multiple="multiple">
                                    <option value=""> --- Select --- </option>
                                    @foreach($statuses as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="grade_id" class="col-md-4 col-form-label text-md-right">{{ __('Filter by Grade') }}</label>

                            <div class="col-md-6">
                                <select name="grade_id" class="form-control">
                                    <option value=""> --- Select --- </option>
                                    @foreach($grades as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
