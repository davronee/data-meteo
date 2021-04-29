<?php

namespace Database\Seeders;

use App\Models\UGM;
use Illuminate\Database\Seeder;

class CreateUGMsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $UGMsList = [
            'Андижанское УГМ',
            'Бухарское УГМ',
            'Кашкадарыинское УГМ',
            'Навоийское УГМ',
            'Самаркандское УГМ',
            'Сурхандарьинское УГМ',
            'Сырдарьинское УГМ',
            'Ташкентское УГМ',
            'Ферганское УГМ',
            'Хорезмское УГМ'
        ];

        foreach ($UGMsList as $key => $ugm_name) {
            if(!UGM::isCreated($ugm_name))
                UGM::create(['name' => $ugm_name]);
        }
    }
}
