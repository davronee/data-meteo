<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


</head>
<body>

<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            <form class="mt-5">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Вилоятлар</label>
                    <select @change="Changes()" class="form-control" id="exampleFormControlSelect1"
                            v-model="region">
                        <option v-for="(item, index) in regions" :value="index" v-text="item"></option>
                    </select>
                </div>
                <div class="form-group">
                    <h3>Openweather</h3>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">Дата</th>
                            <th scope="col">Температура</th>
                            <th scope="col">Ветер</th>
                            <th scope="col">Напр. Ветра</th>
                            <th scope="col">Дожд</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in openweather">
                            <th v-if="moment().isSame(item.dt_txt, 'day')" class="active">@{{ item.dt_txt | moment }}
                            </th>
                            <th v-else class="blueopacity">@{{ item.dt_txt | moment }}</th>
                            <td v-if="moment().isSame(item.dt_txt, 'day')" class="active">@{{
                                Math.round(item.main.temp_min) }}° - @{{ Math.round(item.main.temp_max) }}°
                            </td>
                            <td v-else class="blueopacity">@{{ Math.round(item.main.temp_min) }}° - @{{
                                Math.round(item.main.temp_max) }}°
                            </td>
                            <td v-if="moment().isSame(item.dt_txt, 'day')" class="active">@{{
                                Math.round(item.wind.speed) }} м/с
                            </td>
                            <td v-else class="blueopacity">@{{ Math.round(item.wind.speed) }} м/с</td>
                            <td v-if="moment().isSame(item.dt_txt, 'day')" class="active">@{{ item.wind.deg }}°</td>
                            <td v-else class="blueopacity">@{{ item.wind.deg }}°</td>
                            <td v-if="item.rain" v-text="">@{{ item.rain }}</td>
                            <td v-else class="blueopacity">0</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="form-group">
                    <h3>Accuweather</h3>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">Дата</th>
                            <th scope="col">День</th>
                            <th scope="col">ночь</th>
                            <th scope="col">Ветер</th>
                            <th scope="col">Напр. Ветра</th>
                            <th scope="col">Дожд</th>
                            <th scope="col">Снег</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in accuweather">
                            <th v-if="moment().isSame(item.Date, 'day')" class="active">@{{ item.Date | night }}</th>
                            <th v-else class="blueopacity" class="active">@{{ item.Date | night }}</th>
                            <td v-if="moment().isSame(item.Date, 'day')" class="active">@{{
                                item.Temperature.Maximum.Value}} @{{ item.Temperature.Unit }}
                            </td>
                            <td v-else class="blueopacity">@{{ item.Temperature.Maximum.Value}} @{{
                                item.Temperature.Unit }}
                            </td>
                            <td v-if="moment().isSame(item.Date, 'day')">@{{ item.Temperature.Minimum.Value }} @{{
                                item.Temperature.Unit }}
                            </td>
                            <td v-else class="blueopacity">@{{ item.Temperature.Minimum.Value }} @{{
                                item.Temperature.Unit }}
                            </td>
                            <td v-if="moment().isSame(item.Date, 'day')">@{{ item.Day.Wind.Speed.Value}} @{{
                                item.Day.Wind.Speed.Unit }}
                            </td>
                            <td v-else class="blueopacity">@{{ item.Day.Wind.Speed.Value}} @{{ item.Day.Wind.Speed.Unit
                                }}
                            </td>
                            <td v-if="moment().isSame(item.Date, 'day')">@{{ item.Day.Wind.Direction.Degrees}} @{{
                                item.Day.Wind.Direction.Localized }}
                            </td>
                            <td v-else class="blueopacity">@{{ item.Day.Wind.Direction.Degrees}} @{{
                                item.Day.Wind.Direction.Localized }}
                            </td>
                            <td v-if="moment().isSame(item.Date, 'day')">@{{ item.Day.Rain.Value }} @{{
                                item.Day.Rain.Unit }}
                            </td>
                            <td v-else class="blueopacity">@{{ item.Day.Rain.Value }} @{{ item.Day.Rain.Unit }}</td>
                            <td v-if="moment().isSame(item.Date, 'day')">@{{ item.Day.Ice.Value }} @{{ item.Day.Ice.Unit
                                }}
                            </td>
                            <td v-else class="blueopacity">@{{ item.Day.Ice.Value }} @{{ item.Day.Ice.Unit }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="form-group">
                    <h3>WeatherBit</h3>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">Дата</th>
                            <th scope="col">Температура</th>
                            <th scope="col">Ветер</th>
                            <th scope="col">Напр. Ветра</th>
                            <th scope="col">Дожд</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item,index) in weatherbit">
                            <th v-if="moment().isSame(item.datetime, 'day')">@{{ item.datetime | moment }}</th>
                            <th v-else class="blueopacity">@{{ item.datetime | moment }}</th>
                            <td v-if="moment().isSame(item.datetime, 'day')">@{{ Math.round(item.temp) }}</td>
                            <td v-else class="blueopacity">@{{ Math.round(item.temp) }}</td>
                            <td v-if="moment().isSame(item.datetime, 'day')">@{{ Math.round(item.wind_spd) }}</td>
                            <td v-else class="blueopacity">@{{ Math.round(item.wind_spd) }}</td>
                            <td v-if="moment().isSame(item.datetime, 'day')">@{{ Math.round(item.wind_dir) }}</td>
                            <td v-else class="blueopacity">@{{ Math.round(item.wind_dir) }}</td>
                            {{--                            <td>@{{ item.wind_dir }} @{{ item.wind_cdir }}</td>--}}
                            <td v-if="moment().isSame(item.datetime, 'day')">@{{ item.precip }}</td>
                            <td v-else class="blueopacity">@{{ item.precip }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="form-group">
                    <h3>DarkSky</h3>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">Дата</th>
                            <th scope="col">День</th>
                            <th scope="col">ночь</th>
                            <th scope="col">Ветер</th>
                            {{--                            <th scope="col">Напр. Ветра</th>--}}
                            <th scope="col">Дожд</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item,index) in darksky">
                            <th v-if="moment().isSame(new Date(item.time*1000), 'day')">@{{ item.time | unixdate }}</th>
                            <th v-else class="blueopacity">@{{ item.time | unixdate }}</th>
                            <td v-if="moment().isSame(new Date(item.time*1000), 'day')">@{{
                                Math.round(item.temperatureHigh) }}
                            </td>
                            <td v-else class="blueopacity">@{{ Math.round(item.temperatureHigh) }}</td>
                            <td v-if="moment().isSame(new Date(item.time*1000), 'day')">@{{
                                Math.round(item.temperatureLow) }}
                            </td>
                            <td v-else class="blueopacity">@{{ Math.round(item.temperatureLow) }}</td>
                            <td v-if="moment().isSame(new Date(item.time*1000), 'day')">@{{ Math.round(item.windSpeed)
                                }}
                            </td>
                            <td v-else class="blueopacity">@{{ Math.round(item.windSpeed) }}</td>
                            {{--                            <td>@{{ item.wind_dir }} @{{ item.wind_cdir }}</td>--}}
                            <td v-if="moment().isSame(new Date(item.time*1000), 'day')">@{{ item.precipIntensity }}</td>
                            <td v-else class="blueopacity">@{{ item.precipIntensity }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="form-group">
                    <h3>Aerisweather</h3>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">Дата</th>
                            <th scope="col">День</th>
                            <th scope="col">ночь</th>
                            <th scope="col">Ветер</th>
                            <th scope="col">Напр. Ветра</th>
                            <th scope="col">Дожд</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item,index) in Aerisweather">
                            <th v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{ item.timestamp |
                                unixdate }}
                            </th>
                            <th v-else class="blueopacity">@{{ item.timestamp | unixdate }}</th>
                            <td v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{ item.maxTempC }}</td>
                            <td v-else class="blueopacity">@{{ item.maxTempC }}</td>
                            <td v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{ item.minTempC }}</td>
                            <td v-else class="blueopacity">@{{ item.minTempC }}</td>
                            <td v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{
                                Math.round(item.windSpeedKTS) }}
                            </td>
                            <td v-else class="blueopacity">@{{ Math.round(item.windSpeedKTS) }}</td>
                            <td v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{ item.windDirMaxDEG }}
                                @{{ item.windDirMax }}
                            </td>
                            <td v-else class="blueopacity">@{{ item.windDirMaxDEG }} @{{ item.windDirMax }}</td>
                            <td v-if="moment().isSame(new Date(item.timestamp*1000), 'day')">@{{ item.precipMM }}</td>
                            <td v-else class="blueopacity">@{{ item.precipMM }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="form-group">
                    <h3>ForecastApi</h3>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">Дата</th>
                            <th scope="col">Температура</th>
                            <th scope="col">Ветер</th>
                            <th scope="col">Дожд</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item,index) in ForecastApi">
                            <th v-if="moment().isSame(item.date, 'day')">@{{ item.date | moment }}</th>
                            <th v-else class="blueopacity">@{{ item.date | moment }}</th>
                            <td v-if="moment().isSame(item.date, 'day')">@{{ item.temperature.avg}}</td>
                            <td v-else class="blueopacity">@{{ item.temperature.avg}}</td>
                            <td v-if="moment().isSame(item.date, 'day')">@{{ item.wind.avg}} @{{ item.wind.unit}}</td>
                            <td v-else class="blueopacity">@{{ item.wind.avg}} @{{ item.wind.unit}}</td>
                            <td v-if="moment().isSame(item.date, 'day')">@{{ item.prec.avg}} @{{ item.wind.unit}}</td>
                            <td v-else class="blueopacity">@{{ item.prec.avg}} @{{ item.wind.unit}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="form-group">
                    <h3>Hydromet</h3>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">Дата</th>
                            <th scope="col">День</th>
                            <th scope="col">ночь</th>
                            <th scope="col">Ветер</th>
                            <th scope="col">Напр. Ветра</th>
                            <th scope="col">Дожд</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item,index) in day">
                            <th v-if="moment().isSame(day[index].date, 'day')">@{{ day[index].date | night }}</th>
                            <th v-else class="blueopacity">@{{ day[index].date | night }}</th>
                            <td v-if="moment().isSame(day[index].date, 'day')">@{{ day[index].air_t_min }} - @{{
                                day[index].air_t_max }}
                            </td>
                            <td v-else class="blueopacity">@{{ day[index].air_t_min }} - @{{ day[index].air_t_max }}
                            </td>
                            <td v-if="moment().isSame(day[index].date, 'day')">@{{ night[index].air_t_min }} - @{{
                                night[index].air_t_max }}
                            </td>
                            <td v-else class="blueopacity">@{{ night[index].air_t_min }} - @{{ night[index].air_t_max
                                }}
                            </td>
                            <td v-if="moment().isSame(day[index].date, 'day')">@{{ day[index].wind_speed_min }} - @{{
                                day[index].wind_speed_max }}
                            </td>
                            <td v-else class="blueopacity">@{{ day[index].wind_speed_min }} - @{{
                                day[index].wind_speed_max }}
                            </td>
                            <td v-if="moment().isSame(day[index].date, 'day')">@{{ day[index].wind_direction }}</td>
                            <td v-else class="blueopacity">@{{ day[index].wind_direction }}</td>
                            <td v-if="day[index].precipitation == 'none'">-</td>
                            <td v-else>@{{ day[index].precipitation }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
