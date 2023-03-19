@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">All Schedules</li>
                </ol>
            </div>
            <h4 class="page-title">All Schedules</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @can('create schedules')
                    <a  href="{{route('schedules.create')}}">
                        <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                            <i class="mdi mdi-plus-circle"></i> Add Schedule
                        </button>
                    </a>
                @endcan
                <h4 class="header-title mb-4">Manage Schedules</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course </th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>From Time</th>
                                    <th>To Time</th>
                                    <th>Instructor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td>{{@$loop->iteration}}</td>
                                        <td>{{@$schedule->course->name}}</td>
                                        <td>{{@$schedule->subject->name}}</td>
                                        <td>{{@$schedule->date}}</td>
                                        <td>{{@$schedule->from_time}}</td>
                                        <td>{{@$schedule->to_time}}</td>
                                        <td>{{@$schedule->instructor->name}}</td>
                                        <td>@include('modules.schedules.action',['schedule' => $schedule])</td>
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