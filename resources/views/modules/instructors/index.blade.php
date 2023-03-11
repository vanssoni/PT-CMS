@extends('layouts.app')

@section('content')
    <!-- Column Center -->
        <div class="chute chute-center ph45">

            <div class="panel">
                <div class="panel-heading">
                    @can('create instructors')
                        <a class="btn btn-success" href="{{route('instructors.create')}}">Create + </a>
                    @endcan
                    <div class="panel-title text-center">All Instructors
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($instructors as $instructor)
                                    <tr>
                                        <td>{{@$loop->iteration}}</td>
                                        <td>{{@$instructor->user->first_name}} {{@$instructor->user->last_name}}</td>
                                        <td>{{@$instructor->contact_number}}</td>
                                        <td>{{@$instructor->user->email}}</td>
                                        <td>{{@$instructor->courses_name}}</td>
                                        <td>{{@$instructor->user->username}}</td>
                                        <td>{{@$instructor->user->plain_password}}</td>
                                        <td>@include('modules.instructors.action',['instructor' => $instructor])</td>
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