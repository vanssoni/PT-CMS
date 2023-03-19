@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Road Tests</li>
                    </ol>
                </div>
                <h4 class="page-title">Road Tests</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('create road tests')
                        <a  href="{{route('road-tests.create')}}">
                            <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Add Road Test
                            </button>
                        </a>
                    @endcan
                    <h4 class="header-title mb-4">Manage Road Tests</h4>
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
    </div>
    <!-- /Column Center -->
@endsection