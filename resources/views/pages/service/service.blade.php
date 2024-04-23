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
                                        @foreach($user_types as $user_type)
                                            <option value="{{ $user_type['id'] }}"> {{$user_type['name_ru']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="fio">@lang('messages.fio')</label>
                                    <input type="text" name="fio" id="fio" class="form-control email-field"
                                           value="{{ \Illuminate\Support\Facades\Auth::user()->full_name }}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="fio">Пинфл</label>
                                    <input type="text" name="pinfl" id="pinfl"
                                           class="form-control email-field readonly" readonly
                                           value="{{ \Illuminate\Support\Facades\Auth::user()->pin }}" required>
                                </div>
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
                                            <option value="{{ $service['id'] }}">{{ $service['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="region">@lang('messages.choose_region')</label>
                                    <select name="regionid" id="region" class="form-control station_id">
                                        <option value="" selected="selected">- Выберите -</option>
                                        @foreach ($regions as $id => $region)
                                            <option value="{{ $region['code']}}">{{ $region['name_ru'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <hr>

                                    <button type="submit" class="btn btn-sm btn-info"><i
                                                class="fa fa-check"></i> @lang('messages.send')</button>
                                    <a href="https://hydromet.uz" type="button" class="btn btn-primary">перейти на
                                        главную страницу</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">
                                        Проверить приложения
                                    </button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Отслеживание заявки</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <divs>
                        <div class="form-group">
                            <input type="text" v-model="service_id" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp"
                                   placeholder="номер заявления">
                        </div>
                        <p v-if="result">Ваша заявка в статусе : @{{ result }}</p>
                        <button @click="GetResponse()" class="btn btn-primary">Отправить</button>
                    </divs>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var app = new Vue({
            el: '#exampleModal',
            data: {
                service_id: null,
                result: null
            },
            methods: {
                GetResponse: function () {
                    axios
                        .get('https://devback-ijro.meteo.uz/correspondence/open/application/' + this.service_id)
                        .then(response => (this.result = response.data.content ? response.data.content.status : response.data.result.code))
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })

                }
            }
        });


    </script>
@endsection
