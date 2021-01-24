<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Об-ҳаво</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('worldnew/style.css')}}">
</head>

<body>
<!-- partial:index.partial.html -->
<!-- DIRTY Responsive pricing table HTML -->
<article id="app" v-cloak="v-cloak">
    <select class="custom-select custom-select-sm tx-12 mg-b-10"
            @change="getCurrent($event.target.value)">
        <option v-for="(item, index) in regions" :value="index">@{{ item }}</option>
    </select>
    <ul>
        <li class="bg-blue active">
            <button>Узгидромет</button>
        </li>
        <li class="bg-blue">
            <button>Gismeteo</button>
        </li>
        <li class="bg-blue">
            <button>OpenWeather</button>
        </li>
        <li class="bg-blue">
            <button>Accuweather</button>
        </li>
    </ul>
    <table>
        <thead>
        <tr>
            <th class="hide"></th>
            <th class="bg-blue default">Узгидромет</th>
            <th class="bg-blue">Gismeteo</th>
            <th class="bg-blue">OpenWeather</th>
            <th class="bg-blue">Accuweather</th>
        </tr>
        </thead>
        <tbody class="txt-white">
        <tr>
            <td class="txt-bold factic">Сейчас:</td>
            <td><span class="txt-l">@{{ current }}</span><span class="txt-top">&deg;</span> <span class="p-r">@{{ current_weather_code }}</span></td>
            <td><span class="txt-l"></span><span class="txt-top">&deg;</span><span class="p-r"></span></td>
            <td class="default"><span class="txt-l">@{{ openweather_current }}</span><span class="txt-top">&deg;</span><span class="p-r">@{{ openweather_current_description }}</span></td>
            <td><span class="txt-l">@{{ accuweather_current }}</span><span class="txt-top">&deg;</span><span class="p-r">@{{ accuweather_current_description }}</span></td>
        </tr>
        <tr>
            <td colspan="5" class="sep">Прогноз погоды на ближайшие сутки</td>
        </tr>
        <tr v-if="forecast.gidromet">
            <td><span class="p-l txt-bold">@{{ forecast.gidromet[0][0].date }}</span><span class="p-r">Сб</span></td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info">@{{ forecast.gidromet[0][0].air_t_min }}...@{{ forecast.gidromet[0][0].air_t_max }}</span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info">@{{ forecast.gidromet[0][1].air_t_min }}...@{{ forecast.gidromet[0][1].air_t_max }}</span></div>
                    </dt>
                </ol>
            </td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                </ol>
            </td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info">@{{ Math.round(forecast.openweather[0].temp.day) }}</span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info">@{{ Math.round(forecast.openweather[0].temp.night) }}</span></div>
                    </dt>
                </ol>
            </td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                </ol>
            </td>
        </tr>
        <tr v-if="forecast.gidromet">
            <td><span class="p-l txt-bold">@{{ forecast.gidromet[1][0].date }}</span><span class="p-r">Сб</span></td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info">@{{ forecast.gidromet[1][0].air_t_min }}...@{{ forecast.gidromet[1][0].air_t_max }}</span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info">@{{ forecast.gidromet[1][1].air_t_min }}...@{{ forecast.gidromet[1][1].air_t_max }}</span></div>
                    </dt>
                </ol>
            </td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                </ol>
            </td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info">@{{ Math.round(forecast.openweather[1].temp.day) }}</span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info">@{{ Math.round(forecast.openweather[1].temp.night) }}</span></div>
                    </dt>
                </ol>
            </td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                </ol>
            </td>
        </tr>
        <tr v-if="forecast.gidromet">
            <td><span class="p-l txt-bold">@{{ forecast.gidromet[2][0].date }}</span><span class="p-r">Сб</span></td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info">@{{ forecast.gidromet[2][0].air_t_min }}...@{{ forecast.gidromet[2][0].air_t_max }}</span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info">@{{ forecast.gidromet[2][1].air_t_min }}...@{{ forecast.gidromet[2][1].air_t_max }}</span></div>
                    </dt>
                </ol>
            </td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                </ol>
            </td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info">@{{ Math.round(forecast.openweather[2].temp.day) }}</span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info">@{{ Math.round(forecast.openweather[2].temp.night) }}</span></div>
                    </dt>
                </ol>
            </td>
            <td class="column-2">
                <ol>
                    <dt>
                        <div class="description-day">Днем</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                    <dt class="night">
                        <div class="description-night">Ночью</div>
                        <div class="price"><span class="txt-info"></span></div>
                    </dt>
                </ol>
            </td>
        </tr>


        <tr>
            <td colspan="5" class="sep">Каково точность прогноза погоды?</td>
        </tr>
        <tr>
            <td>Прогноз температуры</td>
            <td class="default"><span class="tick">94%</span></td>
            <td><span class="tick">94%</span></td>
            <td><span class="tick">92%</span></td>
            <td><span class="tick">91%</span></td>
        </tr>
        <tr>
            <td>Прогноз опасных явлений</td>
            <td class="default"><span class="tick">98%</span></td>
            <td><span class="tick">95%</span></td>
            <td><span class="tick">91%</span></td>
            <td><span class="tick">97%</span></td>
        </tr>
        <tr>
            <td>Прогноз по осадкам</td>
            <td class="default"><span class="tick">91%</span></td>
            <td><span class="tick">93%</span></td>
            <td><span class="tick">97%</span></td>
            <td><span class="tick">92%</span></td>
        </tr>
        </tbody>
    </table>
</article>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js'></script>
<script src="{{asset('worldnew/script.js')}}"></script>
<script src="{{asset('asset/js/vue.js')}}"></script>
<script src="{{asset('asset/js/axios.min.js')}}"></script>
</body>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            current: '',
            forecast: [],
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


                axios.get('{{route('world.forecast')}}', {
                    params: {
                        city: city,
                    }
                })
                    .then(function (response) {
                        app.forecast = response.data;

                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });


                //accuweather end

                //weatherbit






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

            },


        },
        created() {
            this.getCurrent('tashkent');

        },
        mounted() {
        }
    })
</script>

</html>
