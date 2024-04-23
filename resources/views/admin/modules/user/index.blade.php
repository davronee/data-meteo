@extends('layouts.html')

@section('vue_id', 'station')

@section('content')
    <div class="content-body-mail">
        <div class="mail-panel mg-b-20">
            <div class="mail-body-content1" id="mailBodyList">
                <div class="mail-body-wrapper">
                    <div class="card" id="inbox">
                        <div class="card-deal">
                            <div class="messages">
                                @include('common.messages')
                            </div>

                            <div class="card-body">
                                @if (auth()->user()->isAdmin())
                                    <a href="{{ route('user.create') }}" class="btn btn-success text-white btn-xs mb-1">@lang('messages.add')</a>
                                @endif
                                {{-- @include('hourly-station-info.partials.index.filter') --}}
                                @include('admin.modules.user.partials.index.list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
