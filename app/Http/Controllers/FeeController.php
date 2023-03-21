<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class FeeController extends Controller
{
    public function index(Request $request){
        //authorize the action
        $this->authorize('view fees', \Auth::user());

        $fees = Fee::with(['student','user'])->latest()->get();
        return view('modules.fees.index', compact('fees'));
    }

    public function create(Request $request){
        //authorize the action
        $this->authorize('create fees', \Auth::user());
        $students = Student::where('status', 'enrolled')->get();
        return view('modules.fees.create', compact('students'));
    }

    public function store(Request $request){
        //authorize the action
        $this->authorize('create fees', \Auth::user());
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'date' => 'required|date|date_format:Y-m-d',
            'amount' => 'required',
            'payment_mode' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $student = Student::find($request->student_id);

        if(!$student->first_course_id){
            return back()
            ->withError('Course is not assigned to student')
            ->withInput($request->all());
        }
        if($request->amount > $student->remaining_fees){
            return back()
            ->withError('Cannot collect fee more then remaining fees');
        }
        $request['course_id'] = $student->first_course_id;
        $request['received_by'] = \Auth::id();
        $fee =  Fee::create($request->except(['_token','is_view_student']));
        if($request->is_view_student){
            return back()->withSuccess('Fee Collected Successfully!');
        }
        return redirect()->route('fees.index')->withSuccess('Fee Collected Successfully!');
    }

    public function view(Request $request, $id){
        //authorize the action
        $this->authorize('view fees', \Auth::user());

        $fee = Fee::find($id);
        return view('modules.fees.view', compact('fee'));
    }

    public function edit(Request $request, $id){
        //authorize the action
        $this->authorize('edit fees', \Auth::user());
        $students = Student::where('status', 'enrolled')->get();
        $fee = Fee::find($id);
        return view('modules.fees.edit', compact('fee', 'students'));
    }

    public function update(Request $request, $id){
        //authorize the action
        $this->authorize('edit fees', \Auth::user());
        
        $fee = Fee::find($id);

        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'date' => 'required|date|date_format:Y-m-d',
            'amount' => 'required',
            'payment_mode' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }

        $student = Student::find($request->student_id);

        if(!$student->first_course_id){
            return back()
            ->withError('Course is not assigned to student')
            ->withInput($request->all());
        }
        $remaningFee = $student->paid_fees-$request->amount;
        if( $remaningFee < 0){
            return back()
            ->withError('Cannot collect fee more then remaining fees');
        }
        $fee->update($request->except(['_token']));
        return redirect()->route('fees.index')->withSuccess('Fee Updated Successfully!');
    }
    public function destroy( $id){
        
        //authorize the action
        $this->authorize('delete fees', \Auth::user());

        $fee = Fee::find($id);
        $fee->delete();
        return back()->withSuccess('Fee deleted Successfully!');
    }
}
