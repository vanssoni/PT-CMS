@extends('layouts.app')

@section('content')
    <!-- Column Center -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4 text-center">{{@$student->name}}'s Details</h4>
                   <div class="row">
                        <div class="col-md-4">
                            <center>
                                <div class="user-profile">
                                    <img src="{{@$student->user->profile_pic ?? url('/assets/img/avatars/profile_avatar.jpg')}}" alt="image" class="img-fluid avatar-xl rounded" id="image-preview">
                                </br>
                                @can('edit students')
                                <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('students.edit', $student->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @endcan
                                <h5>{{@$student->name}}</h5> 
                                @if(@$student->status == 'withdraw')
                                    <span class="badge bg-info">Withdraw</span>
                                @endif

                                @if(@$student->status == 'enrolled')
                                    <span class="badge bg-primary">Enrolled</span>
                                @endif

                                @if(@$student->status == 'graduated')
                                    <span class="badge bg-success">Graduated</span>
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
                                        <span class="badge bg-info">Withdraw</span>
                                        @endif

                                        @if(@$student->status == 'enrolled')
                                            <span class="badge bg-primary">Enrolled</span>
                                        @endif

                                        @if(@$student->status == 'graduated')
                                            <span class="badge bg-success">Graduated</span>
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
                        <div class="col-md-12 mt-5">
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
                        <div class="col-md-12 mt-5">
                           
                            <h3>Schedules</h3>
                            </hr>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover datatable">
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
                        @if(\Auth::user()->can('view fees') || \Auth::user()->hasRole('student'))
                            <div class="col-md-12 mt-5">
                            
                                @can('create fees')
                                    {{-- <a  href="{{route('fees.create')}}">
                                        <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                            <i class="mdi mdi-plus-circle"></i> Collect Fees
                                        </button>
                                    </a> --}}
                                    <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end" data-bs-toggle="modal" data-bs-target="#con-close-modal"><i class="mdi mdi-plus-circle"></i> Collect Fees</button>
                                @endcan
                                <h3>Fees</h3>
                            <div class="table-responsive">
                                    <table class="table table-striped table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Payment Mode</th>
                                                <th>Received By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($student->fees as $fee)
                                                <tr>
                                                    <td>{{@$loop->iteration}}</td>
                                                    <td>{{@$fee->date}}</td>
                                                    <td>{{@$fee->amount}}</td>
                                                    <td>{{@$fee->payment_mode}}</td>
                                                    <td>{{@$fee->user->name}}</td>
                                                    <td>@include('modules.fees.action',['fee' => $fee])</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12 mt-5">
                           
                            <h3>Road Tests</h3>
                            </hr>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover datatable"">
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
    </div>
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Collect Fee</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form" method="post" action="{{route('fees.store')}}">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="date" class="floating-label control-label">Date:</label>
                                        <input class="form-control datepicker-default" id="date" type="text" placeholder="Date" name="date" value="" required>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="location" class="floating-label control-label">Amount:</label>
                                        <input class="form-control" id="amount" type="number" placeholder="Amount" name="amount" value="" required step=".01">
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="location" class="floating-label control-label">Remaing Fees:</label>
                                        <input class="form-control" id="remaing_amount" type="number" placeholder="Remaing Fee" value="{{@$student->remaining_fees}}" readonly>
                                </div>
                            </div>
                        
                            <input type="hidden" name="student_id" value="{{@$student->id}}">
                            <input type="hidden" name="is_view_student" value="1">
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="disabledInput" class="floating-label control-label">Payment Mode:</label>
                                
                                    <select id="" name="payment_mode" required class="form-control">
                                        <option value=''>Select Payment mode</option>
                                            <option value="Cash" {{('Cash' == @$fee->payment_mode ? 'selected' :'')}}>Cash</option>
                                            <option value="Credit" {{('Credit' == @$fee->payment_mode ? 'selected' :'')}}>Credit</option>
                                            <option value="Debit" {{('Debit' == @$fee->payment_mode ? 'selected' :'')}}>Debit</option>
                                            <option value="Cheque" {{('Cheque' == @$fee->payment_mode ? 'selected' :'')}}>Cheque</option>
                                            <option value="E-Transfer" {{('E-Transfer' == @$fee->payment_mode ? 'selected' :'')}}>E-Transfer</option>
                                            <option value="Others" {{('Others' == @$fee->payment_mode ? 'selected' :'')}}>Others</option>
                                    </select>
                                </div>           
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->
    <!-- /Column Center -->
@endsection