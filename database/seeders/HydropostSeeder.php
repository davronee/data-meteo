<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class HydropostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /**
     * Convert DMS (degrees, minutes, seconds) to WGS84 (decimal degrees).
     */


    private function cleanDMSFormat(string $dms): string
    {
        $dms = str_replace(['”', '“', '″', '′', '‛'], ['"', '"', '"', "'", "'"], $dms);
        $dms = preg_replace('/\s+/', '', $dms);

        if (!preg_match('/^\d+°\d+\'\d+(\.\d+)?"/', $dms)) {
            throw new InvalidArgumentException("Invalid DMS format: $dms");
        }

        return $dms;
    }
    private function dmsToDecimal(string $dms): float
    {
        preg_match('/(\d+)°(\d+)\'([\d.]+)"/', $dms, $matches);
        if (!$matches || count($matches) < 4) {
            throw new InvalidArgumentException("Invalid DMS format: $dms");
        }

        $degrees = (float)$matches[1];
        $minutes = (float)$matches[2];
        $seconds = (float)$matches[3];

        return round($degrees + ($minutes / 60) + ($seconds / 3600), 6);
    }

    public function run()
    {
        $csvFile = storage_path('app/hydroposts.csv');

        if (!file_exists($csvFile)) {
            echo "CSV fayl topilmadi: $csvFile\n";
            return;
        }

        $file = fopen($csvFile, 'r');
        $header = fgetcsv($file, 0, ';');

        while ($row = fgetcsv($file, 0, ';')) {
            $data = array_combine($header, $row);

            try {
                // DMS formatni tozalash
                $cleanLongitude = $this->cleanDMSFormat($data['Долгота']);
                $cleanLatitude = $this->cleanDMSFormat($data['Широта']);

                // WGS84 formatga aylantirish
                $longitude = $this->dmsToDecimal($cleanLongitude);
                $latitude = $this->dmsToDecimal($cleanLatitude);

                // Region va District ID'larni topish
                $regionId = DB::table('uz_regions')->where('nameRu', $data['Область'])->value('regionid');
                $districtId = DB::table('uz_districts')->where('nameRu', $data['Район (город)'])->value('areaid');

                if ($regionId) {
                    DB::table('hydroposts')->insert([
                        'name' => $data['Наименование поста'],
                        'longitude' => $longitude,
                        'latitude' => $latitude,
                        'region_id' => $regionId,
                        'district_id' => $districtId ?? null,
                    ]);
                } else {
                    echo "Region yoki District topilmadi: " . $data['Наименование поста'] . "\n";
                }
            } catch (InvalidArgumentException $e) {
                echo $e->getMessage() . "\n";
            }
        }

        fclose($file);

        echo "Hydropostlar muvaffaqiyatli bazaga kiritildi.\n";
    }
}
