@extends('layouts.app')

@section('content')
    <!-- Column Center -->
        <div class="chute chute-center ph45">

            <div class="panel">
                <div class="panel-heading">
                    @can('create roles')
                        <a class="btn btn-success" href="{{route('roles.create')}}">Create + </a>
                    @endcan
                    <div class="panel-title text-center">All Roles
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{@$role->name}}</td>
                                        <td>@include('modules.roles.action',['role' => $role])</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    <!-- /Column Center -->
@endsection