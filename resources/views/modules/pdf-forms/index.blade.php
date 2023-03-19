@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">PDF Forms</li>
                    </ol>
                </div>
                <h4 class="page-title">PDF Forms</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('create pdf forms')
                        <a  href="{{route('pdf-forms.create')}}">
                            <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Upload PDF Form
                            </button>
                        </a>
                    @endcan
                    <h4 class="header-title mb-4">Manage Pdf forms</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pdfforms as $pdfform)
                                    <tr>
                                        <td>{{@$pdfform->title}}</td>
                                        <td>@include('modules.pdf-forms.action',['pdf' => $pdfform])</td>
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