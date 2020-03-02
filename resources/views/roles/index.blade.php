@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group btn-group-toggle">
                            <a class="btn btn-success" title="List of Access and Permission" href="/roles">
                                <i class="fa fa-list"></i> Access & Permissions
                            </a>
                            <a class="btn btn-primary" title="Add New Permission" href="/roles/create">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    </div>


                    <div class="card-body">
                    <div class="card-header">
                        List of Access & Permissions
                    </div>
                        @if(count($roles) > 0)
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>#</th>
                                <th>NAME</th>
                                <th>DATE</th>
                                <th>OPTIONS</th>
                                </thead>
                                <tbody>
                                @foreach($roles as $index => $role)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->created_at }}</td>
                                        <td>
                                            <a title="Edit Access" class="btn btn-primary btn-sm" href="/roles/{{ $role->id }}/edit"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>no access & permissions yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
