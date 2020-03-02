@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-default" href="/grades">Manage Grades </a>
                    <a class="btn btn-primary" href="/grades/create">Add </a>
                </div>
                @yield('module')
                
            </div>
        </div>
    </div>
</div>
@endsection