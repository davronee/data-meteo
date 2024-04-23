<div class="mail-navbar">
    <div class="d-none d-md-flex btn-group">
        <a href="{{ route('hourly-station-info.index') }}" class="btn creat">Орқага</a>
    </div>
    <span class="pull-right text-right">
        <strong>{{ $user->fullname }}</strong><br>
        <small><em>{{ $user->formatted_position }}</em></small>
    </span>
</div>
