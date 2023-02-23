<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
        }
        if($request->hasFile('profile_pic')){
            $image_name = time().'.'.$request->profile_pic->extension();  
            $request->profile_pic->move(storage_path('app/public/users/'), $image_name);
            $user->profile_pic = $image_name;
        }
        $user->save();
        return back()->withSuccess('Profile Updated!');
    }
}
