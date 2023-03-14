@extends('layouts.app')

@section('content')
    <!-- Column Center -->
        <div class="chute chute-center ph45">

            <div class="panel">
                <div class="panel-heading">
                    @can('create road tests')
                        <a class="btn btn-success" href="{{route('road-tests.create')}}">Create + </a>
                    @endcan
                    <div class="panel-title text-center">All Road Tests
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roadTests as $test)
                                    <tr>
                                        <td>{{@$loop->iteration}}</td>
                                        <td>{{@$test->student->name}}</td>
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
    <!-- /Column Center -->
@endsection