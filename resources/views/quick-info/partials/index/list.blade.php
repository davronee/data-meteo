<div class="table-responsive">
    <table id="empty-lands" class="table table-bordered normalized">
        <thead>
            <tr role="row">
                <th>№</th>
                <th class="col-md-1">@lang('messages.region')</th>
                <th class="col-md-2">@lang('messages.staff')</th>
                <th class="col-md-2">@lang('messages.created_at')</th>
                <th class="col-md-2">@lang('messages.published_at')</th>
                <th class="col-md-2"></th>
            </tr>
        </thead>
        <tbody>
            @php $num = ($info_list->currentPage() - 1) * $info_list->perPage() + 1; @endphp
            @foreach ($info_list as $key => $info)
                <tr role="row" class="odd">
                    <td>{{ $num }}</td>
                    <td>{{ $info->formatted_region }}</td>
                    <td>{{ $info->formatted_author }}</td>
                    <td>{{ $info->created_at }}</td>
                    <td>{{ $info->updated_at }}</td>
                    <td class="text-right action-butons">
                        @include('quick-info.partials.index.list.actions')
                    </td>
                </tr>
                @php $num++; @endphp
            @endforeach

            @if ($info_list->total() == 0)
                <tr>
                    <td colspan="8">@lang('messages.nothing')</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@include('common.table-list.paginator-info', ['model' => $info_list])
