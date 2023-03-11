<!-- Basic -->
<div class="row mb10">
    <div class="col-md-8">
        <div class="row">
            <div class="user-profile  col-md-4">
                <img src="{{@$student->user->profile_pic ?? url('/assets/img/avatars/profile_avatar.jpg')}}"  class="img-responsive" alt="Profile Picture" id="image-preview">
            </div>

            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">First Name:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="First Name" name="first_name" value="{{@$student->user->first_name}}" required>
                </div>
            </div>

            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Last Name:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Last Name" name="last_name" value="{{@$student->user->last_name}}">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">DOB:</label>
        
                <div class="col-lg-8">
                    <input class="form-control datepicker-default" id="" type="text" placeholder="DOB" value="{{@$student->dob}}" name="dob" required>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Address:</label>
        
                <div class="col-lg-8">
                    <textarea class="form-control"  placeholder="Address" name="address" required>{{@$student->address}}</textarea>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Email:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Email" value="{{@$student->user->email}}" name="email" required>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Username:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Username" value="{{@$student->user->username}}" name="username" required>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Password:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="password" placeholder="Password" value="{{@$student->user->plain_password}}" name="password" required>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Profile Picture:</label>
        
                <div class="col-lg-8">
                    <div class="section">
                        <label class="field prepend-icon file">
                            <input type="file" class="gui-file" name="profile_pic" id="image" accept="image/*">
                            <input type="text" class="gui-input" id="uploader2"
                                placeholder="Select File" autocomplete="new_name" value='Choose File'>
                            <span class="button">Choose File</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Phone:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Phone" value="{{@$student->phone}}" name="phone" required>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Emergency Phone:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Emergency Phone" value="{{@$student->emergency_phone}}" name="emergency_phone">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Emergency contact name:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Emergency contact name" value="{{@$student->emergency_contact_name}}" name="emergency_contact_name">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">DL #:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="DL #" value="{{@$student->dl}}" name="dl" required>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Expiry:</label>
        
                <div class="col-lg-8">
                    <input class="form-control datepicker-default" id="" type="text" placeholder="Expiry" value="{{@$student->expiry}}" name="expiry" required>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">SIN #:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="SIN #" value="{{@$student->sin}}" name="sin" required>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Status:</label>
        
                <div class="col-lg-8">
                    <select id="status" name="status"  class="form-control" required>
                        <option value="">Select an option</option>
                        <option value="withdrawal" {{(@$student->status == 'withdrawal' ? 'selected' :'')}}>Withdrawal</option>
                        <option value="enrolled" {{(@$student->status == 'enrolled' ? 'selected' :'')}}>Enrolled</option>
                        <option value="graduated" {{(@$student->status == 'graduated' ? 'selected' :'')}}>Graduated</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Employer/Organization Name:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Employer/Organization Name" value="{{@$student->organization_name}}" name="organization_name">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Employer's Address:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Employer's Address" value="{{@$student->employer_address}}" name="employer_address">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Supervisor's Name:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Supervisor's Name" value="{{@$student->supervisor_name}}" name="supervisor_name">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Supervisor's Name:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Supervisor's Name" value="{{@$student->supervisor_name}}" name="supervisor_phone">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Supervisor's Phone:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Supervisor's Phone" value="{{@$student->supervisor_phone}}" name="supervisor_name">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Ext.:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Ext." value="{{@$student->ext}}" name="ext">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Registration Date:</label>
        
                <div class="col-lg-8 ">
                    <input class="form-control datepicker-default " id="" type="text" placeholder="Registration Date" value="{{@$student->registration_date}}" name="registration_date" required>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Deposit:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Deposit" value="{{@$student->deposit}}" name="deposit">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Course:</label>
                <div class="col-lg-8">
                    <div class="section">
                        <label class="field select">
                            <select id="course_id" name="course_id" required class="form-control">
                                <option value="">Select a course</option>
                                @foreach($courses as $course_name => $course_id)
                                    <option value="{{$course_id}}" {{( @$student->courses ?  (in_array($course_id, $student->courses()->pluck('course_id')->toArray()) ? 'selected' : '') : '' ) }}>{{@$course_name}}</option>
                                @endforeach
                            </select>
                            <i class="arrow"></i>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-preview').attr('src', e.target.result).show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function(){
            readURL(this);
        });
    </script>
@endpush