<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function updateProfile(Request $request){
        $user_id = \Auth::id();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'username' => "required|string|regex:/^\S*$/u|max:255|unique:users,username,$user_id",
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
        $users = User::with('roles')->whereHas('roles', function($q){
            $q->whereNotIn('name', ['admin', 'student', 'instructor']);
        })->where('id', '!=',\Auth::id())->get();
        return view('modules.users.index', compact('users'));
    }

    public function create(Request $request){
        $permissions = Permission::select('group', 'name')->orderByRaw("SUBSTRING_INDEX(name, ' ', -1) ASC")
                ->orderByRaw("SUBSTRING_INDEX(name, ' ', -2) ASC")
                ->get()->groupBy('group')->map(function($items) {
                    return $items->pluck('name');
                })
                ->toArray();
        $roles = Role::whereNotIn('name', ['admin', 'student', 'instructor'])->orderBy('name', 'ASC')->get();
        return view('modules.users.create', compact('permissions', 'roles'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'username' => "required|string|regex:/^\S*$/u|max:255|unique:users,username",
            'password' => 'required|min:6',
            'permissions' => 'required',
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
        //give permissiom and assign the role
        $user->givePermissionTo($request->permissions);
        $user->assignRole($request->role);
        return redirect()->route('users.index')->withSuccess('User Created Successfully!');
    }

    public function view(Request $request, $id){
        $user = User::find($id);
        return view('modules.users.view', compact('user'));
    }

    public function edit(Request $request, $id){
        
        $user = User::find($id);
        $permissions = Permission::select('group', 'name')->orderByRaw("SUBSTRING_INDEX(name, ' ', -1) ASC")
                ->orderByRaw("SUBSTRING_INDEX(name, ' ', -2) ASC")
                ->get()->groupBy('group')->map(function($items) {
                    return $items->pluck('name');
                })
                ->toArray();
        $roles = Role::whereNotIn('name', ['admin', 'student', 'instructor'])->orderBy('name', 'ASC')->get();
        return view('modules.users.edit', compact('user', 'permissions', 'roles'));
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'username' => "required|string|regex:/^\S*$/u|max:255|unique:users,username,$id",
            'password' => 'required|min:6',
            'permissions' => 'required',
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
        //give permissiom and assign the role
        $user->syncPermissions($request->permissions);
        $user->syncRoles($request->role);
        $user->save();
        return redirect()->route('users.index')->withSuccess('User Updated Successfully!');
    }
    public function destroy( $id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->withSuccess('User deleted Successfully!');
    }

}
