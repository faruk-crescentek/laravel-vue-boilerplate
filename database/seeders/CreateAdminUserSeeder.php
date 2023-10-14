<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('12345678')
        ]);
        $user = User::create([
            'name' => 'doctor',
            'email' => 'doctor@example.com',
            'password' => bcrypt('12345678')
        ]);
        $user = User::create([
            'name' => 'clinic',
            'email' => 'clinic@example.com',
            'password' => bcrypt('12345678')
        ]);

        $role = Role::create(['name' => 'superadmin']);
        $role2 = Role::create(['name' => 'doctor']);
        $role2 = Role::create(['name' => 'clinic']);
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            ];
        $role2->syncPermissions($permissions);


        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
