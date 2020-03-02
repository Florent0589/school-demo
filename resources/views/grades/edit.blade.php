@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="form" class="card">
                <div class="card-header">
                    <div class="btn-group btn-group-toggle">
                        <a class="btn btn-success" href="/grades">
                            <i class="fa fa-list"></i> Grades
                        </a>
                        <a class="btn btn-primary" href="/grades/create">
                            <i class="fa fa-plus"></i> Add
                        </a>
                        <a class="btn btn-warning" href="" onclick="event.preventDefault();showMore()">
                            <i class="fa fa-history"></i> More Detials
                        </a>
                    </div>
                </div>
                <form method="POST" action="/grades/{{ $grade->id }}/edit">
                    @csrf
                    <div class="card-body">
                        <div class="card-header">
                            Grades Details
                            <br><hr>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $grade->name }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="passing_mark" class="col-md-4 col-form-label text-md-right">{{ __('Passing Mark') }}</label>

                                <div class="col-md-6">
                                    <input id="passing_mark" type="text" class="form-control" name="passing_mark" value="{{ $grade->passing_mark }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Tutor') }}</label>

                                <div class="col-md-6">
                                    <select name="user_id" class="form-control">
                                        <option value="0"> --- Select --- </option>
                                        @foreach($tutors as $tutor)
                                        @if($tutor->id == $grade->user_id)
                                            <option value="{{ $tutor->id}}" selected> {{ $tutor->first_name}} {{ $tutor->last_name}}</option>
                                        @else
                                            <option value="{{ $tutor->id}}"> {{ $tutor->first_name}} {{ $tutor->last_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="grade_class" class="col-md-4 col-form-label text-md-right">{{ __('Classes') }}</label>

                                <div class="col-md-6">
                                    <select name="grade_class[]" multiple="" class="form-control">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="card-header">
                            Grades Fees
                            <br><hr>
                            <div class="form-group row">
                                <label for="tution_fee" class="col-md-4 col-form-label text-md-right">{{ __('Tuition Fee') }}</label>

                                <div class="col-md-6">
                                    <input id="tution_fee" type="text" class="form-control" name="tution_fee" value="{{ $grade->tution_fee }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="book_fee" class="col-md-4 col-form-label text-md-right">{{ __('Book Fee') }}</label>

                                <div class="col-md-6">
                                    <input id="book_fee" type="text" class="form-control" name="book_fee" value="{{ $grade->book_fee }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exam_fee" class="col-md-4 col-form-label text-md-right">{{ __('Exam Fee') }}</label>

                                <div class="col-md-6">
                                    <input id="exam_fee" type="text" class="form-control" name="exam_fee" value="{{ $grade->exam_fee }}" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="projects_fee" class="col-md-4 col-form-label text-md-right">{{ __('Projects Fee') }}</label>

                                <div class="col-md-6">
                                    <input id="projects_fee" type="text" class="form-control" name="projects_fee" value="{{ $grade->projects_fee }}" required autofocus>

                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                    <a href="/grades" class="btn btn-danger">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                         </div>

                    </div>
                </form>
            </div>
            <div id="detailed" style="display: none;">
                @include('grades.detailed-view')
            </div>
        </div>
    </div>
</div>
<script>
    function showMore()
    {
        $('#form').css('display', 'none');
        $('#detailed').css('display', 'block');
    }

    function showLess()
    {
        $('#form').css('display', 'block');
        $('#detailed').css('display', 'none');
    }
</script>
@endsection
