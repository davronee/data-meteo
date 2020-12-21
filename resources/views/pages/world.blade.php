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
    <link rel="stylesheet" href="{{asset('template/assets/css/world.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/owl.carousel.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('template/assets/css/easy-responsive-tabs.css')}}">
</head>

<body>
<div class="container" id="app">
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
                            <select class="custom-select custom-select-sm tx-12 mg-b-10" @change="getCurrent($event.target.value)">
                                <option v-for="(item, index) in regions"  :value="index">@{{ item }}</option>
                            </select>
                        </div><!-- card-header -->
                        <div class="worko-tabs">
                            <input class="state" type="radio" title="tab-one" name="tabs-state" id="tab-one" checked />
                            <input class="state" type="radio" title="tab-two" name="tabs-state" id="tab-two" />
                            <input class="state" type="radio" title="tab-three" name="tabs-state" id="tab-three" />
                            <input class="state" type="radio" title="tab-four" name="tabs-state" id="tab-four" />
                            <div class="tabs flex-tabs">
                                <label for="tab-one" id="tab-one-label" class="tab">Узгидромет</label>
                                <label for="tab-two" id="tab-two-label" class="tab">OpenWeather</label>
                                <label for="tab-three" id="tab-three-label" class="tab">AccuWeather</label>
                                <label for="tab-four" id="tab-four-label" class="tab">Gismeteo</label>
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
                                                        <div v-for="(item, index) in forecast" class="wthree-grids-row">
                                                            <ul class="top">
                                                                <li>@{{ item.date }}</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/2.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp">День<br>25 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp">Ночь<br>20 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>

                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                        <div class="w3ls-bottom2">
                                            <div class="ac-container mg-t-20">
                                                <a for="ac-1" class="grid1" href="https://www.meteo.uz/#/ru/forecasts/next-day" target="_blank"> ПРОГНОЗ ПОГОДЫ НА БЛИЖАЙШИЕ СУТКИ</a>
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
                                                                <span>переменная облачность</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <h3>28<sup class="degree">°</sup><span>C</span></h3>
                                                <p>New York</p>
                                                <article class="ac-small">
                                                    <div class="wthree-grids">
                                                        <div class="wthree-grids-row">
                                                            <ul class="top">
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/2.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 25 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 20 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/4.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 27 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 18 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/3.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 30 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 20 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/3.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 30 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 18 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/4.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 31 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 19 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/2.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 30 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 16 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- AccuWeather -->
                                <div id="tab-three-panel" class="panel">
                                    <div class="main-wthree-row">
                                        <div class="agileits-top">
                                            <div class="agileinfo-top-row">
                                                <div class="agileinfo-top-time">
                                                    <div class="date-time">
                                                        <div class="dmy">
                                                            <div class="date">
                                                                <span>переменная облачность</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <h3>28<sup class="degree">°</sup><span>C</span></h3>
                                                <p>New York</p>
                                                <article class="ac-small">
                                                    <div class="wthree-grids">
                                                        <div class="wthree-grids-row">
                                                            <ul class="top">
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/2.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 25 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 20 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/4.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 27 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 18 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/3.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 30 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 20 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/3.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 30 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 18 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/4.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 31 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 19 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/2.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 30 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 16 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Gismeteo -->
                                <div id="tab-four-panel" class="panel">
                                    <div class="main-wthree-row">
                                        <div class="agileits-top">
                                            <div class="agileinfo-top-row">
                                                <div class="agileinfo-top-time">
                                                    <div class="date-time">
                                                        <div class="dmy">
                                                            <div class="date">
                                                                <span>переменная облачность</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <h3>28<sup class="degree">°</sup><span>C</span></h3>
                                                <p>New York</p>
                                                <article class="ac-small">
                                                    <div class="wthree-grids">
                                                        <div class="wthree-grids-row">
                                                            <ul class="top">
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/2.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 25 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 20 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/4.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 27 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 18 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/3.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 30 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 20 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/3.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 30 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 18 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/4.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 31 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 19 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
                                                        </div>
                                                        <div class="wthree-grids-row">
                                                            <ul>
                                                                <li>01.12.2015</li>
                                                                <li class="wthree-img"><img src="{{asset('template/assets/img/2.png')}}" alt="" /> </li>
                                                                <li class="wthree-temp"> 30 <sup class="degree">°</sup></li>
                                                                <li class="wthree-temp"> 16 <sup class="degree">°</sup></li>
                                                            </ul>
                                                            <div class="clear"> </div>
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
        el:'#app',
        data:{
            current:'',
            forecast:[],
            current_weather_code:'',
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
            }
        },
        methods:{
            getCurrent: function (city = 'tashkent') {
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
                        app.forecast = response.data;
                        app.forecast.reverse();


                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },

        },
        created(){
            this.getCurrent('tashkent');

        },
        mounted(){
        }
    })
</script>

</html>
