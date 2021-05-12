<table class="table table-hover table-bordered sticky" id="aws-status-table">
    <thead>
        <tr>
            <th style="width:100px" colspan="2">№</th>
            <th class="stick bg-white">Наимнование станций</th>
            @while ($currentTime <= $lastDayOfMonth)
                <th>{{ date('d.m', $currentTime) }}</th>
                @php
                    $currentTime = strtotime("+1 day", $currentTime);
                @endphp
            @endwhile
        </tr>
    </thead>
    <tbody>
        @php
            $total = 1;
        @endphp
        @foreach ($ugms as $ugm)
            @php
                $currentTime = $firstDayOfMonth;
            @endphp
            <tr class="bg-gray">
                <th colspan="2"></th>
                <th class="stick">{{ $ugm->name }}</th>
                @while ($currentTime <= $lastDayOfMonth)
                    <th></th>
                    @php
                        $currentTime = strtotime("+1 day", $currentTime);
                    @endphp
                @endwhile
            </tr>
            @foreach ($ugm->aws as $key => $station)
                <tr>
                    <td style="width:50px">{{ $total }}</td>
                    <td style="width:50px">{{ $key+1 }}</td>
                    <td class="stick bg-white">{{ $station->name }}</td>
                    @php
                        $cTime = $firstDayOfMonth;
                        $total++;
                    @endphp
                    @while ($cTime <= $lastDayOfMonth)
                        @php
                            $status = App\Models\AwsStatus::displayAwsStatus(date('Y-m-d', $cTime), $station->id, $aws_statuses);
                            $data = App\Models\AwsStatus::getAwsData(date('Y-m-d', $cTime), $station->id, $aws_statuses);
                        @endphp
                        @if ($cTime == strtotime(date('Y-m-d')))
                            <td class="text-center">
                                @if (!empty($status) && $data->is_published)
                                    {!! $status !!}
                                @else
                                    <select class="form-control mw120" :ref="'station'+{{ $station->id }}" @change="saveAwsStation($event, {{ $station->id }}, '{{ route('aws-monitoring.store') }}')">
                                        <option value="">Танланш</option>
                                        <option {{ isset($data->status) && $data->status == 1 ? 'selected' : '' }} value="1">соз</option>
                                        <option {{ isset($data->status) && $data->status == 0 ? 'selected' : '' }} value="0">носоз</option>
                                        <option {{ isset($data->status) && $data->status == -1 ? 'selected' : '' }} value="-1">номаълум</option>
                                    </select>
                                @endif
                            </td>
                        @elseif($cTime < time())
                            <td class="text-center">
                                {!! !empty($status) ? $status : '-' !!}
                            </td>
                        @else
                            <td></td>
                        @endif

                        @php
                            $cTime = strtotime("+1 day", $cTime);
                        @endphp
                    @endwhile
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
