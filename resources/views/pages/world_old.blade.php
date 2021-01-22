<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="Единая система анализа и обработки гидрометеорологических наблюдений">
    <meta name="author" content="Метеоинфосистем">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('template/assets/img/favicon/favicon.ico')}}">
    <title>METEO|DC</title>
    <!-- icons css -->
    <link href="{{asset('template/lib/fontawesome5/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/assets/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/ionicons.min.css')}}">
    <!-- vendor css -->
    <link href="{{asset('template/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- template css -->
    <link rel="stylesheet" href="{{asset('template/assets/css/meteo.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/weather-panel.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/meteo-weather.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/world_template.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/owl.carousel.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('template/assets/css/easy-responsive-tabs.css')}}">
</head>

<body>
<div class="container" id="app" v-cloak="v-cloak">
    <div class="header">
        <div class="header-left sidebar-logo">
            <img src="{{asset('template/assets/img/gidrometeo.svg')}}"></a>
        </div><!-- header-left -->
        <div class="header-right">
        </div><!-- header-right -->
    </div><!-- header -->
    <div class="content-page mg-t-20">
        <div class="content-body">
            <div class="row row-sm mg-t-20">
                <div class="col-md-12 col-xl-12 mg-t-5 mg-sm-t-15">
                    <div class="card card-hover card-total-sales no-shadow bd-0">
                        <div class="card-header bg-transparent pd-y-15 pd-l-15 pd-sm-l-20 pd-r-15 bd-b-1">
                            <select class="custom-select custom-select-sm tx-12 mg-b-10"
                                    @change="getCurrent($event.target.value)">
                                <option v-for="(item, index) in regions" :value="index">@{{ item }}</option>
                            </select>
                        </div><!-- card-header -->
                        <div class="worko-tabs">
                            <input class="state" type="radio" title="tab-one" name="tabs-state" id="tab-one" checked/>
                            <input class="state" type="radio" title="tab-two" name="tabs-state" id="tab-two"/>
                            <input class="state" type="radio" title="tab-three" name="tabs-state" id="tab-three"/>
                            <input class="state" type="radio" title="tab-four" name="tabs-state" id="tab-four"/>
                            <div class="tabs flex-tabs">
                                <label for="tab-one" id="tab-one-label" class="tab">Узгидромет</label>
                                <label for="tab-two" id="tab-two-label" class="tab">OpenWeather</label>
                                <label for="tab-three" id="tab-three-label" class="tab" v-if="accuweather_current_description">AccuWeather</label>
                                <label for="tab-four" id="tab-four-label" class="tab" v-if="weatherbit_current">Weatherbit</label>
                                <!-- УЗГИДРОМЕТ -->
                                <div id="tab-one-panel" class="panel active">
                                    <div class="main-wthree-row">
                                        <div class="agileits-top">
                                            <div class="agileinfo-top-row">
                                                <div class="agileinfo-top-time">
                                                    <div class="date-time">
                                                        <div class="dmy">
                                                            <div class="date">
                                                                <span>@{{ current_weather_code }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <h3>@{{ current }}<sup class="degree">°</sup><span>C</span></h3>
                                                <article class="ac-small">
                                                    <div class="wthree-grids">
                                                        <div v-for="(item, index) in forecastsortday"
                                                             class="wthree-grids-row">
                                                            <ul class="top">
                                                                <li>@{{ forecastsortday[index].date }}</li>
                                                                <li class="wthree-img"><img
                                                                        :src="forecastsortday[index].icon" alt=""/></li>
                                                                <li class="wthree-temp">День<br>@{{
                                                                    forecastsortday[index].air_t_min }} <sup
                                                                        class="degree">°</sup></li>
                                                                <li class="wthree-temp">Ночь<br>@{{
                                                                    forecastsort[index].air_t_min }} <sup
                                                                        class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"></div>
                                                        </div>

                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                        <div class="w3ls-bottom2">
                                            <div class="ac-container mg-t-20">
                                                <a for="ac-1" class="grid1"
                                                   href="https://www.meteo.uz/#/ru/forecasts/next-day" target="_blank">
                                                    ПРОГНОЗ ПОГОДЫ НА БЛИЖАЙШИЕ СУТКИ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- OpenWeather -->
                                <div id="tab-two-panel" class="panel">
                                    <div class="main-wthree-row">
                                        <div class="agileits-top">
                                            <div class="agileinfo-top-row">
                                                <div class="agileinfo-top-time">
                                                    <div class="date-time">
                                                        <div class="dmy">
                                                            <div class="date">
                                                                <span>@{{ openweather_current_description }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <h3>@{{ openweather_current }}<sup class="degree">°</sup><span>C</span>
                                                </h3>
                                                {{--                                                <p>New York</p>--}}
                                                <article class="ac-small">
                                                    <div class="wthree-grids">
                                                        <div v-for="(item,index) in openweather_forecast"
                                                             class="wthree-grids-row">
                                                            <ul class="top">
                                                                <li>@{{ convertUnixtoDate(item.dt) }}</li>
                                                                <li class="wthree-temp">@{{ item.weather[0].description
                                                                    }}
                                                                </li>
                                                                <li class="wthree-temp">День <br> @{{
                                                                    Math.floor(item.temp.day)
                                                                    }} <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp">Ночь <br> @{{
                                                                    Math.floor(item.temp.night)
                                                                    }} <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- AccuWeather -->
                                <div v-if="accuweather_current_description" id="tab-three-panel" class="panel">
                                    <div class="main-wthree-row">
                                        <div class="agileits-top">
                                            <div class="agileinfo-top-row">
                                                <div class="agileinfo-top-time">
                                                    <div class="date-time">
                                                        <div class="dmy">
                                                            <div class="date">
                                                                <span>@{{ accuweather_current_description }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <h3>@{{ accuweather_current }}<sup class="degree">°</sup><span>C</span>
                                                </h3>
                                                {{--                                                <p>New York</p>--}}
                                                <article class="ac-small">
                                                    <div class="wthree-grids">
                                                        <div v-for="(item,index) in accuweather_forecast"  class="wthree-grids-row">
                                                            <ul class="top">
                                                                <li>@{{ convertUnixtoDate(item.EpochDate) }}</li>
                                                                <li class="wthree-temp">@{{ item.Day.IconPhrase }}</li>
                                                                <li class="wthree-temp"> @{{ Math.floor(item.Temperature.Maximum.Value) }} <sup class="degree">°</sup>
                                                                </li>
                                                                <li class="wthree-temp"> @{{ Math.floor(item.Temperature.Minimum.Value) }} <sup class="degree">°</sup>
                                                                </li>
                                                            </ul>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Gismeteo -->
                                <div id="tab-four-panel" class="panel" v-if="weatherbit_current">
                                    <div class="main-wthree-row">
                                        <div class="agileits-top">
                                            <div class="agileinfo-top-row">
                                                <div class="agileinfo-top-time">
                                                    <div class="date-time">
                                                        <div class="dmy">
                                                            <div class="date">
                                                                <span>@{{ weatherbit_current.weather.description }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <h3>@{{ Math.floor(weatherbit_current.temp) }}<sup class="degree">°</sup><span>C</span></h3>
{{--                                                <p>New York</p>--}}
                                                <article class="ac-small">
                                                    <div class="wthree-grids">
                                                        <div v-for="(item,index) in weatherbit_forecast" class="wthree-grids-row">
                                                            <ul class="top">
                                                                <li>@{{ convertUnixtoDate(item.moonrise_ts) }}</li>
                                                                <li class="wthree-temp">@{{ item.weather.description }}</li>
                                                                <li class="wthree-temp"> @{{ Math.floor(item.max_temp) }} <sup class="degree">°</sup>
                                                                </li>
                                                                <li class="wthree-temp"> @{{ Math.floor(item.min_temp) }} <sup class="degree">°</sup>
                                                                </li>
                                                            </ul>
                                                            <div class="clear"></div>
                                                        </div>

                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- card -->
                </div><!-- col -->
            </div>
        </div>
        <!--content-body -->
    </div><!-- content-page -->
</div><!-- content -->
<script src="{{asset('template/lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('template/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script src="{{asset('template/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('template/lib/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('template/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('template/lib/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('template/lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('template/assets/js/skycons.js')}}"></script>
<script src="{{asset('template/assets/js/easyResponsiveTabs.js')}}"></script>
<script src="{{asset('template/lib/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('template/lib/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('template/lib/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('template/lib/jquery.flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('template/lib/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('template/lib/jquery.flot/jquery.flot.threshold.js')}}"></script>
<script src="{{asset('template/lib/jquery.flot/jquery.flot.fillbetween.js')}}"></script>
<script src="{{asset('template/lib/jquery.flot/jquery.flot.crosshair.js')}}"></script>
<script src="{{asset('template/assets/js/flot.sampledata.js')}}"></script>
<script src="{{asset('template/assets/js/vmap.sampledata.js')}}"></script>
<script src="{{asset('asset/js/vue.js')}}"></script>
<script src="{{asset('asset/js/axios.min.js')}}"></script>

<!-- //sky-icons -->
<!-- tabs -->

<!-- //tabs -->
</body>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            current: '',
            forecast: [],
            forecastsort: [],
            forecastsortday: [],
            current_weather_code: '',
            openweather: null,
            openweather_current: null,
            openweather_current_description: null,
            openweather_forecast: null,

            accuweather: null,
            accuweather_current: null,
            accuweather_current_description: null,
            accuweather_forecast: null,

            weatherbit: null,
            weatherbit_current: null,
            weatherbit_current_description: null,
            weatherbit_forecast: null,
            regions: {
                tashkent: 'г. Ташкент',
                andijan: 'Андижанская область',
                bukhara: 'Бухарская область',
                jizzakh: 'Джизакская область',
                qarshi: 'Кашкадарьинская область',
                navoiy: 'Навоийская область',
                namangan: 'Наманганская область',
                samarkand: 'Самаркандская область',
                termez: 'Сурхандарьинская область',
                gulistan: 'Сырдарьинская область',
                nurafshon: 'Ташкентская область',
                fergana: 'Ферганская область',
                urgench: 'Хорезмская область',
                nukus: 'Республика Каракалпакстан',
            },

        },
        methods: {
            getCurrent: function (city = 'tashkent') {
                var i;
                var icon;
                this.forecastsortday = [];
                this.forecastsort = [];
                axios.get('http://www.meteo.uz/api/v2/weather/current.json', {
                    params: {
                        city: city,
                        language: 'ru',
                    }
                })
                    .then(function (response) {
                        app.current = Math.floor(response.data.air_t);


                        if (response.data.weather_code == 'clear')
                            app.current_weather_code = 'ясно, безоблачно';
                        else if (response.data.weather_code == 'mostly_clear')
                            app.current_weather_code = 'небольшая, незначительная облачность';
                        else if (response.data.weather_code == 'partly_cloudy')
                            app.current_weather_code = 'переменная облачность';
                        else if (response.data.weather_code == 'mostly_cloudy')
                            app.current_weather_code = 'значительная облачность';
                        else if (response.data.weather_code == 'overcast')
                            app.current_weather_code = 'облачно, пасмурно';
                        else if (response.data.weather_code == 'fog')
                            app.current_weather_code = 'туман, дымка, мгла';
                        else if (response.data.weather_code == 'light_rain')
                            app.current_weather_code = 'небольшой, слабый дождь';
                        else if (response.data.weather_code == 'rain')
                            app.current_weather_code = 'дождь';
                        else if (response.data.weather_code == 'heavy_rain')
                            app.current_weather_code = 'сильный, ливневый дождь';
                        else if (response.data.weather_code == 'thunderstorm')
                            app.current_weather_code = 'гроза';
                        else if (response.data.weather_code == 'light-sleet')
                            app.current_weather_code = 'небольшие, слабые осадки (дождь, снег)';
                        else if (response.data.weather_code == 'sleet')
                            app.current_weather_code = 'осадки (дождь, снег)';
                        else if (response.data.weather_code == 'heavy_sleet')
                            app.current_weather_code = 'сильные осадки (дождь, снег)';
                        else if (response.data.weather_code == 'light_snow')
                            app.current_weather_code = 'небольшой, слабый снег';
                        else if (response.data.weather_code == 'snow')
                            app.current_weather_code = 'снег';
                        else if (response.data.weather_code == 'heavy_snow')
                            app.current_weather_code = 'сильный снег';

                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

                axios.get('http://www.meteo.uz/index.php/forecast/city', {
                    params: {
                        city: city,
                        expand: 'city',
                    }
                })
                    .then(function (response) {
                        // console.log(response.data.icon);
                        app.forecast = response.data;
                        app.forecast.reverse();

                        for (i = 0; i < app.forecast.length; i++) {
                            if (i % 2 == 0) {

                                if (app.forecast[i].icon == 'clear')
                                    icon = '{{asset('template/assets/img/3.png')}}';
                                else if (app.forecast[i].icon == 'mostly_clear')
                                    icon = '{{asset('template/assets/img/4.png')}}';
                                else if (app.forecast[i].icon == 'partly_cloudy')
                                    icon = '{{asset('template/assets/img/4.png')}}';
                                else if (app.forecast[i].icon == 'mostly_cloudy')
                                    icon = '{{asset('template/assets/img/4.png')}}';
                                else if (app.forecast[i].icon == 'overcast')
                                    icon = '{{asset('template/assets/img/2.png')}}';
                                else if (app.forecast[i].icon == 'fog')
                                    icon = '{{asset('template/assets/img/2.png')}}';
                                else if (app.forecast[i].icon == 'light_rain')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'rain')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'heavy_rain')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'thunderstorm')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'light-sleet')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'sleet')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'heavy_sleet')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'light_snow')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'snow')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'heavy_snow')
                                    icon = '{{asset('template/assets/img/1.png')}}';

                                app.forecastsort.push({
                                    day: false,
                                    air_t_min: app.forecast[i].air_t_min,
                                    date: app.forecast[i].date,
                                    icon: app.forecast[i].icon,
                                    cloud_amount: app.forecast[i].cloud_amount,
                                    wind_speed_min: app.forecast[i].wind_speed_min,
                                    day_part: app.forecast[i].day_part,
                                    icon: icon,
                                })
                            } else {
                                if (app.forecast[i].icon == 'clear')
                                    icon = '{{asset('template/assets/img/3.png')}}';
                                else if (app.forecast[i].icon == 'mostly_clear')
                                    icon = '{{asset('template/assets/img/4.png')}}';
                                else if (app.forecast[i].icon == 'partly_cloudy')
                                    icon = '{{asset('template/assets/img/4.png')}}';
                                else if (app.forecast[i].icon == 'mostly_cloudy')
                                    icon = '{{asset('template/assets/img/4.png')}}';
                                else if (app.forecast[i].icon == 'overcast')
                                    icon = '{{asset('template/assets/img/2.png')}}';
                                else if (app.forecast[i].icon == 'fog')
                                    icon = '{{asset('template/assets/img/2.png')}}';
                                else if (app.forecast[i].icon == 'light_rain')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'rain')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'heavy_rain')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'thunderstorm')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'light-sleet')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'sleet')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'heavy_sleet')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'light_snow')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'snow')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                else if (app.forecast[i].icon == 'heavy_snow')
                                    icon = '{{asset('template/assets/img/1.png')}}';
                                app.forecastsortday.push({
                                    day: true,
                                    air_t_min: app.forecast[i].air_t_min,
                                    date: app.forecast[i].date,
                                    icon: app.forecast[i].icon,
                                    cloud_amount: app.forecast[i].cloud_amount,
                                    wind_speed_min: app.forecast[i].wind_speed_min,
                                    day_part: app.forecast[i].day_part,
                                    icon: icon,
                                })
                            }
                        }
                        // console.log(app.forecast);
                        // console.log(app.forecastsort);
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

                //openweather open
                axios.get('http://api.openweathermap.org/data/2.5/weather', {
                    params: {
                        q: city,
                        appid: '3b7367c71902cdb4229175c9aa4113ee',
                        lang: 'ru',
                        units: 'metric',
                    }
                })
                    .then(function (response) {
                        app.openweather_current = Math.floor(response.data.main.temp);
                        app.openweather_current_description = response.data.weather[0].description;


                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

                var endpoint_openweather = '';

                if (city == 'tashkent')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=41.26465&lon=69.21627';
                else if (city == 'andijan')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=40.78206&lon=72.34424';
                else if (city == 'bukhara')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=39.77472&lon=64.42861';
                else if (city == 'jizzakh')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=40.11583&lon=67.84222';
                else if (city == 'qarshi')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=38.86056&lon=65.78905';
                else if (city == 'navoiy')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=40.08444&lon=65.37917';
                else if (city == 'namangan')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=40.9983&lon=71.67257';
                else if (city == 'samarkand')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=39.65417&lon=66.95972';
                else if (city == 'termez')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=37.22417&lon=67.27833';
                else if (city == 'gulistan')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=40.491509&lon=68.781077';
                else if (city == 'nurafshon')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=41.166666&lon=69.749997';
                else if (city == 'fergana')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=40.38421&lon=71.78432';
                else if (city == 'urgench')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=41.55&lon=60.63333';
                else if (city == 'nukus')
                    endpoint_openweather = 'https://api.openweathermap.org/data/2.5/onecall?lat=42.45306&lon=59.6102';
                axios.get(endpoint_openweather, {
                    params: {
                        exclude: 'hourly',
                        appid: '3b7367c71902cdb4229175c9aa4113ee',
                        lang: 'ru',
                        units: 'metric',
                    }
                })
                    .then(function (response) {
                        app.openweather_forecast = response.data.daily;


                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

                // open weather end

                //accuweather


                var endpoint_accuweather = '';
                var accuweather_locationkey = '';


                if (city == 'tashkent')
                    accuweather_locationkey = 719862;
                else if (city == 'andijan')
                    accuweather_locationkey = 351828;
                else if (city == 'bukhara')
                    accuweather_locationkey = 352479;
                else if (city == 'jizzakh')
                    accuweather_locationkey = 348390;
                else if (city == 'qarshi')
                    accuweather_locationkey = 350541;
                else if (city == 'navoiy')
                    accuweather_locationkey = 355115;
                else if (city == 'namangan')
                    accuweather_locationkey = 355095;
                else if (city == 'samarkand')
                    accuweather_locationkey = 355776;
                else if (city == 'termez')
                    accuweather_locationkey = 356042;
                else if (city == 'gulistan')
                    accuweather_locationkey = 355934;
                else if (city == 'nurafshon')
                    accuweather_locationkey = 356228;
                else if (city == 'fergana')
                    accuweather_locationkey = 353238;
                else if (city == 'urgench')
                    accuweather_locationkey = 356378;
                else if (city == 'nukus')
                    accuweather_locationkey = 355666;

                axios.get('{{route('getAccuweatherCurrent')}}', {
                    params: {
                        locationkey: accuweather_locationkey
                    }
                })
                    .then(function (response) {
                        app.accuweather_current = response.data.temp;
                        app.accuweather_current_description = response.data.desc;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });


                axios.get('{{route('getAccuweatherForecast')}}', {
                    params: {
                        locationkey: accuweather_locationkey
                    }
                })
                    .then(function (response) {
                        app.accuweather_forecast = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

                //accuweather end

                //weatherbit

                axios.get('http://api.weatherbit.io/v2.0/current', {
                    params: {
                        key: '867bcae31c4a4c5ca57c57a806a4f07d',
                        lang: 'ru',
                        city: city,
                    }
                })
                    .then(function (response) {
                        app.weatherbit_current = response.data.data[0];
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

                axios.get('http://api.weatherbit.io/v2.0/forecast/daily', {
                    params: {
                        key: '867bcae31c4a4c5ca57c57a806a4f07d',
                        lang: 'ru',
                        city: city,
                    }
                })
                    .then(function (response) {
                        app.weatherbit_forecast = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
                // weather bit end





            },
            convertUnixtoDate: function (unix_timestamp) {

// Create a new JavaScript Date object based on the timestamp
// multiplied by 1000 so that the argument is in milliseconds, not seconds.
                var months_arr = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];

                var date = new Date(unix_timestamp * 1000);
// Hours part from the timestamp
                var hours = date.getHours();
// Minutes part from the timestamp
                var minutes = "0" + date.getMinutes();
// Seconds part from the timestamp
                var seconds = "0" + date.getSeconds();

// Will display time in 10:30:23 format
                var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);

                return date.getDate() + '.' + months_arr[date.getMonth()] + '.' + date.getFullYear();

            }

        },
        created() {
            this.getCurrent('tashkent');

        },
        mounted() {
        }
    })
</script>

</html>
