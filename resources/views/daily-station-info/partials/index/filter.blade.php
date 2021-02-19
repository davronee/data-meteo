<form action="{{ route('daily-station-info.index') }}" method="get" class="form-inline with-margin">
    <div class="form-group">
        <div class="form-group">
            <select name="region_id" id="region_id" class="form-control region_id form-control-sm"
                v-on:change="regionChanged($event)" v-model="region_id">
                    <option value="">@lang('messages.republic')</option>
                    @foreach ($regions as $regionid => $region)
                        <option value="{{ $regionid }}" {{ old('region_id', request()->input('region_id')) == $regionid ? 'selected' : '' }}>{{ $region }}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            <select name="district_id" id="district_id" class="form-control district_id form-control-sm"
                v-on:change="districtChanged($event)" data-selected="{{ old('district_id', request()->input('district_id')) }}" v-model="district_id">
                    <option value="">@lang('messages.choose')</option>
                    <option v-for="district,index in districts" :value="index">@{{ district }}</option>
            </select>
        </div>

        <div class="form-group">
            <select name="station_id" id="station_id" class="form-control station_id form-control-sm"
                data-selected="{{ old('station_id', request()->input('station_id')) }}" v-model="station_id">
                    <option value="">@lang('messages.choose')</option>
                    <option v-for="station,index in stations" :value="index">@{{ station }}</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-light btn-xs text-dark mr-1"><i class="fa fa-filter"></i></button>
        <a href="{{ route('hourly-station-info.index') }}" class="btn btn-light btn-xs text-dark" title="тозалаш"><i class="fa fa-times"></i></a>
    </div>
</form>

<hr>
