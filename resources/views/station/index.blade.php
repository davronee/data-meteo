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
                                {{-- @include('hourly-station-info.partials.index.filter') --}}
                                @include('station.partials.index.list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('template/assets/js/customizer/hourly-station-info/create.js') }}"></script>
@endsection
