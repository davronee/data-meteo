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
        Services::updateOrCreate(
            ['name'=>'Метеорологик маълумот'],
            ['name'=>'Махсус гидрометеорологик маълумотни бериш']
        );
        Services::updateOrCreate(
            ['name'=>'Гидгологик маълумот'],
            ['name'=>'Архивдан гидрометеорологик маълумотлар бериш']
        );
        Services::updateOrCreate(
            ['name'=>'Агрометеорологик маълумот'],
            ['name'=>'Сел тошқини ва қор кўчкиси юзасидан ҳудудларни текшириш']
        );
        Services::updateOrCreate(
            ['name'=>'Атроф муҳит ифлосланиши бўйича маълумот'],
            ['name'=>'Махсус экологик маълумотлар бериш'],
        );
        Services::updateOrCreate(
            ['name'=>'Иқлим тўғрисидаги маълумот'],
            ['name'=>'Гидрометеорологик асбобларни ва ўлчов воситаларини қиёслаш тўғрисида сертификат олиш']
        );
        Services::updateOrCreate(
            ['name'=>'Маълумотномалар'],
            ['name'=>'Ихтисослаштирилган гидрометеорологик маълумотлар олиш']
        );
    }
}
