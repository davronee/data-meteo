

<div class="btn-group">
    <button type="button" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">
        <span class="caret"></span> @lang('messages.download')
    </button>
    <ul role="menu" class="dropdown-menu">
        <li><a href="{{ route('quick-info.export.doc', $quickInfo->id) }}"> @lang('messages.export_word')</a></li>
        <li><a href="{{ route('quick-info.export.pdf', $quickInfo->id) }}"> @lang('messages.export_pdf')</a></li>
    </ul>
</div>

@if (!$quickInfo->isPublished())
    <button type="submit" class="btn btn-sm btn-info" @click="editor"><i class="fa fa-check"></i> @lang('messages.save')</button>
    <button type="button" class="btn btn-success btn-sm text-white"
        v-on:click="sendInfo($event, '{{ route('quick-info.send', $quickInfo->id) }}', '{{ trans('messages.send-confirm-text') }}', '#send-hourly-station-info-form')">
        <i class="fab fa-telegram-plane"></i> @lang('messages.send')
    </button>
    <button type="button" class="btn btn-sm btn-danger"
        form="delete-quick-info-form" id="delete-quick-info-button"
        v-on:click="deleteInfo($event, '{{ route('quick-info.destroy', $quickInfo->id) }}', '{{ trans('messages.delete-confirm-text') }}', '#delete-quick-info-form')">
        <i class="fa fa-trash"></i> @lang('messages.delete')
    </button>
@endif
