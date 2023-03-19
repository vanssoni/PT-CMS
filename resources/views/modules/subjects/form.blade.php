
<div class="row mt-3">
    <label for="disabledInput" class="col-lg-3 control-label ">Subject Name:</label>

    <div class="col-lg-8">
        <input class="form-control" id="" type="text" placeholder="Subject Name" required value="{{@$subject->name}}" name="name">
    </div>
</div>
<div class="row mt-3">
    <label for="disabledInput" class="col-lg-3 control-label ">Subject Code:</label>

    <div class="col-lg-8">
        <input class="form-control" id="" type="text" placeholder="Subject Code" required value="{{@$subject->code}}" name="code">
    </div>
</div>
<div class="row mt-3">
    <label for="disabledInput" class="col-lg-3 control-label ">Subject Prefix:</label>

    <div class="col-lg-8">
        <input class="form-control" id="" type="text" placeholder="Subject Prefix" required value="{{@$subject->prefix}}" name="prefix">
    </div>
</div>
<div class="row mt-3">
    <label for="disabledInput" class="col-lg-3 control-label ">Minimum Percentage:</label>

    <div class="col-lg-8">
        <input class="form-control" id="" type="number" placeholder="Minimum Percentage" required value="{{@$subject->minimum_percentage}}" name="minimum_percentage">
    </div>
</div>
<div class="row mt-3">
    <label for="disabledInput" class="col-lg-3 control-label ">Subject Type:</label>

    <div class="col-lg-8">
        <select id="country" name="type" required class="form-control">
            <option value="">Select a subject type</option>
            <option value="assesment" {{ (@$subject ? (@$subject->type == 'assesment' ? 'selected':'') : '')}}>Assesment</option>
            <option value="hourly" {{ (@$subject ? (@$subject->type == 'hourly' ? 'selected':'') : '')}}>Hourly</option>
        </select>
    </div>
</div>
<div class="row mt-3">
    <label for="disabledInput" class="col-lg-3 control-label ">Hours:</label>

    <div class="col-lg-8">
        <input class="form-control" id="" type="number" placeholder="Hours" required value="{{@$subject->hours}}" name="hours" step=".01">
    </div>
</div>
<div class="row mt-3">
    <label for="disabledInput" class="col-lg-3 control-label ">Course:</label>

    <div class="col-lg-8">
       
        <select id="course_id" name="course_id" required class="form-control">
            <option value="">Select a course</option>
            @foreach($courses as $course_name => $course_id)
                <option value="{{$course_id}}" {{(@$subject->course_id == $course_id ? 'selected' : '')}}>{{@$course_name}}</option>
            @endforeach
        </select>
    </div>
</div>
       