@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Update PDF Forms</li>
                </ol>
            </div>
            <h4 class="page-title">Update PDF Forms</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Update Pdf forms</h4>
                    {!! Form::open([
                        'route' => ['pdf-forms.update', $pdf->id],
                        'method' => 'put',
                        'files'  => true,
                        'class' => 'forms-sample']) !!}
                    @include('modules.pdf-forms.form')
                    {!! Form::submit('Update', ['class' => 'btn btn-primary mt-2']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- /Column Center -->
@endsection
              