<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'superadmin',
            'admin',
            'user',
            'editor',
        ];

        foreach ($roles as $roleName) {
            Role::create(['name' => $roleName]);
        }

        //Retrieve all permissions
        $all = Permission::all();
        $firstThree = Permission::limit(3)->get();
        $AdminRole = Role::where('id' , 2)->first();
        //Assign permissions to roles
        $superAdminRole = Role::where('name', 'superadmin')->first();
        if ($superAdminRole) {
            $superAdminRole->syncPermissions($all);
        }

         //Assign permissions to roles
         $AdminRole = Role::where('name', 'admin')->first();
         if ($AdminRole) {
             $AdminRole->syncPermissions($firstThree);
         }
    }
}
