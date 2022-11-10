<?php

namespace Database\Seeders;

use App\Models\MeteoBotStations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class MeteobotStationsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $stations = [3231343030303336, 3231343030303337, 22070086, 22070087, 22070078, 22070089, 22070081, 3231343030303334, 3231343030303335, 3231343030303333, 22070084, 22070080, 22070088, 22070079,22070083,22070085];

        foreach ($stations as $station) {
            $data = Http::withOptions([
                'verify' => false
            ])->withBasicAuth('3231343030303336', 'k8hwRivdex7hr_5tc')->get('https://export.meteobot.com/v2/Generic/Locate', [
                'id' => $station
            ]);

            $acctArr = explode("\r", $data->body());
            $arr = [];
            foreach ($acctArr as $item) {
                if ($item != "\n")
                    $arr = str_getcsv($item, ';');
            }

            $meteobot = MeteoBotStations::updateOrCreate(
                [
                    'sn' => $station,
                ],
                [
                    'name' => $arr[6],
                    'sn' => $station,
                    'username' => 3231343030303336,
                    'password' => 'k8hwRivdex7hr_5tc',
                    'latitude' => $arr[3],
                    'longitude' => $arr[4],
                    'is_has_aq' => (strlen($station) == 8) ? true : false,
                ]);
        }


    }
}
