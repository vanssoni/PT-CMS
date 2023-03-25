@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">My PDF Forms</li>
                    </ol>
                </div>
                <h4 class="page-title"> My PDF Forms</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-4">Manage My Pdf Forms</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pdfforms as $pdfform)
                                    <tr>
                                        <td>{{@$pdfform->title}}</td>
                                        <td>
                                            {!!
                                                ( in_array($pdfform->id, $uploadedForms) ? 
                                                "<span class='badge bg-success'>Uploaded</span>": 
                                                "<span class='badge bg-info'>Pending</span>" )
                                            !!}
                                        </td>
                                        <td>@include('modules.pdf-form-submissions.action',['pdf' => $pdfform])</td>
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