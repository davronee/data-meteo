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
    <link rel="stylesheet" href="{{asset('template/assets/css/easy-responsive-tabs.css')}}">
    <script src="{{asset('template/assets/js/vue.js')}}"></script>
    <script src="{{asset('template/assets/js/axios.min.js')}}"></script>
</head>

<body onload="startTime()">
<div class="container" id="app">
    <div class="header">
        <div class="header-left sidebar-logo">
            <img src="{{asset('template/assets/img/gidrometeo.svg')}}"></a>
        </div><!-- header-left -->
        <div class="header-right">
        </div><!-- header-right template-->
    </div><!-- header -->
    <div class="content-page mg-t-20">
        <div class="content-body">
            <div class="card card-hover no-shadow">
                <div class="card-body">
                    <div class="main">
                        <select v-model="city" @change="getCurrent" id="city"
                                class="custom-select custom-select-sm tx-12 mg-b-10">
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
                        <div class="w3_agile_main_grids">
                            <div class="w3layouts_main_grid">
                                <div class="w3layouts_main_grid_left">
                                    <h2>@{{ city_name }}</h2>
                                    <p>@{{ current_weather_code }}</p>
                                    <h3>Сейчас</h3>
                                    <h4>@{{ current }}<span>°с</span></h4>
                                </div>
                                <div class="w3layouts_main_grid_right">
                                    <div id="w3time"></div>
                                    <div class="w3layouts_date_year">
                                        <!-- date -->
                                        <script type="application/javascript">
                                            var mydate = new Date()
                                            var year = mydate.getYear()
                                            if (year < 1000)
                                                year += 1900
                                            var day = mydate.getDay()
                                            var month = mydate.getMonth()
                                            var daym = mydate.getDate()
                                            if (daym < 10)
                                                daym = "0" + daym
                                            var dayarray = new Array("Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота")
                                            var montharray = new Array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь")
                                            document.write("" + dayarray[day] + ", " + montharray[month] + " " + daym + ", " + year + "")

                                        </script>
                                        <!-- //date -->
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="agileits_w3layouts_main_grid">
                                <div class="agile_main_grid_left">
                                    <div class="wthree_main_grid_left_grid">
                                        <div class="w3ls_main_grid_left_grid1">
                                            <div class="w3l_main_grid_left_grid1_left">
                                                <h3>МЕСТАМИ СОЛНЕЧНО</h3>
                                                <p>3 <span>%</span></p>
                                            </div>
                                            <div class="w3l_main_grid_left_grid1_right">
                                                <canvas id="partly-cloudy-day" width="45" height="45"></canvas>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="w3ls_main_grid_left_grid1">
                                            <div class="w3l_main_grid_left_grid1_left">
                                                <h3>Осадка</h3>
                                                <p>38 <span>%</span></p>
                                            </div>
                                            <div class="w3l_main_grid_left_grid1_right">
                                                <canvas id="cloudy" width="45" height="45"></canvas>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="w3ls_main_grid_left_grid1">
                                            <div class="w3l_main_grid_left_grid1_left">
                                                <h3>Ветер</h3>
                                                <p>@{{ current_wind }} <span>Km/h</span></p>
                                            </div>
                                            <div class="w3l_main_grid_left_grid1_right">
                                                <canvas id="wind" width="45" height="45"></canvas>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w3_agileits_main_grid_right">
                                    <div class="agileinfo_main_grid_right_grid">
                                        <div id="parentHorizontalTab">
                                            <ul class="resp-tabs-list hor_1">
                                                <li>Сегодня</li>
                                                <li>Неделя</li>
                                                <li>Месяц</li>
                                            </ul>
                                            <div class="resp-tabs-container hor_1">
                                                <div class="w3_agileits_tabs">
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>02:00</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>15&deg;C<span>Cloudy</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>05:00</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>16&deg;C<span>Clear</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>08:00</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>18&deg;C<span>Cear</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>11:00</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>12&deg;C<span>Partly Cloudy</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <div class="w3_agileits_tabs">
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>Monday</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>14&deg;C<span>Clear</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>Tuesday</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>16&deg;C<span>Cloudy</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>Wednesday</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>11&deg;C<span>Rainy</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>Thursday</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>18&deg;C<span>Sunny</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <div class="w3_agileits_tabs">
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>January</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>18&deg;C<span>Cloudy</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>February</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>14&deg;C<span>Clear</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>March</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>18&deg;C<span>Cear</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="w3_main_grid_right_grid1">
                                                        <div class="w3_main_grid_right_grid1_left">
                                                            <p>April</p>
                                                        </div>
                                                        <div class="w3_main_grid_right_grid1_right">
                                                            <p>12&deg;C<span>Partly Cloudy</span></p>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- card -->
            <div class="row row-sm mg-t-20">
                <div class="col-md-12 col-xl-12 mg-t-5 mg-sm-t-15">
                    <div class="card card-hover card-total-sales no-shadow">
                        <div class="card-header bg-transparent pd-y-15 pd-l-15 pd-sm-l-20 pd-r-15 bd-b-1">
                            <h6 class="card-title mg-b-0 lh-5">Мониторинг загрязнения атмосферного воздуха</h6>
                        </div><!-- card-header -->
                        <div class="card-body pd-x-15 pd-sm-x-20 pd-t-5 mg-t-10">
                            <div
                                class="d-flex flex-column flex-sm-row align-items-start justify-content-between mg-b-15">
                                <div class="total-sales-info order-2 order-sm-0">
                                    <div>
                                        <select v-model="city" @change="getCurrent"
                                                class="custom-select custom-select-sm tx-12">
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
                                    </div>
                                    <div>
                                        <select class="custom-select custom-select-sm tx-12">
                                            <option value="1735-001">ПНЗ №1</option>
                                            <option value="1735-002">ПНЗ №2</option>
                                            <option value="1735-004" selected="">ПНЗ №4</option>
                                            <option value="1735-006">ПНЗ №6</option>
                                            <option value="1735-008">ПНЗ №8</option>
                                            <option value="1735-012">ПНЗ №12</option>
                                            <option value="1735-014">ПНЗ №14</option>
                                            <option value="1735-015">ПНЗ №15</option>
                                            <option value="1735-018">ПНЗ №18</option>
                                            <option value="1735-019">ПНЗ №19</option>
                                            <option value="1735-023">ПНЗ №23</option>
                                            <option value="1735-026">ПНЗ №26</option>
                                            <option value="1735-028">ПНЗ №28</option>
                                        </select>
                                    </div>
                                </div><!-- total-sales-info -->
                                <div class="order-1 order-sm-0 mg-sm-t-7 mg-b-15 mg-sm-b-0">
                                    <p class="btn btn-xs btn-white">Обновлено: 03.12.2020, 14:01</p>
                                </div>
                            </div>
                            <div class="flot-wrapper">
                                <div class="flot-chart-two">
                                    <canvas id="flotChart5"></canvas>
                                </div>
                            </div>
                        </div><!-- card-body -->
                        <div class="card-footer">
                            <div>
                                <label class="tx-small">Среднесуточные концентрации загрязнителей
                                    (мг/м<sup>3</sup>)</label>
                                <h6>2,89 <span class="down">3.5%</span></h6>
                                <small>Продолжить пребывание на свежем воздухе в обычном режиме. Гуляние в парках, зонах
                                    отдыха не ограничено.</small>
                            </div>
                            <div>
                                <div class="media-body">
                                    <small><b>Адрес:</b> Алмазарский р-он, Лабзак, ул. Уста-Ширин (ориентир:
                                        строительный базар «Джами»)</small>
                                    <small><b>С какого года работает:</b> 10.09.1986г.</small>
                                    <small><b>Дата открытия поста:</b> 10.09.1986г.</small>
                                </div>
                            </div>
                        </div><!-- card-info -->
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
<script src="{{asset('template/assets/js/dashboard-one.js')}}"></script>
<!-- sky-icons -->
<script>

    let app = new Vue({
        el: '#app',
        data: {
            forecast_day: 0,
            forecast_night: 0,
            forecast_day_code: '',
            forecast_night_code: '',
            city: 'tashkent',
            current: 0,
            city_name: 'Ташкент',
            current_weather_code: '',
            forcastdate: [],
            current_wind: [],
        },
        filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        },
        methods: {

            getCurrent: function () {
                axios.get('http://www.meteo.uz/api/v2/weather/current.json', {
                    params: {
                        city: this.city,
                        language: 'ru',
                    }
                })
                    .then(function (response) {
                        app.current = Math.floor(response.data.air_t);

                        app.getTitle();
                        app.getWind();


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
            getTitle: function () {
                if (app.city == 'tashkent') {
                    app.city_name = 'г. Ташкент';
                } else if (app.city == 'andijan') {
                    app.city_name = 'Андижанская область';
                } else if (app.city == 'bukhara') {
                    app.city_name = 'Бухарская область';
                } else if (app.city == 'jizzakh') {
                    app.city_name = 'Джизакская область';
                } else if (app.city == 'qarshi') {
                    app.city_name = 'Кашкадарьинская область';
                } else if (app.city == 'navoiy') {
                    app.city_name = 'Навоийская область';
                } else if (app.city == 'namangan') {
                    app.city_name = 'Наманганская область';
                } else if (app.city == 'samarkand') {
                    app.city_name = 'Самаркандская область';
                } else if (app.city == 'termez') {
                    app.city_name = 'Сурхандарьинская область';
                } else if (app.city == 'gulistan') {
                    app.city_name = 'Сырдарьинская область';
                } else if (app.city == 'nurafshon') {
                    app.city_name = 'Ташкентская область';
                } else if (app.city == 'fergana') {
                    app.city_name = 'Ферганская область';
                } else if (app.city == 'urgench') {
                    app.city_name = 'Хорезмская область';
                } else if (app.city == 'nukus') {
                    app.city_name = 'Республика Каракалпакстан';
                }
            },
            getWind: function () {


                    axios.get('{{route('getWindSpeed')}}', {
                        params: {
                            city: this.city,
                        }
                    })
                        .then(function (response) {
                            app.current_wind = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });



            }
        },
        mounted() {
            this.getCurrent();
        },
        created() {

        }
    });


</script>
<script>
    var icons = new Skycons({"color": "#36a6e5"}),
        list = [
            "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "clear-day", "snow", "wind",
            "fog"
        ],
        i;

    for (i = list.length; i--;)
        icons.set(list[i], list[i]);

    icons.play();

</script>
<!-- //sky-icons -->
<!-- tabs -->
<script type="text/javascript">
    $(document).ready(function () {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });

</script>
<!-- //tabs -->
<!-- time -->
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('w3time').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        ; // add zero in front of numbers < 10
        return i;
    }

</script>
<!-- //time -->
</body>

</html>
