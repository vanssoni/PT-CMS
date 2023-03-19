@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Create Course</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Course</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-4">Create Course</h4>
                    {!! Form::open(['route' => 'courses.store', 'class' => 'forms-sample','files'  => true,]) !!}
                        @include('modules.courses.form')
                        {!! Form::submit('Create', ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
              