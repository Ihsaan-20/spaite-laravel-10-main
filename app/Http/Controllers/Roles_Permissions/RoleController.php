<?php

namespace App\Http\Controllers\Roles_Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('roles_permissions.roles.index', compact('roles'));
    }

    public function create()
    {

        return view('roles_permissions.roles.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => strtolower($request->name)
        ];
    
        $saved = Role::create($data);
    
        if ($saved) {
            return back()->with('success', 'New role added successfully!');
        }
    }
    

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles_permissions.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        
        if($role){
            $role->update([
                'name' => strtolower($request->name),
            ]);
        }

        return view('roles_permissions.roles.edit', compact('role'))->with('success', 'Role updated successfully!');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if($role)
        {
            $role->delete();
            return back()->with('success', 'Role deleted successfully!');

        }else{
            return back()->with('error', 'Role not found!');
        }
    }


}
