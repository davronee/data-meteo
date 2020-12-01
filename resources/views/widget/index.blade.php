<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="Meteorological Monitoring">
    <meta name="author" content="Meteoinfocom">
    <title>Мониторинг прогноза погоды</title>
    <!-- vendor css -->
    <link href="{{asset('weather-widget/lib/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('weather-widget/lib/typicons.font/typicons.css')}}" rel="stylesheet">
    <link href="{{asset('weather-widget/lib/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{asset('weather-widget/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- azia CSS -->
    <link rel="stylesheet" href="{{asset('weather-widget/css/meteo.css')}}">
    <link href="{{asset('weather-widget/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('weather-widget/css/weather-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('weather-widget/css/weather-panel.css')}}">
    <script src="{{asset('asset/js/vue.js')}}"></script>
    <script src="{{asset('asset/js/axios.min.js')}}"></script>
</head>

<body class="az-dashboard">
<div class="az-header">
    <div class="container bd-b">
        <div class="az-header-left">
            <img src="{{asset('weather-widget/images/gidrometeo.svg')}}" width="85%">
            <!--           <a href="index.html" class="az-logo">Me<span>t</span>eo</a> -->
        </div><!-- az-header-left -->
        <div class="az-header-center">
        </div><!-- az-header-center -->
        <div class="az-header-right">
            <div class="az-header-notification">
                <a href="" class=""><i class="fas fa-sign-in-alt"></i></a>
                <!-- dropdown-menu -->
            </div>
        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header -->
<div class="az-content az-content-dashboard" id="app" v-cloak>
    <div class="container">
        <div class="az-content-body">
            <div class="az-dashboard-one-title">
                <div class="az-content-header-left">
                    <h2 class="az-dashboard-title">Добро пожаловать!</h2>
                    <p class="az-dashboard-text">Система мониторинга гидрометеорологические данные</p>
                </div>
                <div class="az-content-header-right">
                    <div class="media">
                        <div class="media-body">
                            <label>Дата</label>
                            <h6 id="only_date"></h6>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="media-body">
                            <label>Время</label>
                            <h6 id="only_time"></h6>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="media-body">
                                <span>
                                    <select v-model="city" class="form-control-sm select2-no-search" @change="forecast"
                                            id="city">
                                        <option label="Регион"></option>
                                        <option value="andijan">Андижанская область</option>
                                        <option value="bukhara">Бухарская область</option>
                                        <option value="jizzakh">Джизакская область</option>
                                        <option value="qarshi">Кашкадарьинская область</option>
                                        <option value="navoiy">Навоийская область</option>
                                        <option value="namangan">Наманганская область</option>
                                        <option value="samarkand">Самаркандская область</option>
                                        <option value="termez">Сурхандарьинская область</option>
                                        <option value="gulistan">Сырдарьинская область</option>
                                        <option value="tashkent">г. Ташкент</option>
                                        <option value="nurafshon">Ташкентская область</option>
                                        <option value="fergana">Ферганская область</option>
                                        <option value="urgench">Хорезмская область</option>
                                        <option value="nukus">Республика Каракалпакстан</option>
                                    </select>
                                </span>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <a href="" class="btn btn-outline-light mobi-320"><i class="fas fa-sync-alt"></i></a>
                </div>
            </div><!-- az-dashboard-one-title -->
            <div class="row row-sm mg-b-20">
                <div class="col-lg-9" style="border: 1px solid #ddd;">
                    <div class="card-chart-weather pd-5">
             
                        <div class="card-body">
                            <div class="flot-wrapper" style="margin-left: -30px;">
                                <div class="">
                                    <h3><canvas id="temp-chart" class="temp-chart"></canvas></h3>
                                </div>
                                <!--<div class="graph">
                                    <canvas id="rain-chart" class="rain-chart chart-hidden"></canvas>
                                </div>
                                <div class="graph">
                                    <canvas id="wind-chart" class="wind-chart chart-hidden"></canvas>
                                </div>-->
                            </div>
                        </div>
                    </div><!-- card -->
                </div><!-- col -->
                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                    <div class="card card-dashboard-ten mg-sm-b-5 card-current">
                        <h6 class="az-content-label tx-dark tx-semibold">Сейчас</h6>
                        <div class="card-body">
                            <div>
                                <h6 class="tx-dark tx-semibold">@{{ current }}</h6>
                                <label class="tx-dark tx-semibold">@{{ current_weather_code }}</label>
                            </div>
                            <div>
                                <h6><i class="wi wi-sunset"></i></h6>
                                <label class="sunset"></label>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                    <div class="card card-dashboard-ten sky">
                        <div class="stars"></div>
                        <h6 class="az-content-label">Ночью</h6>
                        <div class="card-body">
                            <div>
                                <h6>@{{ forecast_night.air_t_min > 0 ? "+"+forecast_night.air_t_min :
                                    forecast_night.air_t_min }} &deg; @{{ forecast_night.air_t_max > 0 ?
                                    "+"+forecast_night.air_t_max : forecast_night.air_t_max }} &deg;</h6>
                                <label>@{{ forecast_night_code }}</label>
                            </div>
                            <div>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                    <div class="card card-dashboard-ten card-day">
                        <h6 class="az-content-label">Днем</h6>
                        <div class="card-body">
                            <div>
                                <h6>@{{ forecast_day.air_t_min > 0 ? "+"+forecast_day.air_t_min : forecast_day.air_t_min
                                    }} &deg; @{{ forecast_day.air_t_max > 0 ? "+"+forecast_day.air_t_max :
                                    forecast_day.air_t_max }} &deg;</h6>
                                <label>@{{ forecast_day_code }}</label>
                            </div>
                            <div>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>
            </div><!-- row -->
            <div class="row row-sm card card-dashboard-eleven">
                <div class="card-header">
                    <div>
                        <h6 class="az-content-label">Среднесуточные концентрации загрязнителей (мг/м<sup>3</sup>)</h6>
                        <p class="card-text">Мониторинг загрязнения атмосферного воздуха</p>
                    </div>
                    <div class="btn-group">
                        <button class="btn active">Сегодня</button>
                        <button class="btn">Неделя</button>
                        <button class="btn">Месяц</button>
                    </div>
                </div><!-- card-header -->
                <div class="card-body">
                    <div id="flotChart" class="flot-chart"></div>
                </div><!-- card-body -->
                <div class="card-footer">
                    <div>
                        <label>ПНЗ №14 - Ташкент</label>
                        <h6>2,89 <span class="down">3.5%</span></h6>
                        <small>Мирабадский р-он, ул. Янгизамон (ориентир: Завод «Электроаппарат»)</small>
                    </div>
                    <div>
                        <label>ПНЗ №12 - Ташкент</label>
                        <h6>2,19 <span class="up">12.7%</span></h6>
                        <small>Алмазарский р-он, Лабзак, ул. Уста-Ширин (ориентир: строительный базар «Джами»)</small>
                    </div>
                    <div>
                        <label>ПНЗ №8 - Ташкент</label>
                        <h6>1,27 <span class="up">91.3%</span></h6>
                        <small>Чиланзарский р-он, 2 кв-л (ориентир: Торговый центр «Чиланзар»)</small>
                    </div>
                </div><!-- card-info -->
                <div class="jqvmap">
                    <div id="vmap" class="wd-100p ht-100p"></div>
                </div>
            </div><!-- card -->
        </div><!-- az-content-body -->
    </div>
