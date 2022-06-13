@extends('layouts.service_layout')

@section('vue_id', 'app')

@section('content')

    <div class="content-body mg-t-20 mg-b-20">
        @include('common.messages')

        {{--        <div class="mail-body-content">--}}
        {{--            @include('daily-station-info.partials.common.navbar', ['date' => date("d.m.Y")])--}}
        {{--        </div>--}}

        <div class="row row-xs">
            <div class="col-md-12">
                <div class="card card-body pd-sm-40 pd-md-30 pd-xl-y-35 pd-xl-x-40 wd-98p mg-b-15 mg-t-5">
                    <div class="tab-content">
                        <div class="row">
                            <form action="{{route('service.store')}}" method="post" class="col-md-12">
                                @csrf
                                <div class="col-md-12">
                                    <h4 class="h4">Отправка электронной заявки на оказание гидрометеорологических
                                        услуг</h4>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="user_type">@lang('messages.applicant')</label>
                                    <select name="user_type" id="user_type" class="form-control station_id">
                                        <option
                                            value="L" {{\Illuminate\Support\Facades\Auth::user()->user_type == 'L' ? 'selected' : ''}}>@lang('messages.yuridik')</option>
                                        <option
                                            value="I" {{\Illuminate\Support\Facades\Auth::user()->user_type == 'I' ? 'selected' : ''}}>@lang('messages.jismoniy')</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="fio">@lang('messages.fio')</label>
                                    <input type="text" name="fio" id="fio" class="form-control email-field"
                                           value="{{ \Illuminate\Support\Facades\Auth::user()->full_name }}" required>
                                </div>
                                @if(\Illuminate\Support\Facades\Auth::user()->user_type == 'I')
                                    <div class="form-group col-md-12">
                                        <label for="fio">Пинфл</label>
                                        <input disabled type="text" name="pinfl" id="pinfl"
                                               class="form-control email-field"
                                               value="{{ \Illuminate\Support\Facades\Auth::user()->pin }}" required>
                                    </div>
                                @endif
                                <div class="form-group col-md-12">
                                    <label for="tin">@lang('messages.tin')</label>
                                    <input type="text" name="tin" id="tin" class="form-control email-field"
                                           value="{{ \Illuminate\Support\Facades\Auth::user()->tin }}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email">@lang('messages.email')</label>
                                    <input type="email" name="email" id="email" class="form-control email-field"
                                           value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="phone">@lang('messages.phone')</label>
                                    <input type="text" name="phone" id="phone" class="form-control email-field"
                                           value="{{ \Illuminate\Support\Facades\Auth::user()->mob_phone_no }}"
                                           required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="type_service">@lang('messages.type_service')</label>
                                    <select name="type_service" class="form-control type_service">
                                        <option value="" selected="selected">- Выберите -</option>
                                        @foreach ($services as  $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="region">@lang('messages.choose_region')</label>
                                    <select name="region" id="region" class="form-control station_id">
                                        <option value="" selected="selected">- Выберите -</option>
                                        @foreach ($regions as $id => $region)
                                            <option value="{{ $id }}">{{ $region }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <hr>

                                    <button type="submit" class="btn btn-sm btn-info"><i
                                            class="fa fa-check"></i> @lang('messages.send')</button>
                                    <a href="https://hydromet.uz" type="button" class="btn btn-primary">перейти на главную страницу</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
