@extends('layouts.html')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang('messages.create_user')</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('user.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="region_id">@lang('messages.region')</label>
                                        <select name="region_id" id="region_id" class="form-control region_id"
                                            v-on:change="regionChanged($event)" v-model="region_id">
                                                <option value="">@lang('messages.choose')</option>
                                                <option value="17">@lang('messages.republic')</option>
                                                @foreach ($regions as $regionid => $region)
                                                    <option value="{{ $regionid }}">{{ $region }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="district_id">@lang('messages.district')</label>
                                        <select name="region_id" id="district_id" class="form-control district_id"
                                            data-selected="{{ old('district_id') }}" v-model="district_id">
                                                <option value="">@lang('messages.choose')</option>
                                                <option v-for="district,index in districts" :value="index">@{{ district }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="position_id">@lang('messages.position')</label>
                                        <select name="position_id" id="position_id" class="form-control position_id" required>
                                            <option value="">@lang('messages.choose')</option>
                                            @foreach ($regions as $regionid => $region)
                                                <option value="{{ $regionid }}">{{ $region }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">@lang('messages.email')</label>
                                        <input type="text" name="email" id="email" class="form-control email-field" value="{{ old('email') }}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">@lang('messages.password')</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation">@lang('messages.password_confirmation')</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>@lang('messages.roles')</label>
                                        @foreach ($roles as $id => $role)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="role-{{ $id }}" name="roles[]" value="{{ $role }}" class="custom-control-input">
                                            <label for="role-{{ $id }}" class="custom-control-label tx-sm">{{ trans(sprintf('messages.%s', $role)) }}</label>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>@lang('messages.permissions')</label>
                                        @foreach ($permissions as $id => $permission)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="permission-{{ $id }}" name="permissions[]" value="{{ $permission }}" class="custom-control-input">
                                            <label for="role-{{ $id }}" class="custom-control-label tx-sm">{{ trans(sprintf('messages.%s', $permission)) }}</label>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div id="actions">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-info">@lang('messages.create_user')</button>
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
@endsection
