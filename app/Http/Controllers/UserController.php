<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class UserController extends Controller
{
    public function updateProfile(Request $request){
        $user_id = \Auth::id();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'username' => "required|string|regex:/^\S*$/u|max:255|unique:users,username,$user_id",
            'email' => "required|email|unique:users,email,$user_id",
            'password' => 'nullable|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'nullable|min:6|required_with:password'
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }

        $user = User::find(\Auth::id());
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;

        if($request->password){
            $user->password = Hash::make($request->password);
            $user->plain_password = $request->password;
        }
        if($request->hasFile('profile_pic')){
            $image_name = time().'.'.$request->profile_pic->extension();  
            $request->profile_pic->move(storage_path('app/public/users/'), $image_name);
            $user->profile_pic = $image_name;
        }
        $user->save();
        return back()->withSuccess('Profile Updated!');
    }

    public function index(Request $request){
        //authorize the action
        $this->authorize('view users', \Auth::user());

        $users = User::with('roles')->whereHas('roles', function($q){
            $q->whereNotIn('name', ['admin', 'student', 'instructor']);
        })->where('id', '!=',\Auth::id())->get();
        return view('modules.users.index', compact('users'));
    }

    public function create(Request $request){
        //authorize the action
        $this->authorize('create users', \Auth::user());
        $roles = Role::whereNotIn('name', ['admin', 'student', 'instructor'])->orderBy('name', 'ASC')->get();
        return view('modules.users.create', compact('roles'));
    }

    public function store(Request $request){
        //authorize the action
        $this->authorize('create users', \Auth::user());

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => "required|string|regex:/^\S*$/u|max:255|unique:users,username",
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        // dd($request->all());
        $user =  User::create($request->except(['_token', 'profile_pic', 'role', 'permissions']));
        $user->password = Hash::make($request->password);
        $user->plain_password = $request->password;

        if($request->hasFile('profile_pic')){
            $image_name = time().'.'.$request->profile_pic->extension();  
            $request->profile_pic->move(storage_path('app/public/users/'), $image_name);
            $user->profile_pic = $image_name;
        }
        $user->save();
        //assign role
        $user->assignRole($request->role);
        return redirect()->route('users.index')->withSuccess('User Created Successfully!');
    }

    public function view(Request $request, $id){
        //authorize the action
        $this->authorize('view users', \Auth::user());

        $user = User::find($id);
        return view('modules.users.view', compact('user'));
    }

    public function edit(Request $request, $id){
        //authorize the action
        $this->authorize('edit users', \Auth::user());

        $user = User::find($id);
        $roles = Role::whereNotIn('name', ['admin', 'student', 'instructor'])->orderBy('name', 'ASC')->get();
        return view('modules.users.edit', compact('user','roles'));
    }

    public function update(Request $request, $id){
        //authorize the action
        $this->authorize('edit users', \Auth::user());

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'email' => "required|email|unique:users,email,$id",
            'username' => "required|string|regex:/^\S*$/u|max:255|unique:users,username,$id",
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $user = User::find($id);
        $user->update($request->except(['_token', 'password', 'profile_pic', 'role', 'permissions']));
        $user->password = Hash::make($request->password);
        $user->plain_password = $request->password;
        if($request->hasFile('profile_pic')){
            $image_name = time().'.'.$request->profile_pic->extension();  
            $request->profile_pic->move(storage_path('app/public/users/'), $image_name);
            $user->profile_pic = $image_name;
        }
        $user->syncRoles($request->role);
        $user->save();
        return redirect()->route('users.index')->withSuccess('User Updated Successfully!');
    }

    public function destroy( $id){
        
        //authorize the action
        $this->authorize('delete users', \Auth::user());

        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->withSuccess('User deleted Successfully!');
    }
    public function updatePassword( Request $request){
        
        //authorize the action
        $this->authorize('edit users', \Auth::user());

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'password' => 'required|min:6',
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withError($validator->errors()->first());
        }

        $user = User::find($request->user_id);
        $user->password = Hash::make($request->password);
        $user->plain_password = $request->password;
        $user->save();
        return redirect()->route('users.index')->withSuccess('User password updated successfully!');
    }

    public function searchUsers( Request $request){
        $search = $request->search;
        $searchedUsers = User::where(function($q) use($search){
            $q->where('first_name', 'like', '%'.$search.'%')
            ->orWhere('last_name', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%');
        })->whereHas('roles', function($q){
            $q->where('name', '!=', 'admin');
        })->get();
        $html = '';
        $students = [];
        $users = [];
        $instructors = [];
        if(!count($searchedUsers) || !$request->search){
            $html = '<div class="dropdown-header noti-title">
                    <h5 class="text-overflow mb-2">Found 0 results</h5>
            </div>';
        }else{
            $html .= '<div class="dropdown-header noti-title">
                <h5 class="text-overflow mb-2">Found '.count($searchedUsers).' results</h5>
            </div>';

            foreach($searchedUsers as $user){
                if($user->hasRole('student')){
                    $students[] = $user;
                }
                elseif($user->hasRole('instructor')){
                    $instructors[] = $user;
                }else{
                    $users[] = $user;
                }
            }
            $html.='<div class="dropdown-header noti-title">
                    <h6 class="text-overflow mb-2 text-uppercase">Students</h6>
                </div>';
            if(count($students)){
                $html.='<div class="notification-list">';
                foreach($students as $student){
                    $html.='<a href="'.$student->href.'" class="dropdown-item notify-item">
                        <div class="d-flex align-items-start">
                            <img class="d-flex me-2 rounded-circle" src="'.$student->profile_pic.'" alt="Generic placeholder image" height="32">
                            <div class="w-100">
                                <h5 class="m-0 font-14">'.$student->name.'</h5>
                            </div>
                        </div>
                    </a>';
                }
                $html.='</div>';
            }
            $html.='<div class="dropdown-header noti-title">
                    <h6 class="text-overflow mb-2 text-uppercase">Instrcutors</h6>
                </div>';
            if(count($instructors)){
                $html.='<div class="notification-list">';
                foreach($instructors as $instructor){
                    $html.='<a href="'.$instructor->href.'" class="dropdown-item notify-item">
                        <div class="d-flex align-items-start">
                            <img class="d-flex me-2 rounded-circle" src="'.$instructor->profile_pic.'" alt="Generic placeholder image" height="32">
                            <div class="w-100">
                                <h5 class="m-0 font-14">'.$instructor->name.'</h5>
                            </div>
                        </div>
                    </a>';
                }
                $html.='</div>';
            }
            $html.='<div class="dropdown-header noti-title">
                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                </div>';
            if(count($users)){
                $html.='<div class="notification-list">';
                foreach($users as $user){
                    $html.='<a href="'.$user->href.'" class="dropdown-item notify-item">
                        <div class="d-flex align-items-start">
                            <img class="d-flex me-2 rounded-circle" src="'.$user->profile_pic.'" alt="Generic placeholder image" height="32">
                            <div class="w-100">
                                <h5 class="m-0 font-14">'.$user->name.'</h5>
                            </div>
                        </div>
                    </a>';
                }
                $html.='</div>';
            }
        }
        return response()->json([
            'success' => true,
            'html' =>$html,
        ]);
    }

}
