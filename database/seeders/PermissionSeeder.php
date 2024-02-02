<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'Users',
            'Add User',
            'View Users',
            'Edit User',
            'Delete User',
            'Roles',
            'Edit Role',
            'Permissions',
            'Create Permission',
            'Edit Permission',
            'Delete Permission'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
