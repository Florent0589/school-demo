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
                        Edit Role
                    </div>
                    <br>
                    <form method="POST" action="/roles/{{ $role->id }}/edit">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $role->name }}" required autofocus>

                            </div>
                        </div>
                        <table style='width:100%; padding:5px; overflow:scroll;'>

                        @foreach($modules as $index => $module)
                                <tr class="btn-primary" >
                                    <td style='font-size:larger; padding:5px;'>
                                        {{$index+1}}. 
                                        <input title="Select All" type="checkbox" class="" name="{{$module->id}}_perm_all" id="{{$module->id}}_perm_all" value="">
                                        {{ $module->name }} - {{ $module->description }}
                                    </td>
                                    <td> 
                                    </td>
                                </tr>
                            
                            @foreach ($module->getModulePermissions($module->id) as $id => $permission)
                                <tr>
                                    <td style='font-size:large;border-bottom:1px solid #ced4da !important;'>
                                    {{$permission}} 
                                    </td>
                                    <td style="width:2%;">
                                        @if(in_array($id, $role_permissions))
                                            <input title="{{$permission}}" type="checkbox" checked="checked" class="form-control" style="padding:5px;" name="{{$id}}_perm" id="{{$id}}_perm" value="{{$id}}">
                                        @else
                                            <input title="{{$permission}}" type="checkbox" class="form-control" style="padding:5px;" name="{{$id}}_perm" id="{{$id}}_perm" value="{{$id}}">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </table>
                        <br><br>
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
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
