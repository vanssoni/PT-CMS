<?php

namespace App\Http\Controllers;

use App\Models\RoadTest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;;

class RoadTestController extends Controller
{
    public function index(Request $request){
        //authorize the action
        $this->authorize('view schedules', \Auth::user());

        $roadTests = RoadTest::with(['student'])->get();
        return view('modules.road-tests.index', compact('roadTests'));
    }

    public function create(Request $request){
        //authorize the action
        $this->authorize('create schedules', \Auth::user());
        $students = Student::where('status', 'enrolled')->get();
        return view('modules.road-tests.create', compact('students'));
    }

    public function store(Request $request){
        //authorize the action
        $this->authorize('create schedules', \Auth::user());
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'date' => 'required|date|date_format:Y-m-d',
            'status' => 'required',
            'location' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $roadTest =  RoadTest::create($request->except(['_token']));
        return redirect()->route('road-tests.index')->withSuccess('Road Test Created Successfully!');
    }

    public function view(Request $request, $id){
        //authorize the action
        $this->authorize('view road tests', \Auth::user());

        $roadTest = RoadTest::find($id);
        return view('modules.road-tests.view', compact('roadTest'));
    }

    public function edit(Request $request, $id){
        //authorize the action
        $this->authorize('edit road tests', \Auth::user());
        $students = Student::where('status', 'enrolled')->get();
        $roadTest = RoadTest::find($id);
        return view('modules.road-tests.edit', compact('roadTest', 'students'));
    }

    public function update(Request $request, $id){
        //authorize the action
        $this->authorize('edit road test', \Auth::user());
        
        $roadTest = RoadTest::find($id);

        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'date' => 'required|date|date_format:Y-m-d',
            'status' => 'required',
            'location' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $roadTest->update($request->except(['_token']));
        return redirect()->route('road-tests.index')->withSuccess('Road Test Updated Successfully!');
    }
    public function destroy( $id){
        
        //authorize the action
        $this->authorize('delete road tests', \Auth::user());

        $roadTest = RoadTest::find($id);
        $roadTest->delete();
        return redirect()->route('road-tests.index')->withSuccess('Road Test deleted Successfully!');
    }
}
