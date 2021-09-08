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
        #mapContainer {
            height: 500px;
            width: 100%;
        }

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

                    {{-- metelocator --}}
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

                    {{-- meteogramm --}}
                    {{-- <div>
                        <h3>Метеограмма маълумотлари</h3>
                        <div class="overflow-hidden">
                            <img src="https://my.meteoblue.com/visimage/meteogram_web?look=METER_PER_SECOND%2CCELSIUS%2CMILLIMETER&apikey=5838a18e295d&temperature=C&windspeed=ms-1&precipitationamount=mm&winddirection=3char&city=%D0%A2%D0%B0%D1%88%D0%BA%D0%B5%D0%BD%D1%82&iso2=uz&lat=41.2646&lon=69.2163&asl=424&tz=Asia%2FTashkent&lang=ru&sig=411710118d5a56101c8668701ce59b24" srcset="https://my.meteoblue.com/visimage/meteogram_web_hd?look=METER_PER_SECOND%2CCELSIUS%2CMILLIMETER&apikey=5838a18e295d&temperature=C&windspeed=ms-1&precipitationamount=mm&winddirection=3char&city=%D0%A2%D0%B0%D1%88%D0%BA%D0%B5%D0%BD%D1%82&iso2=uz&lat=41.2646&lon=69.2163&asl=424&tz=Asia%2FTashkent&lang=ru&sig=c7f9240bc1cb94e2b8b39dcc1055bb73 1.4x" alt="Meteogram - 5 days - Ташкент" style="margin-top: -40px; max-width:100%">
                        </div>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
</div>

{{-- map --}}
<div class="container">
    <h3>Метеокарта маълумотлари</h3>
    <div class="mt-10" style="position: relative">
        <iframe src="https://www.meteoblue.com/en/weather/maps/widget?windAnimation=0&windAnimation=1&gust=0&gust=1&satellite=0&satellite=1&geoloc=detect&tempunit=C&windunit=m%252Fs&lengthunit=metric&zoom=5&autowidth=auto"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" style="width: 100%; height: 720px"></iframe>
        <div
        style="position: absolute;
            top: 0;
            left: 0;
            width: 250px;
            height: 55px;
            background: rgb(3 62 106);
            color: #fff;
            text-align: center;
            padding: 2px;
            font-size: 30px;
            font-weight: bold;">Meteoinfocom</div>
        <br>
        <br>
        <br>
    </div>
</div>

<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
