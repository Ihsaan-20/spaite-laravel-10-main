<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignRolePermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::get();

        // Ensure the super admin user exists with ID 1 in your database
        $superAdmin = User::find(1);

        if ($superAdmin) {
            $superAdmin->syncPermissions($permissions);
        } else {
            echo "Super admin user with ID 1 not found.";
        }

    }
}
