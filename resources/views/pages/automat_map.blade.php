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

    <!-- Map Container  -->

    <div class="calcite-map">
        <div id="map" class="calcite-map-absolute"></div>
    </div><!-- /.container -->

    <!-- Panel -->


</div>

<script src="{{asset('assets/js/leaflet.awesome-markers.min.js')}}"></script>
<script src="{{asset('js/topojson.min.js')}}"></script>

<script src="{{asset('asset/js/leaflet.ajax.js')}}"></script>
<script src="{{asset('calcite/js/jquery.min.js')}}"></script>
<!-- Include all plugins or individual files as needed -->
<script src="{{asset('calcite/js/bootstrap.min.js')}}"></script>

<script>
    var map;
    var marker;


    let app = new Vue({
        el: "#app",
        data: {
            awds:@json($stations)
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
            getHydrometStation: function () {
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
                                        "<td>" +  new Date(response.data.Stations.Sources.Variables[2].Value['Meastime']).toLocaleString() + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>Точка Росы</b></td>" +
                                        "<td>" + response.data.Stations.Sources.Variables[5].Value['Value'] + " °C </td>" +
                                        "<td>" +  new Date(response.data.Stations.Sources.Variables[5].Value['Meastime']).toLocaleString() + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>Относительная влажность</b></td>" +
                                        "<td>" + response.data.Stations.Sources.Variables[7].Value['Value'] + " % </td>" +
                                        "<td>" +  new Date(response.data.Stations.Sources.Variables[7].Value['Meastime']).toLocaleString() + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>Текущее давление<b/></td>" +
                                        "<td>" + response.data.Stations.Sources.Variables[9].Value['Value'] + " гПа </td>" +
                                        "<td>" +  new Date(response.data.Stations.Sources.Variables[9].Value['Meastime']).toLocaleString() + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>Средн.давление над ур.моря за 10мин<b/></td>" +
                                        "<td>" + response.data.Stations.Sources.Variables[10].Value['Value'] + " гПа </td>" +
                                        "<td>" +  new Date(response.data.Stations.Sources.Variables[10].Value['Meastime']).toLocaleString() + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>Осадкомер 2. Сумма осадков за 10мин</b></td>" +
                                        "<td>" + response.data.Stations.Sources.Variables[13].Value['Value'] + " мм </td>" +
                                        "<td>" +  new Date(response.data.Stations.Sources.Variables[13].Value['Meastime']).toLocaleString() + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>Средн.направление ветра за 10 мин</b></td>" +
                                        "<td>" + response.data.Stations.Sources.Variables[14].Value['Value'] + " мм </td>" +
                                        "<td>" +  new Date(response.data.Stations.Sources.Variables[14].Value['Meastime']).toLocaleString() + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>Средн.скорость ветра за 10 мин</b></td>" +
                                        "<td>" + response.data.Stations.Sources.Variables[17].Value['Value'] + " м/с </td>" +
                                        "<td>" +  new Date(response.data.Stations.Sources.Variables[17].Value['Meastime']).toLocaleString() + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                        "<td><b>Средн.кол-во солнечной радиации за 10мин</b></td>" +
                                        "<td>" + response.data.Stations.Sources.Variables[21].Value['Value'] + " Вт/м2 </td>" +
                                        "<td>" +  new Date(response.data.Stations.Sources.Variables[21].Value['Meastime']).toLocaleString() + "</td>" +
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
                        }).addTo(map);
                        marker.fire('click');

                    }
                );

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
            this.getHydrometStation();
        }
    })
</script>

</body>
</html>
