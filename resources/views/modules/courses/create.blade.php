@extends('layouts.app')

@section('content')
    <div class="chute chute-center ph45">
        <!-- Spec Form -->
        <div class="allcp-form">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">Create New Course
                    </div>
                </div>
                <div class="panel-body">
                {!! Form::open(['route' => 'courses.store', 'class' => 'forms-sample','files'  => true,]) !!}
                    @include('modules.courses.form')
                    {!! Form::submit('Create', ['class' => 'btn btn-primary ml-2']) !!}
                {!! Form::close() !!}
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
@endsection
              