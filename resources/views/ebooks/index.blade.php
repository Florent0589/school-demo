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


                    <div class="card-body">
                    <div class="card-header">
                        List of e-Books
                    </div>
                        @if(count($ebooks) > 0)
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>#</th>
                                <th>NAME</th>
                                <th>GRADE</th>
                                <th>FILE TYPE</th>
                                <th>SIZE</th>
                                <th>DESC</th>
                                <th>DOWNLOADS</th>
                                <th>DATE</th>
                                <th>OPTIONS</th>
                                </thead>
                                <tbody>
                                @foreach($ebooks as $index => $ebook)
                                    @php
                                        $total_fees = 0;
                                    @endphp
                                    <tr>

                                        <td>{{$index+1}}</td>
                                        <td>{{ $ebook->filename }}</td>
                                        <td>{{ $ebook->grade_id }}</td>
                                        <td>{{ $ebook->file_type }}</td>
                                        <td>{{ $ebook->size }}</td>
                                        <td>{{ $ebook->description }}</td>
                                        <td>{{ $ebook->downloads }}</td>
                                        <td>{{ $ebook->created_at }}</td>
                                        <td>
                                            <a title="Edit EBook" class="btn btn-primary btn-sm" href="/ebooks/{{ $ebook->id }}/edit"><i class="fa fa-edit"></i></a>
                                            <a title="Downlood EBook" class="btn btn-success btn-sm" href=""><i class="fa fa-download"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>no ebooks yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
