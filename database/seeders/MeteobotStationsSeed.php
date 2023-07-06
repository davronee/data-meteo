<?php

namespace Database\Seeders;

use App\Imports\MeteoBotImport;
use App\Models\MeteoBotStations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class MeteobotStationsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = [
            3231343030303336,
            3231343030303337,
            22070086,
            22070087,
            22070078,
            22070089,
            22070081,
            3231343030303334,
            3231343030303335,
            3231343030303333,
            22070084,
            22070080,
            22070088,
            22070079,
            22070083,
            22070085,
            22070157,
            22070144,
            22070162,
            22070082,
            22070156,
            22070143,
            22070154,
            22070164,
            22070159,
            22070152,
            22070151,
            22070150,
            22070147,
            22070145,
            22070140,
            21400037,
            22070146,
            22070148,
            22070155,
            22070160,
            22070161,
            22070149,
            22070141,
            22070142,
            22070158,
            22070163,
            22070153,
            22070201,
            22070202,
            22070203,
//            22070204,
//            22070205,
//            22070206,
//            22070207,
//            22070208,
//            22070209,
            22070210,
            22070211,
            22070212,
            22070213,
            22070214,
            22070215,
            22070216,
            22070217,
            22070218,
            22070219,
            22070209,
            22070207,
            22070208,
            22070205,
            22070219,
            22070213,
            22070204,
            22070206,
            22070216,
            23020045,
            23020037,
            23020040

        ];

        foreach ($stations as $station) {
            $data = Http::withOptions([
                'verify' => false
            ])->withBasicAuth('3231343030303336', 'k8hwRivdex7hr_5tc')->get(
                'https://export.meteobot.com/v2/Generic/Locate',
                [
                    'id' => $station
                ]
            );

            $acctArr = explode("\r", $data->body());
            $arr = [];
            foreach ($acctArr as $item) {
                if ($item != "\n") {
                    $arr = str_getcsv($item, ';');
                }
            }

            try {
                if ($data->successful()) {
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
                        ]
                    );
                }
            } catch (\Exception $ex) {
                Log::error('ERROR', [$data->status()]);
            }
        }

        Excel::import(new MeteoBotImport(), storage_path('app/public/generic-20230704.xlsx'));

    }
}
