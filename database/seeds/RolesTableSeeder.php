<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            'instructor'
        ];


        $role = Role::create(['name' => 'admin',]);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        $permissions2 = [
            'user-list',
            'user-create',
            'user-edit',
            'guide-list',
            'guide-create',
            'guide-edit',
            'guide-delete'
        ];


        $role2 = Role::create(['name' => 'instructor',]);
        $role2->syncPermissions($permissions2);

        $permissions3 = [
            'user-list',
            'user-edit',
            'guide-list',

        ];


        $role2 = Role::create(['name' => 'trainee',]);
        $role2->syncPermissions($permissions3);
    }
}