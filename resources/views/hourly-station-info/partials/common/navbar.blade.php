<div class="mail-navbar no-shadow">
    <div class="d-flex align-items-center">

       <div class="d-none d-md-flex btn-group">
          <a href="{{ route('hourly-station-info.index') }}" class="btn creat">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
             </svg>
             Орқага
          </a>
       </div>
    </div>
    <div class="d-none d-lg-flex centered-children">
       <div class="text-right status-name"><strong class="status-badge"> @lang('messages.created_date'): {{ $date }}</strong></div>
    </div>
</div>
