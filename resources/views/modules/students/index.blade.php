@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">All Students</li>
                </ol>
            </div>
            <h4 class="page-title">All Students</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @can('create students')
                    <a  href="{{route('students.create')}}">
                        <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                            <i class="mdi mdi-plus-circle"></i> Add Student
                        </button>
                    </a>
                @endcan
                <h4 class="header-title mb-4">Manage Students</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Status</th>
                                    <th>Registration Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{@$loop->iteration}}</td>
                                        <td>{{@$student->user->first_name}} {{@$student->user->last_name}}</td>
                                        <td>{{@$student->phone}}</td>
                                        <td>{{@$student->courses_name}}</td>
                                        <td>{{@$student->status}}</td>
                                        <td>{{date('Y-m-d', strtotime(@$student->registration_date))}}</td>
                                        <td>@include('modules.students.action',['student' => $student])</td>
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