<?php
use App\Models\Subject;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Student;

function getStatusBadge($status) {
    switch ($status) {
        case 'pass':
            $class = 'success';
            break;
        case 'fail':
            $class = 'danger';
            break;
        case 'pending':
            $class = 'info';
            break;
        default:
            $class = 'default';
            break;
    }

    $badge = '<span class="badge bg-' . $class . '">' . ucfirst($status) . '</span>';

    return $badge;
}

function getCourseSubjects($course_id){
    return Subject::where('course_id', $course_id)->get();
}

function getCourseName($course_id){
    return Course::where('id', $course_id)->pluck('name')->first();
}

function getCompletedScheduleMinutes($student_id, $subject_id){

    $scheduleMinutes = Schedule::where('date','<=' , date('Y-m-d') )->whereHas('students',function($q) use($student_id){
        $q->where('student_id', $student_id);
    })->where('subject_id',$subject_id)->get()->sum('minutes');
    $subject  = Subject::find($subject_id);
    if(!@$scheduleMinutes)
    return 0;
    if(!$subject || !@$subject->minutes)
    return 0;
    $percentage =  ($scheduleMinutes/$subject->minutes)*100;
    if($percentage > 100){
        $percentage = 100;
    }
    return  round($percentage,2);
}

function getStudentSechules($student_id){

   return  Schedule::whereHas('students',function($q) use($student_id){
        $q->where('student_id', $student_id);
    })->get();
}
function getProgressBarColor($percentage){

   if($percentage>=100){
    return 'progress-bar-striped bg-success';
   }
   if($percentage >=80){
    return 'progress-bar-striped bg-primary';
   }
   if($percentage >=70){
    return 'progress-bar-striped bg-info';
   }
   if($percentage >=50){
    return 'progress-bar-striped bg-alert';
   }
   return 'progress-bar-striped bg-danger';
}
function isActiveRoute($routeName) {
    return Route::currentRouteName() == $routeName ? 'active' : '';
}
function isParentRoute($routeName) {
    $currentRoute = Route::current()->uri();
    $currentSegment = explode('/', $currentRoute)[0];

    if ($currentSegment === $routeName) {
        return 'menu-open';
    }
}