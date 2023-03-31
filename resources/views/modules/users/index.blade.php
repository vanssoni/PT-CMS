@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">All Users</li>
                    </ol>
                </div>
                <h4 class="page-title">All Users</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('create users')
                        <a  href="{{route('users.create')}}">
                            <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Add User
                            </button>
                        </a>
                    @endcan
                    <h4 class="header-title mb-4">Manage Users</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable"">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{@$user->name}}</td>
                                        <td>{{ucwords(@$user->roles()->pluck('name')->first())}}</td>
                                        <td>{{@$user->email}}</td>
                                        <td>{!!(@$user->is_active ? "<span class='badge bg-success'> Active</span>" : "<span class='badge bg-danger'> In-Active</span>")!!}</td>
                                        <td>@include('modules.users.action',['user' => $user])</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="update-password-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form" method="post" action="{{route('update-user-password')}}">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="password" class="floating-label control-label">Password:</label>
                                        <input class="form-control " id="" type="text" placeholder="Password" name="password" value="" required>
                                </div>
                            </div>               
                            <input type="hidden" name="user_id" value="" id="user_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->
    <!-- /Column Center -->
@endsection
@push('scripts')
    <script>
        $(function() {
            $('.update-password-button').click(function() {
                var userId = $(this).data('user-id');  // get the data attribute
                $('#update-password-modal #user_id').val(userId);             // set the value of the input element
            });
        });
    </script>
@endpush