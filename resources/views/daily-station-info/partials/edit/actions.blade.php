<button type="submit" class="btn btn-sm btn-info"><i class="fa fa-check"></i> @lang('messages.save')</button>

<div class="btn-group">
    <button type="button" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">
        <span class="caret"></span> @lang('messages.download')
    </button>
    <ul role="menu" class="dropdown-menu">
        {{-- <li><a href="{{ route('daily-station-info.export.doc', $dailyStationInfo->id) }}"> @lang('messages.export_word')</a></li>
        <li><a href="{{ route('daily-station-info.export.pdf', $dailyStationInfo->id) }}"> @lang('messages.export_pdf')</a></li> --}}
    </ul>
</div>

@if (!$dailyStationInfo->isSent())
    <button type="button" class="btn btn-success btn-sm text-white"
        data-toggle="tooltip" data-placement="top"
        title="@lang('messages.send')"
        v-on:click="sendInfo($event, '{{ route('daily-station-info.send', $dailyStationInfo->id) }}', '{{ trans('messages.send-confirm-text') }}', '#send-daily-station-info-form')">
        <i class="fab fa-telegram-plane"></i> @lang('messages.send')
    </button>
    <button type="button" class="btn btn-sm btn-danger"
        form="delete-daily-station-info-form"
        id="delete-daily-station-info-button"
        v-on:click="deleteInfo($event, '{{ route('daily-station-info.destroy', $dailyStationInfo->id) }}', '{{ trans('messages.delete-confirm-text') }}', '#delete-daily-station-info-form')">
        <i class="fa fa-trash"></i> @lang('messages.delete')
    </button>
@endif
