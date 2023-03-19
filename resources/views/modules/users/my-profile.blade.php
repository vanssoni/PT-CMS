@extends('layouts.app')

@section('content')
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">My  Profile</h4>
                        <form method="post" action="/update-profile" id="form-ui" autocomplete="off" enctype='multipart/form-data'>
                            @csrf
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                            <h6 class="mb20" id="spy1">Update Profile</h6>
                            <!-- Basic -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    
                                <input type="text" name="first_name" id="name" class="form-control"
                                                placeholder="First Name" required value="{{\Auth::user()->first_name}}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="last_name" id="name" class="form-control"
                                                placeholder="Last Name"  value='{{\Auth::user()->last_name}}'>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    
                                    <input type="text" name="username" id="name" class="form-control"
                                                placeholder="username" required value='{{\Auth::user()->username}}'>
                                </div>
                                <div class="col-md-6 hidden-xs">
                                    <input type="file" class="form-control" name="profile_pic" id="image" accept="image/*">
                                </div>
                            </div>
                            <!-- File Uploader -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                        <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Update Password">
                                </div>
                                <div class="col-md-6>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                                placeholder="Confirm Password">
                                </div>
                            </div>
                           
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <input type="submit" name="confirm_password" id="confirm_password" class="btn btn-bordered btn-primary mb5"
                                                value='Update'>
                                </div>
                            </div>
                            <!-- /section -->
                        </form>
                        <!-- /form -->
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /Column Center -->
</div>
@endsection

