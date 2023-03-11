<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SubjectController extends Controller
{
    public function index(Request $request){
        //authorize the action
        $this->authorize('view subjects', \Auth::user());

        $subjects = Subject::with('course')->get();
        return view('modules.subjects.index', compact('subjects'));
    }

    public function create(Request $request){
        //authorize the action
        $this->authorize('create subjects', \Auth::user());
        $courses = Course::pluck('id', 'name')->toArray();
        return view('modules.subjects.create', compact('courses'));
    }

    public function store(Request $request){
        //authorize the action
        $this->authorize('create subjects', \Auth::user());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'prefix' => "required",
            'code' => 'required',
            'type' => 'required',
            'hours' => 'required',
            'course_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $subject =  Subject::create($request->except(['_token']));
        return redirect()->route('subjects.index')->withSuccess('Subject Created Successfully!');
    }

    public function view(Request $request, $id){
        //authorize the action
        $this->authorize('view subjects', \Auth::user());

        $subject = Subject::find($id);
        return view('modules.subjects.view', compact('user'));
    }

    public function edit(Request $request, $id){
        //authorize the action
        $this->authorize('edit subjects', \Auth::user());
        $subject = Subject::find($id);
        $courses = Course::pluck('id', 'name')->toArray();
        return view('modules.subjects.edit', compact('subject', 'courses'));
    }

    public function update(Request $request, $id){
        //authorize the action
        $this->authorize('edit subjects', \Auth::user());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'prefix' => "required",
            'code' => 'required',
            'type' => 'required',
            'hours' => 'required',
            'course_id' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $subject = Subject::find($id);
        $subject->update($request->except(['_token']));
        return redirect()->route('subjects.index')->withSuccess('Subject Updated Successfully!');
    }
    
    public function destroy( $id){
        
        //authorize the action
        $this->authorize('delete subjects', \Auth::user());

        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subjects.index')->withSuccess('Subject deleted Successfully!');
    }
    public function getCourseSubjects(Request $request){
        $courses = $request->input('courses');
        $subjects = [];
        if($request->input('courses'))
        $subjects = Subject::whereIn('course_id', $courses)->get();
        return response()->json($subjects);
    }
}
