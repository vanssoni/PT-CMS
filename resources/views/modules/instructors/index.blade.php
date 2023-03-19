@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">All Instructors</li>
                    </ol>
                </div>
                <h4 class="page-title">All Instructors</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('create instructors')
                        <a  href="{{route('instructors.create')}}">
                            <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Add Instructor
                            </button>
                        </a>
                    @endcan
                    <h4 class="header-title mb-4">Manage Instructors</h4>
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
    </div>
    <!-- /Column Center -->
@endsection