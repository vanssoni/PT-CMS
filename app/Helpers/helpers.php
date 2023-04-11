<?php
use App\Models\Subject;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Fee;
use App\Models\User;
use App\Models\RoadTest;
use App\Models\Instructor;

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
function getPendingAmountTillTheId($id, $student_id, $course_id) {

    $courseFee = Course::where('id', $course_id)->pluck('fees')->first();
    $paidTillNow = Fee::where('student_id', $student_id)->where('course_id', $course_id)->where('id' ,'<=', $id)->sum('amount');
    return number_format($courseFee-$paidTillNow, 2, '.', '');
}
function getHrefLinkOfUser($id){
    $user = User::find($id);
    if($user->hasRole('student')){
        $student = Student::where('user_id', $id)->first();
        return url('students').'/'.@$student->id;
    }
    if($user->hasRole('instructor')){
        $instructor = Instructor::where('user_id', $id)->first();
        return url('instructors').'/'.@$instructor->id.'/edit';
    }
    return url('users').'/'.@$user->id.'/edit';
}

function getTotalRevenue(){
    $fee =  Fee::sum('amount');
    return number_format($fee , 2);
}
function getFeeCollectedToday(){
    $fee =  Fee::where('created_at', 'Y-m-d')->sum('amount');
    return number_format($fee , 2);
}
function getTotalRevenuePercentage(){

    $feeTobePaid =  Student::get()->sum('total_fees');
    $feePaid =  Fee::sum('amount');
    if($feePaid && $feeTobePaid){

        return round(($feePaid/$feeTobePaid)*100,2);
    }
    return 0;
}
function getAllUsers(){
    return User::with('roles')->whereHas('roles', function($q){
        $q->whereNotIn('name', ['admin', 'student', 'instructor']);
    })->count();
}
function getAllStudents(){
    return User::with('roles')->whereHas('roles', function($q){
        $q->where('name', 'student');
    })->count();
}
function getAllInstructors(){
    return User::with('roles')->whereHas('roles', function($q){
        $q->where('name', 'instructor');
    })->count();
}
function getRecentUsers(){
    return User::with('roles')->whereHas('roles', function($q){
        $q->whereNotIn('name', ['admin', 'student', 'instructor']);
    })->latest()->limit(5)->get();
}
function getRecentStudents(){
    return Student::with('user')->latest()->limit(5)->get();
}
function getUpcomingSechedules(){
    return Schedule::with(['instructor', 'subject', 'course'])->where('date', '>=', date('Y-m-d'))
    ->orderBy('date')
    ->orderBy('from_time')->limit(5)->get();
}
function getUpcomingRoadTests(){
    return RoadTest::with(['student'])->where('date', '>=', date('Y-m-d'))
    ->orderBy('date')
    ->limit(5)->get();
}
function getStudentGraph() {
	$result = [
		'categories' => [],
		'data' => []
	];
	if(request()->filter == 'week' || request()->filter == 'month'){
		$days =  (request()->filter == 'week' ? 7 : 30);
		$startDate = now()->subDays($days);
		$endDate = now();
	  
		$date = clone $startDate;
		while ($date <= $endDate) {
		  
			$userCount = Student::filter(['createdAt' => $date])->count();
			$result['categories'][] = $date->format('d F');
			$result['data'][] = $userCount;
			$date->addDay();
		}
	}else{
		$i = 1;
		while ($i <= 12) {
		  
			$userCount = Student::filter(['createdAtMonth' => array('year' => date('Y'), 'month' =>  $i)])->count();
			$result['data'][] = $userCount;
			$i++;
		}
		$result['categories']=  ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September','October','November','December'];
	}
	return json_encode($result);
}
function getStudentWeeKlyGrowth(){
	$newCount = fee_counter(['startDate' => now()->subDays(7), 'endDate' => now()]);
	$oldCount = fee_counter(['startDate' => now()->subDays(14), 'endDate' =>  now()->subDays(7)]);
	return getTheGrowth($oldCount, $newCount);
}
function getStudentMonthlyGrowth(){
	$newCount = fee_counter(['startDate' => now()->subDays(30), 'endDate' => now()]);
	$oldCount = fee_counter(['startDate' => now()->subDays(60), 'endDate' =>  now()->subDays(30)]);
	return getTheGrowth($oldCount, $newCount);
}
function getTheGrowth($oldCount , $newCount){
    $growth = 100;
    if(!$newCount){
      $growth = 0;
    }
    if($newCount && $oldCount){
      $growth = ($newCount - $oldCount) / $oldCount * 100;
    }
    if($growth < 0){
        $html ="<h4><i class='fe-arrow-down text-danger me-1'></i>$".round($newCount, 2)."</h4>";
    }else{
        $html ="<h4><i class='fe-arrow-up text-success me-1'></i>$".round($newCount, 2)."</h4>";
    }
    return $html;
  }
  function fee_counter($data = [])
{

	return Fee::filter($data)->sum('amount');
}