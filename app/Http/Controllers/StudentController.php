<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StudentController extends Controller
{
    public function index(Request $request){
        //authorize the action
        $this->authorize('view students', \Auth::user());

        $students = Student::with(['user'])->get();
        return view('modules.students.index', compact('students'));
    }

    public function create(Request $request){
        //authorize the action
        $this->authorize('create students', \Auth::user());
        $courses = Course::pluck('id', 'name')->toArray();
        return view('modules.students.create', compact('courses'));
    }

    public function store(Request $request){
        //authorize the action
        $this->authorize('create students', \Auth::user());
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'dob' => "required",
            'address' => 'required',
            'email' => 'email|required|unique:users',
            'username' => "required|string|regex:/^\S*$/u|max:255|unique:users,username",
            'password' => 'required',
            'phone' => 'required',
            'dl' => 'required|unique:students',
            'expiry' => 'required',
            'sin' => 'required',
            'status' => 'required',
            'registration_date' => 'required',
            'course_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $user =  User::create([
            'first_name'            => $request->first_name,
            'last_name'             => $request->last_name,
            'username'              => $request->username,
            'email'                 => $request->email,
            'password'              =>  Hash::make($request->password),
            'plain_password'        =>  $request->password,
        ]);

        if($request->hasFile('profile_pic')){
            $image_name = time().'.'.$request->profile_pic->extension();  
            $request->profile_pic->move(storage_path('app/public/users/'), $image_name);
            $user->profile_pic = $image_name;
        }
        $user->save();
        // assign the role
        $user->assignRole('student');
        $request['user_id'] = $user->id;
        try{
            $student =  Student::create($request->except(['_token', 'username', 'password', 'email','first_name', 'last_name', 'course_id', 'profile_pic']));
        }catch(\Exception $e){
            //delete the created user if error
            $user->delete();
            return back()
            ->withError('Something Went wrong!')
            ->withInput($request->all());
        }
        //assign the course
        StudentCourse::create([
            'student_id' => $student->id,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('students.index')->withSuccess('Student Created Successfully!');
    }

    public function view(Request $request, $id){
        //authorize the action
        $this->authorize('view students', \Auth::user());

        $student = Student::find($id);
        return view('modules.students.view', compact('user'));
    }

    public function edit(Request $request, $id){
        //authorize the action
        $this->authorize('edit students', \Auth::user());
        $courses = Course::pluck('id', 'name')->toArray();
        $student = Student::find($id);
        return view('modules.students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, $id){
        //authorize the action
        $this->authorize('edit students', \Auth::user());
        
        $student = Student::find($id);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'dob' => "required",
            'address' => 'required',
            'email' => "email|required|unique:users,email,$student->user_id",
            'username' => "required|string|regex:/^\S*$/u|max:255|unique:users,username,$student->user_id",
            'password' => 'required',
            'phone' => 'required',
            'dl'    => "required|unique:students,dl,$id",
            'expiry' => 'required',
            'sin' => 'required',
            'status' => 'required',
            'registration_date' => 'required',
            'course_id' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $user = User::find($student->user_id);
        $user->update([
            'first_name'            => $request->first_name,
            'last_name'             => $request->last_name,
            'username'              => $request->username,
            'email'                 => $request->email,
            'password'              =>  Hash::make($request->password),
            'plain_password'        =>  $request->password,
        ]);

        if($request->hasFile('profile_pic')){
            $image_name = time().'.'.$request->profile_pic->extension();  
            $request->profile_pic->move(storage_path('app/public/users/'), $image_name);
            $user->profile_pic = $image_name;
        }
        $user->save();
        $student->courses()->delete();
        $student->update($request->except(['_token', 'username', 'password', 'email','first_name', 'last_name', 'course_id', 'profile_pic']));
        //assign the course
        StudentCourse::create([
            'student_id' => $student->id,
            'course_id' => $request->course_id,
        ]);
        return redirect()->route('students.index')->withSuccess('Student Updated Successfully!');
    }
    public function destroy( $id){
        
        //authorize the action
        $this->authorize('delete students', \Auth::user());

        $student = User::find($id);
        $student->delete();
        return redirect()->route('students.index')->withSuccess('Student deleted Successfully!');
    }
}
