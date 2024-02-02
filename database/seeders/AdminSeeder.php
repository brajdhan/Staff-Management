<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 is the superadmin id in roles table
        $superadminRole = Role::find(1);

        // Assign all permissions to the "Super Admin" role
        $permissions = Permission::pluck('id')->all();
        $superadminRole->syncPermissions($permissions);

        // Create the "Super Admin" user
        $superadminUser = User::create([
            'first_name' => 'Rajdhan',
            'last_name' => 'Bhagat',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'gender'=>'male',
            'password' => bcrypt('admin@123'),
        ]);

        // Assign the "Super Admin" role to the user
        $superadminUser->assignRole('admin');
    }
}