</div><!-- az-content -->
<div class="az-footer">
    <div class="container">
        <span>&copy; 2020 <a href="http://hydromet.uz/" target="_blank">Центр гидрометеорологической службы Республики Узбекистан</a>. Все права защищены.</span>
        <span>Разработка: ЦРИТ Метеоинфоком</span>
    </div><!-- container -->
</div><!-- az-footer -->
<script src="{{asset('weather-widget/lib/jquery/jquery.min.js')}}"></script>
<!--   <script src="lib/ionicons/ionicons.js"></script> -->
<script src="{{asset('weather-widget/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('weather-widget/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<script src="{{asset('weather-widget/lib/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('weather-widget/lib/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('weather-widget/lib/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('weather-widget/lib/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('weather-widget/lib/jqvmap/maps/jquery.vmap.uzbekistan.js')}}"></script>
<script src="{{asset('weather-widget/js/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('weather-widget/js/meteo.js')}}"></script>
<script src="{{asset('weather-widget/js/weather-panel.js')}}"></script>
<script src="{{asset('weather-widget/lib/select2/js/select2.min.js')}}"></script>
<script>

    let app = new Vue({
        el: "#app",
        data: {
            forecast_day: 0,
            forecast_night: 0,
            forecast_day_code: '',
            forecast_night_code: '',
            city: 'tashkent',
            current:0,
            current_weather_code:'',
            forcastdate:[]
        },
        filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        },
        methods: {
            init: function () {
                $(function () {
                    'use strict'

                    // Datepicker
                    $('.fc-datepicker').datepicker({
                        showOtherMonths: true,
                        selectOtherMonths: true
                    });

                    $('#datepickerNoOfMonths').datepicker({
                        showOtherMonths: true,
                        selectOtherMonths: true,
                        numberOfMonths: 2
                    });

                    $(document).ready(function () {
                        $('.select2').select2({
                            placeholder: 'Выберите'
                        });

                        $('.select2-no-search').select2({
                            minimumResultsForSearch: Infinity,
                            placeholder: 'Выберите'
                        });
                    });

                    // MAP

                    $('#vmap').vectorMap({
                        map: 'uz-uz',
                        backgroundColor: '#fff',
                        enableZoom: false,
                        color: '#ffffff',
                        hoverOpacity: 0.1,
                        showTooltip: false,
                        scaleColors: ['#e9ecef', '#dee2e6'],
                        borderWidth: 1,
                        borderColor: '#fff',
                        values: sample_data,
                        normalizeFunction: 'polynomial'
                    });

                    // We use an inline data source in the example, usually data would
                    // be fetched from a server
                    var data = [];
                    var totalPoints = 150;

                    function getRandomData() {
                        if (data.length > 0)
                            data = data.slice(1);

                        // Do a random walk
                        while (data.length < totalPoints) {
                            var prev = data.length > 0 ? data[data.length - 1] : 50;
                            var y = prev + Math.random() * 10 - 5;

                            if (y < 0) {
                                y = 0;
                            } else if (y > 100) {
                                y = 100;
                            }

                            data.push(y);
                        }

                        // Zip the generated y values with the x values
                        var res = [];
                        for (var i = 0; i < data.length; ++i) {
                            res.push([i, data[i]])
                        }

                        return res;
                    }

                    var plot = $.plot('#flotChart', [getRandomData()], {
                        series: {
                            color: '#03A9F4',
                            shadowSize: 0,
                            lines: {
                                show: true,
                                lineWidth: 2,
                                fill: true,
                                fillColor: {colors: [{opacity: 0}, {opacity: 0.8}]}
                            }
                        },
                        crosshair: {
                            mode: 'x',
                            color: '#f10075'
                        },
                        grid: {borderWidth: 0},
                        yaxis: {
                            min: 0,
                            max: 100,
                            color: 'rgba(0,0,0,.08)',
                            font: {
                                size: 10,
                                color: '#666',
                                family: 'Arial'
                            },
                            tickSize: 15
                        },
                        xaxis: {show: false}
                    });

                    function update() {
                        plot.setData([getRandomData()]);

                        // Since the axes don't change, we don't need to call plot.setupGrid()
                        plot.draw();
                        setTimeout(update, 2000);
                    }

                    update();

                });
                var dt = new Date();
                document.getElementById("only_date").innerHTML = dt.toLocaleDateString();
                var dt = new Date();
                document.getElementById("only_time").innerHTML = dt.toLocaleTimeString();
            },
            forecast: function () {
                axios.get('https://www.meteo.uz/index.php/forecast/city', {
                    params: {
                        city: this.city,
                        expand: 'city',
                    }
                })
                    .then(function (response) {
                        app.forecast_day = response.data[6];
                        app.forecast_night = response.data[7];
                        // console.log(response.data[7]);

                         app.forcastdate = response.data;

                        if (response.data[6].icon == 'clear')
                            app.forecast_day_code = 'ясно, безоблачно';
                        else if (response.data[6].icon == 'mostly_clear')
                            app.forecast_day_code = 'небольшая, незначительная облачность';
                        else if (response.data[6].icon == 'partly_cloudy')
                            app.forecast_day_code = 'переменная облачность';
                        else if (response.data[6].icon == 'mostly_cloudy')
                            app.forecast_day_code = 'значительная облачность';
                        else if (response.data[6].icon == 'overcast')
                            app.forecast_day_code = 'облачно, пасмурно';
                        else if (response.data[6].icon == 'fog')
                            app.forecast_day_code = 'туман, дымка, мгла';
                        else if (response.data[6].icon == 'light_rain')
                            app.forecast_day_code = 'небольшой, слабый дождь';
                        else if (response.data[6].icon == 'rain')
                            app.forecast_day_code = 'дождь';
                        else if (response.data[6].icon == 'heavy_rain')
                            app.forecast_day_code = 'сильный, ливневый дождь';
                        else if (response.data[6].icon == 'thunderstorm')
                            app.forecast_day_code = 'гроза';
                        else if (response.data[6].icon == 'light-sleet')
                            app.forecast_day_code = 'небольшие, слабые осадки (дождь, снег)';
                        else if (response.data[6].icon == 'sleet')
                            app.forecast_day_code = 'осадки (дождь, снег)';
                        else if (response.data[6].icon == 'heavy_sleet')
                            app.forecast_day_code = 'сильные осадки (дождь, снег)';
                        else if (response.data[6].icon == 'light_snow')
                            app.forecast_day_code = 'небольшой, слабый снег';
                        else if (response.data[6].icon == 'snow')
                            app.forecast_day_code = 'снег';
                        else if (response.data[6].icon == 'heavy_snow')
                            app.forecast_day_code = 'сильный снег';


                        if (response.data[7].icon == 'clear')
                            app.forecast_night_code = 'ясно, безоблачно';
                        else if (response.data[7].icon == 'mostly_clear')
                            app.forecast_night_code = 'небольшая, незначительная облачность';
                        else if (response.data[7].icon == 'partly_cloudy')
                            app.forecast_night_code = 'переменная облачность';
                        else if (response.data[7].icon == 'mostly_cloudy')
                            app.forecast_night_code = 'значительная облачность';
                        else if (response.data[7].icon == 'overcast')
                            app.forecast_night_code = 'облачно, пасмурно';
                        else if (response.data[7].icon == 'fog')
                            app.forecast_night_code = 'туман, дымка, мгла';
                        else if (response.data[7].icon == 'light_rain')
                            app.forecast_night_code = 'небольшой, слабый дождь';
                        else if (response.data[7].icon == 'rain')
                            app.forecast_night_code = 'дождь';
                        else if (response.data[7].icon == 'heavy_rain')
                            app.forecast_night_code = 'сильный, ливневый дождь';
                        else if (response.data[7].icon == 'thunderstorm')
                            app.forecast_night_code = 'гроза';
                        else if (response.data[7].icon == 'light-sleet')
                            app.forecast_night_code = 'небольшие, слабые осадки (дождь, снег)';
                        else if (response.data[7].icon == 'sleet')
                            app.forecast_night_code = 'осадки (дождь, снег)';
                        else if (response.data[7].icon == 'heavy_sleet')
                            app.forecast_night_code = 'сильные осадки (дождь, снег)';
                        else if (response.data[7].icon == 'light_snow')
                            app.forecast_night_code = 'небольшой, слабый снег';
                        else if (response.data[7].icon == 'snow')
                            app.forecast_night_code = 'снег';
                        else if (response.data[7].icon == 'heavy_snow')
                            app.forecast_night_code = 'сильный снег';


                        var metric = true;
                        var date;
                        var json;
                        date = new Date();
                        var month = date.getMonth();
                        var monthNames = [
                            "Январь",
                            "Февраль",
                            "Март",
                            "Апрель",
                            "Май",
                            "Июнь",
                            "Июль",
                            "Август",
                            "Сентябрь",
                            "Октябрь",
                            "Ноябрь",
                            "Декабрь"
                        ];
                        var hour = date.getHours();
                        var hourLabels = [app.forcastdate[7].date + ' 00:00', app.forcastdate[6].date + ' 12:00', app.forcastdate[5].date + ' 00:00', app.forcastdate[4].date + ' 12:00',app.forcastdate[3].date + ' 00:00', app.forcastdate[2].date + ' 12:00', app.forcastdate[1].date + ' 00:00', app.forcastdate[0].date + ' 12:00'];
                        var tempData = [app.forcastdate[7].air_t_min, app.forcastdate[6].air_t_min, app.forcastdate[5].air_t_min, app.forcastdate[4].air_t_min,app.forcastdate[3].air_t_min, app.forcastdate[2].air_t_min, app.forcastdate[1].air_t_min, app.forcastdate[0].air_t_min];
                        var rainData = [0, 0, 0, 0, 0, 0, 0, 0];
                        var windData = [0, 0, 0, 0, 0, 0, 0, 0];


                        $(".time").html(
                            date.getDay() + " " + monthNames[month] + " " + date.getFullYear()
                        );
                        var tempEl = document.getElementById("temp-chart");


                        var tempChart = new Chart(tempEl, {
                            type: "line",
                            data: {
                                labels: hourLabels,
                                datasets: [{
                                    label: 'C',
                                    data: tempData,
                                    borderColor: "rgb(246, 191, 77)",
                                    borderWidth: 1,
                                    backgroundColor: "rgba(246, 191,  77, 0.2)"
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                legend: {
                                    boxWidth: 0,
                                    display: false
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            fontSize: 10
                                        },
                                        scaleLabel: {
                                            display: true,
                                            labelString: " ",
                                            fontSize: 10
                                        }
                                    }],
                                    xAxes: [{
                                        ticks: {
                                            fontSize: 10
                                        },
                                        display: false,
                                    }],


                                }
                            }
                        });
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

            },
            getCurrent:function () {
                axios.get('http://www.meteo.uz/api/v2/weather/current.json', {
                    params: {
                        city: this.city,
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
            },
            createChart:function () {


            }
        },
        created() {

        },
        mounted() {
            this.init();
            this.forecast();
            this.getCurrent();
            this.createChart();
        }
    });

    $('#city').on("change", function () {
        app.city = $(this).val();
        app.forecast();
        app.getCurrent();
        // console.log('Name : ' + $(this).val());
    });


</script>
</body>

</html>
