<?php

namespace App\Http\Controllers\Roles_Permissions;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleSetupController extends Controller
{
    public function AllRolePermission(){
        $roles = Role::all();
        return view('roles_permissions.rolesetup.all_role_permission', compact('roles'));
    }//end method;

    public function AddRolePermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('roles_permissions.rolesetup.add_role_permission', compact('roles','permissions','permission_groups'));
    }//end method;

    public function StoreRolePermission(Request $request){
        // dd($request->all());
       $data = array();
       $permissions = $request->permission;

       foreach ($permissions as  $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
       }//end loop
      

        return redirect()->back()->with( 'success','Role Permission Added Successfully');
    }//end method;

    public function EditRolePermission($id){
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('roles_permissions.rolesetup.edit_role_permission', compact('roles','permissions','permission_groups'));
    }//end method;

    
    public function updateRolePermission(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->input('permission', []);

        $validPermissions = Permission::whereIn('id', $permissions)->pluck('id')->toArray();

        if (!empty($validPermissions)) {
            $role->syncPermissions($validPermissions);
            return redirect()->route('all.roles.permissions')->with('success', 'Role Permissions Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'No valid permissions selected');
        }
    }//end method;

    

    public function DeleteRolePermission($id){
        $role = Role::findOrFail($id);
        if( !is_null($role)){
            $role->delete();
        }
        return redirect()->route('all.roles.permissions')->with('Role Permission Deleted Successfully');
    }//end method;
}
