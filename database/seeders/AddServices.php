<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Seeder;

class AddServices extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Services::firstOrCreate(
            ['name'=>'Метеорологик маълумот'],
            ['name'=>'Метеорологик маълумот']
        );
        Services::firstOrCreate(
            ['name'=>'Гидгологик маълумот'],
            ['name'=>'Гидгологик маълумот']
        );
        Services::firstOrCreate(
            ['name'=>'Агрометеорологик маълумот'],
            ['name'=>'Агрометеорологик маълумот']
        );
        Services::firstOrCreate(
            ['name'=>'Атроф муҳит ифлосланиши бўйича маълумот'],
            ['name'=>'Атроф муҳит ифлосланиши бўйича маълумот'],
        );
        Services::firstOrCreate(
            ['name'=>'Иқлим тўғрисидаги маълумот'],
            ['name'=>'Иқлим тўғрисидаги маълумот']
        );
        Services::firstOrCreate(
            ['name'=>'Маълумотномалар'],
            ['name'=>'Маълумотномалар']
        );
    }
}
