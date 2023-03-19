<!-- Basic -->
<div class="row">
    <div class="col-md-6">
        <div class="row mb10">
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label for="description" class="floating-label control-label">Description:</label>
                        <input class="form-control" id="" type="text" placeholder="Description" name="description" value="{{@$schedule->description}}" required>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label for="date" class="floating-label control-label">Date:</label>
                        <input class="form-control datepicker-default" id="date" type="text" placeholder="Date" name="date" value="{{@$schedule->date}}" required>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label for="date" class="floating-label control-label">From Time:</label>
                        <input class="form-control " id="from_time" type="time" placeholder="From Time" name="from_time" value="{{@$schedule->from_time}}" required  onchange="checkTimeInputs()">
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label for="date" class="floating-label control-label">To Time:</label>
                        <input class="form-control" id="to_time" type="time" placeholder="To Time" name="to_time" value="{{@$schedule->to_time}}" required  onchange="checkTimeInputs()">
                </div>
            </div>
            
            <div id="breaks"  {{(!@$schedule->breaks ? "style=display:none;": '')}} class="col-md-12 mt-3">
                <div id="breaks-container" class="">
                    @if(@$schedule->breaks)
                        @foreach($schedule->breaks as $scheduleBreak)
                            <div id ="{{'break-'.$loop->iteration-1}}" class ='breaks'>
                                <div class="col-md-5 ">
                                    <label for="{{'breaks_from_time_'.$loop->iteration-1}}">Break From:</label>
                                    <input type="time" id="{{'breaks_from_time_'.$loop->iteration-1}}" onchange="checkTimeInputs()"  name="breaks[{{$loop->iteration-1}}][from_time]"  class='form-control' required value="{{@$scheduleBreak->from_time}}">
                                </div>
                                <div class="col-md-5 ">
                                    <label for="{{'breaks_to_time_'.$loop->iteration-1}}">Break To:</label>
                                    <input type="time" id="{{'breaks_to_time_'.$loop->iteration-1}}" onchange="checkTimeInputs()" name="breaks[{{$loop->iteration-1}}][to_time]"  class='form-control' required value="{{@$scheduleBreak->to_time}}">
                                </div>
                                <div class="col-md-2 ">
                                    <label for="">Action</label>
                                    <button type="button" onclick="removeBreakTime({{$loop->iteration-1}})" class='form-control btn btn-danger'><span class="fa fa fa-trash"></span></button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" onclick="addBreakTime()" class="btn btn-primary mt-2 add_break_button">Add Break Time</button>
            </div>
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label for="disabledInput" class="floating-label control-label">Course:</label>
                
                    <select id="course" name="course_id" required class="form-control">
                        <option value="">Select Course</option>
                        @foreach($courses as $course_name => $course_id)
                            <option value="{{$course_id}}" {{( @$schedule->course_id  == $course_id ? 'selected' : '')  }}>{{@$course_name}}</option>
                        @endforeach
                    </select>
                </div>             
            </div>
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label for="disabledInput" class="floating-label control-label">Subject:</label>
                
                    <select id="subject" name="subject_id" required class="form-control">
                        <option value='''>Select Subject</option>
                    </select>
                </div>           
            </div>
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label for="disabledInput" class="floating-label control-label">Students:</label>
                
                    <select id="students" name="students[]" required class="form-control multiselect" multiple>
                        
                    </select>
                </div>           
            </div>
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label for="disabledInput" class="floating-label control-label">Instructor:</label>
                
                    <select id="instructor" name="instructor_id" required class="form-control">
                        <option value='''>Select Instructor</option>
                    </select>
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
    $(function() {
        function getCourseSubjects(courses){

            $('#subject').empty();
            $.ajax({
                url: "/get-course-subjects",
                type: "GET",
                data: {
                    courses: courses
                },
                success: function (data) {
                    var options = '';
                    options += "<option value='''>Select Subject</option>";
                    $.each(data, function (key, value) {
                        options += '<option value="' + value.id + '">' + value.name + '</option>';
                    });

                    $('#subject').html(options);
                    //select the subjects
                    @if(@$schedule)
                        $('#subject').val({{$schedule->subject()->pluck('id')->first()}}).trigger('change');
                    @endif
                },
                error: function (xhr, status, error) {
                    // console.log(xhr.responseText);
                }
            });
        }
        function getCourseStudents(courses){
            $('#students').empty();
            $.ajax({
                url: "/get-course-students",
                type: "GET",
                data: {
                    courses: courses
                },
                success: function (data) {
                    var options = '';
                    options += "<option value='''>Select Student</option>";
                    $.each(data, function (key, value) {
                        options += '<option value="' + value.id + '">' + value.name + '</option>';
                    });

                    $('#students').html(options);
                    //select the subjects
                    @if(@$schedule)
                        $('#students').val({{json_encode($schedule->students()->pluck('student_id')->toArray())}}).trigger('change');
                    @endif
                },
                error: function (xhr, status, error) {
                    // console.log(xhr.responseText);
                }
            });
        }
        function getCourseInstructors(courses){
            $('#instructors').empty();
            $.ajax({
                url: "/get-course-instructors",
                type: "GET",
                data: {
                    courses: courses
                },
                success: function (data) {
                    var options = '';
                    options += "<option value='''>Select Instructor</option>";
                    $.each(data, function (key, value) {
                        options += '<option value="' + value.id + '">' + value.name + '</option>';
                    });

                    $('#instructor').html(options);
                    //select the subjects
                    @if(@$schedule)
                        $('#instructor').val({{$schedule->instructor()->pluck('id')->first()}}).trigger('change');
                    @endif
                },
                error: function (xhr, status, error) {
                    // console.log(xhr.responseText);
                }
            });
        }
        $('#course').on('change', function () {
            var course = $(this).val();
            getCourseSubjects([course]);
            getCourseStudents([course]);
            getCourseInstructors([course]);
        });
        var course = $('#course').val();
        getCourseSubjects([course]);
        getCourseStudents([course]);
        getCourseInstructors([course]);
        function removeBreakTime(button) {
            $('#break-'+button).remove();
        }
    });

    function checkTimeInputs() {
        var fromTime = document.getElementById("from_time").value;
        var toTime = document.getElementById("to_time").value;
        if (!fromTime || !toTime) {
            return;
        }

        if (toTime <= fromTime) {
            alert("To time must be greater than from time");
            document.getElementById("to_time").value = ""; // clear the invalid input
        }
        var duration = getTimeDuration(fromTime, toTime);
        if (duration >= 2) {
            document.getElementById("breaks").style.display = "block";
        } else {
            document.getElementById("breaks").style.display = "none";
            var breaksContainer = document.getElementById("breaks-container");
            breaksContainer.innerHTML='';
        }

        var breaksContainer = document.getElementById("breaks-container");
        var prevBreakEndTime = fromTime;
        for (var i = 0; i < breaksContainer.children.length; i++) {
            var breaksFromTime = document.getElementById(`breaks_from_time_${i}`).value;
            var breaksToTime = document.getElementById(`breaks_to_time_${i}`).value;

            if (breaksFromTime && breaksToTime) {
                if (breaksFromTime < fromTime || breaksFromTime > toTime || breaksToTime < fromTime || breaksToTime > toTime) {
                    alert("Break time should be between from time and to time.");
                    document.getElementById(`breaks_from_time_${i}`).value = "";
                    document.getElementById(`breaks_to_time_${i}`).value = "";
                    return;
                } else if (breaksFromTime <= prevBreakEndTime) {
                    alert("Break times should not overlap.");
                    document.getElementById(`breaks_from_time_${i}`).value = "";
                    document.getElementById(`breaks_to_time_${i}`).value = "";
                    return;
                } else {
                    prevBreakEndTime = breaksToTime;
                    breaksContainer.children[i].style.display = "block";
                }
            }
        }
    }
    function getTimeDuration(fromTime, toTime) {
        var fromHour = parseInt(fromTime.split(":")[0]);
        var fromMinute = parseInt(fromTime.split(":")[1]);
        var toHour = parseInt(toTime.split(":")[0]);
        var toMinute = parseInt(toTime.split(":")[1]);

        var duration = (toHour - fromHour) * 60 + (toMinute - fromMinute);
        return duration / 60;
    }
    function addBreakTime() {
        var breaksContainer = document.getElementById("breaks-container");

        var newBreakTimeInputs = document.createElement("div");
        var breakIndex = breaksContainer.children.length;
        newBreakTimeInputs.setAttribute("id", `break-${breakIndex}`);
        newBreakTimeInputs.setAttribute("class", `breaks`);

        newBreakTimeInputs.innerHTML = `
        <div class= 'row'>
            <div class="col-md-5 ">
                <label for="breaks_from_time_${breakIndex}">Break From:</label>
                <input type="time" id="breaks_from_time_${breakIndex}" onchange="checkTimeInputs()"  name="breaks[${breakIndex}][from_time]"  class='form-control' required>
            </div>
            <div class="col-md-5 ">
                <label for="breaks_to_time_${breakIndex}">Break To:</label>
                <input type="time" id="breaks_to_time_${breakIndex}" onchange="checkTimeInputs()"  name="breaks[${breakIndex}][to_time]"  class='form-control' required>
            </div>
            <div class="col-md-2 ">
                <label for="">Action</label>
                <button type="button" onclick="removeBreakTime(${breakIndex})" class='form-control btn btn-danger'><span class="fa fa fa-trash"></span></button>
            </div>
        </div>
        `;

        breaksContainer.appendChild(newBreakTimeInputs);
    }
    function removeBreakTime(button) {
       $('#break-'+button).remove();
    }
    </script>
@endpush