<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\InstructorCourse;
use App\Models\InstructorSubject;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InstructorController extends Controller
{
    public function index(Request $request){
        //authorize the action
        $this->authorize('view instructors', \Auth::user());

        $instructors = Instructor::with(['user'])->get();
        return view('modules.instructors.index', compact('instructors'));
    }

    public function create(Request $request){
        //authorize the action
        $this->authorize('create instructors', \Auth::user());
        $courses = Course::pluck('id', 'name')->toArray();
        $permissions = Permission::select('group', 'name')->orderByRaw("SUBSTRING_INDEX(name, ' ', -1) ASC")
        ->orderByRaw("SUBSTRING_INDEX(name, ' ', -2) ASC")
        ->get()->groupBy('group')->map(function($items) {
            return $items->pluck('name');
        })
        ->toArray();
        return view('modules.instructors.create', compact('courses', 'permissions'));
    }

    public function store(Request $request){
        //authorize the action
        $this->authorize('create instructors', \Auth::user());
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'courses' => 'required',
            'subjects' => 'required',
            'permissions' => 'required',
            'email' => 'email|required|unique:users',
            'username' => "required|string|regex:/^\S*$/u|max:255|unique:users,username",
            'password' => 'required',
            'contact_number' => 'required',
            'driver_licence_number' => 'required|unique:instructors',
            'contact_number' => 'required',
            'driver_licence_expiry' => 'required',
            'status' => 'required',
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
        $user->assignRole('instructor');
        //give permissions
        $user->givePermissionTo($request->permissions);
        $request['user_id'] = $user->id;
        try{
            $instructor =  Instructor::create($request->except(['_token', 'username', 'password', 'email','first_name', 'last_name', 'courses', 'subjects', 'profile_pic','permissions']));
        }catch(\Exception $e){
            //delete the created user if error
            $user->delete();
            // print_r($e->getMessage());
            // die();
            return back()
            ->withError('Something Went wrong!')
            ->withInput($request->all());
        }
        //assign the courses
        foreach($request->courses as $course){

            InstructorCourse::create([
                'instructor_id' => $instructor->id,
                'course_id' => $course,
            ]);
        }
        //assign the subjects
        foreach($request->subjects as $subject){

            InstructorSubject::create([
                'instructor_id' => $instructor->id,
                'subject_id' => $subject,
            ]);
        }
        return redirect()->route('instructors.index')->withSuccess('Instructor Created Successfully!');
    }

    public function view(Request $request, $id){
        //authorize the action
        $this->authorize('view instructors', \Auth::user());

        $instructor = Instructor::find($id);
        return view('modules.instructors.view', compact('user'));
    }

    public function edit(Request $request, $id){
        //authorize the action
        $this->authorize('edit instructors', \Auth::user());
        $courses = Course::pluck('id', 'name')->toArray();
        $instructor = Instructor::find($id);
        $permissions = Permission::select('group', 'name')->orderByRaw("SUBSTRING_INDEX(name, ' ', -1) ASC")
        ->orderByRaw("SUBSTRING_INDEX(name, ' ', -2) ASC")
        ->get()->groupBy('group')->map(function($items) {
            return $items->pluck('name');
        })
        ->toArray();
        return view('modules.instructors.edit', compact('instructor', 'courses', 'permissions'));
    }

    public function update(Request $request, $id){
        //authorize the action
        $this->authorize('edit instructors', \Auth::user());
        
        $instructor = Instructor::find($id);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'courses' => 'required',
            'subjects' => 'required',
            'permissions' => 'required',
            'email' => "email|required|unique:users,email,$instructor->user_id",
            'username' => "required|string|regex:/^\S*$/u|max:255|unique:users,username,$instructor->user_id",
            'password' => 'required',
            'contact_number' => 'required',
            'driver_licence_number' => "required|unique:instructors,driver_licence_number,$id",
            'contact_number' => 'required',
            'driver_licence_expiry' => 'required',
            'status' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $user = User::find($instructor->user_id);
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
        //give permissiom 
        $user->syncPermissions($request->permissions);
        $user->save();
        $instructor->courses()->delete();
        $instructor->subjects()->delete();
        $instructor->update($request->except(['_token', 'username', 'password', 'email','first_name', 'last_name', 'courses', 'subjects', 'profile_pic','permissions']));
        //assign the courses
        foreach($request->courses as $course){

            InstructorCourse::create([
                'instructor_id' => $instructor->id,
                'course_id' => $course,
            ]);
        }
        //assign the subjects
        foreach($request->subjects as $subject){

            InstructorSubject::create([
                'instructor_id' => $instructor->id,
                'subject_id' => $subject,
            ]);
        }
        return redirect()->route('instructors.index')->withSuccess('Instructor Updated Successfully!');
    }
    public function destroy( $id){
        
        //authorize the action
        $this->authorize('delete instructors', \Auth::user());

        $instructor = User::find($id);
        $instructor->delete();
        return redirect()->route('instructors.index')->withSuccess('Instructor deleted Successfully!');
    }
    public function getCourseInstructors(Request $request){
        $courses = $request->input('courses');
        $instructors = [];
        if($request->input('courses'))
        $instructors = Instructor::whereHas('courses', function($q) use($courses){
            $q->whereIn('course_id', $courses);
        })->where('status', 'active')->get();
        return response()->json($instructors);
    }
}
