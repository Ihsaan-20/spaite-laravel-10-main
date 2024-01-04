<?php

namespace App\Http\Controllers\Roles_Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('roles_permissions.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('roles_permissions.permissions.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => strtolower($request->name),
            'group_name' => $request->group_name,
        ];
    
        $saved = Permission::create($data);
    
        if ($saved) {
            return back()->with('success', 'Permission created successfully!');
        }
        
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('roles_permissions.permissions.edit',compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        // dd($permission);
        if($permission){
            $permission->update([
                'name' => strtolower($request->name),
                'group_name' => $request->group_name,
            ]);
        }

        return view('roles_permissions.permissions.edit', compact('permission'))->with('success', 'Permission updated successfully!');
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();
        return back()->with('success', 'Permission deleted successfully!');
    }
}
