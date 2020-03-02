@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="btn-group btn-group-toggle">
                        <a title="List of Users" class="btn btn-success" href="/users">
                            <i class="fa fa-list"></i> Users
                        </a>
                        <a title="Add New User" class="btn btn-primary" href="/users/create">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>

                <div class="card-body">
                @if(count($users) > 0)
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>#</th>
                            <th>NAMES</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>STATUS</th>
                            <th>OPTIONS</th>
                            </thead>
                            <tbody>
                                @foreach($users as $index => $user)
                                <tr>

                                    <td>{{$index+1}}</td>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td> {{ $user->getRole($user->role_id) }}</td>
                                    <td></td>
                                    <td>
                                        <div class="btn-group btn-group-toggle">
                                            <a class="btn btn-success btn-sm" href="/users/{{ $user->id }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="/users/{{ $user->id }}/edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="/users/{{ $user->id }}/delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>no users yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
