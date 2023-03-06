@extends('layouts.app')

@section('content')
    <!-- Column Center -->
        <div class="chute chute-center ph45">

            <div class="panel">
                <div class="panel-heading">
                    @can('create courses')
                        <a class="btn btn-success" href="{{route('courses.create')}}">Create + </a>
                    @endcan
                    <div class="panel-title text-center">All Courses
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Course Hours</th>
                                    <th>Course Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>{{@$loop->iteration}}</td>
                                        <td>{{@$course->name}}</td>
                                        <td>{{@$course->hours}}</td>
                                        <td>{{ucwords(@$course->course_type)}}</td>
                                        <td>@include('modules.courses.action',['course' => $course])</td>
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