@extends('layouts.app')

@section('content')
    <!-- start page title -->
     <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">All Subjects</li>
                    </ol>
                </div>
                <h4 class="page-title">All Subjects</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('create subjects')
                        <a  href="{{route('subjects.create')}}">
                            <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Add Subject
                            </button>
                        </a>
                    @endcan
                    <h4 class="header-title mb-4">Manage Subjects</h4>
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
    </div>
    <!-- /Column Center -->
@endsection