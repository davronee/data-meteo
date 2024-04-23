<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            [
                'name' => '1-smena tuman stansiya hodimi',
                'code' => 'T1',
                'login_prefix' => 'T1'
            ],
            [
                'name' => '2-smena tuman stansiya hodimi',
                'code' => 'T2',
                'login_prefix' => 'T2'
            ],
            [
                'name' => '3-smena tuman stansiya hodimi',
                'code' => 'T3',
                'login_prefix' => 'T3'
            ],
            [
                'name' => 'Viloyat stansiya nazorati',
                'code' => 'V',
                'login_prefix' => 'V'
            ],
            [
                'name' => 'Markaziy apparat hodimi',
                'code' => 'M',
                'login_prefix' => 'M'
            ],
        ];

        foreach ($positions as $position) {
            Position::firstOrCreate(['code' => $position['code']], $position);
        }
    }
}
