<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create main superadmin user
        if(User::where('name', 'superadmin')->count() === 0)
        {
            $user = User::create([
                'name' => 'superadmin',
                'email' => 'superadmin@meteo.mail',
                'password' => Hash::make('S0u1p2e3r4a5d6m7i8n9!')
            ]);

            $user->assignRole(['superadmin']);
            $user->givePermissionTo(['see users', 'create users', 'delete users']);
        }

        // create main admin user
        if(User::where('name', 'admin')->count() === 0)
        {
            $user = User::create([
                'name' => 'admin',
                'email' => 'admin@meteo.mail',
                'password' => Hash::make('admin12345!')
            ]);

            $user->assignRole(['admin']);
            $user->givePermissionTo(['see users', 'create users', 'delete users']);
        }
    }
}
