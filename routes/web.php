<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//auth routes(login regsiter)
Auth::routes();
//authenticated routes
Route::group(['middleware' => ['auth:web']], function() {
    
    Route::get('/', 'HomeController@index');

    //users resource conrtol the creation/updation and deletion of users
    Route::resource('users', UserController::class);
    Route::get('/profile', function(){
        return view('modules.users.my-profile');
    });
    
    Route::post('/update-profile', 'UserController@updateProfile');
    //Roles Route
    Route::resource('roles', RoleController::class);
    //courses route
    Route::resource('courses', CourseController::class);
    //subjects route
    Route::resource('subjects', SubjectController::class);
    Route::get('get-course-subjects', 'SubjectController@getCourseSubjects')->name('get-course-subjects');
    //instructors route
    Route::resource('instructors', InstructorController::class);
    Route::get('get-course-instructors', 'InstructorController@getCourseInstructors')->name('get-course-instructors');
    //student routes
    Route::resource('students', StudentController::class);
    Route::get('get-course-students', 'StudentController@getCourseStudents')->name('get-course-students');
    //schedules routes
    Route::resource('schedules', ScheduleController::class);
    //road test routes
    Route::resource('road-tests', RoadTestController::class);
    //pdf form routes
    Route::resource('pdf-forms', PdfFormController::class);

    Route::get('/logout', function(){
        \Auth::logout();
        return back();
    });
});
