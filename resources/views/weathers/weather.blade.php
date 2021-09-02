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
                    <table class="table">
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
                            <th scope="row">@{{ item.dt_txt | moment }}</th>
                            <td>@{{ item.main.temp_min }}° - @{{ item.main.temp_max }}°</td>
                            <td>@{{ item.wind.speed }} м/с</td>
                            <td>@{{ item.wind.deg }}°</td>
                            <td v-if="item.rain" v-text="">@{{ item.rain }}</td>
                            <td v-else>0</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="form-group">
                    <h3>Accuweather</h3>
                    <table class="table">
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
                            <th scope="row">@{{ item.Date | night }}</th>
                            <td>@{{ item.Temperature.Maximum.Value}} @{{ item.Temperature.Unit }}</td>
                            <td>@{{ item.Temperature.Minimum.Value }} @{{ item.Temperature.Unit }}</td>
                            <td>@{{ item.Day.Wind.Speed.Value}} @{{ item.Day.Wind.Speed.Unit }}</td>
                            <td>@{{ item.Day.Wind.Direction.Degrees}} @{{ item.Day.Wind.Direction.Localized }}</td>
                            <td>@{{ item.Day.Rain.Value }} @{{ item.Day.Rain.Unit }}</td>
                            <td>@{{ item.Day.Ice.Value }} @{{ item.Day.Ice.Unit }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <hr>
                <div class="form-group">
                    <h3>Weatherbit</h3>
                    <table class="table">
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
                            <th scope="row">@{{ item.time | unixdate }}</th>
                            <td>@{{ item.temperatureHigh }}</td>
                            <td>@{{ item.temperatureLow }}</td>
                            <td>@{{ Math.round(item.windSpeed) }}</td>
                            {{--                            <td>@{{ item.wind_dir }} @{{ item.wind_cdir }}</td>--}}
                            <td>@{{ item.precipIntensity }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="form-group">
                    <h3>Aerisweather</h3>
                    <table class="table">
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
                            <th scope="row">@{{ item.timestamp | unixdate }}</th>
                            <td>@{{ item.maxTempC }}</td>
                            <td>@{{ item.minTempC }}</td>
                            <td>@{{ Math.round(item.windSpeedKTS) }}</td>
                            <td>@{{ item.windDirMaxDEG }} @{{ item.windDirMax }}</td>
                            <td>@{{ item.precipMM }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="form-group">
                    <h3>Hydromet</h3>
                    <table class="table">
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
                            <th scope="row">@{{ day[index].date | night }}</th>
                            <td>@{{ day[index].air_t_min }} - @{{ day[index].air_t_max }}</td>
                            <td>@{{ night[index].air_t_min }} - @{{ night[index].air_t_max }}</td>
                            <td>@{{ day[index].wind_speed_min }} - @{{ day[index].wind_speed_max }}</td>
                            <td>@{{ day[index].wind_direction }}</td>
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
