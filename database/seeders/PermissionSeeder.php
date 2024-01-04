<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'all.post',
            'edit.post',
            'update.post',
            'delete.post',
            'read.post'
        ];

        foreach ($permissions as $per) {
            Permission::create([
                'name' => $per,
                'group_name' => 'Posts'
            ]);
        }




    }
}
