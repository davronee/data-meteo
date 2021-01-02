<div class="table-responsive">
    <table id="empty-lands" class="table table-bordered normalized">
        <thead>
            <tr role="row">
                <th>№</th>
                <th class="col-md-2">@lang('messages.station')</th>
                <th class="col-md-1">@lang('messages.region')</th>
                <th class="col-md-2">@lang('messages.district')</th>
                <th class="col-md-2">@lang('messages.created_at')</th>
            </tr>
        </thead>
        <tbody>
            @php $num = ($stations->currentPage() - 1) * $stations->perPage() + 1; @endphp
            @foreach ($stations as $key => $station)
                <tr role="row" class="odd">
                    <td>{{ $num }}</td>
                    <td><a href="{{ route('hourly-station-info.index', [
                        'region_id' => $station->region_id,
                        'district_id' => $station->district_id,
                        'station_id' => $station->id,
                    ]) }}" data-toggle="tooltiper" data-placement="right" title="@lang('messages.show_info_by_station')">{{ $station->name }}</a></td>
                    <td>{{ $station->formatted_region }}</td>
                    <td>{{ $station->formatted_district }}</td>
                    <td>{{ $station->created_at }}</td>
                </tr>
                @php $num++; @endphp
            @endforeach

            @if ($stations->total() == 0)
                <tr>
                    <td colspan="8">@lang('messages.nothing')</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@include('common.table-list.paginator-info', ['model' => $stations])
