@extends('layouts.app')

@section('content')
    <!-- Column Center -->
        <div class="chute chute-center ph45">

            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title text-center">{{@$student->name}}'s Details
                    </div>
                </div>
                <div class="panel-body">
                   <div class="row">
                        <div class="col-md-4">
                            <center>
                                <div class="user-profile">
                                    <img src="{{@$student->user->profile_pic ?? url('/assets/img/avatars/profile_avatar.jpg')}}"  class="img-responsive" alt="Profile Picture" id="image-preview">
                                </br>
                                @can('edit students')
                                <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('students.edit', $student->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @endcan
                                <h5>{{@$student->name}}</h5> 
                                @if(@$student->status == 'withdraw')
                                <span class="badge badge-info">Withdraw</span>
                                @endif

                                @if(@$student->status == 'enrolled')
                                    <span class="badge badge-primary">Enrolled</span>
                                @endif

                                @if(@$student->status == 'graduated')
                                    <span class="badge badge-success">Graduated</span>
                                @endif
                                <p>{{ $student->address }}</p>
                                </div>
                            </center>
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                {{-- {{dd($student->student_id)}} --}}

                                <tr>
                                    <th>Student Status</th>
                                    <td>
                                        @if(@$student->status == 'withdraw')
                                        <span class="badge badge-info">Withdraw</span>
                                        @endif

                                        @if(@$student->status == 'enrolled')
                                            <span class="badge badge-primary">Enrolled</span>
                                        @endif

                                        @if(@$student->status == 'graduated')
                                            <span class="badge badge-success">Graduated</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td>{{ @$student->user->email ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>DOB</th>
                                    <td>{{ @$student->dob ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th> Address</th>
                                    <td width="200">{{ $student->address }}</td>
                                </tr>
                                <tr>
                                    <th> Contact </th>
                                    <td width="200">{{ $student->phone }}</td>
                                </tr>

                                <tr>
                                    <th>Registration Date</th>
                                    <td>{{ $student->registration_date ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Driver Licence</th>
                                    <td>{{ $student->dl ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Course</th>
                                    <td>{{ $student->courses_name ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                        </hr>
                        <div class="col-md-12 mt10">
                            <h3>Progress</h3>
                            </hr>
                            @foreach($student->courses as $course)
                                <h5>Course: {{getCourseName($course->course_id)}}</h5>
                                @foreach(getCourseSubjects($course->course_id) as $subject)
                                    <h6>Subject Name:-</h6>
                                    {{$subject->name}}
                                    <div class="progress mt10">
                                        @php
                                         $percenatage = getCompletedScheduleMinutes($student->id, $subject->id);
                                        @endphp
                                        <div class="progress-bar {{getProgressBarColor($percenatage)}}" role="progressbar" aria-valuenow="{{$percenatage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percenatage}}%;">{{$percenatage}}%
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        <div class="col-md-12 mt10">
                           
                            <h3>Schedules</h3>
                            </hr>
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
                                        @foreach (getStudentSechules($student->id) as $schedule)
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
                        <div class="col-md-12">
                           
                            <h3>Road Tests</h3>
                            </hr>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="datatable"">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($student->road_tests as $test)
                                            <tr>
                                                <td>{{@$loop->iteration}}</td>
                                                <td>{{@$test->date}}</td>
                                                <td>{{@$test->location}}</td>
                                                <td>{!!getStatusBadge(@$test->status)!!}</td>
                                                <td>@include('modules.road-tests.action',['roadTest' => $test])</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
    </div>
    <!-- /Column Center -->
@endsection