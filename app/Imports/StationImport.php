<?php

namespace App\Imports;

use App\Models\Station;
use App\Models\Variable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class StationImport implements ToCollection, WithMappedCells
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    protected $stationId;
    protected $year;

    function __construct($stationId, $year)
    {
        $this->stationId = $stationId;
        $this->year = $year;
    }

    public function collection(Collection $collection)
    {
        $station = Station::where('name', $this->stationId)->first();
        $variable = new Variable();
        $variable->key = 'Monthly_average_solar_radiation_' . $collection['year'] . '_' . $station->name;
        $variable->value = json_encode($collection->jsonSerialize(), JSON_FORCE_OBJECT);
        $variable->year = $collection['year'];
        $variable->variableId = $station->id;
        $variable->save();
    }

    public function mapping(): array
    {
        if ($this->year == 2020) {
            return [
                'year' => 'A6',
                'perpendicular_1' => 'B6',
                'perpendicular_2' => 'C6',
                'perpendicular_3' => 'D6',
                'perpendicular_4' => 'E6',
                'perpendicular_5' => 'F6',
                'perpendicular_6' => 'G6',
                'perpendicular_7' => 'H6',
                'perpendicular_8' => 'I6',
                'perpendicular_9' => 'J6',
                'perpendicular_10' => 'K6',
                'perpendicular_11' => 'L6',
                'perpendicular_12' => 'M6',

                'horizontal_1' => 'O6',
                'horizontal_2' => 'P6',
                'horizontal_3' => 'Q6',
                'horizontal_4' => 'R6',
                'horizontal_5' => 'S6',
                'horizontal_6' => 'T6',
                'horizontal_7' => 'U6',
                'horizontal_8' => 'V6',
                'horizontal_9' => 'W6',
                'horizontal_10' => 'X6',
                'horizontal_11' => 'Y6',
                'horizontal_12' => 'Z6',

                'summ_1' => 'AB6',
                'summ_2' => 'AC6',
                'summ_3' => 'AD6',
                'summ_4' => 'AE6',
                'summ_5' => 'AF6',
                'summ_6' => 'AG6',
                'summ_7' => 'AH6',
                'summ_8' => 'AI6',
                'summ_9' => 'AJ6',
                'summ_10' => 'AK6',
                'summ_11' => 'AL6',
                'summ_12' => 'AM6',

                'scattered_1' => 'AO6',
                'scattered_2' => 'AP6',
                'scattered_3' => 'AQ6',
                'scattered_4' => 'AR6',
                'scattered_5' => 'AS6',
                'scattered_6' => 'AT6',
                'scattered_7' => 'AU6',
                'scattered_8' => 'AV6',
                'scattered_9' => 'AW6',
                'scattered_10' => 'AX6',
                'scattered_11' => 'AY6',
                'scattered_12' => 'AZ6',
            ];
        } else if ($this->year == 2021) {

            return [
                'year' => 'A7',
                'perpendicular_1' => 'B7',
                'perpendicular_2' => 'C7',
                'perpendicular_3' => 'D7',
                'perpendicular_4' => 'E7',
                'perpendicular_5' => 'F7',
                'perpendicular_6' => 'G7',
                'perpendicular_7' => 'H7',
                'perpendicular_8' => 'I7',
                'perpendicular_9' => 'J7',
                'perpendicular_10' => 'K7',
                'perpendicular_11' => 'L7',
                'perpendicular_12' => 'M7',

                'horizontal_1' => 'O7',
                'horizontal_2' => 'P7',
                'horizontal_3' => 'Q7',
                'horizontal_4' => 'R7',
                'horizontal_5' => 'S7',
                'horizontal_6' => 'T7',
                'horizontal_7' => 'U7',
                'horizontal_8' => 'V7',
                'horizontal_9' => 'W7',
                'horizontal_10' => 'X7',
                'horizontal_11' => 'Y7',
                'horizontal_12' => 'Z7',

                'summ_1' => 'AB7',
                'summ_2' => 'AC7',
                'summ_3' => 'AD7',
                'summ_4' => 'AE7',
                'summ_5' => 'AF7',
                'summ_6' => 'AG7',
                'summ_7' => 'AH7',
                'summ_8' => 'AI7',
                'summ_9' => 'AJ7',
                'summ_10' => 'AK7',
                'summ_11' => 'AL7',
                'summ_12' => 'AM7',

                'scattered_1' => 'AO7',
                'scattered_2' => 'AP7',
                'scattered_3' => 'AQ7',
                'scattered_4' => 'AR7',
                'scattered_5' => 'AS7',
                'scattered_6' => 'AT7',
                'scattered_7' => 'AU7',
                'scattered_8' => 'AV7',
                'scattered_9' => 'AW7',
                'scattered_10' => 'AX7',
                'scattered_11' => 'AY7',
                'scattered_12' => 'AZ7',
            ];
        } else {
            return [

            ];
        }
    }
}
