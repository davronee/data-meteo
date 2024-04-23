<form action="{{ route('daily-station-info.update', $dailyStationInfo->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="region_id">@lang('messages.region')</label>
                <select name="region_id" id="region_id" class="form-control region_id">
                    <option value="">@lang('messages.republic')</option>
                    @foreach ($regions as $regionid => $region)
                        <option value="{{ $regionid }}" {{ old('region_id', $dailyStationInfo->region_id) == $regionid ? 'selected' : '' }}>{{ $region }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" class="form-control" value="{{ $dailyStationInfo->created_at->format('d.m.Y') }}" readonly />
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="editor">Информация</label>
                <div class="document-editor">
                    <div class="document-editor__toolbar"></div>
                    <div class="document-editor__editable-container">
                        <div class="document-editor__editable" @blur="editor">
                            {!! $dailyStationInfo->description !!}
                        </div>
                    </div>
                </div>
            </div>

            <textarea name="description" class="hidden" v-model="content">{!! $dailyStationInfo->description !!}</textarea>

            <hr>

            @include('daily-station-info.partials.edit.actions')
        </div>
    </div>
</form>
