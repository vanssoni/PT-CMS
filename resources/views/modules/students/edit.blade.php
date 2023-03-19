@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Update Student</li>
                </ol>
            </div>
            <h4 class="page-title">Update Student</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Update Students</h4>
                    {!! Form::open([
                        'route' => ['students.update', $student->id],
                        'method' => 'put',
                        'files'  => true,
                        'class' => 'forms-sample']) !!}
                    @include('modules.students.form')
                    {!! Form::submit('Update', ['class' => 'btn btn-primary mt-3']) !!}
                {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
    <!-- /Column Center -->
@endsection
              