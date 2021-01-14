<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UpdateDefaultUsersPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::where('name', 'superadmin')->update(['password' => Hash::make("Superadmin321321!")]);
        User::where('name', 'admin')->update(['password' => Hash::make("Admin321321!")]);
    }
}
