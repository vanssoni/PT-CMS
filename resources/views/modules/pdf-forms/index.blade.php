@extends('layouts.app')

@section('content')
    <!-- Column Center -->
        <div class="chute chute-center ph45">

            <div class="panel">
                <div class="panel-heading">
                    @can('create pdf forms')
                        <a class="btn btn-success" href="{{route('pdf-forms.create')}}">Create + </a>
                    @endcan
                    <div class="panel-title text-center">All PDF Forms
                    </div>
                </div>
                <div class="panel-body">
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
    <!-- /Column Center -->
@endsection