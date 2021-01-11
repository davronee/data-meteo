@extends('layouts.html')

@section('content')
    <div class="row mg-t-20 mg-b-20">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang('messages.edit_user')</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                @include('common.messages')
                            </div>
                            <form action="{{ route('user.store') }}" method="post" id="edit-user-form">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="region_id">@lang('messages.region')</label>
                                        <select name="region_id" id="region_id" class="form-control region_id"
                                            v-on:change="regionChanged($event)" v-model="region_id">
                                                <option value="">@lang('messages.choose')</option>
                                                <option value="17">@lang('messages.republic')</option>
                                                @foreach ($regions as $regionid => $region)
                                                    <option value="{{ $regionid }}" {{ old('region_id', $user->region_id) == $regionid ? 'selected' : '' }}>{{ $region }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="district_id">@lang('messages.district')</label>
                                        <select name="district_id" id="district_id" class="form-control district_id"
                                            data-selected="{{ old('district_id', $user->district_id) }}" v-model="district_id">
                                                <option value="">@lang('messages.choose')</option>
                                                <option v-for="district,index in districts" :value="index">@{{ district }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="position_code">@lang('messages.position')</label>
                                        <select name="position_code" id="position_code" class="form-control position_code" required>
                                            <option value="">@lang('messages.choose')</option>
                                            @foreach ($positions as $code => $position)
                                                <option {{ old('position_code', $user->position_code) == $code ? 'selected' : '' }} value="{{ $code }}">{{ $position }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">@lang('messages.email')</label>
                                        <input type="text" name="email" id="email" class="form-control email-field" value="{{ old('email', $user->email) }}" required>
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
                                        <label for="station_id">@lang('messages.station')</label>
                                        <select name="station_id" id="station_id" class="form-control station_id">
                                            <option value="">@lang('messages.choose')</option>
                                            @foreach ($stations as $id => $station)
                                                <option {{ old('station_id', $user->station_id) == $id ? 'selected' : '' }} value="{{ $id }}">{{ $station }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>@lang('messages.roles')</label>
                                        @foreach ($roles as $id => $role)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="role-{{ $id }}" name="roles[]" value="{{ $role }}" class="custom-control-input" {{ in_array($role, old('roles', $user->rolesArray())) ? 'checked' : ''}}>
                                                <label for="role-{{ $id }}" class="custom-control-label tx-sm">{{ trans(sprintf('messages.%s', $role)) }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>@lang('messages.permissions')</label>
                                        @foreach ($permissions as $id => $permission)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="permission-{{ $id }}" name="permissions[]" value="{{ $permission }}" class="custom-control-input" {{ in_array($permission, old('permissions', $user->permissionArray())) ? 'checked' : ''}}>
                                                <label for="permission-{{ $id }}" class="custom-control-label tx-sm">{{ trans(sprintf('messages.%s', $permission)) }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div id="actions">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-info">@lang('messages.save')</button>
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
