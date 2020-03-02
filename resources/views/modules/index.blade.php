@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group btn-group-toggle">
                            <a class="btn btn-success" href="/modules">
                                <i class="fa fa-list"></i> Modules
                            </a>
                            <a class="btn btn-primary" href="/modules/create">
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
                        List of Modules
                    </div>
                        @if(count($modules) > 0)
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>#</th>
                                <th>CODE</th>
                                <th>MODULE</th>
                                <th>DESCRIPTION</th>
                                <th>AUTHOR</th>
                                <th>STATUS</th>
                                <th>OPTIONS</th>
                                </thead>
                                <tbody>
                                @foreach($modules as $index => $module)

                                    <tr>

                                        <td>{{$index+1}}</td>
                                        <td>{{ $module->name }}</td>
                                        <td>{{ $module->code }}</td>
                                        <td>{{ $module->description }}</td>
                                        <td>{{ $module->author_id }}</td>
                                        <td> {{ $module->status_id }}</td>
                                        <td>
                                            <div class="btn-group btn-group-toggle">
                                                <a class="btn btn-success btn-sm" href="/modules/{{ $module->id }}/show">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-primary btn-sm" href="/modules/{{ $module->id }}/edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="/modules/{{ $module->id }}/delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $modules->links() }}
                        @else
                            <p>no moduless yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
