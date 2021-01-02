<button type="submit" class="btn btn-sm btn-info"><i class="fa fa-check"></i> @lang('messages.save')</button>

<div class="btn-group">
    <button type="button" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">
        <span class="caret"></span> @lang('messages.download')
    </button>
    <ul role="menu" class="dropdown-menu">
        <li><a href="{{ route('hourly-station-info.export.doc', $hourlyStationInfo->id) }}"> @lang('messages.export_word')</a></li>
        <li><a href="{{ route('hourly-station-info.export.pdf', $hourlyStationInfo->id) }}"> @lang('messages.export_pdf')</a></li>
    </ul>
</div>

@if (!$hourlyStationInfo->isSent())
    <button type="button" class="btn btn-success btn-sm text-white"
        data-toggle="tooltip" data-placement="top"
        title="@lang('messages.send')"
        v-on:click="sendInfo($event, '{{ route('hourly-station-info.send', $hourlyStationInfo->id) }}', '{{ trans('messages.send-confirm-text') }}')">
        <i class="fab fa-telegram-plane"></i> @lang('messages.send')
    </button>
    <button type="button" class="btn btn-sm btn-danger"
        form="delete-hourly-station-info-form"
        id="delete-hourly-station-info-button"
        v-on:click="deleteInfo($event, '{{ route('hourly-station-info.destroy', $hourlyStationInfo->id) }}', '{{ trans('messages.delete-confirm-text') }}')">
        <i class="fa fa-trash"></i> @lang('messages.delete')
    </button>
@endif
