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

    <script src="{{asset('asset/js/vue.js')}}"></script>
    <script src="{{asset('asset/js/axios.min.js')}}"></script>
    <!-- Load Esri Leaflet from CDN -->

    <script src="{{asset('calcite/js/jquery/esri-leaflet-debug.js')}}"></script>

    <!-- Load Esri Leaflet Geocoder from CDN -->
    <!--     <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.2.3/dist/esri-leaflet-geocoder.css"> -->

    <link rel="stylesheet" href="{{asset('calcite/css/esri-leaflet-geocoder.css')}}">
    <link rel="stylesheet" href="{{asset('calcite/css/style.css')}}">
    <script src="{{asset('calcite/js/jquery/esri-leaflet-geocoder-debug.js')}}"></script>
    <script src="{{asset('js/georaster.min.js')}}"></script>
    <script src="{{asset('js/georaster-layer-for-leaflet.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://unpkg.com/chroma-js"></script>


    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .calcite-nav-bottom .calcite-map .leaflet-control-zoom {
            margin-top: 28px;
        }

        .calcite-navbar-search {
            margin-top: 0;
            margin-right: 5px;
            padding: 5px 0;
        }

        .calcite-nav-bottom .panel-body .geocoder-control-suggestions.leaflet-bar {
            top: 25px;
            bottom: auto;
        }

        .calcite-maps .esri-truncated-attribution {
            max-width: 100% !important;
            width: 100%;
        }

        .leaflet-touch .leaflet-bar {
            border: none;
        }

        div#footer-fluid {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            height: 50px;
            text-align: right;
        }

        .china {
            filter: hue-rotate(45deg);
        }
    </style>

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
</div>

<script src="{{asset('assets/js/leaflet.awesome-markers.min.js')}}"></script>
<script src="{{asset('js/topojson.min.js')}}"></script>

<script src="{{asset('asset/js/leaflet.ajax.js')}}"></script>
<script src="{{asset('calcite/js/jquery.min.js')}}"></script>
<!-- Include all plugins or individual files as needed -->
<script src="{{asset('calcite/js/bootstrap.min.js')}}"></script>

