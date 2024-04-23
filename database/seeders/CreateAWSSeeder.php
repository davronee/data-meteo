<?php

namespace Database\Seeders;

use Exception;
use App\Models\AWS;
use App\Models\UGM;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class CreateAWSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $awses = [
            'Андижанское УГМ' => [
                'М-II Боз',
                'М-II Хонабод',
                'М-II Улугнар',
                'М-II Кургантепа'
            ],
            'Бухарское УГМ' => [
                'М-II Аякагитма',
                'М-II Джангельды',
                'М-II Каракуль',
                'М-IV Кызыл-Рават'
            ],
            'Кашкадарыинское УГМ' => [
                'М-II Акрабад',
                'М-II Минчукур',
                'М-II Куль'
            ],
            'Навоийское УГМ' => [
                'М-II Акбайтал',
                'М-II Бузаубай',
                'М-II Машикудук',
                'М-II Нурата',
                'М-II Сентоб-Нурата',
                'М-II Тамды',
                'М-II Учкудук'
            ],
            'Самаркандское УГМ' => [
                'М-II Пайшанба',
                'М-II Кушрабад'
            ],
            'Сурхандарьинское УГМ' => [
                'М-II Бойсун',
                'М-II Сарыасия',
                'М-II Шурчи',
                'УГМ Термез',
            ],
            'Сырдарьинское УГМ' => [
                'Гулистан /САРДОБА',
                'М-II Сырдарья',
                'М-II Янгиер'
            ],
            'Ташкентское УГМ' => [
                'СЛ Чимган',
                'СЛ Ойгаинг',
                'М-II Пскем',
                'М-IV Чарвак',
                'М-II Алмалык',
                'Г-I Ангрен',
                'Г-I Бекабад',
                'М-II Дальверзин',
                'О Тюябугуз',
                'М-II Кокарал',
                'ЭЛМОС Дукант',
                'М-II Янгиюль',
                'М-II Сукок',
                'МС Нурафшон',
            ],
            'Ферганское УГМ' => [
                'УГМ Фергана',
                'М-II Коканд',
                'ВБС Кува',
                'М-II Сарыканда',
                'М-II Шахимардан',
            ],
            'Хорезмское УГМ' => [
                'О Тюямуюн',
                'М-II Хива',
                'М-II Гурлен'
            ],
        ];

        foreach ($awses as $ugm_name => $stations) {
            try {
                $ugm_id = UGM::where('name', $ugm_name)->pluck('id')->first();
                $this->createStations($ugm_id, $stations);
            } catch (\Throwable $th) {
                Log::error([
                   'error' => $th->getMessage(),
                   'line' => $th->getLine(),
                   'file' => $th->getFile()
                ]);
            }
        }
    }

    protected function createStations($ugm_id, $stations) {
        if(!is_numeric($ugm_id))
            throw new Exception("UGM ID not provided", 1);

        if(empty($stations))
            throw new Exception("Station list is empty", 1);

        foreach ($stations as $key => $station_name) {
            AWS::firstOrCreate([
                'name' => $station_name,
                'ugm_id' => $ugm_id
            ]);
        }
    }
}
