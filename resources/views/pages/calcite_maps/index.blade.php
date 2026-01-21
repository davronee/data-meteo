<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Lock viewport to prevent scaling -->
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="description" content="Метеорологическая карта Узбекистана">
    <meta name="author" content="">
    <!--favicon-->
    <link rel="apple-touch-icon" sizes="57x57"
          href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
          href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
          href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
          href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
          href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
          href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
          href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
          href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
          href="https://hydromet.uz/templates/meteouz/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="https://hydromet.uz/templates/meteouz/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
          href="https://hydromet.uz/templates/meteouz/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="https://hydromet.uz/templates/meteouz/images/favicon/favicon-16x16.png">
    <link rel="shortcut icon" href="https://hydromet.uz/templates/meteouz/images/favicon/favicon.ico">
    <link rel="manifest" href="https://hydromet.uz/templates/meteouz/images/favicon/manifest.json">
    <meta name="yandex-verification" content="c194b7ef7003b9b1"/>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
          content="https://hydromet.uz/templates/meteouz/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--favicon-->
    <title>METEO MONITORING - UZHYDROMET</title>

    <!-- Calcite Maps Bootstrap -->
    <link rel="stylesheet" href="{{asset('calcite/css/calcite-maps-bootstrap.min-v0.10.css')}}">

    <!-- Calcite Maps -->
    <link rel="stylesheet" href="{{asset('calcite/css/calcite-maps-esri-leaflet.min-v0.10.css')}}">
    <link rel="stylesheet" href="{{asset('calcite/fonts/calcite/calcite-ui.css')}}">

    <!-- Load Leaflet from CDN-->
    <!--     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" /> -->
    <link rel="stylesheet" href="{{asset('calcite/css/leaflet.css')}}">

    <!--     <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet-src.js"></script> -->
    <script src="{{asset('calcite/js/jquery/leaflet-src.js')}}"></script>
    <script src="{{asset('js/leaflet-svg-shape-markers.min.js')}}"></script>
    <link href="{{asset('calcite/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}"/>


    <link rel="stylesheet" href="{{asset('assets/css/leaflet.awesome-markers.css')}}">
    <script src="{{asset('js/topojson.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('assets/css/weather-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/weather-icons-wind.css')}}">

    <script src="{{asset('asset/js/vue.min.js')}}"></script>
    <script src="{{asset('asset/js/axios.min.js')}}"></script>
    <!-- Load Esri Leaflet from CDN -->

    <script src="{{asset('calcite/js/jquery/esri-leaflet-debug.js')}}"></script>

    <!-- Load Esri Leaflet Geocoder from CDN -->
    <!--     <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.2.3/dist/esri-leaflet-geocoder.css"> -->

    <link rel="stylesheet" href="{{asset('calcite/css/esri-leaflet-geocoder.css')}}">
    <link rel="stylesheet" href="{{asset('calcite/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/calcite-maps-custom.css')}}">
    <script src="{{asset('calcite/js/jquery/esri-leaflet-geocoder-debug.js')}}"></script>
    <script src="{{asset('js/georaster.min.js')}}"></script>
    <script src="{{asset('js/georaster-layer-for-leaflet.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.4.2/chroma.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.heat/0.2.0/leaflet-heat.js"></script>
    <script src="https://unpkg.com/@turf/turf@6/turf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.4.2/chroma.min.js"></script>


</head>
<body class="calcite-maps calcite-nav-top calcite-layout-small-title">

<!-- Navbar -->
<div id="app">
    <nav class="navbar calcite-navbar navbar-fixed-top calcite-bg-dark calcite-text-light calcite-bgcolor-dark-blue">
        <!-- Menu -->
        <div class="dropdown calcite-dropdown calcite-bg-custom calcite-text-light" role="presentation">
            <a class="dropdown-toggle" role="menubutton" aria-haspopup="true" aria-expanded="false" tabindex="0">
                <div class="calcite-dropdown-toggle">
                    <span class="sr-only">Меню</span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
            <ul class="dropdown-menu calcite-bgcolor-dark-blue">
                <li><a class="visible-xs" role="button" data-target="#panelSearch" aria-haspopup="true"><span
                            class="glyphicon glyphicon-search"></span> @lang('map.search')</a></li>
                <li><a role="menuitem" tabindex="0" data-target="#panelBasemaps" aria-haspopup="true"><span
                            class="glyphicon glyphicon-globe"></span> @lang('map.type_map')</a></li>
                <li><a role="menuitem" tabindex="0" data-target="#panelMeteodata" aria-haspopup="true"><span
                            class="glyphicon glyphicon-th-list"></span> @lang('map.info')</a></li>
                <li><a href="/meteo-alert" target="_blank" role="menuitem"><span
                            class="glyphicon glyphicon-warning-sign"></span>MeteoAlert (прогноз)</a></li>
                <li><a href="/meteo-alert-airquality" target="_blank" role="menuitem"><span
                            class="glyphicon glyphicon-warning-sign"></span>MeteoAlert (загрязнение)</a></li>
                <li><a role="menuitem" tabindex="0" id="calciteToggleNavbar" aria-haspopup="true"><span
                            class="glyphicon glyphicon-fullscreen"></span> @lang('map.full_view')</a></li>
                <li><a role="menuitem" tabindex="0" data-target="#panelApi" aria-haspopup="true"><span
                            class="fa fa-code"></span> Метео API</a></li>
                <li><a role="menuitem" tabindex="0" data-target="#panelInfo" aria-haspopup="true"><span
                            class="glyphicon glyphicon-info-sign"></span> @lang('map.portal_info')</a></li>

            </ul>
        </div>
        <!-- Title -->
        <div class="calcite-title calcite-overflow-hidden">
            <span class="calcite-title-main">@lang('map.main_title')</span>
            <span class="calcite-title-divider hidden-xs"></span>
            <span class="calcite-title-sub hidden-xs">@lang('map.beta_version') | <span style="color: yellow">Предназначено только для просмотра</span></span>
        </div>
        <!-- Nav -->
        <ul class="calcite-nav nav navbar-nav">
            <!--  <li>
                <div class="calcite-navbar-search hidden-xs">
                    <div id="geocode"></div>
                </div>
            </li> -->
            <li><a class="calcite-navbar-search" href="{{route('index.oneid')}}">Авторизация <span
                        class="glyphicon glyphicon-log-out"></span></a>
            </li>
            <!-- <li><a class="calcite-navbar-search" href="#">Мой кабинет <span class="glyphicon glyphicon-user"></span></a></li> -->
            <li><a class="calcite-navbar-search hidden-xs" href="#"><span
                        class="calcite-title-divider hidden-xs"></span></a></li>
            <li><a class="calcite-navbar-search hidden-xs" href="{{route('locale','uz_Cyrillic')}}">Ўзбекча</a></li>
            <li><a class="calcite-navbar-search hidden-xs" href="{{route('locale','ru')}}">Русский</a></li>
            <li><a class="calcite-navbar-search hidden-xs" href="{{route('locale','ru')}}">English</a></li>


        </ul>
    </nav><!--/.navbar -->

    <!-- Map Container  -->

    <div class="calcite-map">
        <!-- PM2.5 interpolation loader overlay -->
        <div v-if="isInterpolationLoading" class="pm25-loader-overlay" aria-live="polite" aria-busy="true">
            <div class="pm25-loader-card">
                <div class="pm25-loader-spinner" aria-hidden="true"></div>
                <div class="pm25-loader-text">Интерполяция PM2.5…</div>
            </div>
        </div>
        <div id="map" class="calcite-map-absolute"></div>
        <div class="container-fluid" id="footer-fluid">
            <a href="http://creativecommons.org/licenses/by-sa/3.0/" rel="license">
                <img alt="Лицензия Creative Commons" src="https://i.creativecommons.org/l/by-sa/3.0/88x31.png"
                     style="border-width:0">
            </a>
        </div>
    </div><!-- /.container -->

    @include('pages.calcite_maps.parts.sidebar')
    <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-hidden="true"
                    >
                        &times;
                    </button>
                    <h4 class="modal-title">Средние значения солнечной радиации за месяц
                    </h4>
                </div>
                <div class="modal-body">
                    <table v-if="radiation_data" class="table">
                        <tr>
                            <td colspan="5">
                                <select @change="getStationSolnichni" class="form-control" v-model="year_r">
                                    <option v-for="item in years_r">@{{ item.year }}</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>месяц</td>
                            <td>Прямая солнечная радиация на перпендикулярную поверхность. квт/м² мин</td>
                            <td>Прямая солнечная радиация на горизонтальную поверхность. квт/м² мин</td>
                            <td>Суммарная радиация. квт/м² мин</td>
                            <td>Рассеянная радиация. квт/м² мин</td>
                        </tr>
                        <tr>
                            <td>I</td>
                            <td>@{{ radiation_data.value.perpendicular_1 }}</td>
                            <td>@{{ radiation_data.value.horizontal_1 }}</td>
                            <td>@{{ radiation_data.value.summ_1 }}</td>
                            <td>@{{ radiation_data.value.scattered_1 }}</td>
                        </tr>
                        <tr>
                            <td>II</td>
                            <td>@{{ radiation_data.value.perpendicular_2 }}</td>
                            <td>@{{ radiation_data.value.horizontal_2 }}</td>
                            <td>@{{ radiation_data.value.summ_2 }}</td>
                            <td>@{{ radiation_data.value.scattered_2 }}</td>
                        </tr>
                        <tr>
                            <td>III</td>
                            <td>@{{ radiation_data.value.perpendicular_2 }}</td>
                            <td>@{{ radiation_data.value.horizontal_2 }}</td>
                            <td>@{{ radiation_data.value.summ_2 }}</td>
                            <td>@{{ radiation_data.value.scattered_2 }}</td>
                        </tr>
                        <tr>
                            <td>IV</td>
                            <td>@{{ radiation_data.value.perpendicular_4 }}</td>
                            <td>@{{ radiation_data.value.horizontal_4 }}</td>
                            <td>@{{ radiation_data.value.summ_4 }}</td>
                            <td>@{{ radiation_data.value.scattered_4 }}</td>
                        </tr>
                        <tr>
                            <td>V</td>
                            <td>@{{ radiation_data.value.perpendicular_5 }}</td>
                            <td>@{{ radiation_data.value.horizontal_5 }}</td>
                            <td>@{{ radiation_data.value.summ_5 }}</td>
                            <td>@{{ radiation_data.value.scattered_5 }}</td>
                        </tr>
                        <tr>
                            <td>VI</td>
                            <td>@{{ radiation_data.value.perpendicular_6 }}</td>
                            <td>@{{ radiation_data.value.horizontal_6 }}</td>
                            <td>@{{ radiation_data.value.summ_6 }}</td>
                            <td>@{{ radiation_data.value.scattered_6 }}</td>
                        </tr>
                        <tr>
                            <td>VII</td>
                            <td>@{{ radiation_data.value.perpendicular_7 }}</td>
                            <td>@{{ radiation_data.value.horizontal_7 }}</td>
                            <td>@{{ radiation_data.value.summ_7 }}</td>
                            <td>@{{ radiation_data.value.scattered_7 }}</td>
                        </tr>
                        <tr>
                            <td>VIII</td>
                            <td>@{{ radiation_data.value.perpendicular_8 }}</td>
                            <td>@{{ radiation_data.value.horizontal_8 }}</td>
                            <td>@{{ radiation_data.value.summ_8 }}</td>
                            <td>@{{ radiation_data.value.scattered_8 }}</td>
                        </tr>
                        <tr>
                            <td>IX</td>
                            <td>@{{ radiation_data.value.perpendicular_9 }}</td>
                            <td>@{{ radiation_data.value.horizontal_9 }}</td>
                            <td>@{{ radiation_data.value.summ_9 }}</td>
                            <td>@{{ radiation_data.value.scattered_9 }}</td>
                        </tr>
                        <tr>
                            <td>X</td>
                            <td>@{{ radiation_data.value.perpendicular_10 }}</td>
                            <td>@{{ radiation_data.value.horizontal_10 }}</td>
                            <td>@{{ radiation_data.value.summ_10 }}</td>
                            <td>@{{ radiation_data.value.scattered_10 }}</td>
                        </tr>
                        <tr>
                            <td>XI</td>
                            <td>@{{ radiation_data.value.perpendicular_11 }}</td>
                            <td>@{{ radiation_data.value.horizontal_11 }}</td>
                            <td>@{{ radiation_data.value.summ_11 }}</td>
                            <td>@{{ radiation_data.value.scattered_11 }}</td>
                        </tr>
                        <tr>
                            <td>XII</td>
                            <td>@{{ radiation_data.value.perpendicular_12 }}</td>
                            <td>@{{ radiation_data.value.horizontal_12 }}</td>
                            <td>@{{ radiation_data.value.summ_12 }}</td>
                            <td>@{{ radiation_data.value.scattered_12 }}</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="camera1" tabindex="-1" role="dialog" aria-labelledby="Camera1Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <iframe src="https://cam2.meteo.uz/" frameborder="0" width="100%" height="640px"></iframe>
            </div>
        </div>
    </div>
    <div class="modal fade" id="camera2" tabindex="-1" role="dialog" aria-labelledby="Camera2Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <iframe src="https://cam3.meteo.uz/" frameborder="0" width="100%" height="640px"></iframe>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/leaflet.awesome-markers.min.js')}}"></script>
<script src="{{asset('js/topojson.min.js')}}"></script>

<script src="{{asset('asset/js/leaflet.ajax.js')}}"></script>
<script src="{{asset('calcite/js/jquery.min.js')}}"></script>
<!-- Include all plugins or individual files as needed -->
<script src="{{asset('calcite/js/bootstrap.min.js')}}"></script>

