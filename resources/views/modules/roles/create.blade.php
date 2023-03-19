@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">All Roles</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Role</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Create Role</h4>
                    {!! Form::open(['route' => 'roles.store', 'class' => 'forms-sample']) !!}
                        @include('modules.roles.form')
                        {!! Form::submit('Create', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
              