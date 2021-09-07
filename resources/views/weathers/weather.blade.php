<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- icons css -->
    <link href="{{asset('template/lib/fontawesome5/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/assets/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style>
        #weather-table-wrapper td, #weather-table-wrapper th {
            border: 1px solid #eee;
        }

        #weather-table-wrapper .table tr th:first-child {
            position: sticky;
            left: 0;
            z-index: 5;
            background: #fff;
            background-color: #efefef;
            /* border:1px solid #ccc */
            border-bottom: 1px solid #ccc;
        }

        #weather-table-wrapper td {
            min-width: 200px;
        }

        #weather-table-wrapper .table-responsive {
            scrollbar-width: thin;
        }

        #weather-table-wrapper thead tr th {
            position: sticky;
            top: 0;
            z-index: 5;
            background: #fff;
            background-color: #efefef;
        }

        #weather-table-wrapper thead tr th:first-child {
            border: none !important;
        }

        #weather-table-wrapper .table-responsive::-webkit-scrollbar {
            width: 5px;
            height: 5px
        }

        #weather-table-wrapper .table-responsive::-webkit-scrollbar-track {
            background-color: #eee;
        }

        #weather-table-wrapper .table-responsive::-webkit-scrollbar-thumb {
            background-color: #ccc
        }

        .mb-5 {
            margin-bottom: 6px;
        }
    </style>
</head>
<body>

