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
                    </div>
                </div>
                <form method="POST" action="/add-subjects">
                    @csrf
                    <div class="card-body">
                        <div class="card-header">
                            Subject Details
                            <br><hr>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="other_name" class="col-md-4 col-form-label text-md-right">{{ __('Other Name') }}</label>

                                <div class="col-md-6">
                                    <input id="other_name" type="text" class="form-control" name="other_name" value="" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="passing_mark" class="col-md-4 col-form-label text-md-right">{{ __('Passing Mark') }}</label>

                                <div class="col-md-6">
                                    <input id="passing_mark" type="text" class="form-control" name="passing_mark" value="" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Tutor') }}</label>

                                <div class="col-md-6">
                                    <select name="user_id" class="form-control">
                                        <option value=""> --- Select --- </option>
                                        @foreach($tutors as $turor)
                                        <option value="{{ $turor->id }}">{{ $turor->last_name }} {{ $turor->first_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="grade_id" class="col-md-4 col-form-label text-md-right">{{ __('Grade ') }}</label>

                                <div class="col-md-6">
                                    <select name="grade_id" class="form-control">
                                        <option value=""> --- Select --- </option>
                                        @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }} {{ $grade->code }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="card-header">
                            Mark Allocation
                            <br><hr>
                            <div class="form-group row">
                                <label for="number_of_ca" class="col-md-4 col-form-label text-md-right">{{ __('Number of CA Test') }}</label>

                                <div class="col-md-6">
                                    <input id="number_of_ca" type="text" class="form-control" name="number_of_ca" value="" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ca_mark" class="col-md-4 col-form-label text-md-right">{{ __('CA Mark') }}</label>

                                <div class="col-md-6">
                                    <input id="ca_mark" type="text" class="form-control" name="ca_mark" value="" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exam_mark" class="col-md-4 col-form-label text-md-right">{{ __('Exam Mark') }}</label>

                                <div class="col-md-6">
                                    <input id="exam_mark" type="text" class="form-control" name="exam_mark" value="" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                    <a href="/subjects" class="btn btn-danger">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                         </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
