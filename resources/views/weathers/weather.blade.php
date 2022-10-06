<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ForeCast</title>
    <!-- icons css -->
    <link href="{{asset('template/lib/fontawesome5/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/assets/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script
        src="https://static.meteoblue.com/cdn/mapbox-gl-js/v1.11.1/mapbox-gl.js"
        integrity="sha512-v5PfWsWi47/AZBVL7WMNqdbM1OMggp9Ce408yX/X9wg87Kjzb1xqpO2Ul0Oue8Vl9kKOcwPM2MWWkTbUjRxZOg=="
        crossorigin="anonymous"
    ></script>

    <link
        rel="stylesheet"
        href="https://static.meteoblue.com/cdn/mapbox-gl-js/v1.11.1/mapbox-gl.css"
        integrity="sha512-xY1TAM00L9X8Su9zNuJ8nBZsGQ8IklX703iq4gWnsw6xCg+McrHXEwbBkNaWFHSqmf6e7BpxD6aJQLKAcsGSdA=="
        crossorigin="anonymous"
    >

    <script src="https://static.meteoblue.com/lib/maps-plugin/v0.x/maps-plugin.js"></script>

</head>
<body>

<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            <form>
                <div class="row mb-5">
                    <div class="col-md-4">
                        <label for="exampleFormControlSelect1">Регионы</label>
                        <select @change="Changes()" class="form-control" id="exampleFormControlSelect1"
                                v-model="region_t">
                            <option v-for="(item, index) in regions_t" :value="index"
                                    v-text="item"></option>
                        </select>
                    </div>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <div>
                            <label for="example-datepicker">Выберите дату</label>
                            <b-form-datepicker  id="example-datepicker" today-button
                                                reset-button
                                                close-button v-model="archive_date" class="mb-2"></b-form-datepicker>
                        </div>
                    </div>
                </div>

                <div class="row-md-12">
                    <p v-if="archive_date == ''" class="font-weight-bold">Сейчас: @{{ Math.round(uzhydromet[0].factik) }}<a
                            class="m-lg-5 text-decoration-none" href="{{route('weather.download')}}">Скачать</a></p>
                    <p v-else-if="archive_date != ''" class="font-weight-bold">В тот момент был температура: @{{ Math.round(uzhydromet[0].factik) }}<a
                            class="m-lg-5 text-decoration-none" href="{{route('weather.download')}}">Скачать</a></p>
                </div>

                <div id="weather-table-wrapper">
                    <div class="form-group  table-responsive mb-25">
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th v-for="item in uzhydromet" scope="col">@{{ item.date | moment }}</th>
                                <th v-if="uzhydromet != null" v-for="i in 5-uzhydromet.length" class="active">&nbsp;
                                </th>
                            {{--                            <th scope="col">Температура</th>--}}
                            {{--                            <th scope="col">Ветер</th>--}}
                            <!-- {{--                            <th scope="col">Напр. Ветра</th>--}} -->
                                {{--                            <th scope="col">Дожд</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>UzHydromet</th>
                                {{--                            <th v-for="item in openweather"  v-if="moment().isSame(item.dt_txt, 'day')" class="active">@{{ item.dt_txt | moment }}--}}
                                {{--                            </th>--}}
                                <td v-for="item in uzhydromet" class="active">

                                    <i class="fas fa-moon"></i> @{{ item.air_t_min_night }}° ... <i
                                        class="fas fa-sun"></i> @{{ item.air_t_max
                                    }}° <br>
                                    <i class="fas fa-wind"></i> @{{ item.wind_speed_min }} - @{{ item.wind_speed_max }}
                                    м/с<br>
                                    <!-- @{{ item.wind_direction }}°<br> -->
                                    <i class="fas fa-cloud-rain"></i> @{{ item.precipitation ? 'да' : 'n/a' }}<br>
                                    <span v-if="item.temp_precent > 0"> <i class="fas fa-equals"></i> @{{ item.temp_precent }} %</span>
                                </td>
                                <td v-if="typeof uzhydromet == 'object'" v-for="i in 5-uzhydromet.length"
                                    class="active">&nbsp;
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
                                    <i class="fas fa-cloud-rain"></i> @{{ item.day_rain ? 'да' : 'n/a' }}<br>
                                    <span v-if="item.temp_precent > 0"> <i class="fas fa-equals"></i> @{{ item.temp_precent }} %</span>
                                </td>
                                <td v-if="accuweather != null" v-for="i in 5-accuweather.length" class="active">&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <th>Weather.com</th>
                                {{--                            <th v-for="item in openweather"  v-if="moment().isSame(item.dt_txt, 'day')" class="active">@{{ item.dt_txt | moment }}--}}
                                {{--                            </th>--}}
                                <td v-for="item in weatherapi" class="active">
                                    <i class="fas fa-temperature-low"></i> @{{ item.temp_min }}° - @{{ item.temp_max }}°
                                    <br>
                                    <i class="fas fa-wind"></i> @{{ item.windSpeed }} м/с @{{
                                    item.windDirection}}<br>
                                    <!-- @{{ item.day_wind_deg }}° @{{ item.day_wind_localized }}<br> -->
                                    <i class="fas fa-cloud-rain"></i> @{{ item.precipChance ? 'да' : 'n/a' }}<br>
                                    <span v-if="item.temp_precent > 0"> <i class="fas fa-equals"></i> @{{ item.temp_precent }} %</span>
                                </td>
                                <td v-if="weatherapi != null" v-for="i in 5-weatherapi.length" class="active">&nbsp;
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
                                    src="https://www.meteoblue.com/ru/weather/widget/daily/tashkent_uzbekistan_1512569?geoloc=fixed&days=7&tempunit=CELSIUS&windunit=METER_PER_SECOND&precipunit=MILLIMETER&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&winddirection=1&uv=0&humidity=0&precipitation=0&precipitation=1&precipitationprobability=0&precipitationprobability=1&spot=0&spot=1&pressure=0&pressure=1&layout=light"
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
                    <div>
                        <h3>Метеограмма маълумотлари</h3>
                        <div class="overflow-hidden">
                            <img
                                src="https://my.meteoblue.com/visimage/meteogram_web?look=METER_PER_SECOND%2CCELSIUS%2CMILLIMETER&apikey=5838a18e295d&temperature=C&windspeed=ms-1&precipitationamount=mm&winddirection=3char&city=%D0%A2%D0%B0%D1%88%D0%BA%D0%B5%D0%BD%D1%82&iso2=uz&lat=41.2646&lon=69.2163&asl=424&tz=Asia%2FTashkent&lang=ru&sig=411710118d5a56101c8668701ce59b24"
                                srcset="https://my.meteoblue.com/visimage/meteogram_web_hd?look=METER_PER_SECOND%2CCELSIUS%2CMILLIMETER&apikey=5838a18e295d&temperature=C&windspeed=ms-1&precipitationamount=mm&winddirection=3char&city=%D0%A2%D0%B0%D1%88%D0%BA%D0%B5%D0%BD%D1%82&iso2=uz&lat=41.2646&lon=69.2163&asl=424&tz=Asia%2FTashkent&lang=ru&sig=c7f9240bc1cb94e2b8b39dcc1055bb73 1.4x"
                                alt="Meteogram - 5 days - Ташкент" style="margin-top: -40px; max-width:100%">
                        </div>
                    </div>

                    <br>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{mix('js/app.js')}}"></script>

<script>
    setTimeout(function () {
        var iframe = document.getElementById("test-map");

        iframe.contentWindow.document.querySelector(".gdpr_message").remove();
        iframe.contentWindow.document.querySelector(".navigation_scroll_container").remove();
        iframe.contentWindow.document.querySelector('.menu_mobile_container').remove();

        setTimeout(function () {
            iframe.contentWindow.document.querySelector('.mapboxgl-canvas').style.width = '100% !important';
            iframe.contentWindow.document.querySelector('.wrapper').style.left = '0px';
            iframe.contentWindow.document.body.querySelector('[data-map-id="cloudsAndPrecipitation"]').click();
            iframe.classList.remove('none');

            var loader = document.getElementById("loader");
            loader.classList.add('none');
        }, 3000);

    }, 2500);
</script>

{{-- map --}}
<div class="container">
    <br>
    <h3>Метеокарта маълумотлари</h3>
    <div class="text-left" style="margin-bottom: 55px;">
        {{-- <div id="loader" style="width: 100%; height: 600px; border:1px solid #ccc" class="none">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 style="margin:auto;background:#fff;display:block;" width="70px" height="600px" viewBox="0 0 100 100"
                 preserveAspectRatio="xMidYMid">
                <g transform="rotate(0 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(30 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(60 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(90 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(120 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(150 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(180 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(210 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(240 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(270 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(300 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(330 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#1d3f72">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
            </svg>
        </div> --}}
        <iframe id="test-map" width="100%" height="650"
                src="https://embed.windy.com/embed2.html?lat=41.192&lon=63.712&detailLat=41.317&detailLon=69.249&width=1024&height=650&zoom=5&level=surface&overlay=clouds&product=ecmwf&menu=&message=true&marker=&calendar=24&pressure=&type=map&location=coordinates&detail=&metricWind=m%2Fs&metricTemp=%C2%B0C&radarRange=-1"
                frameborder="0"></iframe>

        {{-- <iframe id="test-map2" src="{{ route('weather.map') }}" frameborder="0" width="100%" height="600px"
                class="none"/> --}}

    </div>
</div>


</body>
</html>
