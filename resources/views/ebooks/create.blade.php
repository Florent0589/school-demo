@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="btn-group btn-group-toggle">
                        <a class="btn btn-success" href="/ebooks">
                            <i class="fa fa-list"></i> e-Books
                        </a>
                        <a class="btn btn-primary" href="/ebooks/create">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <form method="POST" action="/add-ebooks" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="card-header">
                            E-Book Details
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
                                <label for="downloadable" class="col-md-4 col-form-label text-md-right">{{ __('Downloadable') }}</label>

                                <div class="col-md-6">
                                    <input id="downloadable" checked="checked" type="radio" class="" name="downloadable" value="1" >Yes
                                    <input id="downloadable" type="radio" class="" name="downloadable" value="0" >No
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                <div class="col-md-6">
                                    <select name="type" class="form-control">
                                        <option value=""> --- Select --- </option>
                                        <option value="1"> Notes </option>
                                        <option value="2"> Video </option>
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

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" value=""></textarea>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('File to Upload') }}</label>

                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control" name="file" value="" required autofocus>

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
