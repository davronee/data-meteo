@extends('layouts.html')

@section('vue_id', 'app')

@section('content')

<div class="content-body mg-t-20 mg-b-20">
    @include('common.messages')

    <div class="mail-body-content">
        @include('daily-station-info.partials.common.navbar', ['date' => $dailyStationInfo->created_at->format('d.m.Y')])
    </div>

    <div class="row row-xs">
        <div class="col-md-12">
            <div class="card card-body pd-sm-40 pd-md-30 pd-xl-y-35 pd-xl-x-40 wd-98p mg-b-15 mg-t-5">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-md-12">
                            @include('daily-station-info.partials.edit.form')

                            @include('daily-station-info.partials.index.forms')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
