@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Fees</li>
                    </ol>
                </div>
                <h4 class="page-title">Fees</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('create fees')
                        <a  href="{{route('fees.create')}}">
                            <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Collect Fees
                            </button>
                        </a>
                    @endcan
                    <h4 class="header-title mb-4">Manage Fees</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Received By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fees as $fee)
                                    <tr>
                                        <td>{{@$loop->iteration}}</td>
                                        <td>{{@$fee->student->name}}</td>
                                        <td>{{@$fee->date}}</td>
                                        <td>{{@$fee->amount}}</td>
                                        <td>{{@$fee->payment_mode}}</td>
                                        <td>{{@$fee->user->name}}</td>
                                        <td>@include('modules.fees.action',['fee' => $fee])</td>
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