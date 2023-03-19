@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Update Course</li>
                    </ol>
                </div>
                <h4 class="page-title">Update Course</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-4">Update Course</h4>
                    {!! Form::open([
                        'route' => ['courses.update', $course->id],
                        'method' => 'put',
                        'files'  => true,
                        'class' => 'form-horizontal']) !!}
                    @include('modules.courses.form')
                    {!! Form::submit('Update', ['class' => 'btn btn-primary mt-3']) !!}
                {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
    <!-- /Column Center -->
@endsection
              