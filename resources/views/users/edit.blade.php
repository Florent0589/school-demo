@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group btn-group-toggle">
                            <a class="btn btn-success" href="/users">
                                <i class="fa fa-list"></i> Users
                            </a>
                            <a class="btn btn-primary" href="/users/create">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <form method="POST" action="/users/{{ $user->id }}/edit">
                        @csrf
                        <div class="card-body">
                            <div class="card-header">
                                Edit User
                                <br><hr>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->first_name }}" required autofocus>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required autofocus>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required autofocus>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                                    <div class="col-md-6">
                                        <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ $user->date_of_birth }}" required autofocus>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="identification_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Identification Type') }}</label>

                                    <div class="col-md-6">
                                        <select name="identification_type_id" class="form-control">
                                            <option value=""> --- Select --- </option>
                                            @foreach($types as $type)
                                                @if($user->identification_type_id == $type->id)
                                                    <option selected value="{{ $type->id }}">{{ $type->name }}</option>
                                                @else
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_number" class="col-md-4 col-form-label text-md-right">{{ __('ID Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="id_number" type="text" class="form-control" name="id_number" value="{{ $user->id_number }}" required autofocus>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="passport_number" class="col-md-4 col-form-label text-md-right">{{ __('PassPort Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="passport_number" type="text" class="form-control" name="passport_number" value="{{ $user->passport_number }}" required autofocus>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Role ') }}</label>

                                    <div class="col-md-6">
                                        <select name="role_id" class="form-control">
                                            <option value=""> --- Select --- </option>
                                            @foreach($roles as $role)
                                                @if($user->role_id == $role->id)
                                                    <option selected value="{{ $role->id }}">{{ $role->name }} </option>
                                                @else
                                                    <option value="{{ $role->id }}">{{ $role->name }} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="card-header">
                                Contact Information
                                <br><hr>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autofocus>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Cell Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="mobile" type="tel" class="form-control" name="mobile" value="{{ $user->mobile }}" required autofocus>

                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                        <a href="/users" class="btn btn-danger">
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
