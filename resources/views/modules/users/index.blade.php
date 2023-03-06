@extends('layouts.app')

@section('content')
    <!-- Column Center -->
        <div class="chute chute-center ph45">

            <div class="panel">
                <div class="panel-heading">
                    @can('create users')
                        <a class="btn btn-success" href="{{route('users.create')}}">Create + </a>
                    @endcan
                    <div class="panel-title text-center">All Users
                    </div>
                </div>
                <div class="panel-body">
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
    <!-- /Column Center -->
@endsection