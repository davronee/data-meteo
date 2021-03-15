<li class="nav-label"><label class="content-label">@lang('messages.modules')</label></li>

<li class="nav-item">
    <a href="#" class="nav-link with-sub"><i class="fas fa-user-cog"></i> Пользователи</a>
    <nav class="nav nav-sub">
        <a href="{{ route('user.index') }}" class="nav-sub-link">@lang('messages.user_list')</a>
        <a href="{{ route('user.create') }}" class="nav-sub-link">@lang('messages.create_user')</a>
    </nav>
</li>
<li class="nav-item">
    <a href="#" class="nav-link with-sub"><i class="fas fa-charging-station"></i> Станции</a>
    <nav class="nav nav-sub">
        <a href="{{ route('station.index') }}" class="nav-sub-link"> @lang('messages.station-list')</a>
        <a href="{{ route('station.create') }}" class="nav-sub-link"> @lang('messages.create_station')</a>
    </nav>
</li>
