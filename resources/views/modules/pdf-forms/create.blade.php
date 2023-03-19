@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Create PDF Forms</li>
                </ol>
            </div>
            <h4 class="page-title">Create PDF Forms</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Create Pdf forms</h4>
                {!! Form::open(['route' => 'pdf-forms.store', 'class' => 'forms-sample','files'  => true,]) !!}
                    @include('modules.pdf-forms.form')
                    {!! Form::submit('Create', ['class' => 'btn btn-primary mt-2']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
     <!-- /Column Center -->
</div>
@endsection
              