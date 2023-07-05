<?php

namespace App\Imports;

use App\Models\MeteoBotStations;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MeteoBotImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            $meteobot = MeteoBotStations::where('sn', $row['sn'])->OrWhere('sn', $row['id'])->first();
            $meteobot->stationid = $row['id'];
            $meteobot->sn = $row['sn'];
            $meteobot->username = $row['username'];
            $meteobot->password = $row['password'];
            $meteobot->save();

            return $meteobot;
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
