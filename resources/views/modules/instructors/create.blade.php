@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Create Instructor</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Instructor</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Create Instructors</h4>
                {!! Form::open(['route' => 'instructors.store', 'class' => 'forms-sample','files'  => true,]) !!}
                    @include('modules.instructors.form')
                    {!! Form::submit('Create', ['class' => 'btn btn-primary mt-3']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /Column Center -->
    </div>
@endsection
              