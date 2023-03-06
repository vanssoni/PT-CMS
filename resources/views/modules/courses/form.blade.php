 <div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="text" name="name" id="name" class="gui-input"
                    placeholder="Course Name" required value="{{@$course->name}}" >
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="text" name="program_id" id="name" class="gui-input"
                    placeholder="Program ID"  value='{{@$course->program_id}}' required>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field select">
                <select id="country" name="course_type" required>
                    <option value="">Select a course type</option>
                    <option value="vocational" {{ (@$course ? (@$course->course_type == 'vocational' ? 'selected':'') : '')}}>Vocational</option>
                    <option value="non-vocational" {{ (@$course ? (@$course->course_type == 'non-vocational' ? 'selected':'') : '')}}>Non-Vocational</option>
                </select>
                <i class="arrow"></i>
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="section">
            <label class="field select">
                <select id="country" name="course_time_type" required>
                    <option value="">Select a course time type</option>
                    <option value="ft" {{ (@$course ? (@$course->course_time_type == 'ft' ? 'selected':'') : '')}}>Full Time</option>
                    <option value="pt" {{ (@$course ? (@$course->course_time_type == 'pt' ? 'selected':'') : '')}}>Part Time</option>
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
                <input type="number" name="months" id="name" class="gui-input"
                    placeholder="Course months"  value="{{@$course->months}}">
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="number" name="weeks" id="name" class="gui-input"
                    placeholder="Course weeks"  value="{{@$course->weeks}}">
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="number" name="hours" id="name" class="gui-input"
                    placeholder="Course hours" required value="{{@$course->hours}}">
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="section">
            <label class="field select">
                <select id="country" name="practice" required>
                    <option value="">Select a option</option>
                    <option value="yes" {{ (@$course ? (@$course->practice == 'yes' ? 'selected':'') : '')}}>Yes</option>
                    <option value="no" {{ (@$course ? (@$course->practice == 'no' ? 'selected':'') : '')}}>No</option>
                </select>
                <i class="arrow"></i>
            </label>
        </div>
    </div>
</div>