<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index(Request $request){
        $roles = Role::whereNotIn('name', ['admin', 'student', 'instructor'])->get();
        return view('modules.roles.index', compact('roles'));
    }
    public function create(Request $request){
        return view('modules.roles.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => "required|string|regex:/^\S*$/u|max:255|unique:roles",
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        Role::create([
            'name' => $request->name
        ]);
        return redirect()->route('roles.index')->withSuccess('Role created!');
    }

    public function edit(Request $request, $id){
        $role = Role::find($id);
        return view('modules.roles.edit', compact('role'));
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => "required|string|regex:/^\S*$/u|max:255|unique:roles,name, $id",
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $role = Role::find($id);
        $role->update([
            'name' => $request->name
        ]);
        return redirect()->route('roles.index')->withSuccess('Role updated!');
    }
    public function destroy( $id){
        
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index')->withSuccess('Role deleted!');
    }
}
