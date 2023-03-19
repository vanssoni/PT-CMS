@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">All Users</li>
                    </ol>
                </div>
                <h4 class="page-title">All Users</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('create users')
                        <a  href="{{route('users.create')}}">
                            <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Add User
                            </button>
                        </a>
                    @endcan
                    <h4 class="header-title mb-4">Manage Users</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{@$user->name}}</td>
                                        <td>{{ucwords(@$user->roles()->pluck('name')->first())}}</td>
                                        <td>{{@$user->plain_password}}</td>
                                        <td>@include('modules.users.action',['user' => $user])</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Column Center -->
@endsection