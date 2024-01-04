<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class IndexController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function givePermissionRole(Request $request){
        $roleId = $request->input('role_id');
        $permissionId = $request->input('permission_id');
    
        // Retrieve the role and permission instances
        $role = Role::find($roleId);
        $permission = Permission::find($permissionId);
    
        if ($role && $permission) {
            // Assign permission to the role
            $role->syncPermissions([$permission]);
    
            return back()->with('success', 'Permission assigned successfully');
        } else {
            return back()->with('error', 'Failed to assign permission');
        }
    }
}
