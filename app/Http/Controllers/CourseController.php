<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseController extends Controller
{
    public function index(Request $request){
        //authorize the action
        $this->authorize('view courses', \Auth::user());

        $courses = Course::get();
        return view('modules.courses.index', compact('courses'));
    }

    public function create(Request $request){
        //authorize the action
        $this->authorize('create courses', \Auth::user());
        return view('modules.courses.create');
    }

    public function store(Request $request){
        //authorize the action
        $this->authorize('create courses', \Auth::user());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'program_id' => "required",
            'course_type' => 'required',
            'course_time_type' => 'required',
            'hours' => 'required',
            'fees' => 'required',
            'practice' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $course =  Course::create($request->except(['_token']));
        return redirect()->route('courses.index')->withSuccess('Course Created Successfully!');
    }

    public function view(Request $request, $id){
        //authorize the action
        $this->authorize('view courses', \Auth::user());

        $course = Course::find($id);
        return view('modules.courses.view', compact('user'));
    }

    public function edit(Request $request, $id){
        //authorize the action
        $this->authorize('edit courses', \Auth::user());
        $course = Course::find($id);
        return view('modules.courses.edit', compact('course'));
    }

    public function update(Request $request, $id){
        //authorize the action
        $this->authorize('edit courses', \Auth::user());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'program_id' => "required",
            'course_type' => 'required',
            'course_time_type' => 'required',
            'hours' => 'required',
            'fees' => 'required',
            'practice' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $course = Course::find($id);
        $course->update($request->except(['_token']));
        return redirect()->route('courses.index')->withSuccess('Course Updated Successfully!');
    }
    public function destroy( $id){
        
        //authorize the action
        $this->authorize('delete courses', \Auth::user());

        $course = Course::find($id);
        $course->delete();
        return redirect()->route('courses.index')->withSuccess('Course deleted Successfully!');
    }
}
