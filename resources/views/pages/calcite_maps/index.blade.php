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
            <span class="calcite-title-sub hidden-xs">@lang('map.beta_version')</span>
        </div>
        <!-- Nav -->
        <ul class="calcite-nav nav navbar-nav">
            <!--  <li>
                <div class="calcite-navbar-search hidden-xs">
                    <div id="geocode"></div>
                </div>
            </li> -->
            <li><a class="calcite-navbar-search" href="#">Авторизация <span class="glyphicon glyphicon-log-out"></span></a>
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
    </div><!-- /.container -->

    <!-- Panel -->

    <div
        class="calcite-panels calcite-panels-left calcite-bg-custom calcite-text-light panel-group calcite-bgcolor-dark-blue"
        role="tablist" aria-multiselectable="true">


        <!-- API Panel -->

        <div id="panelApi" class="panel collapse">
            <div id="headingApi" class="panel-heading" role="tab">
                <div class="panel-title">
                    <a class="panel-toggle" role="button" data-toggle="collapse" href="#collapseApi"
                       aria-expanded="true" aria-controls="collapseApi"><span class="fa fa-code"
                                                                              aria-hidden="true"></span><span
                            class="panel-label">Метео API</span></a>
                    <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelApi"><span
                            class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
                </div>
            </div>
            <div id="collapseApi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingApi">
                <div class="panel-body">
                    <p>@lang('map.api_info')</p>
                    <p>@lang('map.moduls'):</p>
                    <li>@lang('map.factik')</li>
                    <li>@lang('map.atmasphera')</li>
                    <li>@lang('map.locator')</li>
                    <li>@lang('map.aero')</li>
                    <li>@lang('map.sputnik')</li>
                    <li>@lang('map.water_kadster')</li>
                    <li>@lang('map.aws')</li>
                    <hr>
                    <li style="list-style: none;"><p>@lang('map.email_push')</p></li>
                </div>


            </div>


        </div>


        <!-- Info Panel -->

        <div id="panelInfo" class="panel collapse">
            <div id="headingInfo" class="panel-heading" role="tab">
                <div class="panel-title">
                    <a class="panel-toggle" role="button" data-toggle="collapse" href="#collapseInfo"
                       aria-expanded="true" aria-controls="collapseInfo"><span class="glyphicon glyphicon-info-sign"
                                                                               aria-hidden="true"></span><span
                            class="panel-label">@lang('map.portal_info')</span></a>
                    <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelInfo"><span
                            class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
                </div>
            </div>
            <div id="collapseInfo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingInfo">
                <div class="panel-body">
                    <p>@lang('map.main_title')</p>
                    <p>@lang('map.moduls'):</p>
                    <li>@lang('map.factik')</li>
                    <li>@lang('map.atmasphera')</li>
                    <li>@lang('map.locator')</li>
                    <li>@lang('map.aero')</li>
                    <li>@lang('map.sputnik')</li>
                    <li>@lang('map.water_kadster')</li>
                    <li>@lang('map.aws')</li>
                </div>
            </div>
        </div>

        <!-- Search Panel -->

        <div id="panelSearch" class="panel collapse hidden-sm hidden-md hidden-lg">
            <div id="headingSearch" class="panel-heading" role="tab">
                <div class="panel-title">
                    <a class="panel-toggle collapsed" role="button" data-toggle="collapse" href="#collapseSearch"
                       aria-expanded="false" aria-controls="collapseSearch"><span class="glyphicon glyphicon-search"
                                                                                  aria-hidden="true"></span><span
                            class="panel-label">@lang('map.search')</span></a>
                    <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelSearch"><span
                            class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
                </div>
            </div>
            <div id="collapseSearch" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSearch">
                <div class="panel-body calcite-body-expander">
                    <div id="geocodeMobile"></div>
                </div>
            </div>
        </div>

        <!-- Данные Panel -->

        <div id="panelMeteodata" class="panel collapse">
            <div id="headingMeteodata" class="panel-heading" role="tab">
                <div class="panel-title">
                    <a class="panel-toggle collapsed" role="button" data-toggle="collapse" href="#collapseMeteodata"
                       aria-expanded="false" aria-controls="collapseMeteodata"><span
                            class="glyphicon glyphicon-th-large" aria-hidden="true"></span><span
                            class="panel-label">@lang('map.meteologik_info')</span></a>
                    <a class="panel-close" role="button" data-toggle="collapse" tabindex="0"
                       href="#panelMeteodata"><span class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
                </div>
            </div>
            <div id="collapseMeteodata" class="panel-collapse collapse" role="tabpanel"
                 aria-labelledby="headingMeteodata">
                <div class="panel-body">
                    <select id="selectStandardMeteodata" class="form-control" @change="menuChange()"
                            v-model="menu">
                        <option value="fakt">@lang('map.factik')</option>
                        <option value="atmosphere">@lang('map.atmasphera')</option>
                        <option value="forecast">@lang('map.weather')</option>
                        <option value="locator">@lang('map.locator')</option>
                        <option value="aero">@lang('map.aero')</option>
                        <option value="snow">@lang('map.snow')</option>
                        <option value="sputnik">@lang('map.metep_sputnik')</option>
                        <option value="water">@lang('map.kadaster_water')</option>
                        <option value="awd">@lang('map.aws')</option>
                        <optgroup label="@lang('map.danger_zones_kadaster')">

                            <option value="AtmZasuha">@lang('map.AtmZasuha')</option>
                            <option value="dojd_30mm_12ches">@lang('map.dojd_30mm_12ches')
                            </option>
                            <option value="dojd_polusutkas">@lang('map.dojd_polusutkas')</option>
                            <option value="osen_zam_pochvas">@lang('map.osen_zam_pochvas')</option>
                            <option value="osen_zam_vozds">@lang('map.osen_zam_vozds')</option>
                            <option value="sneg20mm12ches">@lang('map.sneg20mm12ches')</option>
                            <option value="sneg_polusutkas">@lang('map.sneg_polusutkas')</option>
                            <option value="t40_s">@lang('map.t40_s')</option>
                            <option value="ves_zampochvas">@lang('map.ves_zampochvas')</option>
                            <option value="ves_zam_vozduhs">@lang('map.ves_zam_vozduhs')</option>
                            <option value="veter_razl_predelov2020s">@lang('map.veter_razl_predelov2020s')
                            </option>
                            <option value="veter15s">@lang('map.veter15s')</option>

                            <!--        <option value="AtmZasuha">Число дней с атм. засухой</option>
                                   <option value="dojd_30mm_12ches">Кол-во суток с осадками 30 мм за 12 ч.</option>
                                   <option value="dojd_polusutkas">Кол-во осадков за полусутки</option>
                                   <option value="osen_zam_pochvas">Даты первого осеннего заморозка на почве</option>
                                   <option value="osen_zam_vozds">Даты первого осеннего заморозка в воздухе</option>
                                   <option value="sneg20mm12ches">Кол-во суток со снегом 20 мм за 12 ч</option>
                                   <option value="sneg_polusutkas">Кол-во осадков в виде снега за полусутки</option>
                                   <option value="t40_s">Число дн. с температурой 40°С и выше</option>
                                   <option value="ves_zampochvas">Даты последнего весеннего заморозка на почве</option>
                                   <option value="ves_zam_vozduhs">Даты последнего весеннего заморозка в воздухе</option>
                                   <option value="veter_razl_predelov2020s">Кол-во суток с ветром со скоростью 15, 20 и 30 м/с
                                   </option>
                                   <option value="veter15s">Кол-во суток с ветром со скоростью 15 м/с и более</option> -->
                        </optgroup>


                    </select>
                </div>
            </div>
        </div>

        <!-- Basemaps Panel -->

        <div id="panelBasemaps" class="panel collapse">
            <div id="headingBasemaps" class="panel-heading" role="tab">
                <div class="panel-title">
                    <a class="panel-toggle collapsed" role="button" data-toggle="collapse" href="#collapseBasemaps"
                       aria-expanded="false" aria-controls="collapseBasemaps"><span class="glyphicon glyphicon-th-large"
                                                                                    aria-hidden="true"></span><span
                            class="panel-label">@lang('map.geografik_map_type')</span></a>
                    <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelBasemaps"><span
                            class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
                </div>
            </div>
            <div id="collapseBasemaps" class="panel-collapse collapse" role="tabpanel"
                 aria-labelledby="headingBasemaps">
                <div class="panel-body">
                    <select id="selectStandardBasemap" class="form-control">
                        <option value="Streets">@lang('map.Streets')</option>
                        <option value="Imagery">@lang('map.Imagery')</option>
                        <option value="NationalGeographic">@lang('map.NationalGeographic')</option>
                        <option value="Topographic">@lang('map.Topographic')</option>
                        <option selected value="Gray">@lang('map.Gray')</option>
                        <option value="DarkGray">@lang('map.DarkGray')</option>
                        <option value="OpenStreetMap">Open Street Map</option>
                    </select>
                </div>
            </div>
        </div>

    </div> <!-- /.calcite-panels -->

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
    var markers_forecast = L.featureGroup();
    // var markers_atmasfera = L.featureGroup();
    var markers_snow = L.featureGroup();
    var markers_aero = L.featureGroup();
    var markers_dangerzones = L.featureGroup();
    var markers_microstep = L.featureGroup();

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
            awds:@json($stations),
            microstep:@json($microstations),
            hydrometStations:@json($hydrometstation),
            menu: 'forecast',
            aero: false,
            dangerzones: false,
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
            ]
        },
        methods: {
            InitialMap: function () {
                // ============
                // Esri-Leaflet
                // ============

                map = L.map('map', {zoomControl: false}).setView([41.315514, 69.246097], 6),
                    layer = L.esri.basemapLayer('Gray').addTo(map),
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
                if (this.currentTemp) {
                    var marker;

                    axios.get('{{route('map.getCurrent')}}')
                        .then(function (response) {

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

                            });


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


            },
            getRadars: function () {
                if (this.radar) {
                    this.radars.forEach(function (item, i, arr) {
                        // console.log( i + ": " + item.latitude + " (массив:" + item.region_id + ")" );
                        var marker = L.marker([item.latitude, item.longitude]).on('click', function () {

                            if (item.region_id == 1726 || item.region_id == 1735) {
                                marker.bindPopup(" <input type='checkbox' id='zoomCheck'><label for='zoomCheck'><img style='cursor: zoom-in' class='zoom' width='200' data-lightbox='/map/getRadars?region=" + item.region_id + "' data-title='My caption' src='/map/getRadars?region=" + item.region_id + "' /></label>")
                            }
                        });
                        markers_radar.addLayer(marker);
                        marker.fire('click');
                        var circle = L.circle([item.latitude, item.longitude], {
                            color: '#4236E5',
                            fillColor: '#6789E5',
                            fillOpacity: 0.3,
                            radius: 300000
                        })
                        markers_radar.addLayer(circle)
                    });


                    map.addLayer(markers_radar);

                } else {
                    markers_radar.clearLayers();

                }


            },
            getAtmasfera: function () {
                var marker;
                var markerColor, icon;
                if (this.atmTemp) {
                    axios.get('{{route('map.GetAtmasfera')}}')
                        .then(function (response) {
                            this.atmasfera_stations = response.data.data[0].stations;
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
                                        marker.bindPopup("" +
                                            "<table class='table table-bordered'>" +
                                            "<tr ><td class='text-center' colspan='2'><b>" + item.unserialize_category_title.ru + "</b></td></tr>" +
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

                                    })
                                    .bindTooltip("<div class='pin-info' style='background-color:" + markerColor + "'><b>" + item.Si + "</b></div>",
                                        {
                                            permanent: true,
                                            direction: 'top',
                                            className: 'ownClass'

                                        });

                                marker.fire('click');

                                marker.ind = item.id;//j+"_"+i;

                                markers_atmasfera.addLayer(marker);


                            })

                            map.addLayer(markers_atmasfera);

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

                    getGeoData('{{asset('asset/geojson/map.topojson')}}').then(data => geojsonSnow.addData(data));


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

                            // console.log(item.Metadata.Latitude);
                            if (item.Metadata.Latitude !== null &&  item.Metadata.Longitude !== null) {
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
                                                    StationName = 'Джангелей';
                                                    break;
                                                case "06_Karakul":
                                                    StationName = 'Каракул';
                                                    break;
                                                case "07_Kysyl-Ravat":
                                                    StationName = 'Кизил-Рават';
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
                                                    StationName = 'Тамди';
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
                                                    StationName = 'Сариассия';
                                                    break;
                                                case "24_Shurchi":
                                                    StationName = 'Шурчи';
                                                    break;
                                                case "25_Termez":
                                                    StationName = 'Термез';
                                                    break;
                                                case "26_Syrdarya":
                                                    StationName = 'Сирдаря';
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
                                                    StationName = '36_Dalverzin';
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
                                                    StationName = 'Янгиюл';
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
                                                    StationName = 'Сарйканда';
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
                                                    StationName = 'Ташкент-Обсерваторй';
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
                            }

                        }
                    );

                    this.hydrometStations.forEach(function (item, i, arr) {
                        var meteoIcon = L.icon({
                            iconUrl: '{{asset('images/meteo_hydro.png')}}',
                            iconSize: [28, 28], // size of the icon
                            class: "station"
                        });

                        marker = L.marker([parseFloat(item.latitude), parseFloat(item.longitude)], {icon: meteoIcon}).on('click', function () {
                            marker.bindPopup("" +
                                "<table class='table table-bordered'>" +
                                "<tr ><td class='text-center' colspan='2'><b>" + item.name + "</b></td></tr>" +
                                "<tr>" +
                                "<td><b>temperature</b></td>" +
                                "<td>" + item.hydromet_sensor_data.temperature + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td><b>humidity</b></td>" +
                                "<td>" + item.hydromet_sensor_data.humidity + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td><b>wspeed</b></td>" +
                                "<td>" + item.hydromet_sensor_data.wspeed + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td><b>wdir</b></td>" +
                                "<td>" + item.hydromet_sensor_data.wdir + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td><b>pressure</b></td>" +
                                "<td>" + item.hydromet_sensor_data.pressure + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td><b>created_at</b></td>" +
                                "<td>" + item.hydromet_sensor_data.created_at + "</td>" +
                                "</tr>" +
                                "</table>"
                            )
                        }).addTo(map);

                        marker.fire('click');


                        markers_awd.addLayer(marker);

                    });


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


                    map.addLayer(markers_awd);


                } else {
                    markers_awd.clearLayers();

                }
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
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = false;

                    this.current();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();


                } else if (this.menu == 'atmosphere') {

                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = true;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = false;


                    this.getAtmasfera();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_weather.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();


                } else if (this.menu == 'locator') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = true;
                    this.awd = false;
                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = false;


                    this.getRadars();

                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_weather.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();


                } else if (this.menu == 'snow') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = true;
                    this.aero = false;
                    this.dangerzones = false;


                    this.getSnow();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_awd.clearLayers();
                    markers_weather.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();


                } else if (this.menu == 'awd') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = true;
                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = false;


                    this.getawd();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_aero.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();


                } else if (this.menu == 'aero') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.aero = true;
                    this.dangerzones = false;


                    this.getAeroport();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_forecast.clearLayers();
                    markers_dangerzones.clearLayers();


                } else if (this.menu == 'forecast') {
                    this.currentTemp = false;
                    this.forcastTemp = true;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = false;


                    this.getForecast();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_aero.clearLayers();
                    markers_awd.clearLayers();
                    markers_dangerzones.clearLayers();

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
                    this.snow = false;
                    this.aero = false;
                    this.dangerzones = true;


                    this.getDangerzones(this.menu);

                    markers_radar.clearLayers();
                    markers_forecast.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();
                    markers_aero.clearLayers();
                    markers_awd.clearLayers();
                    markers_dangerzones.clearLayers();

                }

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
                if (text !== undefined) {
                    return text + ' ' + unit;
                } else {
                    return '-';
                }
            }
        },
        mounted() {
            this.InitialMap();
            this.menuChange();
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
