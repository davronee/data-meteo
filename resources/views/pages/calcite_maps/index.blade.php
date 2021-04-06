<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Lock viewport to prevent scaling -->
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="description" content="Метеорологическая карта Узбекистана">
    <meta name="author" content="">
    <!--favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://hydromet.uz/templates/meteouz/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://hydromet.uz/templates/meteouz/images/favicon/android-icon-192x192.png">
{{--    <link rel="icon" type="image/png" sizes="32x32" href="https://hydromet.uz/templates/meteouz/images/favicon/favicon-32x32.png">--}}
    <link rel="icon" type="image/png" sizes="96x96" href="https://hydromet.uz/templates/meteouz/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://hydromet.uz/templates/meteouz/images/favicon/favicon-16x16.png">
    <link rel="shortcut icon" href="https://hydromet.uz/templates/meteouz/images/favicon/favicon.ico">
{{--    <link rel="manifest" href="https://hydromet.uz/templates/meteouz/images/favicon/manifest.json">--}}
    <meta name="yandex-verification" content="c194b7ef7003b9b1" />
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="https://hydromet.uz/templates/meteouz/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--favicon-->
    <title>METEO MONITORING MAP - UZHYDROMET</title>

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
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
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
                <li><a class="visible-xs" role="button" data-target="#panelSearch" aria-haspopup="true"><span class="glyphicon glyphicon-search"></span> Поиск</a></li>
                <li><a role="menuitem" tabindex="0" data-target="#panelBasemaps" aria-haspopup="true"><span class="glyphicon glyphicon-globe"></span> Базовые карты</a></li>
                <li><a role="menuitem" tabindex="0" data-target="#panelMeteodata" aria-haspopup="true"><span class="glyphicon glyphicon-th-list"></span> Данные</a></li>
                <li><a role="menuitem" tabindex="0" id="calciteToggleNavbar" aria-haspopup="true"><span class="glyphicon glyphicon-fullscreen"></span> Полная карта</a></li>
                <li><a role="menuitem" tabindex="0" data-target="#panelInfo" aria-haspopup="true"><span class="glyphicon glyphicon-info-sign"></span> О системе</a></li>
            </ul>
        </div>
        <!-- Title -->
        <div class="calcite-title calcite-overflow-hidden">
            <span class="calcite-title-main">METEO MONITORING - единая система метеорологических наблюдений</span>
            <span class="calcite-title-divider hidden-xs"></span>
            <span class="calcite-title-sub hidden-xs">УЗГИДРОМЕТ</span>
        </div>
        <!-- Nav -->
        <ul class="calcite-nav nav navbar-nav">
            <li><div class="calcite-navbar-search hidden-xs"><div id="geocode"></div></div></li>
        </ul>
    </nav><!--/.navbar -->

    <!-- Map Container  -->

    <div class="calcite-map">
        <div id="map" class="calcite-map-absolute"></div>
    </div><!-- /.container -->

    <!-- Panel -->

    <div class="calcite-panels calcite-panels-left calcite-bg-custom calcite-text-light panel-group calcite-bgcolor-dark-blue" role="tablist" aria-multiselectable="true">

        <!-- Info Panel -->

        <div id="panelInfo" class="panel collapse">
            <div id="headingInfo" class="panel-heading" role="tab">
                <div class="panel-title">
                    <a class="panel-toggle" role="button" data-toggle="collapse" href="#collapseInfo" aria-expanded="true" aria-controls="collapseInfo"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span><span class="panel-label">О системе</span></a>
                    <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelInfo"><span class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
                </div>
            </div>
            <div id="collapseInfo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingInfo">
                <div class="panel-body">
                    <p>Данная платформа является </p>
                    Body
                    <li>calcite-nav-bottom</li>
                    <li>calcite-layout-large-title</li>
                    <br>
                    Nav
                    <li>calcite-bgcolor-dark-green</li>
                    <li>calcite-text-light</li>
                    <br>
                    Panels
                    <li>calcite-panels-left</li>
                    <li>calcite-bgcolor-dark-green</li>
                    <li>calcite-bg-custom</li>
                </div>
            </div>
        </div>

        <!-- Search Panel -->

        <div id="panelSearch" class="panel collapse hidden-sm hidden-md hidden-lg">
            <div id="headingSearch" class="panel-heading" role="tab">
                <div class="panel-title">
                    <a class="panel-toggle collapsed" role="button" data-toggle="collapse" href="#collapseSearch"  aria-expanded="false" aria-controls="collapseSearch"><span class="glyphicon glyphicon-search" aria-hidden="true"></span><span class="panel-label">Поиск</span></a>
                    <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelSearch"><span class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
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
                    <a class="panel-toggle collapsed" role="button" data-toggle="collapse" href="#collapseMeteodata" aria-expanded="false"   aria-controls="collapseMeteodata"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span><span class="panel-label">Метеорологические данные</span></a>
                    <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelMeteodata"><span class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
                </div>
            </div>
            <div id="collapseMeteodata" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingMeteodata">
                <div class="panel-body">
                    <select id="selectStandardMeteodata" class="form-control" @change="menuChange"
                            v-model="menu">
                        <option selected value="fakt">Фактическая погода</option>
                        <option value="atmosphere">Загрязнение</option>
                        <option value="forecast">Прогноз погода</option>
                        <option value="locator">Локаторы</option>
                        <option value="aero" disabled="">Аэро-метеорологические данные</option>
                        <option value="snow">Данные снежного покрова</option>
                        <option value="water">Данные водного кадастра</option>
                        <option value="danger">Опасных зон</option>
                        <option value="awd">AWD</option>

                    </select>
                </div>
            </div>
        </div>

        <!-- Basemaps Panel -->

        <div id="panelBasemaps" class="panel collapse">
            <div id="headingBasemaps" class="panel-heading" role="tab">
                <div class="panel-title">
                    <a class="panel-toggle collapsed" role="button" data-toggle="collapse" href="#collapseBasemaps" aria-expanded="false"   aria-controls="collapseBasemaps"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span><span class="panel-label">Типы географических карт</span></a>
                    <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelBasemaps"><span class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
                </div>
            </div>
            <div id="collapseBasemaps" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingBasemaps">
                <div class="panel-body">
                    <select id="selectStandardBasemap" class="form-control">
                        <option value="Streets">Улицы</option>
                        <option value="Imagery">Спутник</option>
                        <option selected value="NationalGeographic">National Geographic</option>
                        <option value="Topographic">Топографическая</option>
                        <option value="Gray">Серый</option>
                        <option value="DarkGray">Темно-серый</option>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all plugins or individual files as needed -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    var map;
    var markers_weather = L.featureGroup();
    var markers_radar = L.featureGroup();
    var markers_atmasfera = L.featureGroup();
    var markers_awd = L.featureGroup();
    // var markers_atmasfera = L.featureGroup();
    var markers_snow = L.featureGroup();

    let app = new Vue({
        el: "#app",
        data: {
            forcastTemp: false,
            currentTemp: true,
            atmTemp: false,
            markers: [],
            radars:@json($radars),
            radar: false,
            atmasfera_data: '',
            snow: false,
            awd: false,
            awds:@json($stations),
            menu: 'fakt'
        },
        methods: {
            InitialMap: function () {
                // ============
                // Esri-Leaflet
                // ============

                map = L.map('map', {zoomControl: false}).setView([41.315514, 69.246097], 6),
                    layer = L.esri.basemapLayer('Imagery').addTo(map),
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
                            fillOpacity: 0.1,
                            weight: 0.4,
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
                                    .bindTooltip("<div class='pin-info' style='background-color:" + markerColor + "'><b>" + item.Si + "</b></div>",
                                        {
                                            permanent: true,
                                            direction: 'top',
                                            className: 'ownClass'

                                        });

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

                            var marker = L.marker([parseFloat(item.Metadata.Latitude), parseFloat(item.Metadata.Longitude)], {icon: meteoIcon}).on('click', function () {
                                axios.post('{{route('map.awd.getStation')}}', {
                                    token: '{{@csrf_token()}}',
                                    id: item.Id
                                })
                                    .then(function (response) {


                                        marker.bindPopup("" +
                                            "<table class='table table-bordered'>" +
                                            "<tr colspan='3'><td class='text-center'><b>" + response.data.Stations.StationName + "</b></td></tr>" +
                                            "<tr>" +
                                            "<td><b>Температура воздуха</b></td>" +
                                            "<td>" + response.data.Stations.Sources.Variables[2].Value['Value'] + " °C </td>" +
                                            "<td>" + new Date(response.data.Stations.Sources.Variables[2].Value['Meastime']).toLocaleString() + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>Точка Росы</b></td>" +
                                            "<td>" + response.data.Stations.Sources.Variables[5].Value['Value'] + " °C </td>" +
                                            "<td>" + new Date(response.data.Stations.Sources.Variables[5].Value['Meastime']).toLocaleString() + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>Относительная влажность</b></td>" +
                                            "<td>" + response.data.Stations.Sources.Variables[7].Value['Value'] + " % </td>" +
                                            "<td>" + new Date(response.data.Stations.Sources.Variables[7].Value['Meastime']).toLocaleString() + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>Текущее давление<b/></td>" +
                                            "<td>" + response.data.Stations.Sources.Variables[9].Value['Value'] + " гПа </td>" +
                                            "<td>" + new Date(response.data.Stations.Sources.Variables[9].Value['Meastime']).toLocaleString() + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>Средн.давление над ур.моря за 10мин<b/></td>" +
                                            "<td>" + response.data.Stations.Sources.Variables[10].Value['Value'] + " гПа </td>" +
                                            "<td>" + new Date(response.data.Stations.Sources.Variables[10].Value['Meastime']).toLocaleString() + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>Осадкомер 2. Сумма осадков за 10мин</b></td>" +
                                            "<td>" + response.data.Stations.Sources.Variables[13].Value['Value'] + " мм </td>" +
                                            "<td>" + new Date(response.data.Stations.Sources.Variables[13].Value['Meastime']).toLocaleString() + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>Средн.направление ветра за 10 мин</b></td>" +
                                            "<td>" + response.data.Stations.Sources.Variables[14].Value['Value'] + " мм </td>" +
                                            "<td>" + new Date(response.data.Stations.Sources.Variables[14].Value['Meastime']).toLocaleString() + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>Средн.скорость ветра за 10 мин</b></td>" +
                                            "<td>" + response.data.Stations.Sources.Variables[17].Value['Value'] + " м/с </td>" +
                                            "<td>" + new Date(response.data.Stations.Sources.Variables[17].Value['Meastime']).toLocaleString() + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                            "<td><b>Средн.кол-во солнечной радиации за 10мин</b></td>" +
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
                    );
                    map.addLayer(markers_awd);


                } else {
                    markers_awd.clearLayers();

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

                    this.current();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();


                } else if (this.menu == 'atmosphere') {

                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = true;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;


                    this.getAtmasfera();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_weather.clearLayers();


                } else if (this.menu == 'forecast') {
                    this.currentTemp = false;
                    this.forcastTemp = true;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = false;

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_weather.clearLayers();

                } else if (this.menu == 'locator') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = true;
                    this.awd = false;
                    this.snow = false;

                    this.getRadars();

                    markers_atmasfera.clearLayers();
                    markers_snow.clearLayers();
                    markers_awd.clearLayers();
                    markers_weather.clearLayers();


                } else if (this.menu == 'snow') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = false;
                    this.snow = true;


                    this.getSnow();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_awd.clearLayers();
                    markers_weather.clearLayers();

                } else if (this.menu == 'awd') {
                    this.currentTemp = false;
                    this.forcastTemp = false;
                    this.atmTemp = false;
                    this.radar = false;
                    this.awd = true;
                    this.snow = false;


                    this.getawd();

                    markers_radar.clearLayers();
                    markers_atmasfera.clearLayers();
                    markers_weather.clearLayers();
                    markers_snow.clearLayers();

                }

            }
        },
        mounted() {
            this.InitialMap();
            this.menuChange();
        }
    })
</script>
<script>


</script>


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

<script src="{{asset('calcite/js/jquery/calcitemaps-v0.10.js')}}"/>
</body>
</html>
