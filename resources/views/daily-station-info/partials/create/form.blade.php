<form action="{{ route('hourly-station-info.store') }}" method="post">
    @csrf

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" class="form-control" value="{{ date("d.m.Y") }}" readonly />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select name="region_id" id="region_id" class="form-control region_id form-control-sm">
                    <option value="">@lang('messages.republic')</option>
                    @foreach ($regions as $regionid => $region)
                        <option value="{{ $regionid }}" {{ old('region_id', request()->input('region_id')) == $regionid ? 'selected' : '' }}>{{ $region }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="editor">Информация</label>
                {{-- <div id="editor" class="form-control"></div> --}}

                <div class="document-editor">
                    <div class="document-editor__toolbar"></div>
                    <div class="document-editor__editable-container">
                        <div class="document-editor__editable" @blur="editor">@{{ content }}</div>
                    </div>
                </div>
            </div>

            <textarea name="description" class="hidden" v-model="content">@{{ content }}</textarea>

            <hr>

            <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-check"></i> @lang('messages.save')</button>
            {{-- <button type="submit" class="btn btn-sm btn-success"><i class="fab fa-telegram-plane"></i> Отправить</button> --}}
            <a href="{{ route('hourly-station-info.index') }}" class="btn btn-sm btn-danger mg-l-2"><i class="fa fa-times"></i> @lang('messages.cancel')</a>
        </div>
    </div>
</form>
