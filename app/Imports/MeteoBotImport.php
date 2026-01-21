<?php

namespace App\Imports;

use App\Models\MeteoBotStations;
use Illuminate\Support\Facades\Log;
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
            // Use sn or id as unique identifier for updateOrCreate
            $sn = $row['sn'] ?? null;
            $stationid = $row['sn'] ?? $row['id'] ?? null;

            if (!$sn) {
                return null;
            }

            // Check if a record with this stationid already exists
            $existingByStationId = null;
            if ($stationid) {
                $existingByStationId = MeteoBotStations::where('sn', $stationid)->first();
            }

            // If stationid exists in another record, update that record instead
            if ($existingByStationId && $existingByStationId->sn != $sn) {
                // Update the existing record with stationid
                $existingByStationId->update([
                    'sn' => $sn,
                    'name' => $row['name'] ?? $row['sn'] ?? null,
                    'username' => $row['username'] ?? null,
                    'password' => $row['password'] ?? null,
//                    'latitude' => $row['latitude'] ?? null,
//                    'longitude' => $row['longitude'] ?? null,
                    'is_has_aq' => isset($row['is_has_aq']) ? (bool)$row['is_has_aq'] : (isset($row['sn']) && strlen($row['sn']) == 8 ? true : false),
//                    'phone_number' => $row['phone_number'] ?? null,
                ]);
                return $existingByStationId;
            }

            // Otherwise, update or create by sn
            $updateData = [
                'sn' => $sn,
                'name' => $row['name'] ?? $row['sn'] ?? null,
                'username' => $row['username'] ?? null,
                'password' => $row['password'] ?? null,
//                'latitude' => $row['latitude'] ?? null,
//                'longitude' => $row['longitude'] ?? null,
                'is_has_aq' => isset($row['is_has_aq']) ? (bool)$row['is_has_aq'] : (isset($row['sn']) && strlen($row['sn']) == 8 ? true : false),
                'phone_number' => $row['phone_number'] ?? null,
            ];

            // Only set stationid if it doesn't conflict
            if ($stationid) {
                // Check if this stationid is already used by another record
                $conflict = MeteoBotStations::where('sn', $stationid)
                    ->where('sn', '!=', $sn)
                    ->first();

                if (!$conflict) {
                    $updateData['stationid'] = $stationid;
                }
            }

            $meteobot = MeteoBotStations::updateOrCreate(
                [
                    'sn' => $sn,
                ],
                $updateData
            );

            return $meteobot;
        } catch (\Exception $e) {
            Log::error('MeteoBotImport Error: ' . $e->getMessage(), ['row' => $row]);
            return null;
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
