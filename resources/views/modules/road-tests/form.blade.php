<!-- Basic -->
<div class="row">
    <div class="col-md-6">
        <div class="row mb10">
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="date" class="floating-label control-label">Date:</label>
                        <input class="form-control datepicker-default" id="date" type="text" placeholder="Date" name="date" value="{{@$roadTest->date}}" required>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="location" class="floating-label control-label">Location:</label>
                        <input class="form-control" id="location" type="text" placeholder="Location" name="location" value="{{@$roadTest->location}}" required>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="disabledInput" class="floating-label control-label">Student:</label>
                
                    <select id="students" name="student_id" required class="form-control">
                        <option value=''>Select Student</option>
                        @foreach($students as $student)
                            <option value='{{$student->id}}' {{(@$student->id == @$roadTest->student_id ? 'selected' :'')}}>{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>           
            </div>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="disabledInput" class="floating-label control-label">Status:</label>
                
                    <select id="" name="status" required class="form-control">
                        <option value=''>Select Status</option>
                        <option value='pending' {{('pending' == @$roadTest->status ? 'selected' :'')}}>Pending</option>
                        <option value='pass' {{('pass' == @$roadTest->status ? 'selected' :'')}}>Pass</option>
                        <option value='fail' {{('fail' == @$roadTest->status ? 'selected' :'')}}>Fail</option>
                    </select>
                </div>           
            </div>
        </div>
    </div>
</div>