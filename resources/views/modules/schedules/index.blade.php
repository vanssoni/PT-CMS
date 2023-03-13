@extends('layouts.app')

@section('content')
    <!-- Column Center -->
        <div class="chute chute-center ph45">

            <div class="panel">
                <div class="panel-heading">
                    @can('create schedules')
                        <a class="btn btn-success" href="{{route('schedules.create')}}">Create + </a>
                    @endcan
                    <div class="panel-title text-center">All Schedules
                    </div>
                </div>
                <div class="panel-body">
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
    <!-- /Column Center -->
@endsection