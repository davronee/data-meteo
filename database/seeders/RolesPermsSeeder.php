<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create roles
        if(Role::where('name', 'superadmin')->count() === 0) Role::create(['name' => 'superadmin']);
        if(Role::where('name', 'admin')->count() === 0) Role::create(['name' => 'admin']);
        if(Role::where('name', 'control')->count() === 0) Role::create(['name' => 'control']);
        if(Role::where('name', 'viewer')->count() === 0) Role::create(['name' => 'viewer']);
        if(Role::where('name', 'worker')->count() === 0) Role::create(['name' => 'worker']);

        // create permissions
        if(Permission::where('name', 'work')->count() === 0) Permission::create(['name' => 'work']);
        if(Permission::where('name', 'see users')->count() === 0) Permission::create(['name' => 'see users']);
        if(Permission::where('name', 'create users')->count() === 0) Permission::create(['name' => 'create users']);
        if(Permission::where('name', 'delete users')->count() === 0) Permission::create(['name' => 'delete users']);
    }
}
