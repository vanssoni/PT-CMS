<!-- Basic -->
<div class="row mb10">
    <div class="user-profile  col-md-12">
        <img src="{{@$user->profile_pic ?? url('/assets/img/avatars/profile_avatar.jpg')}}" alt="image" class="img-fluid avatar-xl rounded" id="image-preview">
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="disabledInput" class="floating-label control-label">Course:</label>
        
            <select id="courses" name="courses[]" required class="form-control multiselect" multiple>
                @foreach($courses as $course_name => $course_id)
                    <option value="{{$course_id}}" {{( @$instructor->courses ?  (in_array($course_id, $instructor->courses()->pluck('course_id')->toArray()) ? 'selected' : '') : '' ) }}>{{@$course_name}}</option>
                @endforeach
            </select>
        </div>           
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="disabledInput" class="floating-label control-label">Subjects:</label>
        
            <select id="subjects" name="subjects[]" required class="form-control multiselect" multiple>
            </select>
        </div>           
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="disabledInput" class="floating-label control-label">First Name:</label>
                <input class="form-control" id="" type="text" placeholder="First Name" name="first_name" value="{{@$instructor->user->first_name}}" required>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="disabledInput" class="floating-label control-label">Last Name::</label>
                <input class="form-control" id="" type="text" placeholder="Last Name:" name="last_name" value="{{@$instructor->user->last_name}}" >
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="driver_licence_number" class="floating-label control-label">Driver License Number:</label>
                <input class="form-control" id="driver_licence_number" type="text" placeholder="Driver License Number" name="driver_licence_number" value="{{@$instructor->driver_licence_number}}" required>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="driver_licence_expiry" class="floating-label control-label">Driver License Expiry:</label>
                <input class="form-control datepicker-default" id="driver_licence_expiry" type="text" placeholder="Driver License Expiry" name="driver_licence_expiry" value="{{@$instructor->driver_licence_expiry}}" required>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="dob" class="floating-label control-label">DOB:</label>
                <input class="form-control datepicker-default" id="dob" type="text" placeholder="DOB" name="dob" value="{{@$instructor->dob}}" >
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="driver_licence_class" class="floating-label control-label">Driver License Class:</label>
                <input class="form-control" id="driver_licence_class" type="text" placeholder="Driver License Class" name="driver_licence_class" value="{{@$instructor->driver_licence_class}}" >
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="driver_history" class="floating-label control-label">Driver History:</label>
                <input class="form-control datepicker-default" id="driver_history" type="text" placeholder="Driver History" name="driver_history" value="{{@$instructor->driver_history}}" >
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="driver_abstract" class="floating-label control-label">Driver Abstract:</label>
                <input class="form-control datepicker-default" id="driver_abstract" type="text" placeholder="Driver Abstract" name="driver_abstract" value="{{@$instructor->driver_abstract}}" >
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="demerit_points" class="floating-label control-label">Demerit Points:</label>
            <select id="demerit_points" name="demerit_points"  class="form-control" >
                <option value="">Select an option</option>
                <option value="0" {{(@$instructor->demerit_points == '0' ? 'selected' :'')}}>0</option>
                <option value="1" {{(@$instructor->demerit_points == '1' ? 'selected' :'')}}>1</option>
                <option value="2" {{(@$instructor->demerit_points == '2' ? 'selected' :'')}}>2</option>
                <option value="3" {{(@$instructor->demerit_points == '3' ? 'selected' :'')}}>3</option>
                <option value="4" {{(@$instructor->demerit_points == '4' ? 'selected' :'')}}>4</option>

            </select>
        </div>
    </div>
    <div class="col-md-12 pt18">
        <h4 class="">Instructor Qualification Course:</h4>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="course_name" class="floating-label control-label">Course Name:</label>
                <input class="form-control " id="course_name" type="text" placeholder="Course Name" name="course_name" value="{{@$instructor->course_name}}" >
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="authorized_by_lead_instructor" class="floating-label control-label">Authorized By Lead Instructor:</label>
            <select id="authorized_by_lead_instructor" name="authorized_by_lead_instructor"  class="form-control" >
                <option value="">Select an option</option>
                <option value="yes" {{(@$instructor->authorized_by_lead_instructor == 'yes' ? 'selected' :'')}}>Yes</option>
                <option value="no" {{(@$instructor->authorized_by_lead_instructor == 'no' ? 'selected' :'')}}>No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="provider" class="floating-label control-label">Provider:</label>
                <input class="form-control " id="provider" type="text" placeholder="Provider" name="provider" value="{{@$instructor->provider}}" >
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="lead_instructer_name" class="floating-label control-label">Lead Instructor Name:</label>
                <input class="form-control " id="lead_instructer_name" type="text" placeholder="Lead Instructor Name" name="lead_instructer_name" value="{{@$instructor->lead_instructer_name}}" >
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="certification_date" class="floating-label control-label">Certification Date:</label>
                <input class="form-control datepicker-default" id="certification_date" type="text" placeholder="Certification Date" name="certification_date" value="{{@$instructor->certification_date}}" >
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="date_signed_off" class="floating-label control-label">Date Signed Off:</label>
                <input class="form-control datepicker-default" id="date_signed_off" type="text" placeholder="Date Signed Off" name="date_signed_off" value="{{@$instructor->date_signed_off}}" >
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="recertification" class="floating-label control-label">Recertification:</label>
            <select id="recertification" name="recertification"  class="form-control" >
                <option value="">Select an option</option>
                <option value="yes" {{(@$instructor->recertification == 'yes' ? 'selected' :'')}}>Yes</option>
                <option value="no" {{(@$instructor->recertification == 'no' ? 'selected' :'')}}>No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="recertification_date" class="floating-label control-label">Recertification Date:</label>
                <input class="form-control datepicker-default" id="recertification_date" type="text" placeholder="Recertification Date" name="recertification_date" value="{{@$instructor->recertification_date}}" >
        </div>
    </div>
    <div class="col-md-12 pt18">
        <h4 class="">Personal Details:</h4>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="contact_number" class="floating-label control-label">Contact Number:</label>
                <input class="form-control " id="contact_number" type="text" placeholder="Contact Number" name="contact_number" value="{{@$instructor->contact_number}}" required>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="employment_date" class="floating-label control-label">Employment Date:</label>
                <input class="form-control datepicker-default" id="employment_date" type="text" placeholder="Employment Date" name="employment_date" value="{{@$instructor->employment_date}}" >
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="username" class="floating-label control-label">Username:</label>
            <input class="form-control " id="username" type="text" placeholder="Username" name="username" value="{{@$instructor->user->username}}"  required>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="password" class="floating-label control-label">Password:</label>
            <input class="form-control " id="password" type="password" placeholder="Password" name="password" value="{{@$instructor->user->plain_password}}" required>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="email" class="floating-label control-label">Email:</label>
                <input class="form-control " id="email" type="email" placeholder="Email" name="email" value="{{@$instructor->user->email}}" required>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <label></label>
        <input type="file" class="form-control" name="profile_pic" id="image" accept="image/*">
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label for="status" class="floating-label control-label">Status:</label>
            <select id="" name="status"  class="form-control" required>
                <option value="">Select an option</option>
                <option value="active" {{(@$instructor->status == 'active' ? 'selected' :'')}}>Active</option>
                <option value="in-active" {{(@$instructor->status == 'in-active' ? 'selected' :'')}}>In-active</option>
            </select>
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
        $(function() {
        function getCourseSubjects(courses){

            $('#subjects').empty();
            $.ajax({
                url: "/get-course-subjects",
                type: "GET",
                data: {
                    courses: courses
                },
                success: function (data) {
                    var options = '';

                    $.each(data, function (key, value) {
                        options += '<option value="' + value.id + '">' + value.name + '</option>';
                    });

                    $('#subjects').html(options);
                    //select the subjects
                    @if(@$instructor)
                        $('#subjects').val({{json_encode($instructor->subjects()->pluck('subject_id')->toArray())}}).trigger('change');
                    @endif
                },
                error: function (xhr, status, error) {
                    // console.log(xhr.responseText);
                }
            });
        }
        $('#courses').on('change', function () {
            var courses = $(this).val();
            getCourseSubjects(courses);
        });
        var courses = $('#courses').val();
        getCourseSubjects(courses);
    });
    </script>
@endpush