@extends('layouts.app')

@section('content')
    <!-- Column Center -->
        <div class="chute chute-center ph45">

            <div class="panel">
                <div class="panel-heading">
                    @can('create students')
                        <a class="btn btn-success" href="{{route('students.create')}}">Create + </a>
                    @endcan
                    <div class="panel-title text-center">All Students
                    </div>
                </div>
                <div class="panel-body">
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
    <!-- /Column Center -->
@endsection