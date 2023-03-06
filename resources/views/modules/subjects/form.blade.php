<div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="text" name="name" id="name" class="gui-input"
                    placeholder="Subject Name" required value="{{@$subject->name}}" >
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="text" name="code" id="name" class="gui-input"
                    placeholder="Subject Code"  value='{{@$subject->code}}' required>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="text" name="prefix" id="prefix" class="gui-input"
                    placeholder="Subject Prefix"  value='{{@$subject->prefix}}' required>
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="section">
            <label class="field select">
                <select id="country" name="type" required>
                    <option value="">Select a subject type</option>
                    <option value="assesment" {{ (@$subject ? (@$subject->type == 'assesment' ? 'selected':'') : '')}}>Assesment</option>
                    <option value="hourly" {{ (@$subject ? (@$subject->type == 'hourly' ? 'selected':'') : '')}}>Hourly</option>
                </select>
                <i class="arrow"></i>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="number" name="minimum_percentage" id="name" class="gui-input"
                    placeholder="Minimum Percentage"  value="{{@$subject->minimum_percentage}}">
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="number" name="hours" id="name" class="gui-input"
                    placeholder="Subject hours" required value="{{@$subject->hours}}">
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field select">
                <select id="course_id" name="course_id" required>
                    <option value="">Select a course</option>
                    @foreach($courses as $course_name => $course_id)
                        <option value="{{$course_id}}" {{(@$subject->course_id == $course_id ? 'selected' : '')}}>{{@$course_name}}</option>
                    @endforeach
                </select>
                <i class="arrow"></i>
            </label>
        </div>
    </div>
</div>