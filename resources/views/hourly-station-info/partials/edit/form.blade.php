<form action="{{ route('hourly-station-info.update', $hourlyStationInfo->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" class="form-control" value="{{ date("d.m.Y") }}" readonly />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="date">Регион</label>
                <input type="text" class="form-control" value="{{ $user->formatted_region }}" readonly />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="date">Город/Район</label>
                <input type="text" class="form-control" value="{{ $user->formatted_region }}" readonly />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="date">Станция</label>
                <input type="text" class="form-control" value="{{ $user->formatted_station }}" readonly />
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="editor">Информация</label>
                {{-- <div id="editor" class="form-control"></div> --}}

                <div class="document-editor">
                    <div class="document-editor__toolbar"></div>
                    <div class="document-editor__editable-container">
                        <div class="document-editor__editable" @blur="editor">
                            {!! $hourlyStationInfo->description !!}
                        </div>
                    </div>
                </div>
            </div>

            <textarea name="description" class="hidden" v-model="content">{!! $hourlyStationInfo->description !!}</textarea>

            <hr>

            @include('hourly-station-info.partials.edit.actions')
        </div>
    </div>
</form>
