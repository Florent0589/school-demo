@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group btn-group-toggle">
                            <a class="btn btn-success" title="List of Modules" href="/modules">
                                <i class="fa fa-list"></i> Modules
                            </a>
                            <a class="btn btn-primary" href="/modules/create">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <form method="POST" action="/modules/{{ $module->id }}/edit">
                        @csrf
                        <div class="card-body">
                            <div class="card-header">
                                Module Details
                                <br><hr>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $module->name }}" required autofocus>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                                    <div class="col-md-6">
                                        <input id="code" type="text" class="form-control" name="code" value="{{ $module->code }}" required autofocus>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="module_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                    <div class="col-md-6">
                                        <select name="module_id" class="form-control">
                                            <option value=""> --- Select --- </option>
                                            @foreach($modules as $module_cat)
                                                @if($module->parent_id == $module_cat->id)
                                                    <option selected value="{{ $module_cat->id }}">{{ $module_cat->name }} </option>
                                                @else
                                                    <option value="{{ $module_cat->id }}">{{ $module_cat->name }} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }} <i class="fa fa-edit"></i></label>

                                    <div class="col-md-6">
                                        <textarea id="description"  class="form-control"  name="description">{!! $module->description !!}</textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                                    <div class="col-md-6">
                                        <select name="user_id" class="form-control">
                                            <option value=""> --- Select --- </option>
                                            @foreach($users as $turor)
                                                @if($module->author_id == $turor->id)
                                                    <option selected value="{{ $turor->id }}">{{ $turor->last_name }} {{ $turor->first_name }} </option>
                                                @else
                                                    <option value="{{ $turor->id }}">{{ $turor->last_name }} {{ $turor->first_name }} </option>
                                                @endif
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="card-header">
                                Permissions
                                <br><hr>
                                <div class="form-group row">
                                    <label for="permissions" class="col-md-4 col-form-label text-md-right">{{ __('Module Permissions') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="permissions"  class="form-control" name="permissions" > {!! $module->permissions !!}</textarea>

                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                        <a href="/modules" class="btn btn-danger">
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
