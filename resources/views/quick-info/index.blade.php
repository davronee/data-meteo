@extends('layouts.html')

@section('vue_id', 'app')

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
                                @include('quick-info.partials.index.list')

                                @include('quick-info.partials.index.forms')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
