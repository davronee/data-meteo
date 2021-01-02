<div class="btn-group">
    <button type="button" data-toggle="dropdown" class="btn btn-light btn-xs dropdown-toggle text-dark">
        <span class="caret"></span> @lang('messages.actions')
    </button>
    <ul role="menu" class="dropdown-menu">
        <a class="btn btn-default btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="@lang('messages.view')" href="{{ route('hourly-station-info.show', $info->id) }}" target="_blank"> <i class="fa fa-eye"></i></a>

        @if (!$info->isSent() && auth()->user()->isStationShiftAgent())
            <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="@lang('messages.edit')" href="{{ route('hourly-station-info.edit', $info->id) }}"> <span class="fa fa-edit"></span></a>
            <button type="button" class="btn btn-default btn-sm text-success"
                data-toggle="tooltip" data-placement="top"
                title="@lang('messages.send')"
                v-on:click="sendInfo($event, '{{ route('hourly-station-info.send', $info->id) }}', '{{ trans('messages.send-confirm-text') }}')">
                <span class="fab fa-telegram"></span>
            </button>
            <button type="button" class="btn btn-default btn-sm text-danger"
                data-toggle="tooltip" data-placement="top"
                title="@lang('messages.delete')"
                v-on:click="deleteInfo($event, '{{ route('hourly-station-info.destroy', $info->id) }}', '{{ trans('messages.delete-confirm-text') }}')">
                <span class="fa fa-trash"></span>
            </button>
        @endif

        <a class="btn btn-default btn-sm text-info" data-toggle="tooltip" data-placement="top" title="@lang('messages.download')" href="{{ route('hourly-station-info.export.doc', $info->id) }}"> <i class="far fa-file-word"></i></a>
        <a class="btn btn-default btn-sm text-danger" data-toggle="tooltip" data-placement="top" title="@lang('messages.download')" href="{{ route('hourly-station-info.export.pdf', $info->id) }}"> <i class="far fa-file-pdf"></i></a>
    </ul>
</div>
