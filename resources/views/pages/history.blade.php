<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@php

    $history = new \App\Classes\HistoryServices();

       $begin = new DateTime('2021-01-01');
       $end = new DateTime('2022-06-31');

       $interval = DateInterval::createFromDateString('7 day');
       $period = new DatePeriod($begin, $interval, $end);
@endphp
<table>
    @foreach ($period as $dt)
        @php
            $vararr = [];

                $variable = $history->GetHistoricalDataBySourceStationIdVarsInterval($stationId,'56,58,61,65,63,64,62,60,44,59,45,43,46,67,66,48,85,55,57',\Illuminate\Support\Carbon::parse($dt)->toIso8601String(),\Illuminate\Support\Carbon::parse($dt)->addDays(7)->toIso8601String());
        @endphp
        @isset($variable['Variables'])

            <tr>
                <td>Station name</td>
                <td>Datetime</td>
                @foreach($variable['Variables'] as $item)
                    <td>{!!  $item['VariableName'] !!}</td>
                @endforeach
            </tr>

        @endisset
        @isset($variable['Rows'])
            @foreach($variable['Rows'] as $item)
                @if(isset($item['Meastime']))
                    <tr>
                        <td>{!!   $stationName !!}</td>
                        <td>{!!  isset($item['Meastime']) ? \Illuminate\Support\Carbon::parse($item['Meastime'])->format('d.m.Y H:i:s') : ''!!}</td>
                        @foreach($item['Cells'] as $value)
                            <td>{!!  isset($value['Value']) ? $value['Value'] : '' !!}</td>
                        @endforeach
                    </tr>
                @endif
            @endforeach
        @endisset
    @endforeach
</table>

</body>
</html>
