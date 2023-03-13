<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\StudentSchedule;
use App\Models\ScheduleBreak;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;;

class ScheduleController extends Controller
{
    public function index(Request $request){
        //authorize the action
        $this->authorize('view schedules', \Auth::user());

        $schedules = Schedule::with(['instructor', 'subject', 'course'])->get();
        return view('modules.schedules.index', compact('schedules'));
    }

    public function create(Request $request){
        //authorize the action
        $this->authorize('create schedules', \Auth::user());
        $courses = Course::pluck('id', 'name')->toArray();
        return view('modules.schedules.create', compact('courses'));
    }

    public function store(Request $request){
        //authorize the action
        $this->authorize('create schedules', \Auth::user());
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'course_id' => 'required',
            'subject_id' => 'required',
            'instructor_id' => 'required',
            'students' => "required"
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        //validation to check if schedule with same date time exists
        $request['from_time'] = date('H:i:s', strtotime($request->from_time));
        $request['to_time'] = date('H:i:s', strtotime($request->to_time));
        $date =  $request->date;
        $fromTime = $request->from_time;
        $toTime =  $request->to_time;
        $query = Schedule::where('date', $date)
        ->where(function ($query) use ($fromTime, $toTime) {
            $query->whereBetween('from_time', [$fromTime, $toTime])
                ->orWhereBetween('to_time', [$fromTime, $toTime])
                ->orWhere(function ($query) use ($fromTime, $toTime) {
                    $query->where('from_time', '<', $fromTime)
                        ->where('to_time', '>', $toTime);
                });
        });

        if (@$id) {
            $query->where('id', '<>', $id);
        }

        if ($query->count() > 0) {
            return back()->withError('Schedule exists on same date time!')->withInput($request->all());
        }

        $schedule =  Schedule::create($request->except(['_token',  'students', 'breaks']));

        //add students
        foreach($request->students as $student){

            StudentSchedule::create([
                'schedule_id' => $schedule->id,
                'student_id' => $student,
            ]);
        }
        if($request->breaks){
            foreach($request->breaks as $break){

                ScheduleBreak::create([
                    'schedule_id' => $schedule->id,
                    'from_time' => $break['from_time'],
                    'to_time' => $break['to_time'],
                ]);
            }
        }
        return redirect()->route('schedules.index')->withSuccess('Schedule Created Successfully!');
    }

    public function view(Request $request, $id){
        //authorize the action
        $this->authorize('view schedules', \Auth::user());

        $schedule = Schedule::find($id);
        return view('modules.schedules.view', compact('user'));
    }

    public function edit(Request $request, $id){
        //authorize the action
        $this->authorize('edit schedules', \Auth::user());
        $courses = Course::pluck('id', 'name')->toArray();
        $schedule = Schedule::find($id);
        return view('modules.schedules.edit', compact('schedule', 'courses'));
    }

    public function update(Request $request, $id){
        //authorize the action
        $this->authorize('edit schedules', \Auth::user());
        
        $schedule = Schedule::find($id);

        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'course_id' => 'required',
            'subject_id' => 'required',
            'instructor_id' => 'required',
            'students' => "required"
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        //validation to check if schedule with same date time exists
        $request['from_time'] = date('H:i:s', strtotime($request->from_time));
        $request['to_time'] = date('H:i:s', strtotime($request->to_time));
        $date =  $request->date;
        $fromTime = $request->from_time;
        $toTime =  $request->to_time;
        $query = Schedule::where('date', $date)
        ->where(function ($query) use ($fromTime, $toTime) {
            $query->whereBetween('from_time', [$fromTime, $toTime])
                ->orWhereBetween('to_time', [$fromTime, $toTime])
                ->orWhere(function ($query) use ($fromTime, $toTime) {
                    $query->where('from_time', '<', $fromTime)
                        ->where('to_time', '>', $toTime);
                });
        });

        if (@$id) {
            $query->where('id', '<>', $id);
        }

        if ($query->count() > 0) {
            return back()->withError('Schedule exists on same date time!')->withInput($request->all());
        }

        $schedule->students()->delete();
        $schedule->breaks()->delete();
        $schedule->update($request->except(['_token',  'students', 'breaks']));
         //add students
         foreach($request->students as $student){

            StudentSchedule::create([
                'schedule_id' => $schedule->id,
                'student_id' => $student,
            ]);
        }
        if($request->breaks){
            foreach($request->breaks as $break){

                ScheduleBreak::create([
                    'schedule_id' => $schedule->id,
                    'from_time' => $break['from_time'],
                    'to_time' => $break['to_time'],
                ]);
            }
        }
        return redirect()->route('schedules.index')->withSuccess('Schedule Updated Successfully!');
    }
    public function destroy( $id){
        
        //authorize the action
        $this->authorize('delete schedules', \Auth::user());

        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect()->route('schedules.index')->withSuccess('Schedule deleted Successfully!');
    }
}
