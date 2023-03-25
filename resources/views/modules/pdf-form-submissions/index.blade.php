@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">PDF Form Submissions</li>
                    </ol>
                </div>
                <h4 class="page-title">PDF Form Submissions</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Manage Pdf Form Submissions</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Uploaded By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pdfFormSubmissions as $pdfFormSubmission)
                                    <tr>
                                        <td>{{@$pdfFormSubmission->pdf_form->title}}</td>
                                        <td>{{@$pdfFormSubmission->user->name}}({{ ucwords($pdfFormSubmission->user->roles()->pluck('name')->first())}})</td>
                                        <td>@include('modules.pdf-form-submissions.action',['pdf' => $pdfFormSubmission])</td>
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