<script>
    var map;
    var markers_weather = L.featureGroup();
    var markers_radar = L.featureGroup();
    var markers_atmasfera = L.featureGroup();
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
    var legend_marker = L.featureGroup();

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
                // ============
                // Esri-Leaflet
                // ============

                map = L.map('map', {zoomControl: false}).setView([41.315514, 69.246097], 6),
                    layer = L.esri.basemapLayer('NationalGeographic').addTo(map),
                    // layerLabels = L.esri.basemapLayer('xxxLabels').addTo(map);
                    layerLabels = null,
                    worldTransportation = L.esri.basemapLayer('ImageryTransportation');

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


                                    }
                                    else if (item.weather_code == 'partly_cloudy') {
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
                            radius: item.region_id == 1727 ? 120000 : 250000,
                        })
                        markers_radar.addLayer(circle)
                    });


                    map.addLayer(markers_radar);

                } else {
                    markers_radar.clearLayers();

                }


            },
            getAtmasfera: function () {
                markers_atmasfera.clearLayers();
                var marker;
                var markerColor, icon;
                var drujbahoriba, plashadkahoriba;
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
                        .then(function (response) {
                            this.atmasfera_stations = response.data;


                            this.atmasfera_stations.forEach(function (item, i, arr) {


                                var SI = (item.Si == '-') ? '-' : parseFloat(item.Si);


                                markerColor = item.color; //getColorSi(SI);
                                // console.log(SI);
                                count_si = parseFloat(item.Si);

                                const fontAwesomeIcon = L.divIcon({
                                    html: '<div style="color:' + markerColor + '"><i class="fa fa-map-marker fa-2x"></i></div>',
                                    iconSize: [36, 36],
                                    className: 'myDivIcon'
                                });
                                var marker = L.marker([parseFloat(item.lat), parseFloat(item.lon)], {icon: fontAwesomeIcon})
                                    .on('click', function () {
                                        if (item.id == 107 || item.id == 108 ||
                                            item.id == 714 || item.id == 715 ||
                                            item.id == 716 || item.id == 717 ||
                                            item.id == 718 || item.id == 719) {
                                            axios.get('{{route('map.horiba.plashadka')}}', {
                                                params: {
                                                    point: item.id
                                                }
                                            })
                                                .then(function (response) {
                                                    try {
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
                                                                "</table>")
                                                                .bindTooltip("<div class='pin-info' style='background-color:#8c2b8c;color:#fff'><b>Авто</b></div>",
                                                                    {
                                                                        permanent: true,
                                                                        direction: 'top',
                                                                        className: 'ownClass'

                                                                    });
                                                        } else {
                                                            marker.bindPopup("" +
                                                                "<table class='table table-bordered'>" +
                                                                "<tr ><td class='text-center' colspan='2'><b>" + item.category_title + "</b></td></tr>" +
                                                                "<tr>" +
                                                                "<td class='text-center text-danger'><b>профилактический работы</b></td>" +
                                                                "</tr>" +
                                                                "</table>" +
                                                                "<a href='https://monitoring.meteo.uz/ru/map/view/" + item.id + "' target='_blank' style='color:#000;'>@lang('map.more')....</a>")
                                                                .bindTooltip("<div class='pin-info' style='background-color:#8c2b8c;color:#fff'><b>Авто</b></div>",
                                                                    {
                                                                        permanent: true,
                                                                        direction: 'top',
                                                                        className: 'ownClass'

                                                                    });
                                                        }

                                                    } catch (e) {
                                                        console.log(e)
                                                    }

                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });

                                        }
                                        else if (item.id == 109) {

                                            marker.bindPopup("" +
                                                "<table class='table table-bordered'>" +
                                                "<tr ><td class='text-center' colspan='2'><b>" + item.category_title + "</b></td></tr>" +
                                                "<tr>" +
                                                "<td><b>@lang('map.NO') (NO):</b></td>" +
                                                "<td>27µg/m³</td>" +
                                                "</tr>" +
                                                "</table>" +
                                                "<a href='https://monitoring.meteo.uz/' target='_blank' style='color:#fff;'>@lang('map.more')....</a>")
                                                .bindTooltip("<div class='pin-info' style='background-color:" + markerColor + "'><b>" + "27" + "</b></div>",
                                                    {
                                                        permanent: true,
                                                        direction: 'top',
                                                        className: 'ownClass'

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
                                                "<a href='https://monitoring.meteo.uz/' target='_blank' style='color:#fff;'>@lang('map.more')....</a>")
                                                .bindTooltip("<div class='pin-info' style='background-color:" + markerColor + "'><b>" + item.Si + "</b></div>",
                                                    {
                                                        permanent: true,
                                                        direction: 'top',
                                                        className: 'ownClass'

                                                    });

                                        }


                                    })


                                marker.fire('click');

                                marker.ind = item.id;//j+"_"+i;

                                markers_atmasfera.addLayer(marker);


                            })

                            map.addLayer(markers_atmasfera);
                            let bounds = markers_atmasfera.getBounds();
                            map.fitBounds(bounds);

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

                                                if (response.data.Stations.Sources.Variables.length == 7) {
                                                    if (response.data.Stations.Sources.Variables[5].Value['Value'] !== null) {
                                                        marker.bindPopup("" +
                                                            "<table class='table table-bordered'>" +
                                                            "<tr ><td class='text-center' colspan='3'><b>" + StationName + "</b></td></tr>" +
                                                            "<tr>" +
                                                            "<td><b>@lang('map.air_temperature')</b></td>" +
                                                            "<td>" + response.data.Stations.Sources.Variables[5].Value['Value'] + " °C </td>" +
                                                            "<td>" + new Date(response.data.Stations.Sources.Variables[5].Value['Meastime']).toLocaleString() + "</td>" +
                                                            "</tr>" +
                                                            "<tr>" +
                                                            "<td><b>@lang('map.dew_point')</b></td>" +
                                                            "<td>" + response.data.Stations.Sources.Variables[2].Value['Value'] + " °C </td>" +
                                                            "<td>" + new Date(response.data.Stations.Sources.Variables[2].Value['Meastime']).toLocaleString() + "</td>" +
                                                            "</tr>" +
                                                            "<tr>" +
                                                            "<td><b>@lang('map.relative_humidity')</b></td>" +
                                                            "<td>" + response.data.Stations.Sources.Variables[3].Value['Value'] + " % </td>" +
                                                            "<td>" + new Date(response.data.Stations.Sources.Variables[3].Value['Meastime']).toLocaleString() + "</td>" +
                                                            "</tr>" +
                                                            "<tr>" +
                                                            "<td><b>@lang('map.current_pressure')<b/></td>" +
                                                            "<td>" + response.data.Stations.Sources.Variables[6].Value['Value'] + " гПа </td>" +
                                                            "<td>" + new Date(response.data.Stations.Sources.Variables[6].Value['Meastime']).toLocaleString() + "</td>" +
                                                            "</tr>" +
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
                                                    if (response.data.Stations.Sources.Variables[24].Value['Value'] !== null) {
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
                                                        )
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
                                console.log('item: ' + item.Id)
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
                                        "<tr ><td class='text-center' colspan='2'><b>" + item.properties.location + "</b></td></tr>" +
                                        "<tr>" +
                                        "<td><b>code</b></td>" +
                                        "<td>" + item.properties.code + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>datetime</b></td>" +
                                        "<td>" + item.properties.datetime + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>distance</b></td>" +
                                        "<td>" + item.properties.distance + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>location</b></td>" +
                                        "<td>" + item.properties.location + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>number</b></td>" +
                                        "<td>" + item.properties.number + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>number1</b></td>" +
                                        "<td>" + item.properties.number1 + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>rivers</b></td>" +
                                        "<td>" + item.properties.rivers + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>square</b></td>" +
                                        "<td>" + item.properties.square + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>type</b></td>" +
                                        "<td>" + item.properties.type + "</td>" +
                                        "</tr>" +
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
                                                    // "<tr>" +
                                                    // "<td><b>PM2.5</b></td>" +
                                                    // "<td>" + response.data[13] + " µg/m³</td>" +
                                                    // "</tr>" +
                                                    // "<tr>" +
                                                    // "<td><b>PM10</b></td>" +
                                                    // "<td>" + response.data[15] + " µg/m³</td>" +
                                                    // "</tr>" +
                                                    // "<tr>" +
                                                    // "<td><b>CO2</b></td>" +
                                                    // "<td>" + response.data[17] + " µg/m³</td>" +
                                                    // "</tr>" +
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
                console.log(total);
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
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') -  " + response2.data[0].region_name + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });

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
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') -  " + response2.data[0].region_name + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });

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
                                                head = "<table class='table table-bordered'>" +
                                                    "<tr>" +
                                                    "<td class='text-center' colspan='3'><b>@lang('map.3days_weather') -  " + response2.data[0].region_name + "</b></td></tr>" +
                                                    "<tr><td><b>@lang('map.date')</b></td><td><b>@lang('map.day')</b></td><td><b>@lang('map.night')</b></td></tr>";

                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });

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

                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });

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

                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });

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

                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });

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

                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });

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

                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });

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

                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });

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
                                else if (item.weather_code == 'partly_cloudy') {
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

                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });

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
                                else {
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

                                                response2.data.forEach(function (item, i, arr) {
                                                    if (i % 2 == 0) {
                                                        head += "<tr>" +
                                                            "<td>" + item.date + "</td>" +
                                                            "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td>";
                                                    } else {
                                                        head += "<td>" + item.air_t_min + "°C" + " - " + item.air_t_max + "°C" + "</td></tr>";
                                                    }


                                                });

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
            menuChange: function () {
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
            CalculateAverage: function (arr) {
                var sum = 0;
                for (var i = 0; i < arr.length; i++) {
                    sum += parseFloat(arr[i]);
                }
                var avg = sum / arr.length;
                return avg.toFixed(2);
            },
            GetRegions: function () {
                axios.get('{{route('map.regions')}}')
                    .then(function (response) {
                        app.regions = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

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
                                    } else if (elevation => 6) {
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
            this.InitialMap();
            this.menuChange();

            axios.get('{{route('map.radiation.years')}}')
                .then(function (response) {
                    app.years_r = response.data;

                })
                .catch(function (error) {
                    // handle error
                    console.log(error + item.Id);
                })
                .then(function () {
                    // always executed
                });
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
