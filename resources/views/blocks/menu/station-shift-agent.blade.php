<li class="nav-label"><label class="content-label">@lang('messages.staff-menu')</label></li>
<li class="nav-item">
    <a href="{{ route('station.index') }}" class="nav-link"> @lang('messages.station-list')</a>
    <a href="{{ route('hourly-station-info.index') }}" class="nav-link"> @lang('messages.hourly-station-info-list')</a>
    <a href="{{ route('hourly-station-info.create') }}" class="nav-link"> @lang('messages.hourly-station-info-create')</a>
</li>
