@extends('layouts.app')

@section('content')
    <!-- Column Center -->
        <div class="chute chute-center ph45">

            <div class="panel">
                <div class="panel-heading">
                    @can('create subjects')
                        <a class="btn btn-success" href="{{route('subjects.create')}}">Create + </a>
                    @endcan
                    <div class="panel-title text-center">All Subjects
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                    <th>Subject Hours</th>
                                    <th>Minimum Percentage</th>
                                    <th>Course Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                    <tr>
                                        <td>{{@$loop->iteration}}</td>
                                        <td>{{@$subject->code}}</td>
                                        <td>{{@$subject->name}}</td>
                                        <td>{{@$subject->hours}}</td>
                                        <td>{{@$subject->minimum_percentage}}</td>
                                        <td>{{@$subject->course->name}}</td>
                                        <td>@include('modules.subjects.action',['subject' => $subject])</td>
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