<form action="{{ route('quick-info.update', $quickInfo->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="date">Регион</label>
                <select name="region_id" id="region_id" class="form-control">
                    <option value="">@lang('messages.central_apparat')</option>
                    @foreach ($regions as $region)
                        <option {{ $quickInfo->region_id == $region->regionid ? 'selected' : '' }} value="{{ $region->regionid }}">{{ $region->nameUz }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" class="form-control" value="{{ $quickInfo->created_at->format('d.m.Y') }}" readonly />
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="editor">Информация</label>
                {{-- <div id="editor" class="form-control"></div> --}}

                <div class="document-editor">
                    <div class="document-editor__toolbar"></div>
                    <div class="document-editor__editable-container">
                        <div class="document-editor__editable">
                            {!! $quickInfo->info !!}
                        </div>
                    </div>
                </div>
            </div>

            <textarea name="info" class="hidden" v-model="content">{!! $quickInfo->info !!}</textarea>

            <hr>

            @include('quick-info.partials.edit.actions')
        </div>
    </div>
</form>
