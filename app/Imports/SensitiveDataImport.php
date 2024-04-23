<?php

namespace App\Imports;

use App\Models\SensitiveData;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use function Webmozart\Assert\Tests\StaticAnalysis\numeric;

class SensitiveDataImport implements ToModel, WithHeadingRow
{

    public $region_id;

    public function __construct($region_id)
    {
        $this->region_id = $region_id;
    }

    private $data;


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function headingRow(): int
    {
        if ($this->region_id == 1700)
            return 10;
        else
            return 1;
    }


    public function model(array $row)
    {
        try {
            if ($this->region_id != 1700) {
                foreach ($row as $key => $value) {
                    if ($key == 'datautc5') {
                        $this->data['year'] = Carbon::parse($value)->year;
                        $this->data['month'] = Carbon::parse($value)->month;
                    }
                    if (strpos($key, 'maksskorost_vetra_za_3_c_ms_maks') !== false) {
                        $this->data['windspeed'][$key] = $value;
                    } elseif (strpos($key, 'makstemperaturasuxogo_termometra_za_3_c_c_maks') !== false) {
                        $this->data['temprature'][$key] = $value;
                    } elseif (strpos($key, 'osadkomer_2_summa_osadkov_za_3_c_mm_maks') !== false) {
                        $this->data['precipitation'][$key] = $value;
                    } elseif (strpos($key, 'otnositelnaya_vlaznost_maks') !== false) {
                        $this->data['humidity'][$key] = $value;
                    } elseif (strpos($key, 'sredndavlenie_za_3_c_gpa_maks') !== false) {
                        $this->data['pressure'][$key] = $value;
                    } elseif (strpos($key, 'srednkol_vo_solnecnoi_radiacii_3_c_vtm2_maks') !== false) {
                        $this->data['solar_radiation'][$key] = $value;
                    }

                }

                $senstiveData = SensitiveData::updateOrCreate(
                    [
                        'region_id' => $this->region_id,
                        'year' => $this->data['year'],
                        'month' => $this->data['month'],
                    ],
                    [
                        'temperature' => floatval($this->getAverage($this->data['temprature'])),
                        'humidity' => floatval($this->getAverage($this->data['humidity'])),
                        'wind_speed' => floatval($this->getAverage($this->data['windspeed'])),
                        'solar_radiation' => floatval($this->getAverage($this->data['solar_radiation'])),
                        'pressure' => floatval($this->getAverage($this->data['pressure'])),
                        'precipitation' => floatval($this->getAverage($this->data['precipitation'])),
                    ]
                );
            } else {
                $senstiveData = SensitiveData::updateOrCreate(
                    [
                        'region_id' => 1726,
                        'year' => Carbon::parse($row['datetime'])->year,
                        'month' => Carbon::parse($row['datetime'])->month,
                    ],
                    [
                        'air_quality' => floatval($this->getAverage([$row['uzhydromet'],$row['xalqlar_dostligi']])),
                    ]
                );

                $senstiveData = SensitiveData::updateOrCreate(
                    [
                        'region_id' => 1724,
                        'year' => Carbon::parse($row['datetime'])->year,
                        'month' => Carbon::parse($row['datetime'])->month,
                    ],
                    [
                        'air_quality' => floatval($this->getAverage([$row['uzhymet_guliston']])),
                    ]
                );
                $senstiveData = SensitiveData::updateOrCreate(
                    [
                        'region_id' => 1735,
                        'year' => Carbon::parse($row['datetime'])->year,
                        'month' => Carbon::parse($row['datetime'])->month,
                    ],
                    [
                        'air_quality' => floatval($this->getAverage([$row['uzhymet_nukus']])),
                    ]
                );
                $senstiveData = SensitiveData::updateOrCreate(
                    [
                        'region_id' => 1722,
                        'year' => Carbon::parse($row['datetime'])->year,
                        'month' => Carbon::parse($row['datetime'])->month,
                    ],
                    [
                        'air_quality' => floatval($this->getAverage([$row['uzhymet_termez']])),
                    ]
                );

                $senstiveData = SensitiveData::updateOrCreate(
                    [
                        'region_id' => 1733,
                        'year' => Carbon::parse($row['datetime'])->year,
                        'month' => Carbon::parse($row['datetime'])->month,
                    ],
                    [
                        'air_quality' => floatval($this->getAverage([$row['uzhymet_urgench']])),
                    ]
                );

            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function getAverage($data)
    {
        try {
            $sum = 0;
            $count = 0;
            foreach ($data as $key => $value) {
                if ($value != null) {
                    $sum += floatval($value);
                    $count++;
                }
            }
            if ($sum != 0)
                return $sum / $count;
            else
                return 0;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }


}
