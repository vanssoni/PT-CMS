<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    public function index(Request $request){
        //authorize the action
        $this->authorize('view roles', \Auth::user());

        $roles = Role::whereNotIn('name', ['admin', 'student'])->get();
        return view('modules.roles.index', compact('roles'));
    }
    public function create(Request $request){
        //authorize the action
        $this->authorize('create roles', \Auth::user());
        $permissions = Permission::select('group', 'name')->orderByRaw("SUBSTRING_INDEX(name, ' ', -1) ASC")
        ->orderByRaw("SUBSTRING_INDEX(name, ' ', -2) ASC")
        ->get()->groupBy('group')->map(function($items) {
            return $items->pluck('name');
        })
        ->toArray();
        return view('modules.roles.create', compact('permissions'));
    }
    public function store(Request $request){
         //authorize the action
        $this->authorize('create roles', \Auth::user());
        $validator = Validator::make($request->all(), [
            'name' => "required|string|max:255|unique:roles",
            'permissions' => "required",
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $role=Role::create([
            'name' => $request->name
        ]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->withSuccess('Role created!');
    }

    public function edit(Request $request, $id){
        //authorize the action
        $this->authorize('edit roles', \Auth::user());
        $permissions = Permission::select('group', 'name')->orderByRaw("SUBSTRING_INDEX(name, ' ', -1) ASC")
        ->orderByRaw("SUBSTRING_INDEX(name, ' ', -2) ASC")
        ->get()->groupBy('group')->map(function($items) {
            return $items->pluck('name');
        })
        ->toArray();
        $role = Role::find($id);
        return view('modules.roles.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, $id){
        //authorize the action
        $this->authorize('edit roles', \Auth::user());

        $validator = Validator::make($request->all(), [
            'name' => "required|string|max:255|unique:roles,name, $id",
            'permissions' => "required",
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
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->withSuccess('Role updated!');
    }
    public function destroy( $id){
        //authorize the action
        $this->authorize('delete roles', \Auth::user());

        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index')->withSuccess('Role deleted!');
    }
}