<script>
    var map;
    var airQualityLegend = null;
    var markers_weather = L.featureGroup();
    var markers_radar = L.featureGroup();
    var markers_atmasfera = L.featureGroup();
    var heatmapLayer = null; // Heatmap layer для интерполяции "Авто" станций
    var autoStationsData = []; // Данные "Авто" станций для интерполяции
    var pm25InterpolationLayer = null; // IDW interpolatsiya layer
    var uzbekistanBoundary = null; // O'zbekiston chegarasi GeoJSON
    var showInterpolation = false; // Interpolatsiya ko'rsatish flag'i
    var pm25StationsData = []; // PM2.5 stansiyalar ma'lumotlari (hover uchun)
    var pm25Tooltip = null; // PM2.5 tooltip popup
    var pm25TooltipThrottle = null; // Throttle timeout
    var markers_awd = L.featureGroup();
    var markers_agro = L.featureGroup();
    var markers_mini = L.featureGroup();
    var markers_radiatsiya = L.featureGroup();
    var markers_forecast = L.featureGroup();
    // var markers_atmasfera = L.featureGroup();
    var markers_snow = L.featureGroup();
    var markers_aero = L.featureGroup();
    var markers_dangerzones = L.featureGroup();
    var markers_microstep = L.featureGroup();
    var markers_watercadastr = L.featureGroup();
    var markers_irrigation = L.featureGroup();
    var marker_waterconsuption = L.featureGroup();
    var marker_waterlevel = L.featureGroup();
    var marker_audtohydropost = L.featureGroup();
    var marker_comfort_zones = L.featureGroup();
    var markers_organization_stations = L.featureGroup();
    var markers_atmosphere_tashkent = L.featureGroup();
    var legend_marker = L.featureGroup();

    // Helper function for API calls with error handling
    function apiCall(url, config, onSuccess, onError) {
        return axios.get(url, config)
            .then(function(response) {
                if (onSuccess) onSuccess(response);
                return response;
            })
            .catch(function(error) {
                if (onError) {
                    onError(error);
                } else {
                    console.error('API Error:', error);
                }
            });
    }

    // Debounce function for performance optimization
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // PM2.5 interpolation loader helper (safe even if Vue isn't ready yet)
    function setInterpolationLoading(isLoading) {
        try {
            if (typeof app !== 'undefined' && app) {
                app.isInterpolationLoading = !!isLoading;
            }
        } catch (e) {
            // noop
        }
    }

    /**
     * Throttle function - funksiyani ma'lum vaqt oralig'ida bir marta chaqiradi
     * Performance optimizatsiya uchun
     *
     * @param {Function} func - Throttle qilinadigan funksiya
     * @param {number} limit - Vaqt oralig'i (millisekundlarda)
     * @returns {Function} - Throttled funksiya
     */
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(function() {
                    inThrottle = false;
                }, limit);
            }
        };
    }

    // Helper function to clear all markers
    function clearAllMarkers() {
        markers_weather.clearLayers();
        markers_radar.clearLayers();
        markers_atmasfera.clearLayers();
        markers_awd.clearLayers();
        markers_agro.clearLayers();
        markers_mini.clearLayers();
        markers_radiatsiya.clearLayers();
        markers_forecast.clearLayers();
        markers_snow.clearLayers();
        markers_aero.clearLayers();
        markers_dangerzones.clearLayers();
        markers_microstep.clearLayers();
        markers_watercadastr.clearLayers();
        markers_irrigation.clearLayers();
        marker_waterconsuption.clearLayers();
        marker_waterlevel.clearLayers();
        marker_audtohydropost.clearLayers();
        marker_comfort_zones.clearLayers();
        markers_organization_stations.clearLayers();
        markers_atmosphere_tashkent.clearLayers();
        // Удалить heatmap layer
        if (heatmapLayer) {
            map.removeLayer(heatmapLayer);
            heatmapLayer = null;
        }
        autoStationsData = []; // Очистить данные для интерполяции
        // Удалить PM2.5 interpolatsiya layer
        if (pm25InterpolationLayer) {
            map.removeLayer(pm25InterpolationLayer);
            pm25InterpolationLayer = null;
        }
        showInterpolation = false;
        // PM2.5 hover tooltip'ni yashirish
        if (typeof hidePM25Tooltip === 'function') {
            hidePM25Tooltip();
        }
        // PM2.5 stansiyalar ma'lumotlarini tozalash
        pm25StationsData = [];
    }

    /**
     * IDW (Inverse Distance Weighting) interpolatsiya funksiyasi
     * PM2.5 qiymatlarini respublika bo'ylab interpolatsiya qiladi
     */
    function idwInterpolation(stations, bounds, gridSize, power, maxDistance) {
        power = power || 2;
        maxDistance = maxDistance || 500;
        gridSize = gridSize || 50;

        var gridPoints = [];
        var sw = bounds.getSouthWest();
        var ne = bounds.getNorthEast();

        var latStep = (ne.lat - sw.lat) / gridSize;
        var lonStep = (ne.lng - sw.lng) / gridSize;

        for (var i = 0; i <= gridSize; i++) {
            for (var j = 0; j <= gridSize; j++) {
                var lat = sw.lat + (i * latStep);
                var lon = sw.lng + (j * lonStep);

                var numerator = 0;
                var denominator = 0;

                for (var k = 0; k < stations.length; k++) {
                    var station = stations[k];
                    // Ikkala formatni ham qo'llab-quvvatlash (lat/lon yoki latitude/longitude)
                    var stationLat = parseFloat(station.latitude || station.lat);
                    var stationLon = parseFloat(station.longitude || station.lon);
                    var stationPm25 = parseFloat(station.pm25);

                    // NaN tekshiruvi
                    if (isNaN(stationLat) || isNaN(stationLon) || isNaN(stationPm25)) {
                        console.warn('Invalid station data:', station);
                        continue;
                    }

                    var distance = L.latLng(lat, lon).distanceTo(L.latLng(stationLat, stationLon)) / 1000;

                    if (distance < 0.1) {
                        numerator = stationPm25;
                        denominator = 1;
                        break;
                    }

                    if (distance <= maxDistance) {
                        var weight = 1 / Math.pow(distance, power);
                        numerator += weight * stationPm25;
                        denominator += weight;
                    }
                }

                if (denominator > 0) {
                    var interpolatedValue = numerator / denominator;
                    var color = getPM25Color(interpolatedValue);

                    gridPoints.push({
                        lat: lat,
                        lon: lon,
                        pm25: interpolatedValue,
                        color: color
                    });
                }
            }
        }

        return gridPoints;
    }

    /**
     * PM2.5 qiymatiga asoslangan silliq gradient rang olish funksiyasi
     * 5 ta anchor color stop orasida linear interpolation qiladi
     *
     * @param {number} pm25 - PM2.5 qiymati (µg/m³)
     * @returns {string} - Hex rang (#rrggbb formatida)
     */
    function getPM25Color(pm25) {
        // PM2.5 qiymatini tozalash va cheklash
        pm25 = Math.max(0, Math.min(300, pm25 || 0));

        // Anchor color stops (PM2.5 qiymati → rang)
        var colorStops = [
            { value: 0, color: '#00e400' },      // Yashil - juda yaxshi
            { value: 60, color: '#ffff00' },     // Sariq - qabul qilinadi
            { value: 120, color: '#ff7e00' },    // To'q sariq - noto'g'ri
            { value: 180, color: '#ff0000' },    // Qizil - xavfli
            { value: 300, color: '#8f3f97' }     // Binafsha - juda xavfli
        ];

        // Agar Chroma.js mavjud bo'lsa, undan foydalanish
        if (typeof chroma !== 'undefined' && chroma.scale) {
            try {
                // Chroma.js scale yaratish - anchor ranglar orasida silliq o'tish
                var scale = chroma.scale([
                    colorStops[0].color,  // 0
                    colorStops[1].color,  // 60
                    colorStops[2].color,  // 120
                    colorStops[3].color,  // 180
                    colorStops[4].color   // 300
                ])
                .domain([0, 60, 120, 180, 300])  // Domain - PM2.5 qiymatlari
                .mode('rgb');  // RGB color space - silliq o'tish uchun

                return scale(pm25).hex();
            } catch (e) {
                console.warn('Chroma.js interpolation xatolik:', e);
                // Xatolik bo'lsa, fallback ishlatish
                return getPM25ColorFallback(pm25, colorStops);
            }
        } else {
            // Agar Chroma.js mavjud bo'lmasa, custom linear interpolation
            return getPM25ColorFallback(pm25, colorStops);
        }
    }

    /**
     * Custom linear interpolation funksiyasi (Chroma.js mavjud bo'lmaganda)
     * Ikki rang orasida linear interpolation qiladi
     *
     * @param {number} pm25 - PM2.5 qiymati
     * @param {Array} colorStops - Anchor color stops
     * @returns {string} - Hex rang
     */
    function getPM25ColorFallback(pm25, colorStops) {
        // Qaysi ikkita anchor orasida ekanligini topish
        var lowerStop = colorStops[0];
        var upperStop = colorStops[colorStops.length - 1];

        for (var i = 0; i < colorStops.length - 1; i++) {
            if (pm25 >= colorStops[i].value && pm25 <= colorStops[i + 1].value) {
                lowerStop = colorStops[i];
                upperStop = colorStops[i + 1];
                break;
            }
        }

        // Agar eng yuqori chegaradan oshib ketsa
        if (pm25 > colorStops[colorStops.length - 1].value) {
            return colorStops[colorStops.length - 1].color;
        }

        // Agar eng past chegaradan past bo'lsa
        if (pm25 < colorStops[0].value) {
            return colorStops[0].color;
        }

        // Ikki rang orasidagi masofani hisoblash
        var range = upperStop.value - lowerStop.value;
        var position = (pm25 - lowerStop.value) / range; // 0 dan 1 gacha

        // Linear interpolation qilish
        var lowerRgb = hexToRgb(lowerStop.color);
        var upperRgb = hexToRgb(upperStop.color);

        var r = Math.round(lowerRgb.r + (upperRgb.r - lowerRgb.r) * position);
        var g = Math.round(lowerRgb.g + (upperRgb.g - lowerRgb.g) * position);
        var b = Math.round(lowerRgb.b + (upperRgb.b - lowerRgb.b) * position);

        // RGB ni hex ga o'tkazish
        return rgbToHex(r, g, b);
    }

    /**
     * RGB qiymatlarini hex formatiga o'tkazish
     *
     * @param {number} r - Red (0-255)
     * @param {number} g - Green (0-255)
     * @param {number} b - Blue (0-255)
     * @returns {string} - Hex rang (#rrggbb)
     */
    function rgbToHex(r, g, b) {
        return '#' + [r, g, b].map(function(x) {
            var hex = Math.round(x).toString(16);
            return hex.length === 1 ? '0' + hex : hex;
        }).join('');
    }

    function hexToRgb(hex) {
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : {r: 0, g: 255, b: 0};
    }

    /**
     * Real-time IDW hisoblash funksiyasi
     * Berilgan koordinata uchun PM2.5 qiymatini hisoblaydi
     *
     * @param {number} lat - Latitude
     * @param {number} lng - Longitude
     * @param {Array} stations - PM2.5 stansiyalar ma'lumotlari
     * @param {number} power - IDW power parametri (default: 2)
     * @param {number} maxDistance - Maksimal masofa (km, default: 500)
     * @returns {number|null} - PM2.5 qiymati yoki null
     */
    function calculateIDWValue(lat, lng, stations, power, maxDistance) {
        power = power || 2;
        maxDistance = maxDistance || 500;

        if (!stations || stations.length === 0) {
            return null;
        }

        var numerator = 0;
        var denominator = 0;

        for (var i = 0; i < stations.length; i++) {
            var station = stations[i];
            var stationLat = parseFloat(station.latitude);
            var stationLng = parseFloat(station.longitude);
            var stationPm25 = parseFloat(station.pm25);

            // Masofani hisoblash (km)
            var distance = L.latLng(lat, lng).distanceTo(L.latLng(stationLat, stationLng)) / 1000;

            // Agar juda yaqin bo'lsa, to'g'ridan-to'g'ri qiymatni qaytarish
            if (distance < 0.1) {
                return stationPm25;
            }

            // Agar maksimal masofadan kichik bo'lsa, IDW hisoblash
            if (distance <= maxDistance) {
                var weight = 1 / Math.pow(distance, power);
                numerator += weight * stationPm25;
                denominator += weight;
            }
        }

        // Agar denominator 0 bo'lsa, null qaytarish
        if (denominator > 0) {
            return numerator / denominator;
        }

        return null;
    }

    /**
     * Nuqta O'zbekiston polygon ichida ekanligini tekshirish
     *
     * @param {number} lat - Latitude
     * @param {number} lng - Longitude
     * @returns {boolean} - true agar polygon ichida bo'lsa
     */
    function isPointInUzbekistan(lat, lng) {
        if (!uzbekistanBoundary) {
            return false;
        }

        // Turf.js ishlatish
        if (typeof turf !== 'undefined' && turf.booleanPointInPolygon) {
            var pt = turf.point([lng, lat]);

            // FeatureCollection uchun
            if (uzbekistanBoundary.type === 'FeatureCollection' && uzbekistanBoundary.features) {
                for (var f = 0; f < uzbekistanBoundary.features.length; f++) {
                    var feature = uzbekistanBoundary.features[f];
                    if (turf.booleanPointInPolygon(pt, feature)) {
                        return true;
                    }
                }
                return false;
            }
            // Feature uchun
            else if (uzbekistanBoundary.type === 'Feature' && uzbekistanBoundary.geometry) {
                if (uzbekistanBoundary.geometry.type === 'Polygon') {
                    return turf.booleanPointInPolygon(pt, uzbekistanBoundary);
                } else if (uzbekistanBoundary.geometry.type === 'MultiPolygon') {
                    for (var i = 0; i < uzbekistanBoundary.geometry.coordinates.length; i++) {
                        var polygon = {
                            type: 'Feature',
                            geometry: {
                                type: 'Polygon',
                                coordinates: uzbekistanBoundary.geometry.coordinates[i]
                            }
                        };
                        if (turf.booleanPointInPolygon(pt, polygon)) {
                            return true;
                        }
                    }
                    return false;
                }
            }
        }

        return false;
    }

    /**
     * PM2.5 tooltip'ni ko'rsatish yoki yashirish
     *
     * @param {number} lat - Latitude
     * @param {number} lng - Longitude
     * @param {number} pm25 - PM2.5 qiymati
     */
    function showPM25Tooltip(lat, lng, pm25) {
        if (pm25 === null || isNaN(pm25)) {
            hidePM25Tooltip();
            return;
        }

        // PM2.5 qiymatini formatlash (1 xona kasr bilan)
        var pm25Formatted = pm25.toFixed(1);

        // Rang olish
        var color = getPM25Color(pm25);
        var rgb = hexToRgb(color);

        // Tooltip HTML yaratish - kichikroq va chiroyli
        var tooltipHtml = '<div style="' +
            'background: rgba(' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ', 0.92); ' +
            'color: ' + (pm25 > 120 ? '#fff' : '#000') + '; ' +
            'padding: 4px 8px; ' +
            'border-radius: 4px; ' +
            'font-size: 11px; ' +
            'font-weight: 600; ' +
            'box-shadow: 0 1px 4px rgba(0,0,0,0.25); ' +
            'border: 1px solid rgba(255,255,255,0.6); ' +
            'white-space: nowrap; ' +
            'pointer-events: none; ' +
            'line-height: 1.2; ' +
            'min-width: auto; ' +
            'max-width: none;' +
            '">' +
            'PM<sub style="font-size: 9px;">2.5</sub>: ' + pm25Formatted + ' µg/m³' +
            '</div>';

        // Agar tooltip mavjud bo'lmasa, yaratish
        if (!pm25Tooltip) {
            pm25Tooltip = L.popup({
                closeButton: false,
                className: 'pm25-tooltip-popup',
                offset: [0, -8],
                autoPan: false,
                maxWidth: 150
            });
        }

        // Tooltip'ni yangilash
        pm25Tooltip
            .setLatLng([lat, lng])
            .setContent(tooltipHtml);

        // Agar map'ga qo'shilmagan bo'lsa, qo'shish
        if (!pm25Tooltip._map) {
            pm25Tooltip.openOn(map);
        }
    }

    /**
     * PM2.5 tooltip'ni yashirish
     */
    function hidePM25Tooltip() {
        if (pm25Tooltip) {
            map.closePopup(pm25Tooltip);
        }
    }

    /**
     * Map'ga mousemove event qo'shish (PM2.5 hover uchun)
     */
    function setupPM25Hover() {
        // Throttled mousemove handler
        var handleMouseMove = throttle(function(e) {
            // Faqat interpolatsiya ko'rsatilganda ishlatish
            if (!showInterpolation || pm25StationsData.length === 0) {
                hidePM25Tooltip();
                return;
            }

            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            // O'zbekiston polygon ichida ekanligini tekshirish
            if (!isPointInUzbekistan(lat, lng)) {
                hidePM25Tooltip();
                return;
            }

            // IDW bilan PM2.5 qiymatini hisoblash
            var pm25 = calculateIDWValue(lat, lng, pm25StationsData, 2, 500);

            // Tooltip ko'rsatish
            if (pm25 !== null && !isNaN(pm25)) {
                showPM25Tooltip(lat, lng, pm25);
            } else {
                hidePM25Tooltip();
            }
        }, 50); // 50ms throttling - juda tez-tez hisob bo'lmasligi uchun

        // Map'ga mousemove event qo'shish
        map.on('mousemove', handleMouseMove);

        // Map'dan chiqib ketganda tooltip'ni yashirish
        map.on('mouseout', function() {
            hidePM25Tooltip();
        });

        // console.log('PM2.5 hover event qo\'shildi');
    }

    function createInterpolationCanvasLayer(gridPoints, bounds) {
        // console.log('Creating canvas layer with', gridPoints.length, 'grid points');
        // console.log('Bounds:', bounds);

        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        var width = 1200; // Kattalashtirildi
        var height = 1000; // Kattalashtirildi

        canvas.width = width;
        canvas.height = height;

        var sw = bounds.getSouthWest();
        var ne = bounds.getNorthEast();
        var latRange = ne.lat - sw.lat;
        var lonRange = ne.lng - sw.lng;

        // console.log('SW:', sw, 'NE:', ne);
        // console.log('Lat range:', latRange, 'Lon range:', lonRange);

        // Canvas'ni tozalash
        ctx.clearRect(0, 0, width, height);

        var pointsDrawn = 0;
        var radius = 6; // Har bir nuqta uchun radius (pixel) - kattalashtirildi

        // Har bir grid nuqtasini chizish - gradient fill bilan
        for (var i = 0; i < gridPoints.length; i++) {
            var point = gridPoints[i];
            var x = Math.floor(((point.lon - sw.lng) / lonRange) * width);
            var y = Math.floor(((ne.lat - point.lat) / latRange) * height);

            if (x >= 0 && x < width && y >= 0 && y < height) {
                var rgb = hexToRgb(point.color);

                // Gradient yaratish
                var gradient = ctx.createRadialGradient(x, y, 0, x, y, radius);
                gradient.addColorStop(0, 'rgba(' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ', 0.95)');
                gradient.addColorStop(0.5, 'rgba(' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ', 0.8)');
                gradient.addColorStop(1, 'rgba(' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ', 0.4)');

                // Nuqta chizish (circle with gradient)
                ctx.beginPath();
                ctx.arc(x, y, radius, 0, 2 * Math.PI);
                ctx.fillStyle = gradient;
                ctx.fill();

                pointsDrawn++;
            }
        }

        // console.log('Points drawn on canvas:', pointsDrawn, 'out of', gridPoints.length);

        // Canvas'ni data URL'ga o'tkazish
        var dataUrl = canvas.toDataURL('image/png');
        // console.log('Canvas data URL created, length:', dataUrl.length);

        var imageBounds = [[sw.lat, sw.lng], [ne.lat, ne.lng]];
        // console.log('Image bounds:', imageBounds);

        var imageOverlay = L.imageOverlay(dataUrl, imageBounds, {
            opacity: 0.85,
            interactive: false,
            zIndex: 100
        });

        // Loader: wait until image overlay is actually ready
        // (even for dataURL, decode/paint can be async)
        try {
            imageOverlay.once('load', function () {
                if (typeof setInterpolationLoading === 'function') {
                    setInterpolationLoading(false);
                }
            });
        } catch (e) {
            // ignore
        }

        // console.log('Image overlay created:', imageOverlay);

        return imageOverlay;
    }

    function createPM25InterpolationMap(stations) {
        // console.log('createPM25InterpolationMap called with', stations.length, 'stations');

        if (pm25InterpolationLayer) {
            map.removeLayer(pm25InterpolationLayer);
            pm25InterpolationLayer = null;
        }

        if (!stations || stations.length === 0) {
            console.log('PM2.5 stansiyalar ma\'lumotlari topilmadi');
            return;
        }

        // PM2.5 stansiyalar ma'lumotlarini global o'zgaruvchiga saqlash (hover uchun)
        pm25StationsData = stations.map(function(s) {
            var lat = parseFloat(s.latitude);
            var lon = parseFloat(s.longitude);
            var pm25 = parseFloat(s.pm25);

            // NaN tekshiruvi
            if (isNaN(lat) || isNaN(lon) || isNaN(pm25)) {
                console.warn('Invalid station data (hover):', s);
                return null;
            }

            return {
                latitude: lat,
                longitude: lon,
                pm25: pm25
            };
        }).filter(function(s) {
            return s !== null;
        });

        // console.log('PM2.5 stansiyalar ma\'lumotlari saqlandi (hover uchun):', pm25StationsData.length);

        // Stansiyalar ma'lumotlarini formatlash
        var formattedStations = stations.map(function(s) {
            var lat = parseFloat(s.latitude);
            var lon = parseFloat(s.longitude);
            var pm25 = parseFloat(s.pm25);

            // NaN tekshiruvi
            if (isNaN(lat) || isNaN(lon) || isNaN(pm25)) {
                console.warn('Invalid station data (interpolation):', s);
                return null;
            }

            return {
                lat: lat,
                lon: lon,
                pm25: pm25
            };
        }).filter(function(s) {
            return s !== null;
        });

        // console.log('Formatted stations:', formattedStations);

        // Agar barcha stansiyalar noto'g'ri bo'lsa, chiqish
        if (formattedStations.length === 0) {
            console.error('Barcha stansiyalar noto\'g\'ri ma\'lumotlarga ega!');
            return;
        }

        // O'zbekiston chegarasini tuman.geojson dan yuklash
        function processInterpolation(formattedStations) {
            // O'zbekiston GeoJSON polygon bounding box'ini olish
            var bounds = null;

            if (uzbekistanBoundary && typeof turf !== 'undefined' && turf.bbox) {
                // Turf.js bbox funksiyasidan foydalanish
                try {
                    var bbox = turf.bbox(uzbekistanBoundary);
                    // bbox format: [minLng, minLat, maxLng, maxLat]
                    bounds = L.latLngBounds(
                        [bbox[1], bbox[0]], // SW: [minLat, minLng]
                        [bbox[3], bbox[2]]  // NE: [maxLat, maxLng]
                    );
                    // console.log('O\'zbekiston polygon bounding box olingan:', bounds);
                } catch (e) {
                    console.warn('Turf.js bbox xatolik:', e);
                    // Fallback: stansiyalar bounding box'i
                    var latlngs = formattedStations.map(function(s) {
                        return [s.lat, s.lon];
                    });
                    bounds = L.latLngBounds(latlngs);
                    bounds = bounds.pad(0.3);
                    // console.log('Fallback: Stansiyalar bounding box ishlatilmoqda');
                }
            } else {
                // Agar Turf.js mavjud bo'lmasa, stansiyalar bounding box'i
                var latlngs = formattedStations.map(function(s) {
                    return [s.lat, s.lon];
                });
                bounds = L.latLngBounds(latlngs);
                bounds = bounds.pad(0.3);
                console.log('Turf.js mavjud emas, stansiyalar bounding box ishlatilmoqda');
            }

            // Bounds yaratishdan oldin tekshirish
            if (!bounds || !bounds.isValid()) {
                console.error('Invalid bounds!', bounds);
                return;
            }

            // Bounds'ni biroz kengaytirish (pixel perfect uchun)
            bounds = bounds.pad(0.05);

            // console.log('Final bounds for interpolation:', bounds);
            // console.log('Bounds SW:', bounds.getSouthWest());
            // console.log('Bounds NE:', bounds.getNorthEast());

            // Grid yaratish - O'zbekiston polygon bounding box'i bo'yicha
            var gridPoints = idwInterpolation(formattedStations, bounds, 120, 2, 500);
            // console.log('Grid points created:', gridPoints.length);

            if (gridPoints.length === 0) {
                console.error('Grid points bo\'sh!');
                return;
            }

            // Faqat O'zbekiston chegarasi ichidagi nuqtalarni qoldirish
            var filteredGridPoints = [];

            if (uzbekistanBoundary && typeof turf !== 'undefined' && turf.booleanPointInPolygon) {
                // console.log('Turf.js bilan chegarani tekshirish...');
                // console.log('Jami grid nuqtalar:', gridPoints.length);

                filteredGridPoints = gridPoints.filter(function(point) {
                    var pt = turf.point([point.lon, point.lat]);

                    // FeatureCollection uchun har bir feature ni tekshirish
                    if (uzbekistanBoundary.type === 'FeatureCollection' && uzbekistanBoundary.features) {
                        for (var f = 0; f < uzbekistanBoundary.features.length; f++) {
                            var feature = uzbekistanBoundary.features[f];
                            if (feature.geometry) {
                                if (feature.geometry.type === 'Polygon') {
                                    if (turf.booleanPointInPolygon(pt, feature)) {
                                        return true;
                                    }
                                } else if (feature.geometry.type === 'MultiPolygon') {
                                    for (var i = 0; i < feature.geometry.coordinates.length; i++) {
                                        var polygon = {
                                            type: 'Feature',
                                            geometry: {
                                                type: 'Polygon',
                                                coordinates: feature.geometry.coordinates[i]
                                            }
                                        };
                                        if (turf.booleanPointInPolygon(pt, polygon)) {
                                            return true;
                                        }
                                    }
                                }
                            }
                        }
                        return false;
                    }
                    // Feature uchun
                    else if (uzbekistanBoundary.type === 'Feature' && uzbekistanBoundary.geometry) {
                        if (uzbekistanBoundary.geometry.type === 'Polygon') {
                            return turf.booleanPointInPolygon(pt, uzbekistanBoundary);
                        } else if (uzbekistanBoundary.geometry.type === 'MultiPolygon') {
                            for (var i = 0; i < uzbekistanBoundary.geometry.coordinates.length; i++) {
                                var polygon = {
                                    type: 'Feature',
                                    geometry: {
                                        type: 'Polygon',
                                        coordinates: uzbekistanBoundary.geometry.coordinates[i]
                                    }
                                };
                                if (turf.booleanPointInPolygon(pt, polygon)) {
                                    return true;
                                }
                            }
                            return false;
                        }
                    }
                    return false;
                });
            } else {
                // Agar Turf.js mavjud bo'lmasa yoki chegaralar yuklanmagan bo'lsa, bounds tekshiruvi
                console.log('Turf.js mavjud emas yoki chegaralar yuklanmagan, bounds tekshiruvi ishlatilmoqda');
                filteredGridPoints = gridPoints.filter(function(point) {
                    return bounds.contains([point.lat, point.lon]);
                });
            }

            // console.log('Filtered grid points (inside Uzbekistan):', filteredGridPoints.length, 'out of', gridPoints.length);

            if (filteredGridPoints.length === 0) {
                console.error('Chegaralar ichida nuqta topilmadi!');
                return;
            }

            pm25InterpolationLayer = createInterpolationCanvasLayer(filteredGridPoints, bounds);

            // console.log('PM25 interpolation layer created:', pm25InterpolationLayer);

            if (showInterpolation) {
                // console.log('Adding interpolation layer to map');
                map.addLayer(pm25InterpolationLayer);
                // console.log('Interpolation layer added to map');

                // Hover event'ni setup qilish
                setupPM25Hover();
            } else {
                console.log('showInterpolation is false, layer not added');
            }

            // console.log('PM2.5 interpolatsiya xaritasi yaratildi:', filteredGridPoints.length, 'nuqta');
        }

        // Agar uzbekistanBoundary mavjud bo'lmasa, yuklash
        if (!uzbekistanBoundary) {
            // console.log('Yuklanmoqda tuman.geojson...');
            fetch('{{asset('asset/geojson/tuman.geojson')}}')
                .then(function(response) {
                    return response.json();
                })
                .then(function(geojsonData) {
                    // console.log('tuman.geojson yuklandi');

                    // Barcha tumanlarni birlashtirish - O'zbekiston chegarasini yaratish
                    if (geojsonData.type === 'FeatureCollection' && geojsonData.features && geojsonData.features.length > 0) {
                        // Turf.js union yordamida barcha tumanlarni birlashtirish
                        if (typeof turf !== 'undefined' && turf.union) {
                            // console.log('Turf.js union ishlatilmoqda...');
                            var mergedPolygon = geojsonData.features[0];

                            for (var i = 1; i < geojsonData.features.length; i++) {
                                try {
                                    mergedPolygon = turf.union(mergedPolygon, geojsonData.features[i]);
                                } catch (e) {
                                    console.warn('Union xatolik (feature ' + i + '):', e);
                                }
                            }

                            uzbekistanBoundary = mergedPolygon;
                            // console.log('O\'zbekiston chegarasi yaratildi (union)');
                        } else {
                            // Agar union mavjud bo'lmasa, barcha feature'larni saqlash
                            console.log('Union mavjud emas, barcha feature\'lar saqlanmoqda...');
                            uzbekistanBoundary = geojsonData;
                        }
                    } else if (geojsonData.type === 'Feature') {
                        uzbekistanBoundary = geojsonData;
                    } else {
                        console.warn('Noma\'lum GeoJSON format');
                        uzbekistanBoundary = null;
                    }

                    // Endi interpolatsiyani yaratish
                    processInterpolation(formattedStations);
                })
                .catch(function(error) {
                    console.error('tuman.geojson yuklashda xatolik:', error);
                    // Xatolik bo'lsa, oddiy bounds ishlatish
                    processInterpolation(formattedStations);
                });
        } else {
            // Agar allaqachon yuklangan bo'lsa, to'g'ridan-to'g'ri interpolatsiya qilish
            processInterpolation(formattedStations);
        }
    }

    // Menu configuration mapping
    const menuConfig = {
        'fakt': { method: 'current', flags: { currentTemp: true } },
        'atmosphere': { method: 'getAtmasfera', flags: { atmTemp: true } },
        'locator': { method: 'getRadars', flags: { radar: true } },
        'snow': { method: 'getSnow', flags: { snow: true } },
        'awd': { method: 'getawd', flags: { awd: true } },
        'aero': { method: 'getAeroport', flags: { aero: true } },
        'forecast': { method: 'getForecast', flags: { forcastTemp: true } },
        'meteo_agro': { method: 'getAgro', flags: { agro: true } },
        'mini': { method: 'GetMini', flags: { mini: true } },
        'radiatsiya': { method: 'getRadiotion', flags: { radiatsiya: true } },
        'meteo_irrigation': { method: 'getIrrigation', flags: { irrigation: true } },
        'water_cadastr': { method: 'getWaterCadastr', flags: { water_cadastr: true } },
        'water_consumption': { method: 'getWaterConsuption', flags: { water_consumption: true } },
        'water_level': { method: 'getWaterLevel', flags: { water_level: true } },
        'water_autohyrostation': { method: 'getAutoHydroStations', flags: { water_autohyrostation: true } },
        'comfort_zones': { method: 'ComfortZones', flags: { comfort_zones: true } },
        'organization_stations': { method: 'getOrganizationStations', flags: { organization_stations: true } },
        'atmosphere_tashkent': { method: 'getAtmosphereTashkent', flags: { atmosphere_tashkent: true } }
    };

    // Danger zones menu values
    const dangerZonesMenus = [
        'AtmZasuha', 'dojd_30mm_12ches', 'dojd_polusutkas', 'osen_zam_pochvas',
        'osen_zam_vozds', 'sneg20mm12ches', 'sneg_polusutkas', 't40_s',
        'ves_zampochvas', 'ves_zam_vozduhs', 'veter_razl_predelov2020s', 'veter15s'
    ];

    let app = new Vue({
        el: "#app",
        data: {
            forcastTemp: true,
            currentTemp: false,
            atmTemp: false,
            markers: [],
            radars:@json($radars),
            radar: false,
            atmasfera_data: '',
            snow: false,
            awd: false,
            agro: false,
            mini: false,
            water_cadastr: false,
            radiatsiya: false,
            irrigation: false,
            comfort_zones: false,
            organization_stations: false,
            atmosphere_tashkent: false,
            showAutoStations: true,
            showOtherStations: false,
            showInterpolation: false, // PM2.5 interpolatsiya ko'rsatish flag'i
            isInterpolationLoading: false, // Loader while interpolation is being built
            awds:@json($stations),
            ChineStation:@json($chinesstations),
            microstep:@json($microstations),
            hydrometStations:@json($hydrometstation),
            menu: 'forecast',
            aero: false,
            dangerzones: false,
            meteobots:@json($meteobots),
            aeroports: [
                {
                    code: 'AZN',
                    name: 'Андижан',
                    lat: '40.7258',
                    lon: '72.2939',
                    region_id: 1703
                },
                {
                    code: 'BHK',
                    name: 'Бухара',
                    lat: '39.773',
                    lon: '64.497',
                    region_id: 1706
                },
                {
                    code: 'FEG',
                    name: 'Фергана',
                    lat: '40.3568',
                    lon: '71.7587',
                    region_id: 1730
                },
                {
                    code: 'KSQ',
                    name: 'Карши / Карши-Ханабад',
                    lat: '38.8315',
                    lon: '65.9214',
                    region_id: 1710
                },
                {
                    code: 'NMA',
                    name: 'Наманган',
                    lat: '40.9825',
                    lon: '71.5567',
                    region_id: 1714
                },
                {
                    code: 'NVI',
                    name: 'Навои',
                    lat: '40.1157',
                    lon: '65.1888',
                    region_id: 1712
                },
                {
                    code: 'NCU',
                    name: 'Нукус',
                    lat: '42.4864',
                    lon: '59.6368',
                    region_id: 1735
                },
                {
                    code: 'SKD',
                    name: 'Самарканд',
                    lat: '39.6985',
                    lon: '66.9976',
                    region_id: 1718
                },
                {
                    code: 'TAS',
                    name: 'Ташкент-Южный',
                    lat: '41.2558',
                    lon: '69.2948',
                    region_id: 1726

                },
                {
                    code: 'TMJ',
                    name: 'Термез',
                    lat: '37.2845',
                    lon: '67.3237',
                    region_id: 1722

                },
                {
                    code: 'UGC',
                    name: 'Ургенч',
                    lat: '41.5822',
                    lon: '60.6554',
                    region_id: 1733

                },
            ],
            years_r: null,
            year_r: 2020,
            radiation_data: null,
            stationIdr: null,
            irrigation_data: null,

            water_consumption: false,
            water_level: false,
            water_autohyrostation: false,
            regions: [],
            regionid: 1700,
        },
        methods: {
            InitialMap: function () {
                try {
                    // console.log('InitialMap called');
                // ============
                // Esri-Leaflet
                // ============

                    // Check if map element exists
                    var mapElement = document.getElementById('map');
                    if (!mapElement) {
                        console.error('Map element with id "map" not found!');
                        return;
                    }
                    // console.log('Map element found:', mapElement);

                    // Check if Leaflet is loaded
                    if (typeof L === 'undefined') {
                        console.error('Leaflet (L) is not defined!');
                        return;
                    }
                    // console.log('Leaflet loaded:', typeof L);

                    // Check if Esri Leaflet is loaded
                    if (typeof L.esri === 'undefined') {
                        console.error('Esri Leaflet is not defined!');
                        return;
                    }
                    // console.log('Esri Leaflet loaded:', typeof L.esri);

                    map = L.map('map', {zoomControl: false}).setView([41.315514, 69.246097], 6);
                    // console.log('Map created:', map);

                    layer = L.esri.basemapLayer('NationalGeographic').addTo(map);
                    // console.log('Layer added:', layer);

                    // layerLabels = L.esri.basemapLayer('xxxLabels').addTo(map);
                    layerLabels = null;
                    worldTransportation = L.esri.basemapLayer('ImageryTransportation');
                    // console.log('InitialMap completed successfully');

                    // Force map to resize and invalidate size
                    setTimeout(function() {
                        if (map) {
                            map.invalidateSize();
                            // console.log('Map invalidateSize called');
                        }
                    }, 100);

                // Create Air Quality Legend Control - Horizontal layout at bottom
                // Legend will be created after map is fully initialized
                setTimeout(function() {
                    try {
                        if (typeof L !== 'undefined' && L.Control) {
                            var AirQualityLegend = L.Control.extend({
                                onAdd: function(map) {
                                    var div = L.DomUtil.create('div', 'air-quality-legend-control');
                                    // Legend items: full background color + readable text (contrast)
                                    div.innerHTML = '<div class="air-quality-legend-header" style="font-size: 11px; margin-bottom: 6px; padding-bottom: 5px;">PM2.5 (µg/m³)</div>' +
                                        '<div class="air-quality-legend-items-horizontal" style="gap: 6px;">' +
                                        '<div class="air-quality-legend-item-horizontal" style="padding: 4px 10px; gap: 6px; background-color:#00e400; border-color: rgba(255,255,255,0.55);">' +
                                        '<div class="air-quality-legend-text" style="font-size: 9px; color:#0b1a0b; font-weight:700;">0–60</div>' +
                                        '</div>' +
                                        '<div class="air-quality-legend-item-horizontal" style="padding: 4px 10px; gap: 6px; background-color:#ffff00; border-color: rgba(255,255,255,0.55);">' +
                                        '<div class="air-quality-legend-text" style="font-size: 9px; color:#1a1a00; font-weight:700;">60.1–120</div>' +
                                        '</div>' +
                                        '<div class="air-quality-legend-item-horizontal" style="padding: 4px 10px; gap: 6px; background-color:#ff7e00; border-color: rgba(255,255,255,0.55);">' +
                                        '<div class="air-quality-legend-text" style="font-size: 9px; color:#1a0f00; font-weight:700;">120.1–180</div>' +
                                        '</div>' +
                                        '<div class="air-quality-legend-item-horizontal" style="padding: 4px 10px; gap: 6px; background-color:#ff0000; border-color: rgba(255,255,255,0.45);">' +
                                        '<div class="air-quality-legend-text" style="font-size: 9px; color:#ffffff; font-weight:700; text-shadow:0 1px 2px rgba(0,0,0,0.35);">180.1–300</div>' +
                                        '</div>' +
                                        '<div class="air-quality-legend-item-horizontal" style="padding: 4px 10px; gap: 6px; background-color:#8f3f97; border-color: rgba(255,255,255,0.45);">' +
                                        '<div class="air-quality-legend-text" style="font-size: 9px; color:#ffffff; font-weight:700; text-shadow:0 1px 2px rgba(0,0,0,0.35);">300.1+</div>' +
                                        '</div>' +
                                        '</div>';
                                    div.style.display = 'none';
                                    div.style.padding = '8px 12px';
                                    div.style.fontSize = '10px';
                                    return div;
                                }
                            });
                            airQualityLegend = new AirQualityLegend({position: 'bottomleft'});
                        }
                    } catch (e) {
                        console.error('Error creating AirQualityLegend:', e);
                        airQualityLegend = null;
                    }
                }, 100);

                function setBasemap(basemap) {
                    if (layer) {
                        map.removeLayer(layer);
                    }
                    if (basemap === 'OpenStreetMap') {
                        layer = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png");
                    } else {
                        layer = L.esri.basemapLayer(basemap);
                    }
                    map.addLayer(layer);
                    if (layerLabels) {
                        map.removeLayer(layerLabels);
                    }

                    if (basemap === 'ShadedRelief' || basemap === 'Oceans' || basemap === 'Gray' || basemap === 'DarkGray' || basemap === 'Imagery' || basemap === 'Terrain') {
                        layerLabels = L.esri.basemapLayer(basemap + 'Labels');
                        map.addLayer(layerLabels);
                    }

                    // add world transportation service to Imagery basemap
                    if (basemap === 'Imagery') {
                        worldTransportation.addTo(map);
                    } else if (map.hasLayer(worldTransportation)) {
                        // remove world transportation if Imagery basemap is not selected
                        map.removeLayer(worldTransportation);
                    }
                }

                L.control.zoom({
                    position: 'topright'
                }).addTo(map);

                //var searchControl = L.esri.Geocoding.Controls.geosearch({expanded: true, collapseAfterResult: false, zoomToResult: false}).addTo(map);
                var searchControl = L.esri.Geocoding.geosearch({
                    expanded: true,
                    collapseAfterResult: false,
                    zoomToResult: false
                }).addTo(map);

                searchControl.on('results', function (data) {
                    if (data.results.length > 0) {
                        var popup = L.popup()
                            .setLatLng(data.results[0].latlng)
                            .setContent(data.results[0].text)
                            .openOn(map);
                        map.setView(data.results[0].latlng)
                    }
                })


                L.TopoJSON = L.GeoJSON.extend({
                    addData: function (data) {
                        var geojson, key;
                        if (data.type === "Topology") {
                            for (key in data.objects) {
                                if (data.objects.hasOwnProperty(key)) {
                                    geojson = topojson.feature(data, data.objects[key]);
                                    L.GeoJSON.prototype.addData.call(this, geojson);
                                }
                            }
                            return this;
                        }
                        L.GeoJSON.prototype.addData.call(this, data);
                        return this;
                    }
                });
                L.topoJson = function (data, options) {
                    return new L.TopoJSON(data, options);
                };
                //create an empty geojson layer
                //with a style and a popup on click
                var geojson = L.topoJson(null, {
                    style: function (feature) {
                        return {
                            fillOpacity: 0.0,
                            weight: 0.7,
                            color: 'white',
                            stroke: true,

                        }
                    },
                    onEachFeature: function (feature, layer) {
                        layer.bindPopup('<p>' + feature.properties.tuman_nomi + '</p>')
                    }
                }).addTo(map);


                //fill: #317581;
                //define a function to get and parse geojson from URL
                async function getGeoData(url) {
                    let response = await fetch(url);
                    let data = await response.json();
                    return data;
                }


                //fetch the geojson and add it to our geojson layer
                getGeoData('{{asset('asset/geojson/tuman.topojson')}}').then(data => geojson.addData(data));


                // Basemap changed
                $("#selectStandardBasemap").on("change", function (e) {
                    setBasemap($(this).val());
                });

                // Search
                var input = $(".geocoder-control-input");
                input.focus(function () {
                    $("#panelSearch .panel-body").css("height", "150px");
                });
                input.blur(function () {
                    $("#panelSearch .panel-body").css("height", "auto");
                });

                // Attach search control for desktop or mobile
                function attachSearch() {
                    var parentName = $(".geocoder-control").parent().attr("id"),
                        geocoder = $(".geocoder-control"),
                        width = $(window).width();
                    if (width <= 767 && parentName !== "geocodeMobile") {
                        geocoder.detach();
                        $("#geocodeMobile").append(geocoder);
                    } else if (width > 767 && parentName !== "geocode") {
                        geocoder.detach();
                        $("#geocode").append(geocoder);
                    }
                }

                $(window).resize(function () {
                    attachSearch();
                });

                attachSearch();


                /* ========================================================================
 * Calcite Maps: calcitemaps.js v0.2 (jQuery)
 * ========================================================================
 * Generic handlers for mapping-specific UI
 *
 * ======================================================================== */

                (function (calciteMaps, $, undefined) {

                    // Public
                    calciteMaps.navbarSelector = ".calcite-navbar .calcite-dropdown li > a",
                        calciteMaps.navbarToggleTarget = "toggleNavbar",
                        calciteMaps.preventOverscrolling = true,
                        calciteMaps.stickyDropdownDesktop = false,
                        calciteMaps.stickyDropdownMobile = false;
                    _stickyDropdownBreakpoint = 768;

                    //----------------------------------
                    // Nav Dropdown Events
                    //----------------------------------

                    // Show/hide panels
                    $(calciteMaps.navbarSelector).on("click", function (e) {
                        var isPanel = false,
                            panel = null,
                            panelBody = null,
                            panels = null;

                        if (e.currentTarget.dataset.target) {
                            panel = $(e.currentTarget.dataset.target);
                            isPanel = panel.hasClass("panel");
                        }

                        // Toggle panels
                        if (isPanel) {
                            panelBody = panel.children(".panel-collapse");
                            if (!panel.hasClass("in")) {
                                // Close panels
                                panels = $(".calcite-panels .panel.in"); //.not(e.currentTarget.dataset.target);
                                panels.collapse("hide");
                                // Close bodies
                                panels.children(".panel-collapse").collapse("hide");
                                // Show panel
                                panel.collapse("show");
                                // Show body
                                panelBody.collapse("show");
                            } else {
                                panel.removeClass("in");
                                panelBody.removeClass("in");
                                //panel.collapse("hide");
                                //panelBody.collapse("hide");
                                panel.collapse("show");
                                panelBody.collapse("show");
                            }
                            // Dismiss dropdown automatically
                            var isMobile = window.innerWidth < calciteMaps._stickyDropdownBreakpoint;
                            if (isMobile && !calciteMaps.stickyDropdownMobile || !isMobile && !calciteMaps.stickyDropdownDesktop) {
                                var toggle = $(".calcite-dropdown .dropdown-toggle");
                                toggle.trigger("click");
                            }
                        }
                    });

                    // Manually show/hide the dropdown and animate toggle icon

                    $(".calcite-dropdown .dropdown-toggle").on('click', function (e) {
                        $(this).parent().toggleClass("open");
                        $(".calcite-dropdown-toggle").toggleClass("open");
                    });

                    $(".calcite-dropdown").on("hide.bs.dropdown", function () {
                        $(".calcite-dropdown-toggle").removeClass("open");
                    });

                    //----------------------------------
                    // Toggle navbar hidden
                    //----------------------------------

                    $("#calciteToggleNavbar").on("click", function () {
                        var body = $("body");
                        if (!body.hasClass("calcite-nav-hidden")) {
                            body.addClass("calcite-nav-hidden");
                        } else {
                            body.removeClass("calcite-nav-hidden");
                        }
                        $(".calcite-dropdown .dropdown-toggle").trigger("click");
                    });

                    //----------------------------------
                    // Dismiss dropdown menu
                    //----------------------------------

                    $(window).on("click", function (e) {
                        var menu = $(".calcite-dropdown.open")[0];
                        if (menu) {
                            if ($(e.target).closest(".calcite-dropdown").length === 0) {
                                $(menu).removeClass("open");
                                $(".calcite-dropdown-toggle").removeClass("open");
                            }
                        }
                    });

                    //----------------------------------
                    // Panel Collapse Events
                    //----------------------------------

                    // Hide
                    $(".calcite-panels .panel .panel-collapse").on("hide.bs.collapse", function (e) {
                        $(e.target.parentNode).find(".panel-label").addClass("visible-xs-inline-block");
                        $(e.target.parentNode).find(".panel-close").addClass("visible-xs-flex");
                    });
                    //Show
                    $(".calcite-panels .panel .panel-collapse").on("show.bs.collapse", function (e) {
                        $(e.target.parentNode).find(".panel-label").removeClass("visible-xs-inline-block");
                        $(e.target.parentNode).find(".panel-close").removeClass("visible-xs-flex");
                    });

                    //----------------------------------
                    // Map Touch Events
                    //----------------------------------

                    // Stops browser overscroll/bouncing effect on mobile
                    $(".calcite-map").on("touchmove", function (e) {
                        if (calciteMaps.preventOverscrolling) {
                            e.preventDefault();
                        }
                    });

                    //----------------------------------
                    // Toggle Menu
                    //----------------------------------

                    $(".calcite-dropdown").on("show.bs.dropdown", function () {
                        $(".calcite-dropdown-toggle").addClass("open");
                    });

                    $(".calcite-dropdown").on("hide.bs.dropdown", function () {
                        $(".calcite-dropdown-toggle").removeClass("open");
                    });

                }(window.calciteMaps = window.calciteMaps || {}, jQuery));

                } catch (e) {
                    console.error('Error in InitialMap:', e);
                }
            },
            current: function () {
                markers_weather.clearLayers();
                if (this.currentTemp) {
                    var marker;

                    axios.get('{{route('map.getCurrent')}}', {
                        params: {
                            'regionid': this.regionid
                        }
                    })
                        .then(function (response) {
                            if (response.data.length > 0) {
                                response.data.forEach(function (item, i, arr) {
                                    if (item.weather_code == 'clear') {
                                        marker = L.marker([item.city.latitude, item.city.longitude], {
                                            icon: L.AwesomeMarkers.icon({
                                                icon: 'wi-day-sunny',
                                                prefix: 'wi',
                                                markerColor: 'yellow',
                                                spin: false
                                            })
                                        }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                            {
                                                permanent: true,
                                                direction: 'center'
                                            });
                                        marker.fire('click');

                                        markers_weather.addLayer(marker)

                                    } else if (item.weather_code == 'mostly_clear' || item.weather_code == 'mostly_clear' || item.weather_code == 'mostly_loudy') {
                                        marker = L.marker([item.city.latitude, item.city.longitude], {
                                            icon: L.AwesomeMarkers.icon({
                                                icon: 'wi-day-cloudy',
                                                prefix: 'wi',
                                                markerColor: 'cadetblue',
                                                spin: false
                                            })
                                        }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                            {
                                                permanent: true,
                                                direction: 'center'
                                            });
                                        markers_weather.addLayer(marker)


                                    } else if (item.weather_code == 'overcast') {
                                        marker = L.marker([item.city.latitude, item.city.longitude], {

                                            icon: L.AwesomeMarkers.icon({
                                                icon: 'wi-cloudy',
                                                prefix: 'wi',
                                                markerColor: 'cadetblue',
                                                spin: false
                                            })
                                        }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                            {
                                                permanent: true,
                                                direction: 'center'
                                            });
                                        markers_weather.addLayer(marker)


                                    } else if (item.weather_code == 'fog') {
                                        marker = L.marker([item.city.latitude, item.city.longitude], {

                                            icon: L.AwesomeMarkers.icon({
                                                icon: 'wi-fog',
                                                prefix: 'wi',
                                                markerColor: 'cadetblue',
                                                spin: false
                                            })
                                        }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                            {
                                                permanent: true,
                                                direction: 'center'
                                            });
                                        markers_weather.addLayer(marker)


                                    } else if (item.weather_code == 'light_rain' || item.weather_code == 'rain') {
                                        marker = L.marker([item.city.latitude, item.city.longitude], {

                                            icon: L.AwesomeMarkers.icon({
                                                icon: 'wi-rain',
                                                prefix: 'wi',
                                                markerColor: 'cadetblue',
                                                spin: false
                                            })
                                        }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                            {
                                                permanent: true,
                                                direction: 'center'
                                            });
                                        markers_weather.addLayer(marker)


                                    } else if (item.weather_code == 'heavy_rain') {
                                        marker = L.marker([item.city.latitude, item.city.longitude], {

                                            icon: L.AwesomeMarkers.icon({
                                                icon: 'wi-storm-showers',
                                                prefix: 'wi',
                                                markerColor: 'cadetblue',
                                                spin: false
                                            })
                                        }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                            {
                                                permanent: true,
                                                direction: 'center'
                                            });
                                        markers_weather.addLayer(marker)


                                    } else if (item.weather_code == 'thunderstorm') {
                                        marker = L.marker([item.city.latitude, item.city.longitude], {

                                            icon: L.AwesomeMarkers.icon({
                                                icon: 'wi-thunderstorm',
                                                prefix: 'wi',
                                                markerColor: 'cadetblue',
                                                spin: false
                                            })
                                        }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                            {
                                                permanent: true,
                                                direction: 'center'
                                            });
                                        markers_weather.addLayer(marker)


                                    } else if (item.weather_code == 'light_sleet' || item.weather_code == 'sleet') {
                                        marker = L.marker([item.city.latitude, item.city.longitude], {

                                            icon: L.AwesomeMarkers.icon({
                                                icon: 'wi-sleet',
                                                prefix: 'wi',
                                                markerColor: 'cadetblue',
                                                spin: false
                                            })
                                        }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                            {
                                                permanent: true,
                                                direction: 'center'
                                            });
                                        markers_weather.addLayer(marker)


                                    } else if (item.weather_code == 'heavy_sleet') {
                                        marker = L.marker([item.city.latitude, item.city.longitude], {

                                            icon: L.AwesomeMarkers.icon({
                                                icon: 'wi-storm-showers',
                                                prefix: 'wi',
                                                markerColor: 'cadetblue',
                                                spin: false
                                            })
                                        }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                            {
                                                permanent: true,
                                                direction: 'center'
                                            });
                                        markers_weather.addLayer(marker)


                                    } else if (item.weather_code == 'partly_cloudy') {
                                        marker = L.marker([item.city.latitude, item.city.longitude], {

                                            icon: L.AwesomeMarkers.icon({
                                                icon: 'wi-day-cloudy-high',
                                                prefix: 'wi',
                                                markerColor: 'cadetblue',
                                                spin: false
                                            })
                                        }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                            {
                                                permanent: true,
                                                direction: 'center'
                                            });
                                        markers_weather.addLayer(marker)


                                    } else {
                                        marker = L.marker([item.city.latitude, item.city.longitude], {
                                            icon: L.AwesomeMarkers.icon({
                                                icon: 'wi-snow',
                                                prefix: 'wi',
                                                markerColor: 'cadetblue',
                                                spin: false
                                            })
                                        }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                            {
                                                permanent: true,
                                                direction: 'center'
                                            });
                                        markers_weather.addLayer(marker)


                                    }

                                    let bounds = markers_weather.getBounds();

                                    map.fitBounds(bounds);

                                });

                            } else {
                                var item = response.data;
                                if (item.weather_code == 'clear') {
                                    marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-day-sunny',
                                            prefix: 'wi',
                                            markerColor: 'yellow',
                                            spin: false
                                        })
                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });
                                    marker.fire('click');

                                    markers_weather.addLayer(marker)

                                } else if (item.weather_code == 'mostly_clear' || item.weather_code == 'mostly_clear' || item.weather_code == 'mostly_loudy') {
                                    marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-day-cloudy',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });
                                    markers_weather.addLayer(marker)


                                } else if (item.weather_code == 'overcast') {
                                    marker = L.marker([item.city.latitude, item.city.longitude], {

                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-cloudy',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });
                                    markers_weather.addLayer(marker)


                                } else if (item.weather_code == 'fog') {
                                    marker = L.marker([item.city.latitude, item.city.longitude], {

                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-fog',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });
                                    markers_weather.addLayer(marker)


                                } else if (item.weather_code == 'light_rain' || item.weather_code == 'rain') {
                                    marker = L.marker([item.city.latitude, item.city.longitude], {

                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-rain',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });
                                    markers_weather.addLayer(marker)


                                } else if (item.weather_code == 'heavy_rain') {
                                    marker = L.marker([item.city.latitude, item.city.longitude], {

                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-storm-showers',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });
                                    markers_weather.addLayer(marker)


                                } else if (item.weather_code == 'thunderstorm') {
                                    marker = L.marker([item.city.latitude, item.city.longitude], {

                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-thunderstorm',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });
                                    markers_weather.addLayer(marker)


                                } else if (item.weather_code == 'light_sleet' || item.weather_code == 'sleet') {
                                    marker = L.marker([item.city.latitude, item.city.longitude], {

                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-sleet',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });
                                    markers_weather.addLayer(marker)


                                } else if (item.weather_code == 'heavy_sleet') {
                                    marker = L.marker([item.city.latitude, item.city.longitude], {

                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-storm-showers',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });
                                    markers_weather.addLayer(marker)


                                } else {
                                    marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-snow',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });
                                    markers_weather.addLayer(marker)


                                }

                                let bounds = markers_weather.getBounds();

                                map.fitBounds(bounds);

                            }


                            map.addLayer(markers_weather);


                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });


                } else {
                    markers_weather.clearLayers();


                }

                // map.fitBounds(marker.getBounds());

                // map.setBounds(markers_weather.getBounds());
            },
            getRadars: function () {
                if (this.radar) {
                    this.radars.forEach(function (item, i, arr) {
                        // console.log( i + ": " + item.latitude + " (массив:" + item.region_id + ")" );
                        var marker = L.marker([item.latitude, item.longitude]).on('click', function () {

                            if (item.region_id == 1726 || item.region_id == 1735 || item.region_id == 1706 || item.region_id == 1727 || item.region_id == 1714) {
                                marker.bindPopup(" <input type='checkbox' id='zoomCheck'><label for='zoomCheck'><img style='cursor: zoom-in' class='zoom' width='200' data-lightbox='/map/getRadars?region=" + item.region_id + "' data-title='My caption' src='/map/getRadars?region=" + item.region_id + "' /></label>")
                            }
                        });

                        markers_radar.addLayer(marker);
                        marker.fire('click');
                        var circle = L.circle([item.latitude, item.longitude], {
                            color: '#4236E5',
                            fillColor: '#6789E5',
                            fillOpacity: 0.3,
                            radius: (item.region_id == 1727 || item.region_id == 1708) ? 120000 : 250000,
                        })
                        markers_radar.addLayer(circle)
                    });


                    var marker = L.marker([37.224170, 67.278330]).on('click', function () {

                        marker.bindPopup(" <input type='checkbox' id='zoomCheck'><label for='zoomCheck'><img style='cursor: zoom-in' class='zoom' width='200' data-lightbox='/map/getRadars?region=1706' data-title='My caption' src='/map/getRadars?region=1706' /></label>")

                    });

                    markers_radar.addLayer(marker);
                    marker.fire('click');
                    var circle = L.circle([37.224170, 67.278330], {
                        color: '#4236E5',
                        fillColor: '#6789E5',
                        fillOpacity: 0.3,
                        radius: 250000,
                    })
                    markers_radar.addLayer(circle)


                    map.addLayer(markers_radar);

                } else {
                    markers_radar.clearLayers();

                }

                var popup = L.popup()
                    .setLatLng([39.758340, 66.915391])
                    .setContent("Dag’bit")
                    .openOn(map);

                setTimeout(function () {
                    map.closePopup(popup);
                }, 10000);
            },
            toggleAutoStations: function () {
                // "Авто" stansiyalarni ko'rsatish/yashirish
                // console.log('Toggle Auto Stations:', this.showAutoStations);
                // Показать/скрыть heatmap layer
                if (heatmapLayer) {
                    if (this.showAutoStations) {
                        map.addLayer(heatmapLayer);
                    } else {
                        map.removeLayer(heatmapLayer);
                    }
                }
                this.getAtmasfera();
            },
            toggleOtherStations: function () {
                // Boshqa stansiyalarni ko'rsatish/yashirish
                // console.log('Toggle Other Stations:', this.showOtherStations);
                this.getAtmasfera();
            },
            toggleInterpolation: function () {
                // PM2.5 interpolatsiya xaritasini ko'rsatish/yashirish
                showInterpolation = this.showInterpolation;
                // console.log('Toggle Interpolation:', showInterpolation);
                // loader
                if (showInterpolation) {
                    this.isInterpolationLoading = true;
                } else {
                    this.isInterpolationLoading = false;
                }

                if (pm25InterpolationLayer) {
                    if (showInterpolation) {
                        // console.log('Showing interpolation layer');
                        map.addLayer(pm25InterpolationLayer);
                        // give the browser a tick to paint
                        var self = this;
                        requestAnimationFrame(function () {
                            setTimeout(function () {
                                self.isInterpolationLoading = false;
                            }, 50);
                        });
                    } else {
                        // console.log('Hiding interpolation layer');
                        map.removeLayer(pm25InterpolationLayer);
                    }
                } else if (showInterpolation) {
                    // Agar layer mavjud bo'lmasa, yaratish
                    // console.log('Layer mavjud emas, yaratilmoqda...');
                    this.loadPM25Interpolation();
                }
            },
            loadPM25Interpolation: function () {
                // PM2.5 stansiyalar ma'lumotlarini yuklash va interpolatsiya qilish
                // Mavjud "Авто" stansiyalardan GetHoribaPlashadka orqali ma'lumotlarni olish
                var self = this;
                self.isInterpolationLoading = true;

                // Agar atmasfera_stations mavjud bo'lmasa, avval yuklash kerak
                if (!this.atmasfera_stations || this.atmasfera_stations.length === 0) {
                    // console.log('Stansiyalar ma\'lumotlari mavjud emas, avval yuklanmoqda...');
                    // getAtmasfera ni chaqirish va keyin interpolatsiya qilish
                    axios.get('{{route('map.GetAtmasfera')}}', {
                        params: {
                            regionid: this.regionid
                        }
                    })
                    .then((response) => {
                        this.atmasfera_stations = response.data;
                        this.processPM25Interpolation();
                    })
                    .catch(function (error) {
                        console.error('Stansiyalar ma\'lumotlarini yuklashda xatolik:', error);
                        self.isInterpolationLoading = false;
                    });
                } else {
                    this.processPM25Interpolation();
                }
            },
            processPM25Interpolation: function () {
                // "Авто" stansiyalarni topish va PM2.5 ma'lumotlarini olish
                var self = this;
                self.isInterpolationLoading = true;
                var pm25Stations = [];
                var autoStationPromises = [];

                // "Авто" stansiyalarni topish
                var autoStations = [];
                if (Array.isArray(this.atmasfera_stations)) {
                    this.atmasfera_stations.forEach(function(item) {
                        var isAutoStation = (item.id == 107 || item.id == 108 || (item.id >= 714 && item.id <= 734));
                        if (isAutoStation) {
                            autoStations.push(item);
                        }
                    });
                } else if (this.atmasfera_stations && Array.isArray(this.atmasfera_stations.data)) {
                    // Agar response.data formatida bo'lsa
                    this.atmasfera_stations.data.forEach(function(region) {
                        if (region.stations && Array.isArray(region.stations)) {
                            region.stations.forEach(function(item) {
                                var isAutoStation = (item.id == 107 || item.id == 108 || (item.id >= 714 && item.id <= 734));
                                if (isAutoStation) {
                                    autoStations.push(item);
                                }
                            });
                        }
                    });
                }

                // console.log('Topilgan "Авто" stansiyalar soni:', autoStations.length);

                if (autoStations.length === 0) {
                    console.log('"Авто" stansiyalar topilmadi');
                    self.isInterpolationLoading = false;
                    return;
                }

                // Har bir "Авто" stansiya uchun GetHoribaPlashadka API'sini chaqirish
                autoStations.forEach(function(station) {
                    var promise = axios.get('{{route('map.horiba.plashadka')}}', {
                        params: {
                            point: station.id
                        }
                    })
                    .then(function(response) {
                        try {
                            var pm25Value = null;

                            // Response strukturani tekshirish
                            var dataArray = null;
                            if (response.data && response.data.data && Array.isArray(response.data.data)) {
                                dataArray = response.data.data;
                            } else if (Array.isArray(response.data)) {
                                dataArray = response.data;
                            }

                            if (dataArray && dataArray.length > 0) {
                                // PM2.5 ni qidirish
                                for (var j = 0; j < dataArray.length; j++) {
                                    var dataItem = dataArray[j];
                                    var itemName = (dataItem.name || dataItem.Name || dataItem.parameter || '').toString().toLowerCase();
                                    var itemValue = dataItem.value || dataItem.Value || dataItem.value_num || null;

                                    if (itemName && (
                                        itemName.includes('pm2.5') ||
                                        itemName.includes('pm2_5') ||
                                        itemName.includes('pm25') ||
                                        itemName.includes('pm 2.5') ||
                                        itemName === 'pm2.5' ||
                                        itemName === 'pm2_5'
                                    )) {
                                        pm25Value = parseFloat(itemValue);
                                        break;
                                    }
                                }
                            }

                            // Agar PM2.5 qiymati topilsa, qo'shish
                            if (pm25Value !== null && !isNaN(pm25Value) && pm25Value >= 0) {
                                pm25Stations.push({
                                    id: station.id,
                                    name: station.category_title || 'Stansiya ' + station.id,
                                    latitude: parseFloat(station.lat),
                                    longitude: parseFloat(station.lon),
                                    pm25: pm25Value
                                });
                            }

                            return pm25Value;
                        } catch (e) {
                            console.error('PM2.5 ma\'lumotlarini olishda xatolik (stansiya ' + station.id + '):', e);
                            return null;
                        }
                    })
                    .catch(function(error) {
                        console.error('GetHoribaPlashadka API xatolik (stansiya ' + station.id + '):', error);
                        return null;
                    });

                    autoStationPromises.push(promise);
                });

                // Barcha promiselar tugagach, interpolatsiya qilish
                Promise.all(autoStationPromises).then(function() {
                    // console.log('PM2.5 stansiyalar soni:', pm25Stations.length);
                    // console.log('PM2.5 stansiyalar:', pm25Stations);
                    if (pm25Stations.length > 0) {
                        createPM25InterpolationMap(pm25Stations);
                        if (self.showInterpolation) {
                            showInterpolation = true;
                            if (pm25InterpolationLayer) {
                                // console.log('Adding interpolation layer to map (from Promise.all)');
                                map.addLayer(pm25InterpolationLayer);
                                // console.log('Interpolation layer added, checking if visible...');

                                // Hover event'ni setup qilish
                                setupPM25Hover();

                                setTimeout(function() {
                                    if (pm25InterpolationLayer._map) {
                                        // console.log('Layer successfully added to map');
                                    } else {
                                        // console.error('Layer not added to map!');
                                    }
                                }, 100);
                            } else {
                                console.error('pm25InterpolationLayer is null!');
                            }
                        } else {
                            // console.log('showInterpolation is false, layer not added');
                        }
                    } else {
                        console.log('PM2.5 ma\'lumotlari topilmadi');
                        self.isInterpolationLoading = false;
                    }
                }).catch(function(err) {
                    console.error('PM2.5 interpolation Promise.all error:', err);
                    self.isInterpolationLoading = false;
                });
            },
            getAtmasfera: function () {
                markers_atmasfera.clearLayers();
                var marker;
                var markerColor, icon;
                var drujbahoriba, plashadkahoriba;

                // Очистить heatmap layer
                if (heatmapLayer) {
                    map.removeLayer(heatmapLayer);
                    heatmapLayer = null;
                }
                autoStationsData = []; // Очистить данные для интерполяции

                // Show/hide legend when atmosphere menu is active
                if (airQualityLegend) {
                if (this.atmTemp) {
                        if (!airQualityLegend._map || !airQualityLegend._container) {
                            airQualityLegend.addTo(map);
                        }
                        if (airQualityLegend._container) {
                            airQualityLegend._container.style.display = 'block';
                        }
                        // console.log('Legend shown in getAtmasfera');
                    } else {
                        if (airQualityLegend._container) {
                            airQualityLegend._container.style.display = 'none';
                        }
                        // console.log('Legend hidden in getAtmasfera');
                    }
                }

                if (this.atmTemp) {

                    {{--axios.get('{{route('map.meteobotstations')}}', {--}}
                    {{--    params: {--}}
                    {{--        regionid: this.regionid--}}
                    {{--    }--}}
                    {{--})--}}
                    {{--    .then(function (response) {--}}
                    {{--        response.data.forEach(function (item, i, arr) {--}}
                    {{--            if (item.is_has_aq) {--}}
                    {{--                const fontAwesomeIcon = L.divIcon({--}}
                    {{--                    html: '<div style="color:green"><i class="fa fa-map-marker fa-2x"></i></div>',--}}
                    {{--                    iconSize: [36, 36],--}}
                    {{--                    className: 'myDivIcon'--}}
                    {{--                });--}}
                    {{--                axios.get('{{route('meteobot.GetMeteoBotInfo')}}', {--}}
                    {{--                    params: {--}}
                    {{--                        id: item.sn--}}
                    {{--                    }--}}
                    {{--                })--}}
                    {{--                    .then(function (response) {--}}
                    {{--                        var marker = L.marker([parseFloat(item.latitude), parseFloat(item.longitude)], {icon: fontAwesomeIcon})--}}
                    {{--                            .on('click', function () {--}}
                    {{--                                marker.bindPopup("" +--}}
                    {{--                                    "<table class='table table-bordered'>" +--}}
                    {{--                                    "<tr ><td colspan='2' class='text-center'><b>" + item.name + "</b></td></tr>" +--}}
                    {{--                                    "<tr>" +--}}
                    {{--                                    "<td><b>@lang('map.date')</b></td>" +--}}
                    {{--                                    "<td>" + response.data[1] + " " + response.data[2] + "</td>" +--}}
                    {{--                                    "</tr>" +--}}
                    {{--                                    "<tr>" +--}}
                    {{--                                    "<td><b>PM2.5</b></td>" +--}}
                    {{--                                    "<td>" + response.data[13] + " µg/m³</td>" +--}}
                    {{--                                    "</tr>" +--}}
                    {{--                                    "<tr>" +--}}
                    {{--                                    "<td><b>PM10</b></td>" +--}}
                    {{--                                    "<td>" + response.data[15] + " µg/m³</td>" +--}}
                    {{--                                    "</tr>" +--}}
                    {{--                                    "<tr>" +--}}
                    {{--                                    "<td><b>CO2</b></td>" +--}}
                    {{--                                    "<td>" + response.data[17] + " µg/m³</td>" +--}}
                    {{--                                    "</tr>" +--}}
                    {{--                                    "</table>" +--}}
                    {{--                                    "<a href='https://monitoring.meteo.uz/ru/map/view/107' target='_blank' style='color:#fff;'>@lang('map.more')....</a>")--}}
                    {{--                                    .bindTooltip("<div class='pin-info' style='background-color:" + "cyan" + "'><b>" + response.data[13] + "</b></div>",--}}
                    {{--                                        {--}}
                    {{--                                            permanent: true,--}}
                    {{--                                            direction: 'top',--}}
                    {{--                                            className: 'ownClass'--}}

                    {{--                                        });--}}


                    {{--                            })--}}


                    {{--                        marker.fire('click');--}}

                    {{--                        marker.ind = item.id;//j+"_"+i;--}}

                    {{--                        markers_atmasfera.addLayer(marker);--}}

                    {{--                        let bounds = markers_atmasfera.getBounds();--}}
                    {{--                        map.fitBounds(bounds);--}}

                    {{--                    })--}}
                    {{--                    .catch(function (error) {--}}
                    {{--                        // handle error--}}
                    {{--                        console.log(error);--}}
                    {{--                    })--}}
                    {{--                    .then(function () {--}}
                    {{--                        // always executed--}}
                    {{--                    });--}}
                    {{--            }--}}
                    {{--        });--}}
                    {{--    })--}}


                    {{--map.addLayer(markers_atmasfera);--}}


                    axios.get('{{route('map.GetAtmasfera')}}', {
                        params: {
                            regionid: this.regionid
                        }
                    })
                        .then((response) => {
                            this.atmasfera_stations = response.data;

                            // Default qiymatlarni tekshirish
                            if (this.showAutoStations === undefined) {
                                this.showAutoStations = true;
                            }
                            if (this.showOtherStations === undefined) {
                                this.showOtherStations = true;
                            }

                            // console.log('showAutoStations:', this.showAutoStations, 'showOtherStations:', this.showOtherStations);
                            // console.log('Total stations:', this.atmasfera_stations.length);

                            // Очистить данные для интерполяции перед новой загрузкой
                            autoStationsData = [];

                            // Собрать все промисы для "Авто" станций
                            var autoStationPromises = [];

                            this.atmasfera_stations.forEach((item, i, arr) => {
                                // "Авто" stansiyalarni aniqlash (id: 107, 108, 714-734)
                                var isAutoStation = (item.id == 107 || item.id == 108 || (item.id >= 714 && item.id <= 734));

                                // Toggle flag'lariga qarab stansiyalarni ko'rsatish/yashirish
                                // Agar "Авто" stansiya bo'lsa va showAutoStations false bo'lsa, skip qilish
                                if (isAutoStation) {
                                    if (!this.showAutoStations) {
                                        // console.log('Skipping Auto Station:', item.id);
                                        return; // "Авто" stansiyalar yashirilgan
                                    }
                                } else {
                                    // Agar "Авто" stansiya bo'lmasa va showOtherStations false bo'lsa, skip qilish
                                    if (!this.showOtherStations) {
                                        // console.log('Skipping Other Station:', item.id);
                                        return; // Boshqa stansiyalar yashirilgan
                                    }
                                }

                                // console.log('Adding Station:', item.id, 'isAuto:', isAutoStation);

                                var SI = (item.Si == '-') ? '-' : parseFloat(item.Si);


                                markerColor = item.color; //getColorSi(SI);
                                // console.log(SI);
                                count_si = parseFloat(item.Si);

                                // Barcha stansiyalar uchun chiroyli yumaloq icon dizayn
                                var iconHtml, iconSize, iconClass, iconAnchor;
                                var displayText = '';
                                var bgColor = markerColor;

                                if (isAutoStation) {
                                    // "Авто" stansiyalar uchun - API response kelguncha invisible icon
                                    // API response kelganda yangi icon yaratiladi
                                    // Transparent icon yaratiladi, lekin marker yaratiladi
                                    iconHtml = '<div style="background-color:transparent; width: 1px; height: 1px; border-radius: 50%; opacity: 0;"></div>';
                                    iconSize = [1, 1];
                                    iconClass = 'auto-station-icon';
                                    iconAnchor = [0, 0];
                                } else {
                                    // Boshqa stansiyalar uchun - Si qiymatini ko'rsatish
                                    displayText = (item.Si && item.Si !== '-') ? item.Si : '';
                                    bgColor = markerColor;

                                    // Yashil rangni birlashtirish - "Авто станции" bilan bir xil yashil rang
                                    var bgColorLower = (bgColor || '').toString().toLowerCase();
                                    if (bgColorLower === '#00ff00' ||
                                        bgColorLower === '#23d41e' ||
                                        bgColorLower === 'green' ||
                                        bgColorLower.includes('green') ||
                                        (bgColorLower.startsWith('#') && (
                                            bgColorLower === '#00ff00' ||
                                            bgColorLower === '#23d41e'
                                        ))) {
                                        bgColor = '#00ff00'; // "Авто станции" bilan bir xil yashil rang
                                    }

                                    // Text rangini aniqlash - yorug' ranglar uchun qora, qorong'i ranglar uchun oq
                                    var textColor = '#fff';
                                    if (bgColor === '#00ff00' || bgColor === '#ffff00' || bgColor === '#ffa500' || bgColor.toLowerCase().includes('yellow') || bgColor.toLowerCase().includes('green')) {
                                        textColor = '#000';
                                    }

                                    // Chiroyli yumaloq icon dizayn
                                    iconHtml = '<div style="background-color:' + bgColor + '; width: 45px; height: 45px; border-radius: 50%; border: 3px solid #fff; box-shadow: 0 3px 10px rgba(0,0,0,0.4); display: flex; align-items: center; justify-content: center; color: ' + textColor + '; font-weight: bold; font-size: 14px; line-height: 1; text-shadow: 0 1px 2px rgba(0,0,0,0.3);">' + displayText + '</div>';
                                    iconSize = [45, 45];
                                    iconClass = 'auto-station-icon';
                                    iconAnchor = [22, 22];

                                    // api.india.data ga murojat qilayotgan stansiyani "Другие станции" ga qo'shish
                                    // Bu stansiya "Другие станции" ichida bo'lishi kerak
                                    // Koordinatalar: lat = 42.77667, lon = 59.60778, device = "ENE04451"
                                    if (parseFloat(item.lat) === 42.77667 && parseFloat(item.lon) === 59.60778) {
                                        // Bu stansiya api.india.data ga murojat qiladi
                                        // Marker allaqachon yaratilgan, faqat click event'ni qo'shish kerak
                                    }
                                }

                                const fontAwesomeIcon = L.divIcon({
                                    html: iconHtml,
                                    iconSize: iconSize,
                                    className: iconClass,
                                    iconAnchor: iconAnchor
                                });
                                var marker = L.marker([parseFloat(item.lat), parseFloat(item.lon)], {icon: fontAwesomeIcon})
                                    .on('click', function () {
                                        if (item.id == 107 || item.id == 108 ||
                                            (item.id >= 714 && item.id <= 734)) {
                                            axios.get('{{route('map.horiba.plashadka')}}', {
                                                params: {
                                                    point: item.id
                                                }
                                            })
                                                .then(function (response) {
                                                    try {
                                                        // PM2.5 qiymatini topish va rangni aniqlash
                                                        var pm25Value = null;
                                                        var tooltipColor = '#8c2b8c'; // Default: Фиолетовый
                                                        var markerIconColor = '#8c2b8c'; // Default: Фиолетовый

                                                        // Response strukturani tekshirish
                                                        var dataArray = null;
                                                        if (response.data && response.data.data && Array.isArray(response.data.data)) {
                                                            dataArray = response.data.data;
                                                        } else if (Array.isArray(response.data)) {
                                                            dataArray = response.data;
                                                        }

                                                        if (dataArray && dataArray.length > 0) {
                                                            // PM2.5 ni qidirish - turli xil nomlar bilan
                                                            for (var i = 0; i < dataArray.length; i++) {
                                                                var dataItem = dataArray[i];
                                                                var itemName = (dataItem.name || dataItem.Name || dataItem.parameter || '').toString().toLowerCase();
                                                                var itemValue = dataItem.value || dataItem.Value || dataItem.value_num || null;

                                                                if (itemName && (
                                                                    itemName.includes('pm2.5') ||
                                                                    itemName.includes('pm2_5') ||
                                                                    itemName.includes('pm25') ||
                                                                    itemName.includes('pm 2.5') ||
                                                                    itemName === 'pm2.5' ||
                                                                    itemName === 'pm2_5'
                                                                )) {
                                                                    pm25Value = parseFloat(itemValue);
                                                                    break;
                                                                }
                                                            }

                                                            // PM2.5 qiymatiga qarab rangni aniqlash
                                                            if (pm25Value !== null && !isNaN(pm25Value)) {
                                                                if (pm25Value >= 0 && pm25Value <= 60) {
                                                                    tooltipColor = '#00ff00'; // Зелёный
                                                                    markerIconColor = '#00ff00';
                                                                } else if (pm25Value > 60 && pm25Value <= 120) {
                                                                    tooltipColor = '#ffff00'; // Жёлтый
                                                                    markerIconColor = '#ffff00';
                                                                } else if (pm25Value > 120 && pm25Value <= 180) {
                                                                    tooltipColor = '#ffa500'; // Оранжевый
                                                                    markerIconColor = '#ffa500';
                                                                } else if (pm25Value > 180 && pm25Value <= 300) {
                                                                    tooltipColor = '#ff0000'; // Красный
                                                                    markerIconColor = '#ff0000';
                                                                } else if (pm25Value > 300) {
                                                                    tooltipColor = '#8c2b8c'; // Фиолетовый
                                                                    markerIconColor = '#8c2b8c';
                                                                }
                                                            }
                                                        }

                                                        // Marker icon rangini yangilash - chiroyli va yoqimli dizayn
                                                        var pm25Display = (pm25Value !== null && !isNaN(pm25Value)) ? pm25Value.toFixed(1) : '';
                                                        // Text rangini aniqlash - yorug' ranglar uchun qora, qorong'i ranglar uchun oq
                                                        var textColor = '#fff';
                                                        if (markerIconColor === '#00ff00' || markerIconColor === '#ffff00' || markerIconColor === '#ffa500') {
                                                            textColor = '#000';
                                                        }
                                                        var newIcon = L.divIcon({
                                                            html: '<div style="background-color:' + markerIconColor + '; width: 45px; height: 45px; border-radius: 50%; border: 3px solid #fff; box-shadow: 0 3px 10px rgba(0,0,0,0.4); display: flex; align-items: center; justify-content: center; color: ' + textColor + '; font-weight: bold; font-size: 14px; line-height: 1; text-shadow: 0 1px 2px rgba(0,0,0,0.3);">' + pm25Display + '</div>',
                                                            iconSize: [45, 45],
                                                            className: 'auto-station-icon',
                                                            iconAnchor: [22, 22]
                                                        });
                                                        marker.setIcon(newIcon);

                                                        if (response.data.data) {
                                                            marker.bindPopup("" +
                                                                "<table class='table table-bordered'>" +
                                                                "<tr ><td class='text-center' colspan='2'><b>" + item.category_title + "</b></td></tr>" +
                                                                "<tr>" +
                                                                "<td><b>" + response.data.data[0].name + ":</b></td>" +
                                                                "<td>" + parseFloat(response.data.data[0].value) + " " + response.data.data[0].unit + "</td>" +
                                                                "</tr>" +
                                                                "<tr>" +
                                                                "<td><b>" + response.data.data[1].name + ":</b></td>" +
                                                                "<td>" + parseFloat(response.data.data[1].value) + " " + response.data.data[1].unit + "</td>" +
                                                                "</tr>" +
                                                                "<tr>" +
                                                                "<td><b>" + response.data.data[2].name + ":</b></td>" +
                                                                "<td>" + parseFloat(response.data.data[2].value) + " " + response.data.data[2].unit + "</td>" +
                                                                "</tr>" +
                                                                "<tr>" +
                                                                "<td><b>" + response.data.data[3].name + ":</b></td>" +
                                                                "<td>" + parseFloat(response.data.data[3].value) + " " + response.data.data[3].unit + "</td>" +
                                                                "</tr>" +
                                                                "<tr>" +
                                                                "<td><b>" + response.data.data[4].name + ":</b></td>" +
                                                                "<td>" + parseFloat(response.data.data[4].value) + " " + response.data.data[4].unit + "</td>" +
                                                                "</tr>" +
                                                                "<tr>" +
                                                                "<td><b>" + response.data.data[5].name + ":</b></td>" +
                                                                "<td>" + parseFloat(response.data.data[5].value) + " " + response.data.data[5].unit + "</td>" +
                                                                "</tr>" +
                                                                "<tr>" +
                                                                "<td><b>" + response.data.data[6].name + ":</b></td>" +
                                                                "<td>" + parseFloat(response.data.data[6].value) + " " + response.data.data[6].unit + "</td>" +
                                                                "</tr>" +
                                                                "<tr>" +
                                                                "<td><b>" + response.data.data[7].name + ":</b></td>" +
                                                                "<td>" + parseFloat(response.data.data[7].value) + " " + response.data.data[7].unit + "</td>" +
                                                                "</tr>" +
                                                                "<tr>" +
                                                                "<td><b>@lang('map.date'):</b></td>" +
                                                                "<td>" + response.data.datetime + "</td>" +
                                                                "</tr>" +
                                                                "<tr>" +
                                                                "<td colspan='2'><a href='https://monitoring.meteo.uz/ru/map/view/" + item.id + "' target='_blank' style='color:#000;'>@lang('map.more')....</a></td>" +
                                                                "</tr>" +
                                                                "</table>");

                                                        // Tooltip olib tashlanadi - faqat marker icon'da PM2.5 ko'rsatiladi
                                                        marker.unbindTooltip();
                                                        } else {
                                                            marker.bindPopup("" +
                                                                "<table class='table table-bordered'>" +
                                                                "<tr ><td class='text-center' colspan='2'><b>" + item.category_title + "</b></td></tr>" +
                                                                "<tr>" +
                                                                "<td class='text-center text-danger'><b>профилактический работы</b></td>" +
                                                                "</tr>" +
                                                                "</table>" +
                                                                "<a href='https://monitoring.meteo.uz/ru/map/view/" + item.id + "' target='_blank' style='color:#000;'>@lang('map.more')....</a>");

                                                        // Tooltip olib tashlanadi - faqat marker icon'da PM2.5 ko'rsatiladi
                                                        marker.unbindTooltip();
                                                        }

                                                    } catch (e) {
                                                        console.log(e)
                                                    }

                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                    });

                                        } else {
                                            marker.bindPopup("" +
                                                "<table class='table table-bordered'>" +
                                                "<tr ><td class='text-center' colspan='2'><b>" + item.category_title + "</b></td></tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.NO') (NO):</b></td>" +
                                                "<td>" + item.NO + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.CO') (СО):</b></td>" +
                                                "<td>" + item.CO + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.SO2') (SO2):</b></td>" +
                                                "<td>" + item.SO2 + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.NO2') (NO2):</b></td>" +
                                                "<td>" + item.NO2 + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dust'):</b></td>" +
                                                "<td>" + item.substances + "</td>" +
                                                "</tr>" +
                                                "</table>" +
                                                "<a href='https://monitoring.meteo.uz/' target='_blank' style='color:#fff;'>@lang('map.more')....</a>");
                                                // Tooltip olib tashlandi - marker icon ichida qiymat allaqachon ko'rsatiladi

                                        }


                                    })

                                // "Авто" stansiyalar uchun marker yaratilganda darhol PM2.5 qiymatini olish va rangni yangilash
                                var isAutoStation = (item.id == 107 || item.id == 108 || (item.id >= 714 && item.id <= 734));
                                if (isAutoStation && this.showAutoStations) {
                                    // Tooltip yaratilmaydi - faqat marker icon'da PM2.5 ko'rsatiladi

                                    // API chaqiruv
                                    var pm25Promise = axios.get('{{route('map.horiba.plashadka')}}', {
                                        params: {
                                            point: item.id
                                        }
                                    })
                                        .then((response) => {
                                            try {
                                                // PM2.5 qiymatini topish va rangni aniqlash
                                                var pm25Value = null;
                                                var markerIconColor = '#8c2b8c'; // Default: Фиолетовый
                                                var tooltipColor = '#8c2b8c'; // Default: Фиолетовый

                                                // Response strukturani tekshirish
                                                var dataArray = null;
                                                if (response.data && response.data.data && Array.isArray(response.data.data)) {
                                                    dataArray = response.data.data;
                                                } else if (Array.isArray(response.data)) {
                                                    dataArray = response.data;
                                                }

                                                if (dataArray && dataArray.length > 0) {
                                                    // PM2.5 ni qidirish - turli xil nomlar bilan
                                                    for (var j = 0; j < dataArray.length; j++) {
                                                        var dataItem = dataArray[j];
                                                        var itemName = (dataItem.name || dataItem.Name || dataItem.parameter || '').toString().toLowerCase();
                                                        var itemValue = dataItem.value || dataItem.Value || dataItem.value_num || null;

                                                        if (itemName && (
                                                            itemName.includes('pm2.5') ||
                                                            itemName.includes('pm2_5') ||
                                                            itemName.includes('pm25') ||
                                                            itemName.includes('pm 2.5') ||
                                                            itemName === 'pm2.5' ||
                                                            itemName === 'pm2_5'
                                                        )) {
                                                            pm25Value = parseFloat(itemValue);
                                                            break;
                                                        }
                                                    }

                                                    // PM2.5 qiymatiga qarab rangni aniqlash
                                                    if (pm25Value !== null && !isNaN(pm25Value)) {
                                                        if (pm25Value >= 0 && pm25Value <= 60) {
                                                            markerIconColor = '#00ff00'; // Зелёный
                                                            tooltipColor = '#00ff00';
                                                        } else if (pm25Value > 60 && pm25Value <= 120) {
                                                            markerIconColor = '#ffff00'; // Жёлтый
                                                            tooltipColor = '#ffff00';
                                                        } else if (pm25Value > 120 && pm25Value <= 180) {
                                                            markerIconColor = '#ffa500'; // Оранжевый
                                                            tooltipColor = '#ffa500';
                                                        } else if (pm25Value > 180 && pm25Value <= 300) {
                                                            markerIconColor = '#ff0000'; // Красный
                                                            tooltipColor = '#ff0000';
                                                        } else if (pm25Value > 300) {
                                                            markerIconColor = '#8c2b8c'; // Фиолетовый
                                                            tooltipColor = '#8c2b8c';
                                                        }

                                                        // Добавить данные для интерполяции
                                                        autoStationsData.push([
                                                            parseFloat(item.lat),
                                                            parseFloat(item.lon),
                                                            Math.min(pm25Value / 300, 1.0) // Нормализация для heatmap (0-1), максимум 300
                                                        ]);
                                                    }
                                                }

                                                // Marker icon rangini yangilash - chiroyli va yoqimli dizayn
                                                var pm25Display = (pm25Value !== null && !isNaN(pm25Value)) ? pm25Value.toFixed(1) : '';
                                                // Text rangini aniqlash - yorug' ranglar uchun qora, qorong'i ranglar uchun oq
                                                var textColor = '#fff';
                                                if (markerIconColor === '#00ff00' || markerIconColor === '#ffff00' || markerIconColor === '#ffa500') {
                                                    textColor = '#000';
                                                }
                                                var newIcon = L.divIcon({
                                                    html: '<div style="background-color:' + markerIconColor + '; width: 45px; height: 45px; border-radius: 50%; border: 3px solid #fff; box-shadow: 0 3px 10px rgba(0,0,0,0.4); display: flex; align-items: center; justify-content: center; color: ' + textColor + '; font-weight: bold; font-size: 14px; line-height: 1; text-shadow: 0 1px 2px rgba(0,0,0,0.3);">' + pm25Display + '</div>',
                                                    iconSize: [45, 45],
                                                    className: 'auto-station-icon',
                                                    iconAnchor: [22, 22]
                                                });
                                                // Eski icon'ni yangi icon bilan almashtirish
                                                marker.setIcon(newIcon);

                                                // Tooltip olib tashlanadi - faqat marker icon'da PM2.5 ko'rsatiladi
                                                marker.unbindTooltip();

                                                return pm25Value; // Вернуть значение для Promise.all

                                            } catch (e) {
                                                console.log('Error updating marker color:', e);
                                                return null;
                                            }
                                        })
                                        .catch(function (error) {
                                            console.log('Error fetching PM2.5 data:', error);
                                            return null;
                                        });

                                    autoStationPromises.push(pm25Promise);
                                }

                                marker.fire('click');

                                marker.ind = item.id;//j+"_"+i;

                                markers_atmasfera.addLayer(marker);


                            })

                            // api.india.data ga murojat qilayotgan stansiyani "Другие станции" ga qo'shish
                            // Point koordinata
                            const lat = 42.77667;
                            const lon = 59.60778;
                            const device = "ENE04451";
                            const apiUrl = "{{route('api.india.data')}}";

                            // Bu stansiya "Другие станции" ichida bo'lishi kerak
                            // showOtherStations flag'iga qarab ko'rsatish/yashirish
                            if (this.showOtherStations) {
                            function toTable(obj) {
                                if (!obj) return "<div>No data</div>";
                                return `
    <table style="border-collapse:collapse;width:100%;font-size:13px;">
      <tbody>
        ${Object.entries(obj).map(([k, v]) => `
          <tr>
            <th style="text-align:left;padding:6px;border:1px solid #ddd;">${k}</th>
            <td style="padding:6px;border:1px solid #ddd;">${v ?? "-"}</td>
          </tr>
        `).join("")}
      </tbody>
    </table>
  `;
                            }

                                // "Другие станции" dizaynini ishlatish - Si qiymati o'rniga device ID ko'rsatiladi
                                var displayText = device;
                                var bgColor = '#00ff00'; // Default yashil rang
                                var textColor = '#000';

                                var iconHtml = '<div style="background-color:' + bgColor + '; width: 45px; height: 45px; border-radius: 50%; border: 3px solid #fff; box-shadow: 0 3px 10px rgba(0,0,0,0.4); display: flex; align-items: center; justify-content: center; color: ' + textColor + '; font-weight: bold; font-size: 12px; line-height: 1; text-shadow: 0 1px 2px rgba(0,0,0,0.3);">' + displayText.substring(0, 3) + '</div>';

                                const indiaIcon = L.divIcon({
                                    html: iconHtml,
                                    iconSize: [45, 45],
                                    className: 'auto-station-icon',
                                    iconAnchor: [22, 22]
                                });

                                const indiaMarker = L.marker([lat, lon], {icon: indiaIcon})
                                    .on('click', async function () {
                                        indiaMarker.openPopup();
                                        indiaMarker.setPopupContent('<div style="min-width:260px">Loading...</div>');

                                try {
                                    const res = await axios.get(apiUrl, {
                                        params: {action: "getLatestData", device}
                                    });

                                    const payload = res.data;
                                    const latest = payload?.data?.[0];

                                    const html = `
      <div style="min-width:320px">
        <div style="font-weight:600;margin-bottom:8px;">
          Device: ${payload?.device ?? device}
        </div>
        ${toTable(latest)}
      </div>
    `;

                                            indiaMarker.setPopupContent(html);
                                            indiaMarker.openPopup();
                                } catch (e) {
                                    const msg = e?.response?.data?.message || e?.message || "Request failed";
                                            indiaMarker.setPopupContent(`<div style="min-width:260px;color:#b00">Error: ${msg}</div>`);
                                            indiaMarker.openPopup();
                                }
                            });

                                markers_atmasfera.addLayer(indiaMarker);
                            }


                            map.addLayer(markers_atmasfera);
                            let bounds = markers_atmasfera.getBounds();
                            map.fitBounds(bounds);

                            // Agar interpolatsiya yoqilgan bo'lsa, uni yangilash
                            if (this.showInterpolation) {
                                this.loadPM25Interpolation();
                            }

                            // handle success
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });


                } else {
                    markers_atmasfera.clearLayers();

                }

            },
            getSnow: function () {
                if (this.snow) {

                    var geojsonSnow = L.topoJson(null, {
                        style: function (feature) {
                            return {
                                color: "grey",
                                fillOpacity: 0.5,
                                fillColor: 'grey',
                                stroke: true,
                                weight: 2
                            }
                        },
                        onEachFeature: function (feature, layer) {
                            // layer.bindPopup('<p>'+feature.properties.NAME+'</p>')
                        }
                    });

                    markers_snow.addLayer(geojsonSnow);

                    map.addLayer(markers_snow);


                    async function getGeoData(url) {
                        let response = await fetch(url);
                        let data = await response.json();
                        return data;
                    }

                    {{--getGeoData('{{asset('asset/geojson/map.topojson')}}').then(data => geojsonSnow.addData(data));--}}

                    var geojsonZarafshan = new L.GeoJSON.AJAX("{{asset('rasters/zarafshan.geojson')}}");
                    markers_snow.addLayer(geojsonZarafshan);
                    var geojsonSurxan = new L.GeoJSON.AJAX("{{asset('rasters/surxan.geojson')}}");
                    markers_snow.addLayer(geojsonSurxan);
                    var geojsonVaxsh = new L.GeoJSON.AJAX("{{asset('rasters/vaxshh.geojson')}}");
                    markers_snow.addLayer(geojsonVaxsh);
                    var geojsonKafernigam = new L.GeoJSON.AJAX("{{asset('rasters/kafernigam.geojson')}}");
                    markers_snow.addLayer(geojsonKafernigam);
                    var geojsonPyanj = new L.GeoJSON.AJAX("{{asset('rasters/pyanj.geojson')}}");
                    markers_snow.addLayer(geojsonPyanj);
                    var geojsonQunduz = new L.GeoJSON.AJAX("{{asset('rasters/qunduz.geojson')}}");
                    markers_snow.addLayer(geojsonQunduz);
                    var geojsonQashqadarya = new L.GeoJSON.AJAX("{{asset('rasters/qashqadarya.geojson')}}");
                    markers_snow.addLayer(geojsonQashqadarya);
                    var geojsonUgam = new L.GeoJSON.AJAX("{{asset('rasters/ugam.geojson')}}");
                    markers_snow.addLayer(geojsonUgam);
                    var geojsonPiskem = new L.GeoJSON.AJAX("{{asset('rasters/piskem.geojson')}}");
                    markers_snow.addLayer(geojsonPiskem);
                    var geojsonChatkal = new L.GeoJSON.AJAX("{{asset('rasters/Chatkal.geojson')}}");
                    markers_snow.addLayer(geojsonChatkal);
                    var geojsonAngren = new L.GeoJSON.AJAX("{{asset('rasters/angren.geojson')}}");
                    markers_snow.addLayer(geojsonAngren);
                    var geojsonFerganaN = new L.GeoJSON.AJAX("{{asset('rasters/FerganaN.geojson')}}");
                    markers_snow.addLayer(geojsonFerganaN);
                    var geojsonNarin = new L.GeoJSON.AJAX("{{asset('rasters/Narin.geojson')}}");
                    markers_snow.addLayer(geojsonNarin);
                    var geojsonKaradarya = new L.GeoJSON.AJAX("{{asset('rasters/karadarya.geojson')}}");
                    markers_snow.addLayer(geojsonKaradarya);
                    var geojsonFerganaS = new L.GeoJSON.AJAX("{{asset('rasters/FerganaS.geojson')}}");
                    markers_snow.addLayer(geojsonFerganaS);


                } else {
                    markers_snow.clearLayers();

                }

            },
            getawd: function () {


                if (this.awd) {
                    // console.log(this.awds['Stations'][0].Metadata.Longitude);
                    // var marker = L.marker([parseFloat(this.awds['Stations'][0].Metadata.Latitude), parseFloat(this.awds['Stations'][1].Metadata.Longitude)]).addTo(map);


                    this.awds.Stations.forEach(function (item, i, arr) {
                            var meteoIcon = L.icon({
                                iconUrl: '{{asset('images/meteo.png')}}',
                                iconSize: [28, 28], // size of the icon
                                class: "station"
                            });
                            try {
                                if (item.Metadata.AwsId !== null) {
                                    var marker = L.marker([parseFloat(item.Metadata.Latitude), parseFloat(item.Metadata.Longitude)], {icon: meteoIcon}).on('click', function () {
                                        axios.post('{{route('map.awd.getStation')}}', {
                                            token: '{{@csrf_token()}}',
                                            id: item.Id
                                        })
                                            .then(function (response) {
                                                const variables = response.data.Stations.Sources.Variables;

                                                function getValue(name) {
                                                    const variable = variables.find(v => v.VariableName === name);
                                                    return variable ? variable.Value : null;
                                                }

                                                const tempDry = getValue("Temp.Dry.10min.Average") ?? null;
                                                const dewPoint = getValue("Temp.DewPoint") ?? null;
                                                const humidity = getValue("RelHumidity") ?? null;
                                                const Seapressure = getValue("Press.Station.10min.Average") ?? null;
                                                const qnh = getValue("QNH.10min.Average") ?? null;
                                                const pressure = getValue("Press.Station") ?? null;
                                                const prec = getValue("Prec.Rain.Gauge2.10min.Average.Intensity") ?? null;
                                                const wind_direction = getValue("Wind.Dir.10min.Average") ?? null;
                                                const wind_seed = getValue("Wind.Speed.10min.Average") ?? null;
                                                const solar_radiation = getValue("Solar.Radiation.10min.Average") ?? null;

                                                const stationNames = {
                                                    "01_Boz": 'Боз',
                                                    "02_Kurgantepa": 'Кургантепа',
                                                    "03_Ulugnar": 'Улугнар',
                                                    "04_Ayakagitma": 'Аякагитма',
                                                    "05_Djangeldy": 'М-II Джангельды',
                                                    "06_Karakul": 'М-II Каракул',
                                                    "07_Kysyl-Ravat": 'М-IV Кызыл-Рават',
                                                    "08_Akrabat": 'Акрабат',
                                                    "09_Minchukur": 'Минчукур',
                                                    "10_Kul": 'Кул',
                                                    "11_Akbaytal": 'Акбайтал',
                                                    "12_Buzaubay": 'Бузаубай',
                                                    "13_Mashikuduk": 'Машикудук',
                                                    "14_Nurata": 'Нурата',
                                                    "15_Sentob-Nurata": 'Сентоб-Нурата',
                                                    "16_Tamdy": 'М-II Тамды',
                                                    "17_Uchkuduk": 'Учкудук',
                                                    "18_UGM_Navoiy": 'УГМ_Навоий',
                                                    "19_Hanabad": 'Ҳанабад',
                                                    "20_Payshanba": 'Пайшанба',
                                                    "21_Kushrabad": 'Кушрабад',
                                                    "22_Baysun": 'Байсун',
                                                    "23_Saryassiya": 'М-II Сарыассия',
                                                    "24_Shurchi": 'Шурчи',
                                                    "25_Termez": 'Термез',
                                                    "26_Syrdarya": 'М-II Сырдарья',
                                                    "27_Yangier": 'Янгиер',
                                                    "28_Gulistan": 'Гулистан',
                                                    "29_Chimgan": 'Чимган',
                                                    "30_Oygaing": 'Ойгаинг',
                                                    "31_Pskem": 'Пскем',
                                                    "32_Charvak": 'Чарвак',
                                                    "33_Almalyk": 'Алмалик',
                                                    "34_Angren": 'Ангрен',
                                                    "35_Bekabad": 'Бекабад',
                                                    "36_Dalverzin": 'М-II Дальверзин',
                                                    "37_Tyuyabuguz": 'Тюябугуз',
                                                    "38_Kokaral": 'Кокарал',
                                                    "39_Dukant": 'Дукант',
                                                    "40_Yangiyul": 'М-II Янгиюль',
                                                    "41_Sukok": 'Сукок',
                                                    "42_Nurafshon": 'Нурафшон',
                                                    "43_Fergana": 'Фергана',
                                                    "44_Kokand": 'Коканд',
                                                    "45_Kuva": 'Кува',
                                                    "46_Sarykanda": 'М-II Сарыканда',
                                                    "47_Shahimardan": 'Шаҳимардан',
                                                    "48_Tuyamuyun": 'Туямуюн',
                                                    "49_Khiva": 'Ҳива',
                                                    "50_Gurlen": 'Гурлен',
                                                    "51_Tashkent-Observatory": 'М-I Ташкент-Обсерватория',
                                                    "101_Dekhkanabad": 'М-II Дехканабад',
                                                    "102_Mubarek": 'М-II Муборек',
                                                    "103_Chimkurgan": 'О Чимкурган',
                                                    "104_Shakhrisyabz": 'Г-1 Шахрисябз',
                                                    "105_Guzar": 'М-II Гузар',
                                                    "106_Kashkadarya_GMB": 'М-II Аркабат',
                                                    "107_Bakhmal": 'М-II Бахмал',
                                                    "108_Gallaaral": 'АГМС Галляарал',
                                                    "109_Dustlik": 'М-II Дустлик',
                                                    "110_Lalmikor": 'Ляльмикор',
                                                    "112_Yangikishlak": 'М-II Янгикишлак',
                                                    "18_Navoiy_GMB": 'М-II Навои',
                                                    "33_Almalik": 'М-II Алмалык'
                                                };
                                                const StationName = stationNames[response.data.Stations.StationName] || response.data.Stations.StationName;


                                                if (response.data.Stations.Sources.Variables.length == 7) {
                                                    if (tempDry && tempDry.Value !== null) {
                                                        marker.bindPopup("" +
                                                            "<table class='table table-bordered'>" +
                                                            "<tr><td class='text-center' colspan='3'><b>" + StationName + "</b></td></tr>" +
                                                            "<tr><td><b>@lang('map.air_temperature')</b></td><td>" + tempDry.Value + " °C</td><td>" + new Date(tempDry.Meastime).toLocaleString() + "</td></tr>" +
                                                            "<tr><td><b>@lang('map.dew_point')</b></td><td>" + (dewPoint ? dewPoint.Value : '-') + " °C</td><td>" + (dewPoint ? new Date(dewPoint.Meastime).toLocaleString() : '-') + "</td></tr>" +
                                                            "<tr><td><b>@lang('map.relative_humidity')</b></td><td>" + (humidity ? humidity.Value : '-') + " %</td><td>" + (humidity ? new Date(humidity.Meastime).toLocaleString() : '-') + "</td></tr>" +
                                                            "<tr><td><b>@lang('map.10_during_sea_level_pressure')</b></td><td>" + (Seapressure ? Seapressure.Value : '-') + " гПа</td><td>" + (Seapressure ? new Date(Seapressure.Meastime).toLocaleString() : '-') + "</td></tr>" +
                                                            "<tr><td><b>@lang('map.current_pressure')</b></td><td>" + (pressure ? pressure.Value : '-') + " гПа</td><td>" + (pressure ? new Date(pressure.Meastime).toLocaleString() : '-') + "</td></tr>" +
                                                            "</table>"
                                                        )
                                                    } else {
                                                        marker.bindPopup("" +
                                                            "<table class='table table-bordered'>" +
                                                            "<tr ><td class='text-center' colspan='3'><b>" + StationName + "</b></td></tr>" +
                                                            "<tr ><td class='text-center text-danger' ><b>Проблемы с поставщиком сети!</b></td></tr>" +
                                                            "</table>"
                                                        )
                                                    }

                                                } else {
                                                    if (tempDry && tempDry.Value !== null) {
                                                        marker.bindPopup(
                                                            "<table class='table table-bordered'>" +
                                                            "<tr><td class='text-center' colspan='3'><b>" + StationName + "</b></td></tr>" +
                                                            "<tr><td><b>@lang('map.air_temperature')</b></td><td>" + tempDry.Value + " °C</td><td>" + new Date(tempDry.Meastime).toLocaleString() + "</td></tr>" +
                                                            "<tr><td><b>@lang('map.dew_point')</b></td><td>" + (dewPoint ? dewPoint.Value : '-') + " °C</td><td>" + (dewPoint ? new Date(dewPoint.Meastime).toLocaleString() : '-') + "</td></tr>" +
                                                            "<tr><td><b>@lang('map.relative_humidity')</b></td><td>" + (humidity ? humidity.Value : '-') + " %</td><td>" + (humidity ? new Date(humidity.Meastime).toLocaleString() : '-') + "</td></tr>" +
                                                            "<tr><td><b>@lang('map.10_during_sea_level_pressure')</b></td><td>" + (Seapressure ? Seapressure.Value : '-') + " гПа</td><td>" + (Seapressure ? new Date(Seapressure.Meastime).toLocaleString() : '-') + "</td></tr>" +
                                                            "<tr><td><b>@lang('map.current_pressure')</b></td><td>" + (pressure ? pressure.Value : '-') + " гПа</td><td>" + (pressure ? new Date(pressure.Meastime).toLocaleString() : '-') + "</td></tr>" +
                                                            {{--                                                            "<tr><td><b>@lang('map.qnh')</b></td><td>" + (qnh ? qnh.Value : '-') + " гПа</td><td>" + (qnh ? new Date(qnh.Meastime).toLocaleString() : '-') + "</td></tr>" +--}}
                                                                "<tr><td><b>@lang('map.10_the_amount_precipitation_during')</b></td><td>" + (prec ? prec.Value : '-') + " гПа</td><td>" + (prec ? new Date(prec.Meastime).toLocaleString() : '-') + "</td></tr>" +
                                                            "<tr><td><b>@lang('map.10_the_average_direction_wind_during')</b></td><td>" + (wind_direction ? wind_direction.Value : '-') + " гПа</td><td>" + (wind_direction ? new Date(wind_direction.Meastime).toLocaleString() : '-') + "</td></tr>" +
                                                            "<tr><td><b>@lang('map.10_average_wind_speed_during')</b></td><td>" + (wind_seed ? wind_seed.Value : '-') + " гПа</td><td>" + (wind_seed ? new Date(wind_seed.Meastime).toLocaleString() : '-') + "</td></tr>" +
                                                            "</table>"
                                                        );
                                                    } else {
                                                        marker.bindPopup("" +
                                                            "<table class='table table-bordered'>" +
                                                            "<tr ><td class='text-center' colspan='3'><b>" + StationName + "</b></td></tr>" +
                                                            "<tr ><td class='text-center text-danger' ><b>Проблемы с поставщиком сети!</b></td></tr>" +
                                                            "</table>"
                                                        )
                                                    }
                                                }


                                            })
                                            .catch(function (error) {
                                                marker.bindPopup("" +
                                                    "<table class='table table-bordered'>" +
                                                    "<tr ><td class='text-center' colspan='3'><b>" + StationName + "</b></td></tr>" +
                                                    "<tr ><td class='text-center text-danger' ><b>Проблемы с поставщиком сети!</b></td></tr>" +
                                                    "</table>"
                                                )
                                                // handle error
                                                console.log(error)
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                    });
                                    marker.fire('click');


                                    markers_awd.addLayer(marker);
                                }
                            } catch (e) {
                                // console.log('item: ' + item.Id)
                                console.log(e)
                            }
                        }
                    );


                    if (this.ChineStation != null) {
                        this.ChineStation.forEach(function (item, i, arr) {
                                var meteoIcon = L.icon({
                                    iconUrl: '{{asset('images/meteo_china.png')}}',
                                    iconSize: [28, 28], // size of the icon
                                    class: "station china"
                                });

                                if (item.Latitude !== null && item.Longitude !== null) {

                                    var marker = L.marker([parseFloat(item.Latitude), parseFloat(item.Longitude)], {icon: meteoIcon}).on('click', function () {
                                        axios.get('{{route('weather.chine.ChineStationCurrent')}}', {
                                            params: {
                                                station_id: item.WeatherStationId
                                            }
                                        })
                                            .then(function (response) {

                                                marker.bindPopup("" +
                                                    "<table class='table table-bordered'>" +
                                                    "<tr ><td class='text-center' colspan='2'><b>" + item.WeatherStationName + "</b></td></tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.air_temperature')</b></td>" +
                                                    "<td>" + response.data.temp + " °C </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.relative_humidity')</b></td>" +
                                                    "<td>" + response.data.hr + " % </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.current_pressure')<b/></td>" +
                                                    "<td>" + response.data.stp + " гПа </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map_chine.10_the_amount_precipitation_during')</b></td>" +
                                                    "<td>" + response.data.prsp + " мм </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map_chine.10_the_average_direction_wind_during')</b></td>" +
                                                    "<td>" + response.data.wd + " ° </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map_chine.10_average_wind_speed_during')</b></td>" +
                                                    "<td>" + response.data.ws + " м/с </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.date')</b></td>" +
                                                    "<td>" + response.data.datetime + "</td>" +
                                                    "</tr>" +
                                                    "</table>"
                                                )
                                            })
                                            .catch(function (error) {
                                                // handle error
                                                console.log(error + item.Id);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                    });
                                    marker.fire('click');


                                    markers_awd.addLayer(marker);
                                }

                            }
                        );
                    }

                    this.microstep.forEach(function (item, i, arr) {
                            var meteoIcon1 = L.icon({
                                iconUrl: '{{asset('images/meteo.png')}}',
                                iconSize: [28, 28], // size of the icon
                                class: "station"
                            });

                            var marker1 = L.marker([parseFloat(item.latitude), parseFloat(item.longitude)], {icon: meteoIcon1}).on('click', function () {
                                axios.get('{{route('map.MicrostepStations.get')}}', {
                                    params: {
                                        id: item.id
                                    }
                                })
                                    .then(function (response) {
                                        marker1.bindPopup("" +
                                            "<table class='table table-bordered'>" +
                                            "<tr ><td colspan='2' class='text-center'><b>" + app.checktoUndefine(item.station_name) + "</b></td></tr>" +
                                            "<tr>" +
                                            "<td><b>дата и время</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.datetime) + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>температура воздуха за измеряемый период</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.Ta, '°C') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>влажность</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.R, '%') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>точка росы<b/></td>" +
                                            "<td>" + app.checktoUndefine(response.data.Td, '°C') + "</td>" +
                                            "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>температура воздуха за последние 3 часа<b/></td>" +
                                            // "<td>" + response.data.Ta_avr + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>температура воздуха за последние 3 час</b></td>" +
                                            // "<td>" + response.data.Ta_min + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>температура воздуха за последние 3 час</b></td>" +
                                            // "<td>" + response.data.Ta_max + "</td>" +
                                            // "</tr>" +
                                            "<tr>" +
                                            "<td><b>Измеренное давление</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.P, 'mB') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>Давление, приведенное к уровню моря</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.P_sl, 'mB') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>барическая тенденция</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.a, 'a') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>скорость ветра средняя</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.ff_avr, 'm/c') + "</td>" +
                                            "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>скорость ветра в порыве (максимальная)</b></td>" +
                                            // "<td>" + response.data.ff_gust + "</td>" +
                                            // "</tr>" +
                                            "<tr>" +
                                            "<td><b>направление ветра</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.dd_avr, '°') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            // "<td><b>температура почвы на глубине 5см</b></td>" +
                                            // "<td>" + response.data.Ts5 + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>температура почвы на глубине 10см</b></td>" +
                                            // "<td>" + response.data.Ts10 + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>температура почвы на глубине 20см</b></td>" +
                                            // "<td>" + response.data.Ts20 + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>температура почвы на глубине 30см</b></td>" +
                                            // "<td>" + response.data.Ts30 + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>температура почвы на глубине 50см</b></td>" +
                                            // "<td>" + response.data.Ts50 + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>температура почвы на глубине 100см</b></td>" +
                                            // "<td>" + response.data.Ts100 + "</td>" +
                                            // "</tr>" +
                                            "<tr>" +
                                            "<td><b>высота снежного покрова</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.Hsnow, 'cm') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            // "<td><b>кол-во осадков за измеряемый период (5мин – 60мин)</b></td>" +
                                            // "<td>" + response.data.RR + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>кол-во осадков за последние 12 часов</b></td>" +
                                            // "<td>" + response.data.RR_12 + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>кол-во осадков за последние 24 часа</b></td>" +
                                            // "<td>" + response.data.RR_24 + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>влажность почвы на глубине 15 см.</b></td>" +
                                            // "<td>" + response.data.soil_moisture + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>состояния батарея</b></td>" +
                                            // "<td>" + response.data.battery + "</td>" +
                                            // "</tr>" +
                                            "<tr>" +
                                            "<td><b>высота станции</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.altitude, 'a.s.l.') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            // "<td><b>температура воздуха за последние 12 часов</b></td>" +
                                            // "<td>" + response.data.Ta_12h_avr + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>температура воздуха за последние 12 часов</b></td>" +
                                            // "<td>" + response.data.Ta_12h_min + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>температура воздуха за последние 12 часов</b></td>" +
                                            // "<td>" + response.data.Ta_12h_max + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>скорость ветра в порыве (максимальная) за последние 12 часов</b></td>" +
                                            // "<td>" + response.data.ff_gust_12h + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>скорость ветра в порыве (максимальная) за последние 3 часов</b></td>" +
                                            // "<td>" + response.data.ff_gust_3h + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            // "<td><b>скорость ветра в порыве (максимальная) за последние 1 часов</b></td>" +
                                            // "<td>" + response.data.ff_gust_1h + "</td>" +
                                            // "</tr>" +
                                            // "<tr>" +
                                            "<td><b>солнечная радиация Вт/кв.м.</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.SunRad, 'w/m') + "</td>" +
                                            "</tr>" +
                                            "</table>"
                                        )
                                    })
                                    .catch(function (error) {
                                        // handle error
                                        console.log(error);
                                    })
                                    .then(function () {
                                        // always executed
                                    });
                            });
                            marker1.fire('click');


                            markers_awd.addLayer(marker1);
                        }
                    );


                    var meteoIcon1 = L.icon({
                        iconUrl: '{{asset('images/meteo.png')}}',
                        iconSize: [28, 28], // size of the icon
                        class: "station"
                    });


                    var meteoIcon = L.icon({
                        iconUrl: '{{asset('images/meteo_china.png')}}',
                        iconSize: [28, 28], // size of the icon
                        class: "station china"
                    });


                    var marker = L.marker([parseFloat(41.5659297), parseFloat(69.7703922)], {icon: meteoIcon}).on('click', function () {
                        axios.get('{{route('map.awd.GetCrams')}}')
                            .then(function (response) {

                                marker.bindPopup("" +
                                    "<table class='table table-bordered'>" +
                                    "<tr ><td class='text-center' colspan='2'><b>Газалкент</b></td></tr>" +
                                    "<tr>" +
                                    "<td><b>@lang('map.air_temperature')</b></td>" +
                                    "<td>" + response.data.temp + " °C </td>" +
                                    "</tr>" +
                                    "<tr>" +
                                    "<td><b>@lang('map.relative_humidity')</b></td>" +
                                    "<td>" + response.data.humadity + " % </td>" +
                                    "</tr>" +
                                    "<tr>" +
                                    "<td><b>@lang('map.current_pressure')<b/></td>" +
                                    "<td>" + response.data.pressure + " гПа </td>" +
                                    "</tr>" +
                                    "<tr>" +
                                    "<td><b>@lang('map_chine.10_the_amount_precipitation_during')</b></td>" +
                                    "<td>" + response.data.presipation + " мм </td>" +
                                    "</tr>" +

                                    "<tr>" +
                                    "<td><b>@lang('map_chine.10_average_wind_speed_during')</b></td>" +
                                    "<td>" + response.data.wind_speed + " м/с </td>" +
                                    "</tr>" +
                                    "<tr>" +
                                    "<td><b>@lang('map.10_the_average_direction_wind_during')</b></td>" +
                                    "<td>" + response.data.wind_direction + " ° </td>" +
                                    "</tr>" +
                                    "<tr>" +
                                    "<td><b>@lang('map.date')</b></td>" +
                                    "<td>" + response.data.datetime + "</td>" +
                                    "</tr>" +
                                    "</table>"
                                )
                            })
                            .catch(function (error) {
                                // handle error
                                console.log(error);
                            })
                            .then(function () {
                                // always executed
                            });
                    });
                    marker.fire('click');


                    markers_awd.addLayer(marker);


                    map.addLayer(markers_awd);


                } else {
                    markers_awd.clearLayers();

                }
            },
            getRadiotion: function () {
                if (this.radiatsiya) {
                    axios.get('{{route('map.radiation.stations')}}')
                        .then(function (response) {

                            response.data.forEach(function (item, i, arr) {
                                var meteoIcon = L.icon({
                                    iconUrl: '{{asset('images/meteo.png')}}',
                                    iconSize: [28, 28], // size of the icon
                                    class: "station"
                                });


                                var marker = L.marker([parseFloat(item.latitude), parseFloat(item.longitude)], {icon: meteoIcon}).on('click', function () {
                                    app.stationIdr = item.id
                                    app.getStationSolnichni()
                                });


                                markers_radiatsiya.addLayer(marker);

                            })
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });


                    map.addLayer(markers_radiatsiya);


                }
            },
            getWaterCadastr: function () {
                if (this.water_cadastr) {

                    axios.get('{{route('map.watercadastr.get')}}')
                        .then(function (response) {


                            response.data.forEach(function (item, i, arr) {
                                var meteoIcon = L.icon({
                                    iconUrl: '{{asset('images/meteo.png')}}',
                                    iconSize: [28, 28], // size of the icon
                                    class: "station"
                                });
                                var marker = L.marker([parseFloat(item.geometry.coordinates[1]), parseFloat(item.geometry.coordinates[0])], {icon: meteoIcon}).on('click', function () {

                                    marker.bindPopup("" +
                                        "<table class='table table-bordered'>" +
                                        "<tr ><td class='text-center' colspan='2'><b>" + item.properties.post_nomi + "</b></td></tr>" +
                                        "<tr>" +
                                        "<td><b>code</b></td>" +
                                        "<td>" + item.properties.post_kodi + "</td>" +
                                        "</tr>" +
                                        // "<tr>" +
                                        // "<td><b>datetime</b></td>" +
                                        // "<td>" + item.properties.datetime + "</td>" +
                                        // "</tr>" +
                                        "<tr>" +
                                        "<td><b>distance</b></td>" +
                                        "<td>" + item.properties.masofa + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>location</b></td>" +
                                        "<td>" + item.properties.post_joylashuvi + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>number</b></td>" +
                                        "<td>" + item.properties.id_raqam + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>number1</b></td>" +
                                        "<td>" + item.properties.t_r + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>rivers</b></td>" +
                                        "<td>" + item.properties.obj_tip + "</td>" +
                                        "</tr>" +
                                        // "<tr>" +
                                        // "<td><b>square</b></td>" +
                                        // "<td>" + item.properties.square + "</td>" +
                                        // "</tr>" +
                                        // "<tr>" +
                                        // "<td><b>type</b></td>" +
                                        // "<td>" + item.properties.type + "</td>" +
                                        // "</tr>" +
                                        "</table>"
                                    )

                                });


                                marker.fire('click');


                                markers_watercadastr.addLayer(marker);


                                map.addLayer(markers_watercadastr);

                            })
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });


                    map.addLayer(markers_radiatsiya);

                }
            },
            getIrrigation: function () {
                if (this.irrigation) {

                    axios.get('{{route('amudar.getRealTimeData')}}')
                        .then(function (response) {
                            response.data.forEach(function (item, i, arr) {
                                var meteoIcon = L.icon({
                                    iconUrl: '{{asset('images/meteo.png')}}',
                                    iconSize: [28, 28], // size of the icon
                                    class: "station"
                                });
                                var marker = L.marker([parseFloat(item.geolocation.coordinates[0]), parseFloat(item.geolocation.coordinates[1])], {icon: meteoIcon}).on('click', function () {

                                    marker.bindPopup("" +
                                        "<table class='table table-bordered'>" +
                                        "<tr ><td class='text-center' colspan='2'><b>" + item.name + "</b></td></tr>" +
                                        "<tr>" +
                                        "<td><b>@lang('map.humidity')</b></td>" +
                                        "<td>" + item.data.AirH + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>@lang('map.temp')</b></td>" +
                                        "<td>" + item.data.AirT + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>@lang('map.cumulative_rainfall')</b></td>" +
                                        "<td>" + item.data.Rain + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>@lang('map.wind_direction')</b></td>" +
                                        "<td>" + item.data.WindD + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>@lang('map.wind_speed')</b></td>" +
                                        "<td>" + item.data.WindS + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>@lang('map.date')</b></td>" +
                                        "<td>" + moment(item.data.Time).format('YYYY-MM-DD HH:mm:ss') + "</td>" +
                                        "</tr>" +
                                        "</table>"
                                    )

                                });


                                marker.fire('click');


                                markers_irrigation.addLayer(marker);


                                map.addLayer(markers_irrigation);

                            })
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });


                    map.addLayer(markers_radiatsiya);

                }
            },
            getStationSolnichni: function () {
                axios.get('/map/radiation/station/' + this.stationIdr + '/' + this.year_r)
                    .then(function (response) {
                        app.radiation_data = response.data;

                        $("#descriptionModal").modal("show");
                        $(".navbar-collapse.in").collapse("hide");
                        return false;

                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error + item.Id);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            getAgro: function () {
                if (this.agro) {
                    // console.log(this.awds['Stations'][0].Metadata.Longitude);
                    // var marker = L.marker([parseFloat(this.awds['Stations'][0].Metadata.Latitude), parseFloat(this.awds['Stations'][1].Metadata.Longitude)]).addTo(map);


                    this.meteobots.forEach(function (item, i, arr) {
                        if (item.is_has_aq) {
                            var meteoIconAgro = L.icon({
                                iconUrl: '{{asset('images/meteo_agro.png')}}',
                                iconSize: [28, 28], // size of the icon
                                class: "station"
                            });

                            var marker = L.marker([parseFloat(item.latitude), parseFloat(item.longitude)], {icon: meteoIconAgro}).on('click', function () {
                                axios.get('{{route('meteobot.GetMeteoBotInfo')}}', {
                                    params: {
                                        id: item.sn
                                    }
                                })
                                    .then(function (response) {

                                        marker.bindPopup("" +
                                            "<table class='table table-bordered'>" +
                                            "<tr ><td colspan='2' class='text-center'><b>" + item.name + "</b></td></tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.date')</b></td>" +
                                            "<td>" + response.data[1] + " " + response.data[2] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.Soil.Moisture1') (-10) </b></td>" +
                                            "<td>" + response.data[10] + " %</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.Soil.Temp1') (-10) </b></td>" +
                                            "<td>" + response.data[11] + " °C</td>" +
                                            "</tr>" +
                                            "</table>"
                                        )
                                    })
                                    .catch(function (error) {
                                        // handle error
                                        console.log(error + item.Id);
                                    })
                                    .then(function () {
                                        // always executed
                                    });
                            });
                            marker.fire('click');


                            markers_agro.addLayer(marker);

                        } else {
                            var meteoIconAgro = L.icon({
                                iconUrl: '{{asset('images/meteo_agro.png')}}',
                                iconSize: [28, 28], // size of the icon
                                class: "station"
                            });

                            var marker = L.marker([parseFloat(item.latitude), parseFloat(item.longitude)], {icon: meteoIconAgro}).on('click', function () {
                                axios.get('{{route('meteobot.GetMeteoBotInfo')}}', {
                                    params: {
                                        id: item.sn
                                    }
                                })
                                    .then(function (response) {

                                        marker.bindPopup("" +
                                            "<table class='table table-bordered'>" +
                                            "<tr ><td colspan='2' class='text-center'><b>MeteoBot-36 / MeteoUz</b></td></tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.date')</b></td>" +
                                            "<td>" + response.data[1] + " " + response.data[2] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.Soil.Moisture1') (-10) </b></td>" +
                                            "<td>" + response.data[9] + " %</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.Soil.Moisture2') (-20)</b></td>" +
                                            "<td>" + response.data[10] + " %</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.Soil.Moisture3') (-30)</b></td>" +
                                            "<td>" + response.data[11] + " %</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.Soil.Temp1') (-10) </b></td>" +
                                            "<td>" + response.data[12] + " °C</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.Soil.Temp2') (-20)</b></td>" +
                                            "<td>" + response.data[13] + " °C</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.Soil.Temp3') (-30)</b></td>" +
                                            "<td>" + response.data[14] + " °C</td>" +
                                            "</tr>" +
                                            "</table>"
                                        )
                                    })
                                    .catch(function (error) {
                                        // handle error
                                        console.log(error + item.Id);
                                    })
                                    .then(function () {
                                        // always executed
                                    });
                            });
                            marker.fire('click');


                            markers_agro.addLayer(marker);
                        }
                    });
                    map.addLayer(markers_agro);

                    this.awds.Stations.forEach(function (item, i, arr) {


                            if ((item.Metadata.Latitude !== null && item.Metadata.Longitude !== null) && (item.Id == 59 || item.Id == 60 || item.Id == 61 || item.Id == 62 || item.Id == 63 || item.Id == 64 || item.Id == 55 || item.Id == 57 || item.Id == 53 || item.Id == 58 || item.Id == 54 || item.Id == 56)) {

                                var meteoIconAgro = L.icon({
                                    iconUrl: '{{asset('images/meteo_agro.png')}}',
                                    iconSize: [28, 28], // size of the icon
                                    class: "station"
                                });

                                var marker = L.marker([parseFloat(item.Metadata.Latitude), parseFloat(item.Metadata.Longitude)], {icon: meteoIconAgro}).on('click', function () {
                                    axios.post('{{route('map.awd.getStation')}}', {
                                        token: '{{@csrf_token()}}',
                                        id: item.Id
                                    })
                                        .then(function (response) {
                                            var StationName = '';

                                            switch (response.data.Stations.StationName) {
                                                case "01_Boz":
                                                    StationName = 'Боз';
                                                    break;
                                                case "02_Kurgantepa":
                                                    StationName = 'Кургантепа';
                                                    break;
                                                case "03_Ulugnar":
                                                    StationName = 'Улугнар';
                                                    break;
                                                case "04_Ayakagitma":
                                                    StationName = 'Аякагитма';
                                                    break;
                                                case "05_Djangeldy":
                                                    StationName = 'М-II Джангельды';
                                                    break;
                                                case "06_Karakul":
                                                    StationName = 'М-II Каракул';
                                                    break;
                                                case "07_Kysyl-Ravat":
                                                    StationName = 'М-IV Кызыл-Рават';
                                                    break;
                                                case "08_Akrabat":
                                                    StationName = 'Акрабат';
                                                    break;
                                                case "09_Minchukur":
                                                    StationName = 'Минчукур';
                                                    break;
                                                case "10_Kul":
                                                    StationName = 'Кул';
                                                    break;
                                                case "11_Akbaytal":
                                                    StationName = 'Акбайтал';
                                                    break;
                                                case "12_Buzaubay":
                                                    StationName = 'Бузаубай';
                                                    break;
                                                case "13_Mashikuduk":
                                                    StationName = 'Машикудук';
                                                    break;
                                                case "14_Nurata":
                                                    StationName = 'Нурата';
                                                    break;
                                                case "15_Sentob-Nurata":
                                                    StationName = 'Сентоб-Нурата';
                                                    break;
                                                case "16_Tamdy":
                                                    StationName = 'М-II Тамды';
                                                    break;
                                                case "17_Uchkuduk":
                                                    StationName = 'Учкудук';
                                                    break;
                                                case "18_UGM_Navoiy":
                                                    StationName = 'УГМ_Навоий';
                                                    break;
                                                case "19_Hanabad":
                                                    StationName = 'Ҳанабад';
                                                    break;
                                                case "20_Payshanba":
                                                    StationName = 'Пайшанба';
                                                    break;
                                                case "21_Kushrabad":
                                                    StationName = 'Кушрабад';
                                                    break;
                                                case "22_Baysun":
                                                    StationName = 'Байсун';
                                                    break;
                                                case "23_Saryassiya":
                                                    StationName = 'М-II Сарыассия';
                                                    break;
                                                case "24_Shurchi":
                                                    StationName = 'Шурчи';
                                                    break;
                                                case "25_Termez":
                                                    StationName = 'Термез';
                                                    break;
                                                case "26_Syrdarya":
                                                    StationName = 'М-II Сырдарья';
                                                    break;
                                                case "27_Yangier":
                                                    StationName = 'Янгиер';
                                                    break;
                                                case "28_Gulistan":
                                                    StationName = 'Гулистан';
                                                    break;
                                                case "29_Chimgan":
                                                    StationName = 'Чимган';
                                                    break;
                                                case "30_Oygaing":
                                                    StationName = 'Ойгаинг';
                                                    break;
                                                case "31_Pskem":
                                                    StationName = 'Пскем';
                                                    break;
                                                case "32_Charvak":
                                                    StationName = 'Чарвак';
                                                    break;
                                                case "33_Almalyk":
                                                    StationName = 'Алмалик';
                                                    break;
                                                case "34_Angren":
                                                    StationName = 'Ангрен';
                                                    break;
                                                case "35_Bekabad":
                                                    StationName = 'Бекабад';
                                                    break;
                                                case "36_Dalverzin":
                                                    StationName = 'М-II Дальверзин';
                                                    break;
                                                case "37_Tyuyabuguz":
                                                    StationName = 'Тюябугуз';
                                                    break;
                                                case "38_Kokaral":
                                                    StationName = 'Кокарал';
                                                    break;
                                                case "39_Dukant":
                                                    StationName = 'Дукант';
                                                    break;
                                                case "40_Yangiyul":
                                                    StationName = 'М-II Янгиюль';
                                                    break;
                                                case "41_Sukok":
                                                    StationName = 'Сукок';
                                                    break;
                                                case "42_Nurafshon":
                                                    StationName = 'Нурафшон';
                                                    break;
                                                case "43_Fergana":
                                                    StationName = 'Фергана';
                                                    break;
                                                case "44_Kokand":
                                                    StationName = 'Коканд';
                                                    break;
                                                case "45_Kuva":
                                                    StationName = 'Кува';
                                                    break;
                                                case "46_Sarykanda":
                                                    StationName = 'М-II Сарыканда';
                                                    break;
                                                case "47_Shahimardan":
                                                    StationName = 'Шаҳимардан';
                                                    break;
                                                case "48_Tuyamuyun":
                                                    StationName = 'Туямуюн';
                                                    break;
                                                case "49_Khiva":
                                                    StationName = 'Ҳива';
                                                    break;
                                                case "50_Gurlen":
                                                    StationName = 'Гурлен';
                                                    break;
                                                case "51_Tashkent-Observatory":
                                                    StationName = 'М-I Ташкент-Обсерватория';
                                                    break;
                                                case "108_Gallaaral":
                                                    StationName = 'АГМС Галляарал';
                                                    break;
                                                case "109_Dustlik":
                                                    StationName = 'М-II Дустлик';
                                                    break;
                                                case "110_Lalmikor":
                                                    StationName = 'Ляльмикор';
                                                    break;
                                                case "107_Bakhmal":
                                                    StationName = 'М-II Бахмал';
                                                    break;
                                                case "112_Yangikishlak":
                                                    StationName = 'М-II Янгикишлак';
                                                    break;
                                                case "106_Kashkadarya_GMB":
                                                    StationName = 'М-II Аркабат';
                                                    break;
                                                case "105_Guzar":
                                                    StationName = 'М-II Гузар';
                                                    break;
                                                case "101_Dekhkanabad":
                                                    StationName = 'М-II Дехканабад';
                                                    break;
                                                case "102_Mubarek":
                                                    StationName = 'М-II Муборек';
                                                    break;
                                                case "103_Chimkurgan":
                                                    StationName = 'О Чимкурган';
                                                    break;
                                                case "104_Shakhrisyabz":
                                                    StationName = 'Г-1 Шахрисябз';
                                                    break;
                                                case "18_Navoiy_GMB":
                                                    StationName = 'М-II Навои';
                                                    break;
                                                case "33_Almalik":
                                                    StationName = 'М-II Алмалык';
                                                    break;
                                                default :
                                                    StationName = response.data.Stations.StationName;
                                                    break;
                                            }


                                            marker.bindPopup("" +
                                                "<table class='table table-bordered'>" +
                                                "<tr ><td class='text-center' colspan='3'><b>" + StationName + "</b></td></tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.Soil.Moisture1')</b></td>" +
                                                "<td>" + app.checktoUndefine(response.data.Stations.Sources.Variables[37].Value['Value']) + " % </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[37].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.Soil.Moisture2')</b></td>" +
                                                "<td>" + app.checktoUndefine(response.data.Stations.Sources.Variables[36].Value['Value']) + " %</td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[36].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.Soil.Moisture3')</b></td>" +
                                                "<td>" + app.checktoUndefine(response.data.Stations.Sources.Variables[35].Value['Value']) + " % </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[35].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.Soil.Moisture4')</b></td>" +
                                                "<td>" + app.checktoUndefine(response.data.Stations.Sources.Variables[34].Value['Value']) + " %  </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[34].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.Soil.Temp1')</b></td>" +
                                                "<td>" + app.checktoUndefine(response.data.Stations.Sources.Variables[41].Value['Value']) + " °C </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[41].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.Soil.Temp2')</b></td>" +
                                                "<td>" + app.checktoUndefine(response.data.Stations.Sources.Variables[40].Value['Value']) + " °C </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[40].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.Soil.Temp3')</b></td>" +
                                                "<td>" + app.checktoUndefine(response.data.Stations.Sources.Variables[39].Value['Value']) + " °C </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[39].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.Soil.Temp4')</b></td>" +
                                                "<td>" + app.checktoUndefine(response.data.Stations.Sources.Variables[38].Value['Value']) + " °C </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[38].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            )
                                        })
                                        .catch(function (error) {
                                            // handle error
                                            console.log(error + item.Id);
                                        })
                                        .then(function () {
                                            // always executed
                                        });
                                });
                                marker.fire('click');


                                markers_agro.addLayer(marker);
                            }

                        }
                    );

                    map.addLayer(markers_agro);


                } else {
                    markers_agro.clearLayers();

                }
            },
            GetMini: function () {
                if (this.mini) {
                    var total = 0;


                    this.awds.Stations.forEach(function (item, i, arr) {
                            const fontAwesomeIcon = L.divIcon({
                                html: '<div style="color:#23D41E"><i class="fa fa-map-marker fa-2x"></i></div>',
                                iconSize: [32, 32],
                                className: 'myDivIcon'
                            });

                            if (item.Metadata.AwsId == 6
                                || item.Metadata.AwsId == 55
                                || item.Metadata.AwsId == 5
                                || item.Metadata.AwsId == 17
                                || item.Metadata.AwsId == 16
                                || item.Metadata.AwsId == 14
                                || item.Metadata.AwsId == 44
                                || item.Metadata.AwsId == 2
                                || item.Metadata.AwsId == 31
                                || item.Metadata.AwsId == 32) {

                                total++;
                                var marker = L.marker([parseFloat(item.Metadata.Latitude), parseFloat(item.Metadata.Longitude)], {icon: fontAwesomeIcon}).on('click', function () {
                                    axios.post('{{route('map.awd.getStation')}}', {
                                        token: '{{@csrf_token()}}',
                                        id: item.Id
                                    })
                                        .then(function (response) {
                                            var StationName = '';

                                            switch (response.data.Stations.StationName) {
                                                case "01_Boz":
                                                    StationName = 'Боз';
                                                    break;
                                                case "02_Kurgantepa":
                                                    StationName = 'Кургантепа';
                                                    break;
                                                case "03_Ulugnar":
                                                    StationName = 'Улугнар';
                                                    break;
                                                case "04_Ayakagitma":
                                                    StationName = 'Аякагитма';
                                                    break;
                                                case "05_Djangeldy":
                                                    StationName = 'М-II Джангельды';
                                                    break;
                                                case "06_Karakul":
                                                    StationName = 'М-II Каракул';
                                                    break;
                                                case "07_Kysyl-Ravat":
                                                    StationName = 'М-IV Кызыл-Рават';
                                                    break;
                                                case "08_Akrabat":
                                                    StationName = 'Акрабат';
                                                    break;
                                                case "09_Minchukur":
                                                    StationName = 'Минчукур';
                                                    break;
                                                case "10_Kul":
                                                    StationName = 'Кул';
                                                    break;
                                                case "11_Akbaytal":
                                                    StationName = 'Акбайтал';
                                                    break;
                                                case "12_Buzaubay":
                                                    StationName = 'Бузаубай';
                                                    break;
                                                case "13_Mashikuduk":
                                                    StationName = 'Машикудук';
                                                    break;
                                                case "14_Nurata":
                                                    StationName = 'Нурата';
                                                    break;
                                                case "15_Sentob-Nurata":
                                                    StationName = 'Сентоб-Нурата';
                                                    break;
                                                case "16_Tamdy":
                                                    StationName = 'М-II Тамды';
                                                    break;
                                                case "17_Uchkuduk":
                                                    StationName = 'Учкудук';
                                                    break;
                                                case "18_UGM_Navoiy":
                                                    StationName = 'УГМ_Навоий';
                                                    break;
                                                case "19_Hanabad":
                                                    StationName = 'Ҳанабад';
                                                    break;
                                                case "20_Payshanba":
                                                    StationName = 'Пайшанба';
                                                    break;
                                                case "21_Kushrabad":
                                                    StationName = 'Кушрабад';
                                                    break;
                                                case "22_Baysun":
                                                    StationName = 'Байсун';
                                                    break;
                                                case "23_Saryassiya":
                                                    StationName = 'М-II Сарыассия';
                                                    break;
                                                case "24_Shurchi":
                                                    StationName = 'Шурчи';
                                                    break;
                                                case "25_Termez":
                                                    StationName = 'Термез';
                                                    break;
                                                case "26_Syrdarya":
                                                    StationName = 'М-II Сырдарья';
                                                    break;
                                                case "27_Yangier":
                                                    StationName = 'Янгиер';
                                                    break;
                                                case "28_Gulistan":
                                                    StationName = 'Гулистан';
                                                    break;
                                                case "29_Chimgan":
                                                    StationName = 'Чимган';
                                                    break;
                                                case "30_Oygaing":
                                                    StationName = 'Ойгаинг';
                                                    break;
                                                case "31_Pskem":
                                                    StationName = 'Пскем';
                                                    break;
                                                case "32_Charvak":
                                                    StationName = 'Чарвак';
                                                    break;
                                                case "33_Almalyk":
                                                    StationName = 'Алмалик';
                                                    break;
                                                case "34_Angren":
                                                    StationName = 'Ангрен';
                                                    break;
                                                case "35_Bekabad":
                                                    StationName = 'Бекабад';
                                                    break;
                                                case "36_Dalverzin":
                                                    StationName = 'М-II Дальверзин';
                                                    break;
                                                case "37_Tyuyabuguz":
                                                    StationName = 'Тюябугуз';
                                                    break;
                                                case "38_Kokaral":
                                                    StationName = 'Кокарал';
                                                    break;
                                                case "39_Dukant":
                                                    StationName = 'Дукант';
                                                    break;
                                                case "40_Yangiyul":
                                                    StationName = 'М-II Янгиюль';
                                                    break;
                                                case "41_Sukok":
                                                    StationName = 'Сукок';
                                                    break;
                                                case "42_Nurafshon":
                                                    StationName = 'Нурафшон';
                                                    break;
                                                case "43_Fergana":
                                                    StationName = 'Фергана';
                                                    break;
                                                case "44_Kokand":
                                                    StationName = 'Коканд';
                                                    break;
                                                case "45_Kuva":
                                                    StationName = 'Кува';
                                                    break;
                                                case "46_Sarykanda":
                                                    StationName = 'М-II Сарыканда';
                                                    break;
                                                case "47_Shahimardan":
                                                    StationName = 'Шаҳимардан';
                                                    break;
                                                case "48_Tuyamuyun":
                                                    StationName = 'Туямуюн';
                                                    break;
                                                case "49_Khiva":
                                                    StationName = 'Ҳива';
                                                    break;
                                                case "50_Gurlen":
                                                    StationName = 'Гурлен';
                                                    break;
                                                case "51_Tashkent-Observatory":
                                                    StationName = 'М-I Ташкент-Обсерватория';
                                                    break;
                                                case "108_Gallaaral":
                                                    StationName = 'АГМС Галляарал';
                                                    break;
                                                case "109_Dustlik":
                                                    StationName = 'М-II Дустлик';
                                                    break;
                                                case "110_Lalmikor":
                                                    StationName = 'Ляльмикор';
                                                    break;
                                                case "107_Bakhmal":
                                                    StationName = 'М-II Бахмал';
                                                    break;
                                                case "112_Yangikishlak":
                                                    StationName = 'М-II Янгикишлак';
                                                    break;
                                                case "106_Kashkadarya_GMB":
                                                    StationName = 'М-II Аркабат';
                                                    break;
                                                case "105_Guzar":
                                                    StationName = 'М-II Гузар';
                                                    break;
                                                case "101_Dekhkanabad":
                                                    StationName = 'М-II Дехканабад';
                                                    break;
                                                case "102_Mubarek":
                                                    StationName = 'М-II Муборек';
                                                    break;
                                                case "103_Chimkurgan":
                                                    StationName = 'О Чимкурган';
                                                    break;
                                                case "104_Shakhrisyabz":
                                                    StationName = 'Г-1 Шахрисябз';
                                                    break;
                                                case "18_Navoiy_GMB":
                                                    StationName = 'М-II Навои';
                                                    break;
                                                case "33_Almalik":
                                                    StationName = 'М-II Алмалык';
                                                    break;
                                                default :
                                                    StationName = response.data.Stations.StationName;
                                                    break;
                                            }
                                            marker.bindPopup("" +
                                                "<table class='table table-bordered'>" +
                                                "<tr ><td class='text-center' colspan='3'><b>" + StationName + "</b></td></tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.air_temperature')</b></td>" +
                                                "<td>" + response.data.Stations.Sources.Variables[24].Value['Value'] + " °C </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[2].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dew_point')</b></td>" +
                                                "<td>" + response.data.Stations.Sources.Variables[5].Value['Value'] + " °C </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[5].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.relative_humidity')</b></td>" +
                                                "<td>" + response.data.Stations.Sources.Variables[7].Value['Value'] + " % </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[7].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.current_pressure')<b/></td>" +
                                                "<td>" + response.data.Stations.Sources.Variables[25].Value['Value'] + " гПа </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[25].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.10_during_sea_level_pressure')<b/></td>" +
                                                "<td>" + response.data.Stations.Sources.Variables[10].Value['Value'] + " гПа </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[10].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.10_the_amount_precipitation_during')</b></td>" +
                                                "<td>" + response.data.Stations.Sources.Variables[13].Value['Value'] + " мм </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[13].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.10_the_average_direction_wind_during')</b></td>" +
                                                "<td>" + response.data.Stations.Sources.Variables[14].Value['Value'] + " ° </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[14].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.10_average_wind_speed_during')</b></td>" +
                                                "<td>" + response.data.Stations.Sources.Variables[17].Value['Value'] + " м/с </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[17].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.10_the_average_amount_solar_radiation_during')</b></td>" +
                                                "<td>" + response.data.Stations.Sources.Variables[21].Value['Value'] + " Вт/м2 </td>" +
                                                "<td>" + new Date(response.data.Stations.Sources.Variables[21].Value['Meastime']).toLocaleString() + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).bindTooltip("<div class='pin-info' style='background-color:#099E35'><b>" + response.data.Stations.Sources.Variables[24].Value['Value'] + " °C</b></div>",
                                                {
                                                    permanent: true,
                                                    direction: 'top',
                                                    className: 'ownClassMini'
                                                });
                                        })
                                        .catch(function (error) {
                                            // handle error
                                            console.log(error + item.Id);
                                        })
                                        .then(function () {
                                            // always executed
                                        });
                                });
                                marker.fire('click');


                                markers_mini.addLayer(marker);
                            }

                        }
                    );

                    if (this.ChineStation != null) {
                        this.ChineStation.forEach(function (item, i, arr) {

                                const fontAwesomeIcon = L.divIcon({
                                    html: '<div style="color:#23D41E"><i class="fa fa-map-marker fa-2x"></i></div>',
                                    iconSize: [32, 32],
                                    className: 'myDivIcon'
                                });

                                if (item.Latitude !== null && item.Longitude !== null) {
                                    total++;
                                    var marker = L.marker([parseFloat(item.Latitude), parseFloat(item.Longitude)], {icon: fontAwesomeIcon}).on('click', function () {
                                        axios.get('{{route('weather.chine.ChineStationCurrent')}}', {
                                            params: {
                                                station_id: item.WeatherStationId
                                            }
                                        })
                                            .then(function (response) {
                                                marker.bindPopup("" +
                                                    "<table class='table table-bordered'>" +
                                                    "<tr ><td class='text-center' colspan='2'><b>" + item.WeatherStationName + "</b></td></tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.air_temperature')</b></td>" +
                                                    "<td>" + response.data.temp + " °C </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.relative_humidity')</b></td>" +
                                                    "<td>" + response.data.hr + " % </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.current_pressure')<b/></td>" +
                                                    "<td>" + response.data.stp + " гПа </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map_chine.10_the_amount_precipitation_during')</b></td>" +
                                                    "<td>" + response.data.prsp + " мм </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map_chine.10_the_average_direction_wind_during')</b></td>" +
                                                    "<td>" + response.data.wd + " ° </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map_chine.10_average_wind_speed_during')</b></td>" +
                                                    "<td>" + response.data.ws + " м/с </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.date')</b></td>" +
                                                    "<td>" + response.data.datetime + "</td>" +
                                                    "</tr>" +
                                                    "</table>"
                                                ).bindTooltip("<div class='pin-info' style='background-color:#099E35'><b>" + response.data.temp + "</b></div>",
                                                    {
                                                        permanent: true,
                                                        direction: 'top',
                                                        className: 'ownClassMini'

                                                    });
                                            })
                                            .catch(function (error) {
                                                // handle error
                                                console.log(error + item.Id);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                    });
                                    marker.fire('click');


                                    markers_mini.addLayer(marker);
                                }

                            }
                        );
                    }


                    axios.get('{{route('map.GetAmbientweather')}}')
                        .then(function (response) {
                            if (response.data.lastData.tempf) {
                                total++;
                                const fontAwesomeIcon = L.divIcon({
                                    html: '<div style="color:#23D41E"><i class="fa fa-map-marker fa-2x"></i></div>',
                                    iconSize: [32, 32],
                                    className: 'myDivIcon'
                                });
                                var marker = L.marker([parseFloat(41.145047), parseFloat(72.100455)], {icon: fontAwesomeIcon})
                                    .on('click', function () {
                                        marker.bindPopup("" +
                                            "<table class='table table-bordered'>" +
                                            "<tr ><td colspan='2' class='text-center'><b>Учқўрғон</b></td></tr>" +
                                            "<tr>" +
                                            "<td><b>дата и время</b></td>" +
                                            "<td>" + moment(response.data.lastData.date).format('YYYY-MM-DD HH:mm:ss') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>температура воздуха за измеряемый период</b></td>" +
                                            "<td>" + app.checktoUndefine(app.FarangetToCelsium(response.data.lastData.tempf), '°C') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>точка росы<b/></td>" +
                                            "<td>" + response.data.lastData.dewPoint + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>скорость ветра</b></td>" +
                                            "<td>" + response.data.lastData.windspeedmph + 'm/c' + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>направление ветра</b></td>" +
                                            "<td>" + response.data.lastData.winddir + '°' + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>высота станции</b></td>" +
                                            "<td>" + app.checktoUndefine(Math.round(response.data.info.coords.elevation), 'a.s.l.') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>осадка</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.lastData.hourlyrainin) + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>PM2.5</b></td>" +
                                            "<td>" + app.checktoUndefine(response.data.lastData.pm25) + "</td>" +
                                            "</tr>" +
                                            "</table>")


                                    })
                                    .bindTooltip("<div class='pin-info' style='background-color:#099E35'><b>" + app.checktoUndefine(app.FarangetToCelsium(response.data.lastData.tempf), '°') + "</b></div>",
                                        {
                                            permanent: true,
                                            direction: 'top',
                                            className: 'ownClassMini'

                                        });

                                marker.fire('click');


                                markers_mini.addLayer(marker);
                            }


                            map.addLayer(markers_mini);

                            // handle success
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });


                    axios.get('{{route('bukhara_chines.getRealTimeData')}}')
                        .then(function (response) {
                            if (response.data.data[3].dataItem[1].registerItem[0].data) {
                                total++;
                                const fontAwesomeIcon = L.divIcon({
                                    html: '<div style="color:#23D41E"><i class="fa fa-map-marker fa-2x"></i></div>',
                                    iconSize: [32, 32],
                                    className: 'myDivIcon'
                                });
                                var marker2 = L.marker([parseFloat(39.501), parseFloat(64.794)], {icon: fontAwesomeIcon})
                                    .on('click', function () {
                                        marker2.bindPopup("" +
                                            "<table class='table table-bordered'>" +
                                            "<tr ><td colspan='2' class='text-center'><b>Қоравулбозор</b></td></tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.date')</b></td>" +
                                            "<td>" + moment(response.data.data[3].timeStamp).format('YYYY-MM-DD HH:mm:ss') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.temp') </b></td>" +
                                            "<td>" + response.data.data[3].dataItem[0].registerItem[0].data + ' ' + response.data.data[3].dataItem[0].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.humidity')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[0].registerItem[1].data + ' ' + response.data.data[3].dataItem[0].registerItem[1].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>CO2 </b></td>" +
                                            "<td>" + response.data.data[3].dataItem[1].registerItem[0].data + ' ' + response.data.data[3].dataItem[1].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.wind_speed')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[3].registerItem[1].data + ' ' + response.data.data[3].dataItem[3].registerItem[1].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.wind_direction')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[4].registerItem[0].data + ' ' + response.data.data[3].dataItem[4].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.temp_soil')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[5].registerItem[0].data + ' ' + response.data.data[3].dataItem[5].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.humadity_soil')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[5].registerItem[1].data + ' ' + response.data.data[3].dataItem[5].registerItem[1].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.ec')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[6].registerItem[0].data + ' ' + response.data.data[3].dataItem[6].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.cumulative_rainfall')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[7].registerItem[0].data + ' ' + response.data.data[3].dataItem[7].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.ra')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[8].registerItem[0].data + ' ' + response.data.data[3].dataItem[8].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.leaf_temp')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[9].registerItem[0].data + ' ' + response.data.data[3].dataItem[9].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.wetness')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[9].registerItem[1].data + ' ' + response.data.data[3].dataItem[9].registerItem[1].unit + "</td>" +
                                            "</tr>" +
                                            "</table>")


                                    })
                                    .bindTooltip("<div class='pin-info' style='background-color:#099E35'><b>" + response.data.data[3].dataItem[0].registerItem[0].data + '°' + "</b></div>",
                                        {
                                            permanent: true,
                                            direction: 'top',
                                            className: 'ownClassMini'

                                        });

                                marker2.fire('click');


                                markers_mini.addLayer(marker2);
                            }


                            map.addLayer(markers_mini);

                            // handle success
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });


                    map.addLayer(markers_mini);


                    this.meteobots.forEach(function (item, i, arr) {
                        total++;
                        if (item.is_has_aq) {
                            axios.get('{{route('meteobot.GetMeteoBotInfo')}}', {
                                params: {
                                    id: item.sn
                                }
                            })
                                .then(function (response) {
                                    if (response.data[3]) {
                                        const fontAwesomeIcon = L.divIcon({
                                            html: '<div style="color:#23D41E"><i class="fa fa-map-marker fa-2x"></i></div>',
                                            iconSize: [32, 32],
                                            className: 'myDivIcon'
                                        });
                                        var marker2 = L.marker([parseFloat(item.latitude), parseFloat(item.longitude)], {icon: fontAwesomeIcon})
                                            .on('click', function () {
                                                marker2.bindPopup("" +
                                                    "<table class='table table-bordered'>" +
                                                    "<tr ><td colspan='2' class='text-center'><b>" + item.name + "</b></td></tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.date')</b></td>" +
                                                    "<td>" + response.data[1] + " " + response.data[2] + "</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.temp') </b></td>" +
                                                    "<td>" + response.data[3] + " °C</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.humidity') </b></td>" +
                                                    "<td>" + response.data[4] + " %</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.current_pressure') </b></td>" +
                                                    "<td>" + response.data[5] + "  гПа</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.dew_point') </b></td>" +
                                                    "<td>" + response.data[6] + "</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.10_the_amount_precipitation_during') </b></td>" +
                                                    "<td>" + response.data[7] + "  мм</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.wind_speed') </b></td>" +
                                                    "<td>" + response.data[8] + "  м/с</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.wind_direction') </b></td>" +
                                                    "<td>" + response.data[9] + " °</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.Soil.Moisture1') (-10) </b></td>" +
                                                    "<td>" + response.data[10] + " %</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.Soil.Temp1') (-10) </b></td>" +
                                                    "<td>" + response.data[11] + " °C</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>PM2.5</b></td>" +
                                                    "<td>" + response.data[13] + " µg/m³</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>PM10</b></td>" +
                                                    "<td>" + response.data[15] + " µg/m³</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>CO2</b></td>" +
                                                    "<td>" + response.data[17] + " µg/m³</td>" +
                                                    "</tr>" +
                                                    "</table>"
                                                )


                                            })
                                            .bindTooltip("<div class='pin-info' style='background-color:#099E35'><b>" + response.data[3] + '°' + "</b></div>",
                                                {
                                                    permanent: true,
                                                    direction: 'top',
                                                    className: 'ownClassMini'

                                                });

                                        marker2.fire('click');


                                        markers_mini.addLayer(marker2);
                                    }


                                    map.addLayer(markers_mini);

                                    // handle success
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });

                        } else {
                            axios.get('{{route('meteobot.GetMeteoBotInfo')}}', {
                                params: {
                                    id: item.sn
                                }
                            })
                                .then(function (response) {
                                    if (response.data[3]) {
                                        const fontAwesomeIcon = L.divIcon({
                                            html: '<div style="color:#23D41E"><i class="fa fa-map-marker fa-2x"></i></div>',
                                            iconSize: [32, 32],
                                            className: 'myDivIcon'
                                        });
                                        var marker2 = L.marker([parseFloat(item.latitude), parseFloat(item.longitude)], {icon: fontAwesomeIcon})
                                            .on('click', function () {
                                                marker2.bindPopup("" +
                                                    "<table class='table table-bordered'>" +
                                                    "<tr ><td colspan='2' class='text-center'><b>" + item.name + "</b></td></tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.date')</b></td>" +
                                                    "<td>" + response.data[1] + " " + response.data[2] + "</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.temp') </b></td>" +
                                                    "<td>" + response.data[3] + " °C</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.humidity') </b></td>" +
                                                    "<td>" + response.data[4] + " %</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.current_pressure') </b></td>" +
                                                    "<td>" + response.data[5] + " гПа</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.dew_point') </b></td>" +
                                                    "<td>" + response.data[6] + " </td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.10_the_amount_precipitation_during') </b></td>" +
                                                    "<td>" + response.data[7] + " мм</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.wind_speed') </b></td>" +
                                                    "<td>" + response.data[8] + " м/с</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.Soil.Moisture1') (-10) </b></td>" +
                                                    "<td>" + response.data[9] + " %</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.Soil.Moisture2') (-20)</b></td>" +
                                                    "<td>" + response.data[10] + " %</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.Soil.Moisture3') (-30)</b></td>" +
                                                    "<td>" + response.data[11] + " %</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.Soil.Temp1') (-10) </b></td>" +
                                                    "<td>" + response.data[12] + " °C</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.Soil.Temp2') (-20)</b></td>" +
                                                    "<td>" + response.data[13] + " °C</td>" +
                                                    "</tr>" +
                                                    "<tr>" +
                                                    "<td><b>@lang('map.Soil.Temp3') (-30)</b></td>" +
                                                    "<td>" + response.data[14] + " °C</td>" +
                                                    "</tr>" +
                                                    "</table>"
                                                )


                                            })
                                            .bindTooltip("<div class='pin-info' style='background-color:#099E35'><b>" + response.data[3] + '°' + "</b></div>",
                                                {
                                                    permanent: true,
                                                    direction: 'top',
                                                    className: 'ownClassMini'

                                                });

                                        marker2.fire('click');


                                        markers_mini.addLayer(marker2);
                                    }


                                    map.addLayer(markers_mini);

                                    // handle success
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });

                        }
                    });
                    var temp = null;
                    axios.get('https://meteoapi.meteo.uz/api/aws/amudario')
                        .then(function (response) {
                            response.data.forEach(function (item, i, arr) {
                                const fontAwesomeIcon = L.divIcon({
                                    html: '<div style="color:#8E24AA"><i class="fa fa-map-marker fa-2x"></i></div>',
                                    iconSize: [32, 32],
                                    className: 'myDivIcon'
                                });
                                var marker2 = L.marker([parseFloat(item.latitude), parseFloat(item.longitude)], {icon: fontAwesomeIcon})
                                    .on('click', function () {
                                        axios.get('https://meteoapi.meteo.uz/api/aws/amudario/' + item.station_id)
                                            .then(function (response) {
                                                var content = "<tr ><td colspan='2' class='text-center'><b>" + item.name + "</b></td></tr>";

                                                if (response.data['Time'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>@lang('map.date')</b></td>" +
                                                        "<td>" + moment(response.data['Time']).format('YYYY.MM.DD HH:mm:ss') + "</td>" +
                                                        "</tr>";
                                                if (response.data['AirT'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>@lang('map.temp') </b></td>" +
                                                        "<td>" + response.data['AirT'] + " °C</td>" +
                                                        "</tr>";
                                                if (response.data['AirH'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Относительная влажность воздуха</b></td>" +
                                                        "<td>" + response.data['AirH'] + " %</td>" +
                                                        "</tr>";
                                                if (response.data['WindD'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Направление ветра относительно севера</b></td>" +
                                                        "<td>" + response.data['WindD'] + " °</td>" +
                                                        "</tr>";
                                                if (response.data['WindS'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Средняя скорость ветра</b></td>" +
                                                        "<td>" + response.data['WindS'] + " m/s</td>" +
                                                        "</tr>";
                                                if (response.data['WindMax'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Скорость порыва ветра</b></td>" +
                                                        "<td>" + response.data['WindMax'] + " m/s</td>" +
                                                        "</tr>";
                                                if (response.data['AirP'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Атмосферное давление</b></td>" +
                                                        "<td>" + response.data['AirP'] + " hPa</td>" +
                                                        "</tr>";
                                                if (response.data['LeafT'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Температура лепестка</b></td>" +
                                                        "<td>" + response.data['LeafT'] + " °C</td>" +
                                                        "</tr>";
                                                if (response.data['LeafW'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Влажность лепестка</b></td>" +
                                                        "<td>" + response.data['LeafW'] + " %</td>" +
                                                        "</tr>";
                                                if (response.data['PAR'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Фотосинтетически активная радиация</b></td>" +
                                                        "<td>" + response.data['PAR'] + " μmol/m²s</td>" +
                                                        "</tr>";
                                                if (response.data['Rain'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Уровень осадков</b></td>" +
                                                        "<td>" + response.data['Rain'] + " мм</td>" +
                                                        "</tr>";
                                                if (response.data['CO2'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Концентрация CO2</b></td>" +
                                                        "<td>" + response.data['CO2'] + " ppm</td>" +
                                                        "</tr>";
                                                if (response.data['PM2.5'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Концентрация мелкодисперсных частиц (PM2.5</b></td>" +
                                                        "<td>" + response.data['PM2.5'] + " μg/m³</td>" +
                                                        "</tr>";
                                                if (response.data['PM10'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Концентрация крупных частиц (PM10)</b></td>" +
                                                        "<td>" + response.data['PM10'] + " μg/m³</td>" +
                                                        "</tr>";
                                                if (response.data['SoilT'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Температура почвы (30см)</b></td>" +
                                                        "<td>" + response.data['SoilT'] + " °C</td>" +
                                                        "</tr>";
                                                if (response.data['SoilT_1'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Температура почвы (60см)</b></td>" +
                                                        "<td>" + response.data['SoilT_1'] + " °C</td>" +
                                                        "</tr>";
                                                if (response.data['SoilT_2'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Температура почвы (90см)</b></td>" +
                                                        "<td>" + response.data['SoilT_2'] + " °C</td>" +
                                                        "</tr>";
                                                if (response.data['SoilT_3'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Температура почвы (120см)</b></td>" +
                                                        "<td>" + response.data['SoilT_3'] + " °C</td>" +
                                                        "</tr>";
                                                if (response.data['SoilVWC'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Влажность почвы (30см)</b></td>" +
                                                        "<td>" + response.data['SoilVWC'] + " %</td>" +
                                                        "</tr>";
                                                if (response.data['SoilVWC_1'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Влажность почвы (60см)</b></td>" +
                                                        "<td>" + response.data['SoilVWC_1'] + " %</td>" +
                                                        "</tr>";
                                                if (response.data['SoilVWC_2'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Влажность почвы (90см)</b></td>" +
                                                        "<td>" + response.data['SoilVWC_2'] + " %</td>" +
                                                        "</tr>";
                                                if (response.data['SoilVWC_3'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Влажность почвы (120см)</b></td>" +
                                                        "<td>" + response.data['SoilVWC_3'] + " %</td>" +
                                                        "</tr>";
                                                if (response.data['SoilEC'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>Электропроводимость почвы</b></td>" +
                                                        "<td>" + response.data['SoilEC'] + " dS/m</td>" +
                                                        "</tr>";
                                                if (response.data['UV'] != undefined)
                                                    content += "<tr>" +
                                                        "<td><b>УФ-индекс</b></td>" +
                                                        "<td>" + response.data['UV'] + "</td>" +
                                                        "</tr>";
                                                marker2.bindPopup("" +
                                                    "<table class='table table-bordered'>" +
                                                    content +
                                                    "</table>"
                                                )
                                            })
                                            .catch(function (error) {
                                                // handle error
                                                console.log(error);
                                            })


                                    })
                                    .bindTooltip('<div class=\'pin-info\' style=\'background-color:#8E24AA\'><b></b></div>',
                                        {
                                            permanent: true,
                                            direction: 'top',
                                            className: 'ownClassMiniAmu'

                                        });

                                marker2.fire('click');


                                markers_mini.addLayer(marker2);


                                map.addLayer(markers_mini);

                                // handle success
                            });
                        })
                        .catch(function (error) {
                            console.log(error);
                        })


                    axios.get('{{route('bukhara_chines.getRealTimeData')}}')
                        .then(function (response) {
                            if (response.data.data[3].dataItem[0].registerItem[0].data) {
                                total++;
                                const fontAwesomeIcon = L.divIcon({
                                    html: '<div style="color:#23D41E"><i class="fa fa-map-marker fa-2x"></i></div>',
                                    iconSize: [32, 32],
                                    className: 'myDivIcon'
                                });
                                var marker2 = L.marker([parseFloat(41.289427), parseFloat(71.540321)], {icon: fontAwesomeIcon})
                                    .on('click', function () {
                                        marker2.bindPopup("" +
                                            "<table class='table table-bordered'>" +
                                            "<tr ><td colspan='2' class='text-center'><b>Косонсой</b></td></tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.date')</b></td>" +
                                            "<td>" + moment(response.data.data[3].timeStamp).format('YYYY-MM-DD HH:mm:ss') + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.temp') </b></td>" +
                                            "<td>" + response.data.data[3].dataItem[0].registerItem[0].data + ' ' + response.data.data[3].dataItem[0].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.humidity')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[0].registerItem[1].data + ' ' + response.data.data[3].dataItem[0].registerItem[1].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>CO2 </b></td>" +
                                            "<td>" + response.data.data[3].dataItem[1].registerItem[0].data + ' ' + response.data.data[3].dataItem[1].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.wind_speed')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[3].registerItem[1].data + ' ' + response.data.data[3].dataItem[3].registerItem[1].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.wind_direction')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[4].registerItem[0].data + ' ' + response.data.data[3].dataItem[4].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.temp_soil')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[5].registerItem[0].data + ' ' + response.data.data[3].dataItem[5].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.humadity_soil')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[5].registerItem[1].data + ' ' + response.data.data[3].dataItem[5].registerItem[1].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.ec')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[6].registerItem[0].data + ' ' + response.data.data[3].dataItem[6].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.cumulative_rainfall')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[7].registerItem[0].data + ' ' + response.data.data[3].dataItem[7].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.ra')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[8].registerItem[0].data + ' ' + response.data.data[3].dataItem[8].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.leaf_temp')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[9].registerItem[0].data + ' ' + response.data.data[3].dataItem[9].registerItem[0].unit + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>@lang('map.wetness')</b></td>" +
                                            "<td>" + response.data.data[3].dataItem[9].registerItem[1].data + ' ' + response.data.data[3].dataItem[9].registerItem[1].unit + "</td>" +
                                            "</tr>" +
                                            "</table>"
                                        )


                                    })
                                    .bindTooltip("<div class='pin-info' style='background-color:#099E35'><b>" + response.data.data[3].dataItem[0].registerItem[0].data + '°' + "</b></div>",
                                        {
                                            permanent: true,
                                            direction: 'top',
                                            className: 'ownClassMini'

                                        });

                                marker2.fire('click');


                                markers_mini.addLayer(marker2);
                            }


                            map.addLayer(markers_mini);

                            // handle success
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });


                } else {
                    markers_mini.clearLayers();

                }
                // console.log(total);
            },
            getForecast: function () {
                if (this.forcastTemp) {
                    axios.get('{{route('map.getCurrent')}}')
                        .then(function (response) {
                            response.data.forEach(function (item, i, arr) {
                                {{--var meteoIcon = L.icon({--}}
                                    {{--    iconUrl: '{{asset('images/meteo_full.png')}}',--}}
                                    {{--    iconSize: [28, 28], // size of the icon--}}
                                    {{--    className: "station",--}}
                                    {{--});--}}

                                if (item.weather_code == 'clear') {
                                    var marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-day-sunny',
                                            prefix: 'wi',
                                            markerColor: 'yellow',
                                            spin: false
                                        })
                                    }).on('click', function () {
                                        var head;
                                        axios.get('{{route('map.forecast')}}', {
                                            params: {
                                                regionid: item.region_id
                                            }
                                        })
                                            .then(function (response2) {
                                                var regionName = (response2.data && response2.data[0] && response2.data[0].region_name) ? response2.data[0].region_name : '';
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') -  " + regionName + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                if (response2.data && Array.isArray(response2.data)) {
                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });
                                                }

                                                head += "</table>"

                                                marker.bindPopup(head);
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                        // marker.bindPopup('sds');


                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });

                                    markers_forecast.addLayer(marker)
                                    marker.fire('click');

                                } else if (item.weather_code == 'mostly_clear' || item.weather_code == 'mostly_clear' || item.weather_code == 'mostly_loudy') {
                                    var marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-day-cloudy',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).on('click', function () {
                                        var head;
                                        axios.get('{{route('map.forecast')}}', {
                                            params: {
                                                regionid: item.region_id
                                            }
                                        })
                                            .then(function (response2) {
                                                var regionName = (response2.data && response2.data[0] && response2.data[0].region_name) ? response2.data[0].region_name : '';
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') -  " + regionName + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                if (response2.data && Array.isArray(response2.data)) {
                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });
                                                }

                                                head += "</table>"

                                                marker.bindPopup(head);
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                        // marker.bindPopup('sds');


                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });

                                    markers_forecast.addLayer(marker)
                                    marker.fire('click');

                                } else if (item.weather_code == 'overcast') {
                                    var marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-cloudy',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).on('click', function () {
                                        var head;
                                        axios.get('{{route('map.forecast')}}', {
                                            params: {
                                                regionid: item.region_id
                                            }
                                        })
                                            .then(function (response2) {
                                                var regionName = (response2.data && response2.data[0] && response2.data[0].region_name) ? response2.data[0].region_name : '';
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') -  " + regionName + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                if (response2.data && Array.isArray(response2.data)) {
                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });
                                                }

                                                head += "</table>"

                                                marker.bindPopup(head);
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                        // marker.bindPopup('sds');


                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });

                                    markers_forecast.addLayer(marker)
                                    marker.fire('click');

                                } else if (item.weather_code == 'fog') {
                                    var marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-fog',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).on('click', function () {
                                        var head;
                                        axios.get('{{route('map.forecast')}}', {
                                            params: {
                                                regionid: item.region_id
                                            }
                                        })
                                            .then(function (response2) {
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') - " + response2.data[0].region_name + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                if (response2.data && Array.isArray(response2.data)) {
                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });
                                                }

                                                head += "</table>"

                                                marker.bindPopup(head);
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                        // marker.bindPopup('sds');


                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });

                                    markers_forecast.addLayer(marker)
                                    marker.fire('click');

                                } else if (item.weather_code == 'light_rain' || item.weather_code == 'rain') {
                                    var marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-rain',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).on('click', function () {
                                        var head;
                                        axios.get('{{route('map.forecast')}}', {
                                            params: {
                                                regionid: item.region_id
                                            }
                                        })
                                            .then(function (response2) {
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') - " + response2.data[0].region_name + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                if (response2.data && Array.isArray(response2.data)) {
                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });
                                                }

                                                head += "</table>"

                                                marker.bindPopup(head);
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                        // marker.bindPopup('sds');


                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });

                                    markers_forecast.addLayer(marker)
                                    marker.fire('click');

                                } else if (item.weather_code == 'heavy_rain') {
                                    var marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-storm-showers',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).on('click', function () {
                                        var head;
                                        axios.get('{{route('map.forecast')}}', {
                                            params: {
                                                regionid: item.region_id
                                            }
                                        })
                                            .then(function (response2) {
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') - " + response2.data[0].region_name + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                if (response2.data && Array.isArray(response2.data)) {
                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });
                                                }

                                                head += "</table>"

                                                marker.bindPopup(head);
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                        // marker.bindPopup('sds');


                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });

                                    markers_forecast.addLayer(marker)
                                    marker.fire('click');

                                } else if (item.weather_code == 'thunderstorm') {
                                    var marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-thunderstorm',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).on('click', function () {
                                        var head;
                                        axios.get('{{route('map.forecast')}}', {
                                            params: {
                                                regionid: item.region_id
                                            }
                                        })
                                            .then(function (response2) {
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') - " + response2.data[0].region_name + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                if (response2.data && Array.isArray(response2.data)) {
                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });
                                                }

                                                head += "</table>"

                                                marker.bindPopup(head);
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                        // marker.bindPopup('sds');


                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });

                                    markers_forecast.addLayer(marker)
                                    marker.fire('click');

                                } else if (item.weather_code == 'light_sleet' || item.weather_code == 'sleet') {
                                    var marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-sleet',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).on('click', function () {
                                        var head;
                                        axios.get('{{route('map.forecast')}}', {
                                            params: {
                                                regionid: item.region_id
                                            }
                                        })
                                            .then(function (response2) {
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') - " + response2.data[0].region_name + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                if (response2.data && Array.isArray(response2.data)) {
                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });
                                                }

                                                head += "</table>"

                                                marker.bindPopup(head);
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                        // marker.bindPopup('sds');


                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });

                                    markers_forecast.addLayer(marker)
                                    marker.fire('click');

                                } else if (item.weather_code == 'heavy_sleet') {
                                    var marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-storm-showers',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).on('click', function () {
                                        var head;
                                        axios.get('{{route('map.forecast')}}', {
                                            params: {
                                                regionid: item.region_id
                                            }
                                        })
                                            .then(function (response2) {
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') - " + response2.data[0].region_name + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                if (response2.data && Array.isArray(response2.data)) {
                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });
                                                }

                                                head += "</table>"

                                                marker.bindPopup(head);
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                        // marker.bindPopup('sds');


                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });

                                    markers_forecast.addLayer(marker)
                                    marker.fire('click');

                                } else if (item.weather_code == 'partly_cloudy') {
                                    var marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-day-cloudy-high',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).on('click', function () {
                                        var head;
                                        axios.get('{{route('map.forecast')}}', {
                                            params: {
                                                regionid: item.region_id
                                            }
                                        })
                                            .then(function (response2) {
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') - " + response2.data[0].region_name + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                if (response2.data && Array.isArray(response2.data)) {
                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });
                                                }

                                                head += "</table>"

                                                marker.bindPopup(head);
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                        // marker.bindPopup('sds');


                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });

                                    markers_forecast.addLayer(marker)
                                    marker.fire('click');

                                } else {
                                    var marker = L.marker([item.city.latitude, item.city.longitude], {
                                        icon: L.AwesomeMarkers.icon({
                                            icon: 'wi-snow',
                                            prefix: 'wi',
                                            markerColor: 'cadetblue',
                                            spin: false
                                        })
                                    }).on('click', function () {
                                        var head;
                                        axios.get('{{route('map.forecast')}}', {
                                            params: {
                                                regionid: item.region_id
                                            }
                                        })
                                            .then(function (response2) {
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') - " + response2.data[0].region_name + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                if (response2.data && Array.isArray(response2.data)) {
                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });
                                                }

                                                head += "</table>"

                                                marker.bindPopup(head);
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            })
                                            .then(function () {
                                                // always executed
                                            });
                                        // marker.bindPopup('sds');


                                    }).bindTooltip(item.air_t > 0 ? '+' + Math.round(item.air_t).toString() + ' °C' : Math.round(item.air_t).toString(),
                                        {
                                            permanent: true,
                                            direction: 'center'
                                        });

                                    markers_forecast.addLayer(marker)
                                    marker.fire('click');

                                }

                            });


                            map.addLayer(markers_forecast);

                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });


                } else {
                    markers_forecast.clearLayers();


                }
            },
            // Reset all flags to false
            resetAllFlags: function() {
                this.currentTemp = false;
                this.forcastTemp = false;
                this.atmTemp = false;
                this.radar = false;
                this.awd = false;
                this.snow = false;
                this.aero = false;
                this.dangerzones = false;
                this.agro = false;
                this.mini = false;
                this.radiatsiya = false;
                this.irrigation = false;
                this.water_cadastr = false;
                this.comfort_zones = false;
                this.organization_stations = false;
                this.atmosphere_tashkent = false;
                this.water_consumption = false;
                this.water_level = false;
                this.water_autohyrostation = false;
            },
            menuChange: function () {
                // Clear all markers first
                clearAllMarkers();

                // Reset all flags
                this.resetAllFlags();

                // Show/hide legend based on menu selection
                if (airQualityLegend) {
                    if (this.menu == 'atmosphere') {
                        if (!airQualityLegend._map || !airQualityLegend._container) {
                            airQualityLegend.addTo(map);
                        }
                        if (airQualityLegend._container) {
                            airQualityLegend._container.style.display = 'block';
                        }
                        // console.log('Legend shown');
                    } else {
                        if (airQualityLegend._container) {
                            airQualityLegend._container.style.display = 'none';
                        }
                        // console.log('Legend hidden');
                    }
                }

                // Handle special cases
                if (this.menu == 'sensitive_data') {
                    window.open('{{route('map.sensitive')}}', '_blank');
                    return;
                } else if (this.menu == 'camera1') {
                    $('#camera1').modal('show');
                    return;
                } else if (this.menu == 'camera2') {
                    $('#camera2').modal('show');
                    return;
                }

                // Handle danger zones
                if (dangerZonesMenus.includes(this.menu)) {
                    this.dangerzones = true;
                    this.getDangerzones(this.menu);
                    return;
                }

                // Handle menu configuration
                const config = menuConfig[this.menu];
                if (config) {
                    // Set flags
                    Object.assign(this, config.flags);

                    // Call method if exists
                    if (config.method && typeof this[config.method] === 'function') {
                        this[config.method]();
                    }
                    return;
                }

                // Legacy code for backward compatibility
                if (this.menu == 'fakt') {

                    this.currentTemp = true;
                    this.mini = false;
                    this.comfort_zones = false;
                    this.forcastTemp = false;
                    this.radiatsiya = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.water_cadastr = false;
                    this.irrigation = false;
                    this.current();
                    markers_irrigation.clearLayers();
                    marker_comfort_zones.clearLayers();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();

                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'atmosphere') {

                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = true;
                    this.radar = false;
                    this.comfort_zones = false;
                    this.awd = false;
                    this.radiatsiya = false;

                    this.snow = false;
                    this.mini = false;
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();
                    this.waterposts = false;
                    markers_irrigation.clearLayers();
                    marker_comfort_zones.clearLayers();
                    this.getAtmasfera();
                    this.irrigation = false;
                    markers_irrigation.clearLayers();
                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_weather.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'locator') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.comfort_zones = false;
                    this.radar = true;
                    this.awd = false;
                    this.snow = false;
                    this.radiatsiya = false;
                    this.waterposts = false;
                    markers_irrigation.clearLayers();
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.mini = false;
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();
                    this.irrigation = false;
                    markers_irrigation.clearLayers();
                    this.getRadars();

                    markers_atmasfera.clearLayers();
                    marker_comfort_zones.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_weather.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'snow') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.comfort_zones = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.radiatsiya = false;
                    this.waterposts = false;
                    markers_irrigation.clearLayers();
                    this.snow = true;
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.mini = false;
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();

                    this.getSnow();
                    this.irrigation = false;
                    markers_irrigation.clearLayers();
                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_awd.clearLayers();
                    markers_weather.clearLayers();
                    markers_aero.clearLayers();
                    marker_comfort_zones.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'awd') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.comfort_zones = false;
                    this.radar = false;
                    this.awd = true;
                    this.radiatsiya = false;

                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.mini = false;
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();
                    this.waterposts = false;
                    marker_comfort_zones.clearLayers();
                    markers_irrigation.clearLayers();
                    this.getawd();
                    this.irrigation = false;
                    markers_irrigation.clearLayers();
                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'aero') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.comfort_zones = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.aero = true;
                    this.dangerzones = false;
                    this.agro = false;
                    this.radiatsiya = false;
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();
                    this.mini = false;
                    this.waterposts = false;
                    markers_irrigation.clearLayers();
                    this.irrigation = false;
                    markers_irrigation.clearLayers();
                    this.getAeroport();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    marker_comfort_zones.clearLayers();
                    markers_awd.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;

                } else if (this.menu == 'forecast') {
                    this.currentTemp = false;
                    this.forcastTemp = true;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.comfort_zones = false;
                    this.snow = false;
                    this.radiatsiya = false;
                    this.waterposts = false;
                    markers_irrigation.clearLayers();
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.mini = false;
                    this.irrigation = false;
                    markers_irrigation.clearLayers();

                    this.getForecast();
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();
                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    marker_comfort_zones.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_aero.clearLayers();
                    markers_awd.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'meteo_agro') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.comfort_zones = false;
                    this.awd = false;
                    this.snow = false;
                    this.radiatsiya = false;
                    this.waterposts = false;
                    markers_irrigation.clearLayers();
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = true;
                    this.mini = false;

                    this.irrigation = false;
                    markers_irrigation.clearLayers();
                    this.getAgro();
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();
                    marker_comfort_zones.clearLayers();
                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_aero.clearLayers();
                    markers_awd.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_forecast.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'mini') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.radiatsiya = false;
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.mini = true;
                    this.comfort_zones = false;
                    marker_comfort_zones.clearLayers();
                    this.waterposts = false;
                    markers_irrigation.clearLayers();
                    this.irrigation = false;
                    markers_irrigation.clearLayers();
                    this.GetMini();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_aero.clearLayers();
                    markers_awd.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_forecast.clearLayers();
                    markers_agro.clearLayers();
                    markers_radiatsiya.clearLayers();
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;

                } else if (this.menu == 'radiatsiya') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.radiatsiya = true;
                    this.comfort_zones = false;
                    this.irrigation = false;
                    markers_irrigation.clearLayers();
                    this.aero = false;
                    this.waterposts = false;
                    markers_irrigation.clearLayers();
                    marker_comfort_zones.clearLayers();
                    this.dangerzones = false;
                    this.agro = false;
                    this.mini = false;
                    this.water_cadastr = false;
                    this.getRadiotion();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_aero.clearLayers();
                    markers_awd.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_forecast.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'meteo_irrigation') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.comfort_zones = false;
                    this.awd = false;
                    this.snow = false;
                    this.waterposts = false;
                    markers_irrigation.clearLayers();
                    this.radiatsiya = false;

                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.mini = false;
                    this.water_cadastr = false;
                    this.irrigation = true;
                    this.getIrrigation();
                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_aero.clearLayers();
                    markers_awd.clearLayers();
                    markers_dangerzones.clearLayers();
                    marker_comfort_zones.clearLayers();
                    markers_forecast.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_watercadastr.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'water_cadastr') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.comfort_zones = false;
                    this.awd = false;
                    this.snow = false;
                    this.radiatsiya = false;
                    this.waterposts = false;
                    markers_irrigation.clearLayers();
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.mini = false;
                    this.water_cadastr = true;
                    marker_comfort_zones.clearLayers();
                    this.getWaterCadastr();
                    this.irrigation = false;
                    markers_irrigation.clearLayers();
                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_aero.clearLayers();
                    markers_awd.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_forecast.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'AtmZasuha' ||
                    this.menu == 'dojd_30mm_12ches' ||
                    this.menu == 'dojd_polusutkas' ||
                    this.menu == 'osen_zam_pochvas' ||
                    this.menu == 'osen_zam_vozds' ||
                    this.menu == 'sneg20mm12ches' ||
                    this.menu == 'sneg_polusutkas' ||
                    this.menu == 't40_s' ||
                    this.menu == 'ves_zampochvas' ||
                    this.menu == 'ves_zam_vozduhs' ||
                    this.menu == 'veter_razl_predelov2020s' ||
                    this.menu == 'veter15s') {

                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.comfort_zones = false;
                    this.snow = false;
                    this.radiatsiya = false;
                    markers_irrigation.clearLayers();
                    this.mini = false;
                    this.aero = false;
                    this.dangerzones = true;
                    this.agro = false;

                    this.irrigation = false;
                    markers_irrigation.clearLayers();
                    this.getDangerzones(this.menu);
                    this.water_cadastr = false;
                    marker_comfort_zones.clearLayers();
                    markers_watercadastr.clearLayers();
                    markers_radar.clearLayers();
                    markers_forecast.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_aero.clearLayers();
                    markers_awd.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'water_consumption') {

                    this.currentTemp = false;
                    this.mini = false;
                    this.forcastTemp = false;
                    this.radiatsiya = false;
                    this.comfort_zones = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.water_cadastr = false;
                    this.irrigation = false;
                    this.getWaterConsuption();

                    markers_irrigation.clearLayers();


                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    marker_comfort_zones.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();

                    markers_weather.clearLayers();
                    marker_waterlevel.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = true;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'water_level') {

                    this.currentTemp = false;
                    this.mini = false;
                    this.forcastTemp = false;
                    this.radiatsiya = false;
                    this.atmTemp = false;
                    this.comfort_zones = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.water_cadastr = false;
                    this.irrigation = false;
                    this.getWaterLevel();


                    markers_irrigation.clearLayers();


                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    marker_comfort_zones.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();

                    markers_weather.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_audtohydropost.clearLayers();
                    this.water_consumption = false;
                    this.water_level = true;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'water_autohyrostation') {

                    this.currentTemp = false;
                    this.mini = false;
                    this.forcastTemp = false;
                    this.radiatsiya = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.comfort_zones = false;
                    this.water_cadastr = false;
                    this.irrigation = false;
                    this.getAutoHydroStations();


                    markers_irrigation.clearLayers();


                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    marker_comfort_zones.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();

                    markers_weather.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = true;


                } else if (this.menu == 'comfort_zones') {

                    this.currentTemp = false;
                    this.mini = false;
                    this.forcastTemp = false;
                    this.radiatsiya = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = false;
                    this.agro = false;
                    this.comfort_zones = true;
                    this.water_cadastr = false;
                    this.irrigation = false;
                    this.ComfortZones();


                    markers_irrigation.clearLayers();


                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();
                    markers_agro.clearLayers();
                    markers_mini.clearLayers();
                    markers_radiatsiya.clearLayers();
                    this.water_cadastr = false;
                    markers_watercadastr.clearLayers();

                    markers_weather.clearLayers();
                    marker_waterconsuption.clearLayers();
                    marker_waterlevel.clearLayers();
                    this.water_consumption = false;
                    this.water_level = false;
                    this.water_autohyrostation = false;


                } else if (this.menu == 'sensitive_data') {
                    window.open('{{route('map.sensitive')}}', '_blank');
                } else if (this.menu == 'camera1') {
                    $('#camera1').modal('show')
                } else if (this.menu == 'camera2') {
                    $('#camera2').modal('show')
                }

                {{--var legend = L.control({position: "bottomleft"});--}}

                {{--legend.onAdd = function (map) {--}}
                {{--    var div = L.DomUtil.create("div", "legend");--}}
                {{--    div.innerHTML += "<h4>@lang('map.comfort_zones')</h4>";--}}
                {{--    div.innerHTML += '<i style="background: #C82500"></i><span>1</span><br>';--}}
                {{--    div.innerHTML += '<i style="background: #BFC81B"></i><span>2</span><br>';--}}
                {{--    div.innerHTML += '<i style="background: #10B53E"></i><span>3</span><br>';--}}
                {{--    div.innerHTML += '<i style="background: #63B512"></i><span>4</span><br>';--}}
                {{--    div.innerHTML += '<i style="background: #B5893C"></i><span>5</span><br>';--}}
                {{--    div.innerHTML += '<i style="background: #B51204"></i><span>6</span><br>';--}}
                {{--    return div;--}}
                {{--};--}}

                {{--if (this.comfort_zones) {--}}
                {{--    map.addControl(legend);--}}
                {{--} else {--}}
                {{--    map.removeControl('legend');--}}
                {{--}--}}

            },
            getAeroport: function () {
                if (this.aero) {
                    var marker;

                    this.aeroports.forEach(function (item, i, arr) {
                        axios.get('{{route('map.getCurrent')}}', {
                            params: {
                                regionid: item.region_id
                            }
                        })
                            .then(function (response) {
                                var meteoIcon = L.icon({
                                    iconUrl: '{{asset('images/departures.svg')}}',
                                    color: 'red',
                                    iconSize: [40, 40],
                                    className: 'selectedMarker'
                                });

                                var marker = L.marker([item.lat, item.lon], {icon: meteoIcon})
                                    .bindTooltip(item.code + " " + Math.round(response.data.air_t).toString() + '°',
                                        {
                                            permanent: true,
                                            direction: 'bottom',
                                            sticky: true,
                                            className: 'leaflet-tooltip-own'
                                        });

                                markers_aero.addLayer(marker)

                            })
                            .catch(function (error) {
                                console.log(error);
                            })
                            .then(function () {
                                // always executed
                            });


                    })

                    map.addLayer(markers_aero);


                } else {
                    markers_aero.clearLayers();


                }

            },
            getDangerzones: function (type) {
                var square;


                axios.get('{{route('map.dangerzones.data')}}', {
                    params: {
                        endpoint: type
                    }
                })
                    .then(function (response) {
                        if (type == 'AtmZasuha') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.AtmZasuha_NDAYSR')</b></td>" +
                                                "<td>" + feature.properties.NDAYSR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.AtmZasuha_NDAYMAX')</b></td>" +
                                                "<td>" + feature.properties.NDAYMAX + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.AtmZasuha_YEAR')</b></td>" +
                                                "<td>" + feature.properties.YEAR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.AtmZasuha_F5')</b></td>" +
                                                "<td>" + feature.properties.F5 + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })

                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);


                                    },
                                });
                                markers_dangerzones.addLayer(square);
                            })

                            map.addLayer(markers_dangerzones);
                        } else if (type == 'dojd_30mm_12ches') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_30mm_12ches_NSR')</b></td>" +
                                                "<td>" + feature.properties.NSR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_30mm_12ches_NMAX')</b></td>" +
                                                "<td>" + feature.properties.NMAX + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_30mm_12ches_YEAR')</b></td>" +
                                                "<td>" + feature.properties.YEAR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_30mm_12ches_F5')</b></td>" +
                                                "<td>" + feature.properties.F5 + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })
                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);
                                    },
                                });

                                markers_dangerzones.addLayer(square);
                            })

                            map.addLayer(markers_dangerzones);
                        } else if (type == 'dojd_polusutkas') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_polusutkas_HMAXPERIOD')</b></td>" +
                                                "<td>" + feature.properties.HMAXPERIOD + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_polusutkas_DATAMAXPER')</b></td>" +
                                                "<td>" + feature.properties.DATAMAXPER + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_polusutkas_HMAX2020')</b></td>" +
                                                "<td>" + feature.properties.HMAX2020 + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_polusutkas_DATAMAX202')</b></td>" +
                                                "<td>" + feature.properties.DATAMAX202 + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })
                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);
                                    },
                                });

                                markers_dangerzones.addLayer(square);
                            })

                            map.addLayer(markers_dangerzones);
                        } else if (type == 'osen_zam_pochvas') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_polusutkas_RANNYAYADA')</b></td>" +
                                                "<td>" + feature.properties.RANNYAYADA + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_polusutkas_YEAR')</b></td>" +
                                                "<td>" + feature.properties.YEAR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_polusutkas_SRDATA')</b></td>" +
                                                "<td>" + feature.properties.SRDATA + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_polusutkas_POZDNYAYAD')</b></td>" +
                                                "<td>" + feature.properties.POZDNYAYAD + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_polusutkas_YEAR1')</b></td>" +
                                                "<td>" + feature.properties.YEAR1 + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.dojd_polusutkas_F7')</b></td>" +
                                                "<td>" + feature.properties.F7 + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })
                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);
                                    },
                                });

                                markers_dangerzones.addLayer(square);
                            })

                            map.addLayer(markers_dangerzones);
                        } else if (type == 'osen_zam_vozds') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.osen_zam_vozds_RANNYAYADA')</b></td>" +
                                                "<td>" + feature.properties.RANNYAYADA + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.osen_zam_vozds_YEAR')</b></td>" +
                                                "<td>" + feature.properties.YEAR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.osen_zam_vozds_SRDATA')</b></td>" +
                                                "<td>" + feature.properties.SRDATA + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.osen_zam_vozds_POZDNYAYAD')</b></td>" +
                                                "<td>" + feature.properties.POZDNYAYAD + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.osen_zam_vozds_YEAR1')</b></td>" +
                                                "<td>" + feature.properties.YEAR1 + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.osen_zam_vozds_F7')</b></td>" +
                                                "<td>" + feature.properties.F7 + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })
                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);
                                    },
                                });

                                markers_dangerzones.addLayer(square);
                            })

                            map.addLayer(markers_dangerzones);
                        } else if (type == 'sneg20mm12ches') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.sneg20mm12ches_NSR')</b></td>" +
                                                "<td>" + feature.properties.NSR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.sneg20mm12ches_NMAX')</b></td>" +
                                                "<td>" + feature.properties.NMAX + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.sneg20mm12ches_YEAR')</b></td>" +
                                                "<td>" + feature.properties.YEAR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.sneg20mm12ches_F5')</b></td>" +
                                                "<td>" + feature.properties.F5 + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })
                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);
                                    },
                                });

                                markers_dangerzones.addLayer(square);
                            })

                            map.addLayer(markers_dangerzones);
                        } else if (type == 'sneg_polusutkas') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.sneg_polusutkas_HMAXPERIOD')</b></td>" +
                                                "<td>" + feature.properties.HMAXPERIOD + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.sneg_polusutkas_DATAMAXPER')</b></td>" +
                                                "<td>" + feature.properties.DATAMAXPER + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.sneg_polusutkas_HMAX2020')</b></td>" +
                                                "<td>" + feature.properties.HMAX2020 + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.sneg_polusutkas_DATAMAX202')</b></td>" +
                                                "<td>" + feature.properties.DATAMAX202 + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })
                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);
                                    },
                                });

                                markers_dangerzones.addLayer(square);
                            })

                            map.addLayer(markers_dangerzones);
                        } else if (type == 't40_s') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.t40_s_number')</b></td>" +
                                                "<td>" + feature.properties.number + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.t40_s_YEARMAX')</b></td>" +
                                                "<td>" + feature.properties.YEARMAX + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.t40_s_NAVARAGE')</b></td>" +
                                                "<td>" + feature.properties.NAVARAGE + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.t40_s_N2020')</b></td>" +
                                                "<td>" + feature.properties.N2020 + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })
                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);
                                    },
                                });

                                markers_dangerzones.addLayer(square);
                            })

                            map.addLayer(markers_dangerzones);
                        } else if (type == 'ves_zampochvas') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zampochvas_RANNYAYADA')</b></td>" +
                                                "<td>" + feature.properties.RANNYAYADA + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zampochvas_YEAR')</b></td>" +
                                                "<td>" + feature.properties.YEAR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zampochvas_SRDATA')</b></td>" +
                                                "<td>" + feature.properties.SRDATA + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zampochvas_POZDNYAYAD')</b></td>" +
                                                "<td>" + feature.properties.POZDNYAYAD + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zampochvas_YEAR1')</b></td>" +
                                                "<td>" + feature.properties.YEAR1 + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zampochvas_F7')</b></td>" +
                                                "<td>" + feature.properties.F7 + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })
                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);
                                    },
                                });

                                markers_dangerzones.addLayer(square);
                            })

                            map.addLayer(markers_dangerzones);
                        } else if (type == 'ves_zam_vozduhs') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zam_vozduhs_RANNYAYADA')</b></td>" +
                                                "<td>" + feature.properties.RANNYAYADA + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zam_vozduhs_YEAR')</b></td>" +
                                                "<td>" + feature.properties.YEAR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zam_vozduhs_SRDATA')</b></td>" +
                                                "<td>" + feature.properties.SRDATA + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zam_vozduhs_POZDNYAYAD')</b></td>" +
                                                "<td>" + feature.properties.POZDNYAYAD + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zam_vozduhs_YEAR1')</b></td>" +
                                                "<td>" + feature.properties.YEAR1 + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.ves_zam_vozduhs_F7')</b></td>" +
                                                "<td>" + feature.properties.F7 + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })
                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);
                                    },
                                });
                                markers_dangerzones.addLayer(square);

                            })

                            map.addLayer(markers_dangerzones);
                        } else if (type == 'veter_razl_predelov2020s') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.veter_razl_predelov2020s_V15')</b></td>" +
                                                "<td>" + feature.properties.V15 + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.veter_razl_predelov2020s_V20')</b></td>" +
                                                "<td>" + feature.properties.V20 + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.veter_razl_predelov2020s_V30')</b></td>" +
                                                "<td>" + feature.properties.V30 + "</td>" +
                                                "</tr>" +
                                                // "<tr>" +
                                                // "<td><b>F7</b></td>" +
                                                // "<td>" + feature.properties.F7 + "</td>" +
                                                // "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })
                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);
                                    },
                                });
                                markers_dangerzones.addLayer(square);

                            })

                            map.addLayer(markers_dangerzones);
                        } else if (type == 'veter15s') {
                            response.data.forEach(function (item, i, arr) {
                                var geoojson = L.geoJson(item, {
                                    pointToLayer: function (feature, latlng) {
                                        square = L.shapeMarker(latlng, {
                                            shape: "triangle",
                                            radius: 5,
                                            fillOpacity: 1,
                                            color: 'darkred'
                                        }).on('click', function () {

                                            var pop = L.popup().setLatLng(this._latlng).setContent(
                                                "<table class='table table-bordered'>" +
                                                "<tr>" +
                                                "<td colspan='2' class='text-center'><b>" + feature.properties.STATIONS + "</b></td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.veter15s_NSR')</b></td>" +
                                                "<td>" + feature.properties.NSR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.veter15s_NMAX')</b></td>" +
                                                "<td>" + feature.properties.NMAX + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.veter15s_YEAR')</b></td>" +
                                                "<td>" + feature.properties.YEAR + "</td>" +
                                                "</tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.veter15s_F5')</b></td>" +
                                                "<td>" + feature.properties.F5 + "</td>" +
                                                "</tr>" +
                                                "</table>"
                                            ).openOn(map);

                                        })
                                        markers_dangerzones.addLayer(square);
                                        var circle = L.circle(latlng, {
                                            color: '#4236E5',
                                            fillColor: '#6789E5',
                                            fillOpacity: 0.7,
                                            radius: 300
                                        })

                                        markers_dangerzones.addLayer(circle);
                                    },
                                });

                            })

                            map.addLayer(markers_dangerzones);

                        }

                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            checktoUndefine: function (text, unit = '') {
                if (text !== undefined && text !== null) {
                    return text + ' ' + unit;
                } else {
                    return '///';
                }
            },
            timeConverter: function (UNIX_timestamp) {
                var a = new Date(UNIX_timestamp * 1000);
                var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                var year = a.getFullYear();
                var month = months[a.getMonth()];
                var date = a.getDate();
                var hour = a.getHours();
                var min = a.getMinutes();
                var sec = a.getSeconds();
                var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec;
                return time;
            },
            FarangetToCelsium: function (Fa) {
                var C = (5 / 9) * (Fa - 32)

                return C.toFixed(1);
            },
            getWaterConsuption: function () {
                var markers = '';
                var square;
                axios.get('{{route('map.watercadastr.GetWaterConsumption')}}')
                    .then(function (response) {
                        response.data.forEach(function (item, i, arr) {
                            var geoojson = L.geoJson(item, {
                                pointToLayer: function (feature, latlng) {

                                    // square = L.shapeMarker(latlng, {
                                    //     shape: "circle",
                                    //     radius: 5,
                                    //     fillOpacity: 0.5,
                                    //     color: '#202AE7'
                                    // })
                                    var meteoIcon = null;
                                    switch (feature.properties.type) {
                                        case 1:
                                            meteoIcon = L.icon({
                                                iconUrl: '{{asset('images/1.svg')}}',
                                                iconSize: [30, 30],
                                                className: 'selectedMarker'
                                            });
                                            break;
                                        case 2:
                                            meteoIcon = L.icon({
                                                iconUrl: '{{asset('images/2.svg')}}',
                                                iconSize: [30, 30],
                                                className: 'selectedMarker'
                                            });
                                            break;
                                        case 3:
                                            meteoIcon = L.icon({
                                                iconUrl: '{{asset('images/3.svg')}}',
                                                iconSize: [30, 30],
                                                className: 'selectedMarker'
                                            });
                                            break;
                                        case 4:
                                            meteoIcon = L.icon({
                                                iconUrl: '{{asset('images/4.svg')}}',
                                                iconSize: [30, 30],
                                                className: 'selectedMarker'
                                            });
                                            break;
                                            defualt:
                                                meteoIcon = L.icon({
                                                    iconUrl: '{{asset('images/1.svg')}}',
                                                    iconSize: [30, 30],
                                                    className: 'selectedMarker'
                                                });
                                            break;

                                    }


                                    markers = L.marker(latlng, {icon: meteoIcon}).on('click', function () {
                                        var pop = L.popup({className: 'with120'}).setLatLng(this._latlng).setContent(
                                            "<table class='table table-bordered'>" +
                                            "<tr>" +
                                            "<td colspan='5' class='text-center'><b>" + feature.properties.RIVERS + "</b></td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td  class='text-center'><b>Suv sarfi (O'rtacha choraklik м3/с) </b></td>" +
                                            "<td  class='text-center'><b>Suv sathi (O'rtacha choraklik см)</b></td>" +
                                            "<td  class='text-center'><b>Joriy ma'lumotlar</b></td>" +
                                            "<td  class='text-center'><b>Uskunalar soni</b></td>" +
                                            "<td  class='text-center'><b>O'rnatilish yili</b></td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td  class='text-center'>" + app.CalculateAverage([feature.properties.H1, feature.properties.H2, feature.properties.H3]) + "</td>" +
                                            "<td  class='text-center'>" + Math.floor(app.CalculateAverage([feature.properties.water_level.H1, feature.properties.water_level.H2, feature.properties.water_level.H3])) + "</td>" +
                                            "<td  class='text-center'>0 </td>" +
                                            "<td  class='text-center'>" + feature.properties.count + "</td>" +
                                            "<td  class='text-center'>" + feature.properties.start_year + "</td>" +
                                            "</tr>" +
                                            "</table>"
                                        ).openOn(map);

                                    })
                                },
                            });
                            marker_waterconsuption.addLayer(markers);
                        })

                        map.addLayer(marker_waterconsuption);
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

                this.getAutoHydroStations();
            },
            getWaterLevel: function () {
                var square;
                var markers = '';

                axios.get('{{route('map.watercadastr.GetWaterLevel')}}')
                    .then(function (response) {
                        response.data.forEach(function (item, i, arr) {

                            var geoojson = L.geoJson(item, {
                                pointToLayer: function (feature, latlng) {
                                    var meteoIcon = L.icon({
                                        iconUrl: '{{asset('images/drop-satxi.svg')}}',
                                        iconSize: [30, 30],
                                        className: 'selectedMarker'
                                    });

                                    markers = L.marker(latlng, {icon: meteoIcon}).on('click', function () {
                                        var pop = L.popup({className: "with150"}).setLatLng(this._latlng).setContent(
                                            "<table class='table table-bordered'>" +
                                            "<tr>" +
                                            "<td colspan='3' class='text-center'><b>" + feature.properties.RIVERS + "</b></td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td  class='text-center'><b>Среднее за квартал (см)</b></td>" +
                                            "<td  class='text-center'><b>Среднее за месяц (см)</b></td>" +
                                            "<td  class='text-center'><b>Фактический (см)</b></td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td  class='text-center'>" + parseInt(app.CalculateAverage([feature.properties.H1, feature.properties.H2, feature.properties.H3])) + "</td>" +
                                            "<td  class='text-center'>" + parseInt(feature.properties.H3) + "</td>" +
                                            "<td  class='text-center'>0</td>" +
                                            "</tr>" +
                                            "</table>"
                                        ).openOn(map);

                                    })

                                },
                            });

                            marker_waterlevel.addLayer(markers);
                        })

                        map.addLayer(marker_waterlevel);
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            getAutoHydroStations: function () {

                var markers = null;
                var hydroicon = null;
                axios.get('{{ route('hydrostations.list') }}')
                    .then(function (response) {

                        response.data.forEach(function (item, i, arr) {
                            hydroicon = L.icon({
                                iconUrl: '{{asset('images/2.svg')}}',
                                iconSize: [30, 30],
                            });

                            markers = L.marker([item.latitude, item.longitude], {icon: hydroicon}).on('click', function () {
                                axios.get('{{route('hydrostations.get')}}', {
                                    params: {
                                        id: item.station_id
                                    }
                                })
                                    .then(function (response) {
                                        var pop = L.popup().setLatLng([item.latitude, item.longitude]).setContent(
                                            "<table class='table table-bordered'>" +
                                            "<tr>" +
                                            "<td colspan='3' class='text-center'><b>" + item.name + "</b></td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td  class='text-center'><b>Скорость поверхности</b></td>" +
                                            "<td  class='text-center'><b>Уровень воды</b></td>" +
                                            "<td  class='text-center'><b>Дата</b></td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td  class='text-center'>" + response.data.avg_surface_velocity + " м/с</td>" +
                                            "<td  class='text-center'>" + response.data.avg_water_level + "  м</td>" +
                                            "<td  class='text-center'>" + response.data.datetime + "</td>" +
                                            "</tr>" +
                                            "</table>"
                                        ).openOn(map);

                                    })
                                    .catch(function (error) {
                                        console.log(error);
                                    })
                                    .then(function () {
                                        // always executed
                                    });

                            })
                            marker_audtohydropost.addLayer(markers);
                        })
                        map.addLayer(marker_audtohydropost);
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });


                axios.get('{{ route('hydrostations.hydroposts') }}')
                    .then(function (response) {

                        response.data.forEach(function (item, i, arr) {
                            hydroicon = L.icon({
                                iconUrl: '{{asset('images/2.svg')}}',
                                iconSize: [30, 30],
                            });

                            markers = L.marker([item.latitude, item.longitude], {icon: hydroicon}).on('click', function () {
                                const stationIds = [30117, 30112, 30119, 30114, 30118, 30116, 30111, 30120, 30115, 30124, 30113, 30139, 30138, 30140, 30135, 30134, 30132, 30137, 30133, 30136];
                                const randomStationId = stationIds[Math.floor(Math.random() * stationIds.length)];

                                axios.get('{{route('hydrostations.get')}}', {
                                    params: {
                                        id: randomStationId
                                    }
                                })
                                    .then(function (response) {
                                        var pop = L.popup().setLatLng([item.latitude, item.longitude]).setContent(
                                            "<table class='table table-bordered'>" +
                                            "<tr>" +
                                            "<td colspan='3' class='text-center'><b>" + item.name + "</b></td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td  class='text-center'><b>Скорость поверхности</b></td>" +
                                            "<td  class='text-center'><b>Уровень воды</b></td>" +
                                            "<td  class='text-center'><b>Дата</b></td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td  class='text-center'>" + response.data.avg_surface_velocity + " м/с</td>" +
                                            "<td  class='text-center'>" + response.data.avg_water_level + "  м</td>" +
                                            "<td  class='text-center'>" + response.data.datetime + "</td>" +
                                            "</tr>" +
                                            "</table>"
                                        ).openOn(map);

                                    })
                                    .catch(function (error) {
                                        console.log(error);
                                    })
                                    .then(function () {
                                        // always executed
                                    });

                            })
                            marker_audtohydropost.addLayer(markers);
                        })
                        map.addLayer(marker_audtohydropost);
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });





                {{--var square;--}}
                {{--var markers = '';--}}
                {{--var meteoIcon = null;--}}
                {{--axios.get('{{route('map.watercadastr.GetAutostationHydro')}}')--}}
                {{--    .then(function (response) {--}}
                {{--        var meteoIcon = null;--}}

                {{--        response.data.forEach(function (item, i, arr) {--}}

                {{--            switch (item.type) {--}}
                {{--                case 1:--}}
                {{--                    meteoIcon = L.icon({--}}
                {{--                        iconUrl: '{{asset('images/1.svg')}}',--}}
                {{--                        iconSize: [30, 30],--}}
                {{--                        className: 'selectedMarker'--}}
                {{--                    });--}}
                {{--                    break;--}}
                {{--                case 2:--}}
                {{--                    meteoIcon = L.icon({--}}
                {{--                        iconUrl: '{{asset('images/2.svg')}}',--}}
                {{--                        iconSize: [30, 30],--}}
                {{--                        className: 'selectedMarker'--}}
                {{--                    });--}}
                {{--                    break;--}}
                {{--                case 3:--}}
                {{--                    meteoIcon = L.icon({--}}
                {{--                        iconUrl: '{{asset('images/3.svg')}}',--}}
                {{--                        iconSize: [30, 30],--}}
                {{--                        className: 'selectedMarker'--}}
                {{--                    });--}}
                {{--                    break;--}}
                {{--                case 4:--}}
                {{--                    meteoIcon = L.icon({--}}
                {{--                        iconUrl: '{{asset('images/4.svg')}}',--}}
                {{--                        iconSize: [30, 30],--}}
                {{--                        className: 'selectedMarker'--}}
                {{--                    });--}}
                {{--                    break;--}}
                {{--                    defualt:--}}
                {{--                        meteoIcon = L.icon({--}}
                {{--                            iconUrl: '{{asset('images/1.svg')}}',--}}
                {{--                            iconSize: [30, 30],--}}
                {{--                            className: 'selectedMarker'--}}
                {{--                        });--}}
                {{--                    break;--}}

                {{--            }--}}
                {{--            markers = L.marker([item.latitute, item.longitute], {icon: meteoIcon}).on('click', function () {--}}

                {{--                var pop = L.popup().setLatLng(this._latlng).setContent(--}}
                {{--                    "<table class='table table-bordered'>" +--}}
                {{--                    "<tr>" +--}}
                {{--                    "<td colspan='2' rowspan='2' class='text-center'><b>" + item.name + "</b></td>" +--}}
                {{--                    "<td  class='text-center'><b>Uskunalar soni</b></td>" +--}}
                {{--                    "<td  class='text-center'><b>O'rnatilish yili</b></td>" +--}}
                {{--                    "</tr>" +--}}
                {{--                    "<tr>" +--}}
                {{--                    "<td  class='text-center'>" + item.count + "</td>" +--}}
                {{--                    "<td  class='text-center'>" + item.start_year + "</td>" +--}}
                {{--                    "</tr>" +--}}
                {{--                    "</table>"--}}
                {{--                ).openOn(map);--}}

                {{--            })--}}
                {{--            marker_audtohydropost.addLayer(markers);--}}
                {{--        })--}}

                {{--        map.addLayer(marker_audtohydropost);--}}
                {{--    })--}}
                {{--    .catch(function (error) {--}}
                {{--        console.log(error);--}}
                {{--    })--}}
                {{--    .then(function () {--}}
                {{--        // always executed--}}
                {{--    });--}}
            },
            getOrganizationStations: function () {
                if (!this.organization_stations) {
                    markers_organization_stations.clearLayers();
                    return;
                }

                markers_organization_stations.clearLayers();

                // Marker koordinatalari
                var lat = 39.4963;
                var lon = 64.7811;

                // Marker yaratish (default icon ishlatiladi)
                var marker = L.marker([lat, lon], {
                    title: 'Производственные предприятия'
                });

                // Popup yaratish (loading holatida)
                var popupContent = '<div class="text-center"><p>Загрузка данных...</p></div>';
                var popup = L.popup().setContent(popupContent);

                marker.bindPopup(popup);

                // Marker ustiga bosganda API chaqiruv
                marker.on('click', function() {
                    var clickedMarker = this;

                    // API chaqiruv
                    axios.get('http://situationrecover.uz/api/device-data.php', {
                        headers: {
                            'Authorization': 'Bearer 767767',
                            'Accept': 'application/json'
                        }
                    })
                    .then(function(response) {
                        // Ma'lumotlarni formatlash
                        var data = response.data;
                        var content = '<div style="max-width: 500px; max-height: 600px; overflow-y: auto; padding: 10px;">';
                        content += '<h5 style="margin-bottom: 15px; text-align: center; color: #2c3e50;">Саноат зоналари</h5>';

                        // Key nomlarini rus tiliga tarjima qilish
                        var translations = {
                            'device_info': 'Информация об устройстве',
                            'name_id': 'ID устройства',
                            'tashkilot_nomi': 'Название организации',
                            'gps_malumoti': 'GPS данные',
                            'lat': 'Широта',
                            'lon': 'Долгота',
                            'address': 'Адрес',
                            'timestamp': 'Время',
                            'device_status': 'Статус устройства',
                            'data': 'Данные измерений',
                            'temperature': 'Температура',
                            'pressure': 'Давление',
                            'so2': 'SO₂',
                            'no': 'NO',
                            'no2': 'NO₂',
                            'co': 'CO',
                            'fid': 'FID',
                            'h2s': 'H₂S',
                            'pm2_5': 'PM2.5',
                            'pm10': 'PM10',
                            'tsp': 'TSP',
                            'noise': 'Шум',
                            'wind_direction': 'Направление ветра',
                            'nox': 'NOx',
                            'humidity': 'Влажность',
                            'wind_speed': 'Скорость ветра',
                            'value': 'Значение',
                            'unit': 'Единица',
                            'safe_limit': 'Безопасный предел',
                            'online': 'Онлайн',
                            'offline': 'Офлайн'
                        };

                        function translateKey(key) {
                            return translations[key] || key;
                        }

                        function formatValue(value) {
                            if (value === null || value === undefined) return '-';
                            if (typeof value === 'object') {
                                return JSON.stringify(value, null, 2);
                            }
                            return value;
                        }

                        function getStatusColor(status) {
                            return status === 'online' ? 'green' : 'red';
                        }

                        function getSafeLimitColor(value, safeLimit) {
                            if (safeLimit && value > safeLimit) {
                                return 'red';
                            }
                            return 'black';
                        }

                        if (data && typeof data === 'object' && !Array.isArray(data)) {
                            // Device info section
                            if (data.device_info) {
                                content += '<div style="margin-bottom: 20px; padding: 10px; background-color: #f8f9fa; border-radius: 5px;">';
                                content += '<h6 style="color: #2c3e50; margin-bottom: 10px;">' + translateKey('device_info') + '</h6>';
                                content += '<table class="table table-bordered" style="font-size: 12px; margin-bottom: 0;">';

                                if (data.device_info.tashkilot_nomi) {
                                    content += '<tr><th style="width: 40%;">' + translateKey('tashkilot_nomi') + '</th><td><strong>' + formatValue(data.device_info.tashkilot_nomi) + '</strong></td></tr>';
                                }
                                if (data.device_info.name_id) {
                                    content += '<tr><th>' + translateKey('name_id') + '</th><td>' + formatValue(data.device_info.name_id) + '</td></tr>';
                                }
                                if (data.device_info.device_status) {
                                    var statusColor = getStatusColor(data.device_info.device_status);
                                    content += '<tr><th>' + translateKey('device_status') + '</th><td style="color: ' + statusColor + ';"><strong>' + translateKey(data.device_info.device_status) + '</strong></td></tr>';
                                }
                                if (data.device_info.timestamp) {
                                    content += '<tr><th>' + translateKey('timestamp') + '</th><td>' + formatValue(data.device_info.timestamp) + '</td></tr>';
                                }
                                if (data.device_info.gps_malumoti) {
                                    var gps = data.device_info.gps_malumoti;
                                    content += '<tr><th colspan="2" style="background-color: #e9ecef; padding: 8px;">' + translateKey('gps_malumoti') + '</th></tr>';
                                    if (gps.lat) {
                                        content += '<tr><th style="padding-left: 20px;">' + translateKey('lat') + '</th><td>' + formatValue(gps.lat) + '</td></tr>';
                                    }
                                    if (gps.lon) {
                                        content += '<tr><th style="padding-left: 20px;">' + translateKey('lon') + '</th><td>' + formatValue(gps.lon) + '</td></tr>';
                                    }
                                    if (gps.address) {
                                        content += '<tr><th style="padding-left: 20px;">' + translateKey('address') + '</th><td>' + formatValue(gps.address) + '</td></tr>';
                                    }
                                }
                                content += '</table>';
                                content += '</div>';
                            }

                            // Data section
                            if (data.data) {
                                content += '<div style="margin-bottom: 10px; padding: 10px; background-color: #f8f9fa; border-radius: 5px;">';
                                content += '<h6 style="color: #2c3e50; margin-bottom: 10px;">' + translateKey('data') + '</h6>';
                                content += '<table class="table table-bordered table-striped" style="font-size: 11px; margin-bottom: 0;">';
                                content += '<thead><tr><th>Параметр</th><th>Значение</th><th>Единица</th><th>Предел</th></tr></thead>';
                                content += '<tbody>';

                                Object.keys(data.data).forEach(function(key) {
                                    var item = data.data[key];
                                    var paramName = translateKey(key);
                                    var value = item.value !== undefined ? item.value : '-';
                                    var unit = item.unit || '-';
                                    var safeLimit = item.safe_limit !== undefined ? item.safe_limit : '-';

                                    var valueColor = item.safe_limit ? getSafeLimitColor(value, item.safe_limit) : 'black';

                                    content += '<tr>';
                                    content += '<td><strong>' + paramName + '</strong></td>';
                                    content += '<td style="color: ' + valueColor + '; font-weight: bold;">' + value + '</td>';
                                    content += '<td>' + unit + '</td>';
                                    content += '<td>' + safeLimit + '</td>';
                                    content += '</tr>';
                                });

                                content += '</tbody>';
                                content += '</table>';
                                content += '</div>';
                            }
                        } else if (Array.isArray(data)) {
                            // Agar array bo'lsa
                            content += '<table class="table table-bordered table-striped" style="font-size: 12px;">';
                            if (data.length > 0) {
                                content += '<thead><tr>';
                                Object.keys(data[0]).forEach(function(key) {
                                    content += '<th>' + translateKey(key) + '</th>';
                                });
                                content += '</tr></thead>';
                                content += '<tbody>';
                                data.forEach(function(item) {
                                    content += '<tr>';
                                    Object.values(item).forEach(function(value) {
                                        content += '<td>' + formatValue(value) + '</td>';
                                    });
                                    content += '</tr>';
                                });
                                content += '</tbody>';
                            } else {
                                content += '<tr><td colspan="100%">Данные не найдены</td></tr>';
                            }
                            content += '</table>';
                        } else {
                            content += '<p>' + (data || 'Данные не найдены') + '</p>';
                        }

                        content += '</div>';

                        // Popup ni yangilash
                        clickedMarker.setPopupContent(content).openPopup();
                    })
                    .catch(function(error) {
                        console.error('API Error:', error);
                        var errorContent = '<div class="text-center" style="color: red;">';
                        errorContent += '<p><strong>Произошла ошибка</strong></p>';
                        errorContent += '<p>' + (error.message || 'Не удалось загрузить данные') + '</p>';
                        errorContent += '</div>';
                        clickedMarker.setPopupContent(errorContent).openPopup();
                    });
                });

                markers_organization_stations.addLayer(marker);
                map.addLayer(markers_organization_stations);

                // Map ni marker ga zoom qilish
                map.setView([lat, lon], 10);
            },
            CalculateAverage: function (arr) {
                var sum = 0;
                for (var i = 0; i < arr.length; i++) {
                    sum += parseFloat(arr[i]);
                }
                var avg = sum / arr.length;
                return avg.toFixed(2);
            },
            getAtmosphereTashkent: function () {
                if (!this.atmosphere_tashkent) {
                    markers_atmosphere_tashkent.clearLayers();
                    return;
                }

                markers_atmosphere_tashkent.clearLayers();

                // Stations API chaqiruv
                axios.get('https://meteoapi.meteo.uz/api/enggenv/stations')
                    .then(function (response) {
                        // console.log('Tashkent Stations API Response:', response.data);
                        var stations = response.data;

                        // Agar data ichida array bo'lsa
                        if (stations && stations.data && Array.isArray(stations.data)) {
                            stations = stations.data;
                        } else if (stations && Array.isArray(stations)) {
                            // To'g'ridan-to'g'ri array
                        } else {
                            console.warn('Unexpected stations data structure:', stations);
                            return;
                        }

                        if (stations && Array.isArray(stations)) {
                            // console.log('Found stations:', stations.length);
                            var markersCount = 0;

                            stations.forEach(function (station) {
                                // Koordinatalarni tekshirish
                                var lat = station.latitude || station.lat;
                                var lon = station.longitude || station.lon;
                                var deviceId = station.device_id || station.deviceId;

                                if (lat && lon && deviceId) {
                                    lat = parseFloat(lat);
                                    lon = parseFloat(lon);

                                    if (!isNaN(lat) && !isNaN(lon)) {
                                        // console.log('Creating marker at:', lat, lon, 'Device:', deviceId);
                                        markersCount++;

                                        // Marker yaratish
                                        var stationMarker = L.marker([lat, lon], {
                                            icon: L.divIcon({
                                                html: '<div style="color: #e74c3c;"><i class="fa fa-map-marker fa-2x"></i></div>',
                                                iconSize: [36, 36],
                                                className: 'myDivIcon'
                                            })
                                        });

                                        // Loading popup
                                        var popupContent = '<div class="text-center"><p>Загрузка данных...</p></div>';
                                        stationMarker.bindPopup(popupContent);

                                        // Marker ustiga bosganda data API dan ma'lumotlarni olish
                                        stationMarker.on('click', function() {
                                            var clickedMarker = this;

                                            // Data API chaqiruv
                                            axios.get('https://meteoapi.meteo.uz/api/enggenv/data', {
                                                params: {
                                                    stationDeviceId: deviceId
                                                }
                                            })
                                            .then(function (dataResponse) {
                                                var responseData = dataResponse.data;
                                                // console.log('Tashkent Data API Response:', responseData);

                                                var content = '<div style="max-width: 550px; max-height: 650px; overflow-y: auto; padding: 15px; font-family: Arial, sans-serif; background-color: #ffffff;">';

                                                // Header
                                                content += '<div style="background-color: #ffffff; border-bottom: 2px solid #dee2e6; padding: 15px; margin: -15px -15px 15px -15px;">';
                                                content += '<h4 style="margin: 0; text-align: center; font-size: 18px; font-weight: bold; color: #212529;">Загрязнение атмосферы (Ташкент)</h4>';
                                                if (station.station_name) {
                                                    content += '<p style="margin: 5px 0 0 0; text-align: center; font-size: 12px; color: #6c757d;">' + station.station_name + '</p>';
                                                }
                                                if (responseData.device) {
                                                    content += '<p style="margin: 5px 0 0 0; text-align: center; font-size: 11px; color: #6c757d;">Устройство: ' + responseData.device + '</p>';
                                                }
                                                content += '</div>';

                                                // Data ma'lumotlari
                                                var measurementData = null;

                                                // Data strukturani to'g'ri parse qilish
                                                if (responseData.data) {
                                                    if (typeof responseData.data === 'string') {
                                                        try {
                                                            measurementData = JSON.parse(responseData.data);
                                                        } catch(e) {
                                                            console.error('JSON parse error:', e);
                                                            measurementData = null;
                                                        }
                                                    } else if (typeof responseData.data === 'object' && responseData.data !== null) {
                                                        if (responseData.data.data && typeof responseData.data.data === 'string') {
                                                            try {
                                                                measurementData = JSON.parse(responseData.data.data);
                                                            } catch(e) {
                                                                measurementData = responseData.data;
                                                            }
                                                        } else {
                                                            measurementData = responseData.data;
                                                        }
                                                    }
                                                }

                                                if (!measurementData && responseData) {
                                                    var tempData = {};
                                                    Object.keys(responseData).forEach(function(key) {
                                                        if (key !== 'success' && key !== 'device' && key !== 'count' && key !== 'data' && key !== 'deviceId' && key !== 'stationDeviceId') {
                                                            tempData[key] = responseData[key];
                                                        }
                                                    });
                                                    if (Object.keys(tempData).length > 0) {
                                                        measurementData = tempData;
                                                    } else {
                                                        measurementData = responseData;
                                                    }
                                                }

                                                // Agar measurementData array bo'lsa
                                                if (Array.isArray(measurementData) && measurementData.length > 0) {
                                                    measurementData = measurementData[0];
                                                }

                                                if (measurementData && typeof measurementData === 'object' && !Array.isArray(measurementData)) {
                                                    var keyTranslations = {
                                                        'PM2.5': 'PM2.5', 'PM10': 'PM10', 'PM2_5': 'PM2.5',
                                                        'Temperature': 'Температура', 'Humidity': 'Влажность',
                                                        'SO2': 'SO₂', 'NO2': 'NO₂', 'CO': 'CO', 'O3': 'O₃', 'NH3': 'NH₃', 'H2S': 'H₂S',
                                                        'Air Pressure': 'Атмосферное давление', 'Wind Speed': 'Скорость ветра', 'Wind Direction': 'Направление ветра',
                                                        'battery': 'Батарея', 'ac_power': 'Питание от сети',
                                                        'temperature': 'Температура', 'pressure': 'Давление', 'humidity': 'Влажность',
                                                        'windSpeed': 'Скорость ветра', 'windDirection': 'Направление ветра',
                                                        'pm25': 'PM2.5', 'pm10': 'PM10', 'co': 'CO', 'no2': 'NO₂', 'so2': 'SO₂', 'o3': 'O₃', 'noise': 'Шум'
                                                    };

                                                    content += '<div style="background-color: #ffffff; overflow: hidden;">';
                                                    content += '<table style="width: 100%; border-collapse: collapse; font-size: 13px; border: 1px solid #dee2e6;">';
                                                    content += '<thead>';
                                                    content += '<tr style="background-color: #f8f9fa;">';
                                                    content += '<th style="padding: 12px; text-align: left; font-weight: 600; color: #212529; border-bottom: 2px solid #dee2e6; border-right: 1px solid #dee2e6;">Параметр</th>';
                                                    content += '<th style="padding: 12px; text-align: right; font-weight: 600; color: #212529; border-bottom: 2px solid #dee2e6; border-right: 1px solid #dee2e6;">Значение</th>';
                                                    content += '<th style="padding: 12px; text-align: center; font-weight: 600; color: #212529; border-bottom: 2px solid #dee2e6;">Единица</th>';
                                                    content += '</tr>';
                                                    content += '</thead>';
                                                    content += '<tbody>';

                                                    var rowCount = 0;
                                                    var timestamp = null;

                                                    Object.keys(measurementData).forEach(function(key) {
                                                        if (key === 'success' || key === 'device' || key === 'count' || key === 'data' || key === 'deviceId' || key === 'stationDeviceId') {
                                                            return;
                                                        }

                                                        if (key === 'timestamp' || key === 'date' || key === 'time') {
                                                            timestamp = measurementData[key];
                                                            return;
                                                        }

                                                        var value = measurementData[key];

                                                        if (typeof value === 'object' && value !== null && !Array.isArray(value)) {
                                                            return;
                                                        }
                                                        if (Array.isArray(value)) {
                                                            return;
                                                        }

                                                        var displayValue = '';
                                                        var unit = '';

                                                        if (value === null || value === undefined || value === '') {
                                                            displayValue = '-';
                                                        } else if (typeof value === 'string') {
                                                            var numValue = parseFloat(value);
                                                            if (!isNaN(numValue) && isFinite(numValue)) {
                                                                displayValue = numValue.toFixed(2);
                                                            } else {
                                                                displayValue = value;
                                                            }
                                                        } else if (typeof value === 'number') {
                                                            displayValue = value.toFixed(2);
                                                        } else {
                                                            displayValue = String(value);
                                                        }

                                                        var keyLower = key.toLowerCase();
                                                        if (keyLower.includes('temperature') || keyLower.includes('temp')) {
                                                            unit = '°C';
                                                        } else if (keyLower.includes('humidity')) {
                                                            unit = '%';
                                                        } else if (keyLower.includes('pressure')) {
                                                            unit = 'гПа';
                                                        } else if (keyLower.includes('wind') && keyLower.includes('speed')) {
                                                            unit = 'м/с';
                                                        } else if (keyLower.includes('wind') && keyLower.includes('direction')) {
                                                            unit = '°';
                                                        } else if (keyLower.includes('pm2.5') || keyLower.includes('pm2_5') || key === 'PM2.5' || key === 'PM2_5') {
                                                            unit = 'мкг/м³';
                                                        } else if (keyLower.includes('pm10') || key === 'PM10') {
                                                            unit = 'мкг/м³';
                                                        } else if (keyLower.includes('battery') || keyLower.includes('power')) {
                                                            unit = '%';
                                                        } else if (keyLower.includes('so2') || keyLower.includes('no2') || keyLower.includes('co') || keyLower.includes('o3') || keyLower.includes('nh3') || keyLower.includes('h2s')) {
                                                            unit = 'ppm';
                                                        }

                                                        var translatedKey = keyTranslations[key] || key;
                                                        var rowColor = rowCount % 2 === 0 ? '#ffffff' : '#f8f9fa';

                                                        content += '<tr style="background-color: ' + rowColor + '; border-bottom: 1px solid #dee2e6;">';
                                                        content += '<td style="padding: 10px; font-weight: 500; color: #212529; border-right: 1px solid #dee2e6;">' + translatedKey + '</td>';
                                                        content += '<td style="padding: 10px; text-align: right; font-weight: 600; color: #212529; font-size: 14px; border-right: 1px solid #dee2e6;">' + displayValue + '</td>';
                                                        content += '<td style="padding: 10px; text-align: center; color: #212529; font-size: 11px;">' + unit + '</td>';
                                                        content += '</tr>';

                                                        rowCount++;
                                                    });

                                                    if (timestamp) {
                                                        content += '<tr style="background-color: #f8f9fa; border-top: 2px solid #dee2e6;">';
                                                        content += '<td colspan="3" style="padding: 10px; text-align: center; font-size: 11px; color: #212529; font-style: italic;">';
                                                        content += 'Время измерения: ' + timestamp;
                                                        content += '</td>';
                                                        content += '</tr>';
                                                    }

                                                    content += '</tbody>';
                                                    content += '</table>';
                                                    content += '</div>';
                                                } else {
                                                    content += '<div style="text-align: center; padding: 40px; color: #6c757d;">';
                                                    content += '<p style="font-size: 16px; margin: 0;">Данные не найдены</p>';
                                                    content += '</div>';
                                                }

                                                content += '</div>';
                                                clickedMarker.setPopupContent(content).openPopup();
                                            })
                                            .catch(function(error) {
                                                console.error('API Error:', error);
                                                var errorContent = '<div class="text-center" style="color: red;">';
                                                errorContent += '<p><strong>Произошла ошибка</strong></p>';
                                                errorContent += '<p>' + (error.message || 'Не удалось загрузить данные') + '</p>';
                                                errorContent += '</div>';
                                                clickedMarker.setPopupContent(errorContent).openPopup();
                                            });
                                        });

                                        markers_atmosphere_tashkent.addLayer(stationMarker);
                                    } else {
                                        console.warn('Invalid coordinates for station:', station);
                                    }
                                } else {
                                    console.warn('Station missing required data:', station);
                                }
                            });

                            // console.log('Total markers added:', markersCount);

                            if (markers_atmosphere_tashkent.getLayers().length > 0) {
                                map.addLayer(markers_atmosphere_tashkent);
                                map.fitBounds(markers_atmosphere_tashkent.getBounds());
                                // console.log('Markers added to map, bounds:', markers_atmosphere_tashkent.getBounds());
                            } else {
                                // console.warn('No markers to add to map');
                            }
                        } else {
                            console.warn('Stations is not an array:', stations);
                        }
                    })
                    .catch(function(error) {
                        console.error('Stations API Error:', error);
                        console.error('Error details:', error.response);
                    });
            },
            GetRegions: function () {
                apiCall('{{route('map.regions')}}', null,
                    function(response) {
                        app.regions = response.data;
                    }
                );
            },
            ComfortZones: function () {
                marker_comfort_zones.clearLayers();


                var url_to_geotiff_file = "{{ asset('Idw_interpol.tif')  }}";
                fetch(url_to_geotiff_file)
                    .then(response => response.arrayBuffer())
                    .then(arrayBuffer => {
                        parseGeoraster(arrayBuffer).then(georaster => {
                            var layer = new GeoRasterLayer({
                                georaster: georaster,
                                opacity: 0.7,
                                resolution: 64, // optional parameter for adjusting display resolution
                                pixelValuesToColorFn: function (values) {
                                    const elevation = values[0];
                                    if (elevation == 0) return "transparent";
                                    else if (elevation > 1 && elevation < 2) {
                                        var r = 0 * (2 - elevation);
                                        var g = 60 * (2 - elevation);
                                        var b = 110 * (2 - elevation);
                                        return "rgb(" + r + ", " + g + ", " + b + ")";
                                    } else if (elevation > 2 && elevation < 3) {
                                        var r = 87 * (3 - elevation);
                                        var g = 147 * (3 - elevation);
                                        var b = 222 * (3 - elevation);
                                        return "rgb(" + r + ", " + g + ", " + b + ")";
                                    } else if (elevation > 3 && elevation < 4) {
                                        var r = 4 * (4 - elevation);
                                        var g = 207 * (4 - elevation);
                                        var b = 105 * (4 - elevation);
                                        return "rgb(" + r + ", " + g + ", " + b + ")";
                                    } else if (elevation > 4 && elevation < 5) {
                                        var r = 149 * (5 - elevation);
                                        var g = 212 * (5 - elevation);
                                        var b = 61 * (5 - elevation);
                                        return "rgb(" + r + ", " + g + ", " + b + ")";
                                    } else if (elevation > 5 && elevation < 6) {
                                        var r = 250 * (6 - elevation);
                                        var g = 155 * (6 - elevation);
                                        var b = 77 * (6 - elevation);
                                        return "rgb(" + r + ", " + g + ", " + b + ")";
                                    } else if (elevation >= 6) {
                                        var r = 214 * (7 - elevation);
                                        var g = 0 * (7 - elevation);
                                        var b = 0 * (7 - elevation);
                                        return "rgb(" + r + ", " + g + ", " + b + ")";
                                    }
                                },
                            });
                            marker_comfort_zones.addLayer(layer)
                            map.addLayer(marker_comfort_zones);

                            map.fitBounds(layer.getBounds());

                        });
                    });
            }
        },
        mounted() {
            // console.log('Vue mounted() called');
            try {
            this.InitialMap();
            } catch (e) {
                console.error('Error calling InitialMap:', e);
            }
            try {
            this.menuChange();
            } catch (e) {
                console.error('Error calling menuChange:', e);
            }

            apiCall('{{route('map.radiation.years')}}', null,
                function(response) {
                    app.years_r = response.data;
                }
            );
            this.GetRegions();


        }
    })
</script>
{{--<script src="{{asset('calcite/js/jquery/calcitemaps-v0.10.js')}}"/>--}}



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery (for Bootstrap's JavaScript plugins). NOTE: You can also use pure Dojo. See examples. -->
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->
<!-- Include all  plugins or individual files as needed -->
<!--script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script-->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--script src="../../assets/js/ie10-viewport-bug-workaround.js"></script-->

<!--script src="https://esri.github.io/calcite-bootstrap/scripts/vendor.js"></script-->
<!--script src="https://esri.github.io/calcite-bootstrap/scripts/plugins.js"></script-->

</body>
</html>