<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            <form>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <label for="exampleFormControlSelect1">Регионы</label>
                        <select @change="Changes()" class="form-control" id="exampleFormControlSelect1"
                                v-model="region">
                            <option v-for="(item, index) in regions" :value="index" v-text="item"></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleFormControlSelect2">Интервал</label>
                        <select @change="Changes()" class="form-control" v-model="interval"
                                id="exampleFormControlSelect2">
                            <option value="0">24</option>
                            <option value="1">48</option>
                            <option value="2">72</option>
                            <option value="3">96</option>
                            <option value="4">120</option>
                        </select>
                    </div>
                </div>

                <div id="weather-table-wrapper">
                    <div class="form-group  table-responsive mb-25">
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th v-for="item in openweather" scope="col">@{{ item.datetime | moment }}</th>
                                <th v-if="openweather != null" v-for="i in 5-openweather.length" class="active">&nbsp;
                                </th>
                            {{--                            <th scope="col">Температура</th>--}}
                            {{--                            <th scope="col">Ветер</th>--}}
                            <!-- {{--                            <th scope="col">Напр. Ветра</th>--}} -->
                                {{--                            <th scope="col">Дожд</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Openweather</th>
                                {{--                            <th v-for="item in openweather"  v-if="moment().isSame(item.dt_txt, 'day')" class="active">@{{ item.dt_txt | moment }}--}}
                                {{--                            </th>--}}
                                <td v-for="item in openweather" class="active">
                                    <i class="fas fa-temperature-low"></i> @{{ item.temp_min }}° - @{{ item.temp_max }}°
                                    <br>
                                    <i class="fas fa-wind"></i> @{{ item.wind_speed }} м/с @{{ item.wind_deg }}°<br>
                                    <!-- @{{ item.wind_deg }}° <br> -->
                                    <i class="fas fa-cloud-rain"></i> @{{ item.is_rain ? 'да' : 'n/a' }}
                                </td>
                                <td v-if="openweather != null" v-for="i in 5-openweather.length" class="active">&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <th>Accuweather</th>
                                {{--                            <th v-for="item in openweather"  v-if="moment().isSame(item.dt_txt, 'day')" class="active">@{{ item.dt_txt | moment }}--}}
                                {{--                            </th>--}}
                                <td v-for="item in accuweather" class="active">
                                    <i class="fas fa-temperature-low"></i> @{{ item.temp_min }}° - @{{ item.temp_max }}°
                                    <br>
                                    <i class="fas fa-wind"></i> @{{ item.day_wind_speed }} м/с @{{
                                    item.day_wind_deg}}<br>
                                    <!-- @{{ item.day_wind_deg }}° @{{ item.day_wind_localized }}<br> -->
                                    <i class="fas fa-cloud-rain"></i> @{{ item.day_rain ? 'да' : 'n/a' }}
                                </td>
                                <td v-if="accuweather != null" v-for="i in 5-accuweather.length" class="active">&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <th>Weatherbit</th>
                                {{--                            <th v-for="item in openweather"  v-if="moment().isSame(item.dt_txt, 'day')" class="active">@{{ item.dt_txt | moment }}--}}
                                {{--                            </th>--}}
                                <td v-for="item in weatherbit" class="active">
                                    <i class="fas fa-temperature-low"></i> @{{ item.min_temp }}° - @{{ item.max_temp }}°
                                    <br>
                                    <i class="fas fa-wind"></i> @{{ item.wind_spd }} м/с @{{ item.wind_cdir }} <br>
                                    <!-- @{{ item.wind_dir }}° @{{ item.wind_cdir }} <br> -->
                                    <i class="fas fa-cloud-rain"></i> @{{ item.precip ? 'да' : 'n/a' }}
                                </td>
                                <td v-if="weatherbit != null" v-for="i in 5-weatherbit.length" class="active">&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <th>DarkSky</th>
                                <td v-for="item in darksky" class="active">
                                    <i class="fas fa-temperature-low"></i> @{{ item.temperatureMin }}° - @{{
                                    item.temperatureMax }}° <br>
                                    <i class="fas fa-wind"></i> @{{ item.windSpeed }} м/с <br>
                                    <i class="fas fa-cloud-rain"></i> @{{ item.precipIntensityMax ? 'да' : 'n/a' }}
                                </td>
                                <td v-if="darksky != null" v-for="i in 5-darksky.length" class="active">&nbsp;</td>
                            </tr>
                            <tr>
                                <th>Aerisweather</th>
                                <td v-if="Aerisweather != null" v-for="item in Aerisweather" class="active">
                                    <i class="fas fa-temperature-low"></i> @{{ item.minTempC }}° - @{{ item.maxTempC }}°
                                    <br>
                                    <i class="fas fa-wind"></i> @{{ item.windSpeedKTS }} м/с @{{ item.windDir }} <br>
                                    <!-- @{{ item.windDirDEG }} @{{ item.windDir }} <br> -->
                                    <i class="fas fa-cloud-rain"></i> @{{ item.precipMM ? 'да' : 'n/a' }}
                                </td>
                                <td v-if="Aerisweather != null" v-for="i in 5-Aerisweather.length" class="active">
                                    &nbsp;
                                </td>
                            </tr>

                            <tr>
                                <th>UzHydromet</th>
                                {{--                            <th v-for="item in openweather"  v-if="moment().isSame(item.dt_txt, 'day')" class="active">@{{ item.dt_txt | moment }}--}}
                                {{--                            </th>--}}
                                <td v-for="item in uzhydromet" class="active">
                                    <i class="fas fa-temperature-low"></i> @{{ item.air_t_min }}° - @{{ item.air_t_max
                                    }}° <br>
                                    <i class="fas fa-wind"></i> @{{ item.wind_speed_min }} - @{{ item.wind_speed_max }}
                                    м/с<br>
                                    <!-- @{{ item.wind_direction }}°<br> -->
                                    <i class="fas fa-cloud-rain"></i> @{{ item.precipitation ? 'да' : 'n/a' }}
                                </td>
                                <td v-if="typeof uzhydromet == 'object'" v-for="i in 5-uzhydromet.length"
                                    class="active">&nbsp;
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row " style="margin-top: 50px;">
                        <div class="col-xs-12 col-sm-12 col-md-12 overflow-hidden ">
                            <h3>Метеолокатор маълумотлари</h3>
                            <iframe style="width: 100%;max-width:100%;height: 85vh;position: relative;"
                                    frameborder="0"
                                    src="https://www.meteoblue.com/ru/weather/widget/daily/' + this.region + '_uzbekistan_1512569?geoloc=fixed&days=7&tempunit=CELSIUS&windunit=METER_PER_SECOND&precipunit=MILLIMETER&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&winddirection=1&uv=0&humidity=0&precipitation=0&precipitation=1&precipitationprobability=0&precipitationprobability=1&spot=0&spot=1&pressure=0&pressure=1&layout=light"
                                    allowfullscreen></iframe>
                            <div style="
                                background: rgba(0,0,0, 0);
                                position: absolute;
                                top: 0;
                                bottom: 0;
                                left: 0;
                                right: 0;"></div>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>
                <hr>
                {{--                <div class="form-group">--}}
                {{--                    <h3>Accuweather</h3>--}}
                {{--                    <table class="table table-responsive">--}}
                {{--                        <thead>--}}
                {{--                        <tr>--}}
                {{--                            <th scope="col">Дата</th>--}}
                {{--                            <th scope="col">День</th>--}}
                {{--                            <th scope="col">ночь</th>--}}
                {{--                            <th scope="col">Ветер</th>--}}
                {{--                            <th scope="col">Напр. Ветра</th>--}}
                {{--                            <th scope="col">Дожд</th>--}}
                {{--                            <th scope="col">Снег</th>--}}
                {{--                        </tr>--}}
                {{--                        </thead>--}}
                {{--                        <tbody>--}}
                {{--                        <tr v-for="item in accuweather">--}}
                {{--                            <th v-if="moment().isSame(item.Date, 'day')" class="active">@{{ item.Date | night }}</th>--}}
                {{--                            <th v-else class="blueopacity" class="active">@{{ item.Date | night }}</th>--}}
                {{--                            <td v-if="moment().isSame(item.Date, 'day')" class="active">@{{--}}
                {{--                                item.Temperature.Maximum.Value}} @{{ item.Temperature.Unit }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.Temperature.Maximum.Value}} @{{--}}
                {{--                                item.Temperature.Unit }}--}}
                {{--                            </td>--}}
                {{--                            <td v-if="moment().isSame(item.Date, 'day')">@{{ item.Temperature.Minimum.Value }} @{{--}}
                {{--                                item.Temperature.Unit }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.Temperature.Minimum.Value }} @{{--}}
                {{--                                item.Temperature.Unit }}--}}
                {{--                            </td>--}}
                {{--                            <td v-if="moment().isSame(item.Date, 'day')">@{{ item.Day.Wind.Speed.Value}} @{{--}}
                {{--                                item.Day.Wind.Speed.Unit }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.Day.Wind.Speed.Value}} @{{ item.Day.Wind.Speed.Unit--}}
                {{--                                }}--}}
                {{--                            </td>--}}
                {{--                            <td v-if="moment().isSame(item.Date, 'day')">@{{ item.Day.Wind.Direction.Degrees}} @{{--}}
                {{--                                item.Day.Wind.Direction.Localized }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.Day.Wind.Direction.Degrees}} @{{--}}
                {{--                                item.Day.Wind.Direction.Localized }}--}}
                {{--                            </td>--}}
                {{--                            <td v-if="moment().isSame(item.Date, 'day')">@{{ item.Day.Rain.Value }} @{{--}}
                {{--                                item.Day.Rain.Unit }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.Day.Rain.Value }} @{{ item.Day.Rain.Unit }}</td>--}}
                {{--                            <td v-if="moment().isSame(item.Date, 'day')">@{{ item.Day.Ice.Value }} @{{ item.Day.Ice.Unit--}}
                {{--                                }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.Day.Ice.Value }} @{{ item.Day.Ice.Unit }}</td>--}}
                {{--                        </tr>--}}
                {{--                        </tbody>--}}
                {{--                    </table>--}}
                {{--                </div>--}}
                {{--                <hr>--}}
                {{--                <div class="form-group">--}}
                {{--                    <h3>WeatherBit</h3>--}}
                {{--                    <table class="table table-responsive">--}}
                {{--                        <thead>--}}
                {{--                        <tr>--}}
                {{--                            <th scope="col">Дата</th>--}}
                {{--                            <th scope="col">Температура</th>--}}
                {{--                            <th scope="col">Ветер</th>--}}
                {{--                            <th scope="col">Напр. Ветра</th>--}}
                {{--                            <th scope="col">Дожд</th>--}}
                {{--                        </tr>--}}
                {{--                        </thead>--}}
                {{--                        <tbody>--}}
                {{--                        <tr v-for="(item,index) in weatherbit">--}}
                {{--                            <th v-if="moment().isSame(item.datetime, 'day')">@{{ item.datetime | moment }}</th>--}}
                {{--                            <th v-else class="blueopacity">@{{ item.datetime | moment }}</th>--}}
                {{--                            <td v-if="moment().isSame(item.datetime, 'day')">@{{ Math.round(item.temp) }}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ Math.round(item.temp) }}</td>--}}
                {{--                            <td v-if="moment().isSame(item.datetime, 'day')">@{{ Math.round(item.wind_spd) }}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ Math.round(item.wind_spd) }}</td>--}}
                {{--                            <td v-if="moment().isSame(item.datetime, 'day')">@{{ Math.round(item.wind_dir) }}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ Math.round(item.wind_dir) }}</td>--}}
                {{--                            --}}{{--                            <td>@{{ item.wind_dir }} @{{ item.wind_cdir }}</td>--}}
                {{--                            <td v-if="moment().isSame(item.datetime, 'day')">@{{ item.precip }}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.precip }}</td>--}}
                {{--                        </tr>--}}
                {{--                        </tbody>--}}
                {{--                    </table>--}}
                {{--                </div>--}}
                {{--                <hr>--}}
                {{--                <div class="form-group">--}}
                {{--                    <h3>DarkSky</h3>--}}
                {{--                    <table class="table table-responsive">--}}
                {{--                        <thead>--}}
                {{--                        <tr>--}}
                {{--                            <th scope="col">Дата</th>--}}
                {{--                            <th scope="col">День</th>--}}
                {{--                            <th scope="col">ночь</th>--}}
                {{--                            <th scope="col">Ветер</th>--}}
                {{--                            --}}{{--                            <th scope="col">Напр. Ветра</th>--}}
                {{--                            <th scope="col">Дожд</th>--}}
                {{--                        </tr>--}}
                {{--                        </thead>--}}
                {{--                        <tbody>--}}
                {{--                        <tr v-for="(item,index) in darksky">--}}
                {{--                            <th v-if="moment().isSame(new Date(item.time*1000), 'day')">@{{ item.time | unixdate }}</th>--}}
                {{--                            <th v-else class="blueopacity">@{{ item.time | unixdate }}</th>--}}
                {{--                            <td v-if="moment().isSame(new Date(item.time*1000), 'day')">@{{--}}
                {{--                                Math.round(item.temperatureHigh) }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ Math.round(item.temperatureHigh) }}</td>--}}
                {{--                            <td v-if="moment().isSame(new Date(item.time*1000), 'day')">@{{--}}
                {{--                                Math.round(item.temperatureLow) }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ Math.round(item.temperatureLow) }}</td>--}}
                {{--                            <td v-if="moment().isSame(new Date(item.time*1000), 'day')">@{{ Math.round(item.windSpeed)--}}
                {{--                                }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ Math.round(item.windSpeed) }}</td>--}}
                {{--                            --}}{{--                            <td>@{{ item.wind_dir }} @{{ item.wind_cdir }}</td>--}}
                {{--                            <td v-if="moment().isSame(new Date(item.time*1000), 'day')">@{{ item.precipIntensity }}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.precipIntensity }}</td>--}}
                {{--                        </tr>--}}
                {{--                        </tbody>--}}
                {{--                    </table>--}}
                {{--                </div>--}}
                {{--                <hr>--}}
                {{--                <div class="form-group">--}}
                {{--                    <h3>Aerisweather</h3>--}}
                {{--                    <table class="table table-responsive">--}}
                {{--                        <thead>--}}
                {{--                        <tr>--}}
                {{--                            <th scope="col">Дата</th>--}}
                {{--                            <th scope="col">День</th>--}}
                {{--                            <th scope="col">ночь</th>--}}
                {{--                            <th scope="col">Ветер</th>--}}
                {{--                            <th scope="col">Напр. Ветра</th>--}}
                {{--                            <th scope="col">Дожд</th>--}}
                {{--                        </tr>--}}
                {{--                        </thead>--}}
                {{--                        <tbody>--}}
                {{--                        <tr v-for="(item,index) in Aerisweather">--}}
                {{--                            <th v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{ item.timestamp |--}}
                {{--                                unixdate }}--}}
                {{--                            </th>--}}
                {{--                            <th v-else class="blueopacity">@{{ item.timestamp | unixdate }}</th>--}}
                {{--                            <td v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{ item.maxTempC }}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.maxTempC }}</td>--}}
                {{--                            <td v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{ item.minTempC }}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.minTempC }}</td>--}}
                {{--                            <td v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{--}}
                {{--                                Math.round(item.windSpeedKTS) }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ Math.round(item.windSpeedKTS) }}</td>--}}
                {{--                            <td v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{ item.windDirMaxDEG }}--}}
                {{--                                @{{ item.windDirMax }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.windDirMaxDEG }} @{{ item.windDirMax }}</td>--}}
                {{--                            <td v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{ item.precipMM }}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.precipMM }}</td>--}}
                {{--                        </tr>--}}
                {{--                        </tbody>--}}
                {{--                    </table>--}}
                {{--                </div>--}}
                {{--                <hr>--}}
                {{--                <div class="form-group">--}}
                {{--                    <h3>ForecastApi</h3>--}}
                {{--                    <table class="table table-responsive">--}}
                {{--                        <thead>--}}
                {{--                        <tr>--}}
                {{--                            <th scope="col">Дата</th>--}}
                {{--                            <th scope="col">Температура</th>--}}
                {{--                            <th scope="col">Ветер</th>--}}
                {{--                            <th scope="col">Дожд</th>--}}
                {{--                        </tr>--}}
                {{--                        </thead>--}}
                {{--                        <tbody>--}}
                {{--                        <tr v-for="(item,index) in ForecastApi">--}}
                {{--                            <th v-if="moment().isSame(item.date, 'day')">@{{ item.date | moment }}</th>--}}
                {{--                            <th v-else class="blueopacity">@{{ item.date | moment }}</th>--}}
                {{--                            <td v-if="moment().isSame(item.date, 'day')">@{{ item.temperature.avg}}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.temperature.avg}}</td>--}}
                {{--                            <td v-if="moment().isSame(item.date, 'day')">@{{ item.wind.avg}} @{{ item.wind.unit}}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.wind.avg}} @{{ item.wind.unit}}</td>--}}
                {{--                            <td v-if="moment().isSame(item.date, 'day')">@{{ item.prec.avg}} @{{ item.wind.unit}}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ item.prec.avg}} @{{ item.wind.unit}}</td>--}}
                {{--                        </tr>--}}
                {{--                        </tbody>--}}
                {{--                    </table>--}}
                {{--                </div>--}}
                {{--                <hr>--}}
                {{--                <div class="form-group">--}}
                {{--                    <h3>Hydromet</h3>--}}
                {{--                    <table class="table table-responsive">--}}
                {{--                        <thead>--}}
                {{--                        <tr>--}}
                {{--                            <th scope="col">Дата</th>--}}
                {{--                            <th scope="col">День</th>--}}
                {{--                            <th scope="col">ночь</th>--}}
                {{--                            <th scope="col">Ветер</th>--}}
                {{--                            <th scope="col">Напр. Ветра</th>--}}
                {{--                            <th scope="col">Дожд</th>--}}
                {{--                        </tr>--}}
                {{--                        </thead>--}}
                {{--                        <tbody>--}}
                {{--                        <tr v-for="(item,index) in day">--}}
                {{--                            <th v-if="moment().isSame(day[index].date, 'day')">@{{ day[index].date | night }}</th>--}}
                {{--                            <th v-else class="blueopacity">@{{ day[index].date | night }}</th>--}}
                {{--                            <td v-if="moment().isSame(day[index].date, 'day')">@{{ day[index].air_t_min }} - @{{--}}
                {{--                                day[index].air_t_max }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ day[index].air_t_min }} - @{{ day[index].air_t_max }}--}}
                {{--                            </td>--}}
                {{--                            <td v-if="moment().isSame(day[index].date, 'day')">@{{ night[index].air_t_min }} - @{{--}}
                {{--                                night[index].air_t_max }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ night[index].air_t_min }} - @{{ night[index].air_t_max--}}
                {{--                                }}--}}
                {{--                            </td>--}}
                {{--                            <td v-if="moment().isSame(day[index].date, 'day')">@{{ day[index].wind_speed_min }} - @{{--}}
                {{--                                day[index].wind_speed_max }}--}}
                {{--                            </td>--}}
                {{--                            <td v-else class="blueopacity">@{{ day[index].wind_speed_min }} - @{{--}}
                {{--                                day[index].wind_speed_max }}--}}
                {{--                            </td>--}}
                {{--                            <td v-if="moment().isSame(day[index].date, 'day')">@{{ day[index].wind_direction }}</td>--}}
                {{--                            <td v-else class="blueopacity">@{{ day[index].wind_direction }}</td>--}}
                {{--                            <td v-if="day[index].precipitation == 'none'">-</td>--}}
                {{--                            <td v-else>@{{ day[index].precipitation }}</td>--}}
                {{--                        </tr>--}}
                {{--                        </tbody>--}}
                {{--                    </table>--}}
                {{--                </div>--}}
            </form>
        </div>
    </div>
</div>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
