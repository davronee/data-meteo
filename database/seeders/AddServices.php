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
            ['name'=>'Махсус гидрометеорологик маълумотни бериш']
        );
        Services::firstOrCreate(
            ['name'=>'Гидгологик маълумот'],
            ['name'=>'Архивдан гидрометеорологик маълумотлар бериш']
        );
        Services::firstOrCreate(
            ['name'=>'Агрометеорологик маълумот'],
            ['name'=>'Сел тошқини ва қор кўчкиси юзасидан ҳудудларни текшириш']
        );
        Services::firstOrCreate(
            ['name'=>'Атроф муҳит ифлосланиши бўйича маълумот'],
            ['name'=>'Махсус экологик маълумотлар бериш'],
        );
        Services::firstOrCreate(
            ['name'=>'Иқлим тўғрисидаги маълумот'],
            ['name'=>'Гидрометеорологик асбобларни ва ўлчов воситаларини қиёслаш тўғрисида сертификат олиш']
        );
        Services::firstOrCreate(
            ['name'=>'Маълумотномалар'],
            ['name'=>'Ихтисослаштирилган гидрометеорологик маълумотлар олиш']
        );
    }
}
