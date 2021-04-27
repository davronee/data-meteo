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
                                    <a href="{{ route('station.create') }}" class="btn btn-light text-dark btn-xs mb-1">@lang('messages.add')</a>
                                @endif
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.5/socket.io.js" integrity="sha512-2rUSTSAeOO02jF6eBqENNqPs1EohenJ5j+1dgDPdXSLz9nOlrr8DJk4zW/lDy8rjhGCSonW3Gx812XJQIKZKJQ==" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var socket = io.connect("http://localhost:3001");
            socket.on('connect', function () {
                console.log('connected');
            });

            socket.on('notification', function (data) {
                var audio = new Audio('template/assets/sounds/notification4.mp3');
                audio.play();
                console.log(data);
            });
        });

    </script> -->
@endsection
