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

       $begin = new DateTime('2022-01-01');
       $end = new DateTime('2022-12-31');

       $interval = DateInterval::createFromDateString('7 day');
       $period = new DatePeriod($begin, $interval, $end);
@endphp
<table>
    <tr>
        <td>Station name</td>
        <td>Datetime</td>
        <td>precipitation ,mm</td>
    </tr>


        @foreach ($period as $dt)
            @php
                $variable = $history->GetHistoricalDataBySourceStationIdVarsInterval($stationId,57,\Illuminate\Support\Carbon::parse($dt)->toIso8601String(),\Illuminate\Support\Carbon::parse($dt)->addDays(7)->toIso8601String());
            @endphp
            @isset($variable['Rows'])
                @foreach($variable['Rows'] as $item)
                    @if(isset($item['Meastime']))
                        <tr>
                            <td>{!!   $stationName !!}</td>
                            <td>{!!  isset($item['Meastime']) ? \Illuminate\Support\Carbon::parse($item['Meastime'])->format('d.m.Y h:i:s') : ''!!}</td>
                            <td>{!!  isset($item['Cells']) ? $item['Cells']['Value'] : '' !!}</td>
                        </tr>
                    @endif
                @endforeach
            @endisset
        @endforeach
</table>

</body>
</html>
