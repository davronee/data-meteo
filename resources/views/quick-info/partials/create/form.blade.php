<form action="{{ route('quick-info.store') }}" method="post">
    @csrf

    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label for="date">Регион</label>
                <select name="region_id" id="region_id" class="form-control">
                    <option value="">@lang('messages.central_apparat')</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->regionid }}">{{ $region->nameUz }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" class="form-control" value="{{ date("d.m.Y") }}" readonly />
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

            <textarea name="info" class="hidden" v-model="content">@{{ content }}</textarea>

            <hr>

            <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-check"></i> @lang('messages.save')</button>
            <a href="{{ route('quick-info.index') }}" class="btn btn-sm btn-danger mg-l-2"><i class="fa fa-times"></i> @lang('messages.cancel')</a>
        </div>
    </div>
</form>
