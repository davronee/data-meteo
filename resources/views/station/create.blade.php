@extends('layouts.html')

@section('vue_id', 'app')

@section('content')

<div class="content-body mg-t-20 mg-b-20">
    @include('common.messages')

    <div class="row row-xs">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang('messages.create_station')</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('station.store') }}" method="post" id="create-station-form">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="region_id">@lang('messages.region')</label>
                                        <select name="region_id" id="region_id" class="form-control region_id"
                                            v-on:change="regionChanged($event)" v-model="region_id">
                                                <option value="">@lang('messages.choose')</option>
                                                <option value="17">@lang('messages.republic')</option>
                                                @foreach ($regions as $regionid => $region)
                                                    <option value="{{ $regionid }}" {{ old('region_id') == $regionid ? 'selected' : '' }}>{{ $region }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="district_id">@lang('messages.district')</label>
                                        <select name="district_id" id="district_id" class="form-control district_id"
                                            data-selected="{{ old('district_id') }}" v-model="district_id">
                                                <option value="">@lang('messages.choose')</option>
                                                <option v-for="district,index in districts" :value="index">@{{ district }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="name">@lang('messages.station')</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                    </div>

                                    <div id="actions">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-info">@lang('messages.add')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
