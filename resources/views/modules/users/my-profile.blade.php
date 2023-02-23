@extends('layouts.app')

@section('content')
<div class = 'row'>
    <!-- Column Center -->
    <div class="chute chute-center">

        <div class="mw1000 center-block">

            <!-- Spec Form -->
            <div class="allcp-form">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">My Profile
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="/update-profile" id="form-ui" autocomplete="off" enctype='multipart/form-data'>
                            @csrf
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                            <h6 class="mb20" id="spy1">Update Profile</h6>
                            <!-- Basic -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section">
                                        <label class="field">
                                            <input type="text" name="first_name" id="name" class="gui-input"
                                                placeholder="First Name" required value="{{\Auth::user()->first_name}}">
                                                <!-- @error('first_name')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror -->
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="section">
                                        <label class="field">
                                            <input type="text" name="last_name" id="name" class="gui-input"
                                                placeholder="Last Name"  value='{{\Auth::user()->last_name}}'>
                                                <!-- @error('last_name')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror -->
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section">
                                        <label class="field">
                                            <input type="text" name="username" id="name" class="gui-input"
                                                placeholder="username" required value='{{\Auth::user()->username}}'>
                                                <!-- @error('username')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror     -->
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 hidden-xs">
                                    <div class="section">
                                        <label class="field prepend-icon file">
                                            <input type="file" class="gui-file" name="profile_pic" id="file2"
                                                onChange="document.getElementById('uploader2').value = this.value;">
                                            <input type="text" class="gui-input" id="uploader2"
                                                placeholder="Select File" autocomplete="new_name" value='Choose File'>
                                            <span class="button">Choose File</span>
                                            <!-- @error('profile_pic')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror -->
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- File Uploader -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section">
                                        <label class="field">
                                            <input type="password" name="password" id="password" class="gui-input"
                                                placeholder="Update Password">
                                                <!-- @error('password')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror -->
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="section">
                                        <label class="field">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="gui-input"
                                                placeholder="Confirm Password">
                                                <!-- @error('password_confirmation')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror -->
                                        </label>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="section">
                                        <label class="field">
                                            <input type="submit" name="confirm_password" id="confirm_password" class="btn btn-bordered btn-primary mb5"
                                                value='Update'>
                                        </label>
                                    </div>
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

