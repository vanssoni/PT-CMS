<div class="row mb10">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Course Name:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" placeholder="Course Name" required value="{{@$course->name}}" name="name">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Program ID:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="text" name="program_id" id="name"
                    placeholder="Program ID"  value='{{@$course->program_id}}' required>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Course Type:</label>
        
                <div class="col-lg-8">
                    <label class="field select">
                        <select id="country" name="course_type" required class="form-control">
                            <option value="">Select a course type</option>
                            <option value="vocational" {{ (@$course ? (@$course->course_type == 'vocational' ? 'selected':'') : '')}}>Vocational</option>
                            <option value="non-vocational" {{ (@$course ? (@$course->course_type == 'non-vocational' ? 'selected':'') : '')}}>Non-Vocational</option>
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Course Time  Type:</label>
        
                <div class="col-lg-8">
                    <label class="field select">
                        <select id="country" name="course_time_type" required class="form-control">
                            <option value="">Select a course time type</option>
                            <option value="ft" {{ (@$course ? (@$course->course_time_type == 'ft' ? 'selected':'') : '')}}>Full Time</option>
                            <option value="pt" {{ (@$course ? (@$course->course_time_type == 'pt' ? 'selected':'') : '')}}>Part Time</option>
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Course months:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="number" name="months" id="name"
                    placeholder="Course months"  value='{{@$course->months}}' >
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Course weeks:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="number" name="weeks" id="name"
                    placeholder="Course weeks"  value='{{@$course->weeks}}' >
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Course hours:</label>
        
                <div class="col-lg-8">
                    <input class="form-control" id="" type="number" name="hours" id="name"
                    placeholder="Course hours"  value='{{@$course->hours}}' step=".01">
                </div>
            </div>
            <div class="col-md-12 pt18">
                <label for="disabledInput" class="col-lg-3 control-label pt18">Practice:</label>
        
                <div class="col-lg-8">
                    <label class="field select">
                        <select id="country" name="practice" required class="form-control">
                            <option value="">Select a option</option>
                            <option value="yes" {{ (@$course ? (@$course->practice == 'yes' ? 'selected':'') : '')}}>Yes</option>
                            <option value="no" {{ (@$course ? (@$course->practice == 'no' ? 'selected':'') : '')}}>No</option>
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>