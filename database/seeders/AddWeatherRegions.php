<?php

namespace Database\Seeders;

use App\Models\WeatherRegions;
use Illuminate\Database\Seeder;

class AddWeatherRegions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        WeatherRegions::updateOrCreate(
            ['code' => 'tashkent'],
            ['weather_regionid' => 1,
                'regionid' => 1726,
                'name_ru' => 'г. Ташкент',
                'name_uz' => 'Toshkent shahri'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'andijan'],
            ['weather_regionid' => 14,
                'regionid' => 1703,
                'name_ru' => 'Андижанская область',
                'name_uz' => 'Andijon viloyati'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'bukhara'],
            ['weather_regionid' => 4,
                'regionid' => 1706,
                'name_ru' => 'Бухарская область',
                'name_uz' => 'Buxoro viloyati'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'fergana'],
            ['weather_regionid' => 12,
                'regionid' => 1730,
                'name_ru' => 'Ферганская область',
                'name_uz' => 'Farg`ona viloyati'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'jizzakh'],
            ['weather_regionid' => 8,
                'regionid' => 1708,
                'name_ru' => 'Джизакская область',
                'name_uz' => 'Jizzax viloyati'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'urgench'],
            ['weather_regionid' => 3,
                'regionid' => 1733,
                'name_ru' => 'Хорезмская область',
                'name_uz' => 'Xorazm viloyati'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'namangan'],
            ['weather_regionid' => 13,
                'regionid' => 1714,
                'name_ru' => 'Наманганская область',
                'name_uz' => 'Namangan viloyati'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'navoiy'],
            ['weather_regionid' => 5,
                'regionid' => 1712,
                'name_ru' => 'Навоийская область',
                'name_uz' => 'Navoiy viloyati'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'qarshi'],
            ['weather_regionid' => 10,
                'regionid' => 1710,
                'name_ru' => 'Кашкадарьинская область',
                'name_uz' => 'Qashqadaryo viloyati'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'nukus'],
            ['weather_regionid' => 2,
                'regionid' => 1735,
                'name_ru' => 'Республика Каракалпакстан',
                'name_uz' => 'Qoraqalpog`iston Respublikasi'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'samarkand'],
            ['weather_regionid' => 7,
                'regionid' => 1718,
                'name_ru' => 'Самаркандская область',
                'name_uz' => 'Samarqand viloyati'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'gulistan'],
            ['weather_regionid' => 9,
                'regionid' => 1724,
                'name_ru' => 'Сырдарьинская область',
                'name_uz' => 'Sirdaryo viloyati'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'termez'],
            ['weather_regionid' => 11,
                'regionid' => 1722,
                'name_ru' => 'Сурхандарьинская область',
                'name_uz' => 'Surxandaryo viloyati'
            ]
        );

        WeatherRegions::updateOrCreate(
            ['code' => 'nurafshon'],
            ['weather_regionid' => 20,
                'regionid' => 1727,
                'name_ru' => 'Ташкентская область',
                'name_uz' => 'Toshkent viloyati'
            ]
        );
    }
}
