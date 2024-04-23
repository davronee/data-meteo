<div class="col-md-3">
    <ul class="list-group list-group-settings no-bottom-border no-top-border no-shadow">
        <li class="list-group-item list-group-item-action">
            <a href="{{ route('user-profile.edit', $user->id) }}" data-toggle="tab-style" class="media {{ App\Services\RouteService::activeClass(request(), 'user-profile.edit') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <div class="media-body">
                    <h6>Профиль маълумотлари</h6>
                    <span>Шахсий маълумотлар</span>
                </div>
            </a>
        </li>
        <li class="list-group-item list-group-item-action">
            <a href="{{ route('user_profile.password.edit', $user->id) }}" data-toggle="tab-style" class="media {{ App\Services\RouteService::activeClass(request(), 'user_profile.password.edit') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
                <div class="media-body">
                    <h6>Хавфсизлик</h6>
                    <span>Маълумотларни хавфсизлигини бошқариш</span>
                </div>
            </a>
        </li>
    </ul>
</div>
