@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Submit PDF Forms</li>
                </ol>
            </div>
            <h4 class="page-title">Submit PDF Forms</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">{{@$pdf->title}} <a class="btn btn-success btn-icon-text btn-xs" href="{{$pdf->pdf}}" target="_blank">
                    <i class="fa fa-download"></i>
                </a></h4>
                {!! Form::open(['route' => 'pdf-forms.submit-pdf-form', 'class' => 'forms-sample','files'  => true,]) !!}
                    @include('modules.pdf-form-submissions.form')
                    {!! Form::submit('Upload', ['class' => 'btn btn-primary mt-3']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
     <!-- /Column Center -->
</div>
@endsection
              