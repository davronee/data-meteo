<!DOCTYPE html>
<html lang="uz">

<head>
    <title>data.meteo.uz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <!-- Favicon -->
{{--    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">--}}
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" /> -->
    <!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.3/css/bootstrap-select.min.css" /> -->
    <link rel="stylesheet" href="{{asset('assets/css/leaflet.css')}}"/>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/leaflet.awesome-markers.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/weather-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/weather-icons-wind.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/leaflet-sidebar.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}"/>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet-0.7.2/leaflet.ie.css"/><![endif]-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}"/>
    <script src="{{asset('asset/js/vue.js')}}"></script>
    <script src="{{asset('asset/js/axios.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/table.css')}}"/>
    {{--    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css"/>--}}
    {{--    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"/>--}}
    {{--    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"/>--}}


    <style>
        body {
            padding: 0;
            margin: 0;
        }

        html,
        body,
        #map {
            height: 100%;
            font: 10pt "Helvetica Neue", Arial, Helvetica, sans-serif;
        }

        .lorem {
            font-style: italic;
            color: #AAA;
        }

        .bg-aniq {
            background: #fff;
            border: 1px solid #ff0303;
        }
    </style>
</head>

<body>

<div id="map">
    <div id="sidebar" class="leaflet-sidebar collapsed">

        <!-- nav tabs -->
        <div class="leaflet-sidebar-tabs">
            <!-- top aligned tabs -->
            <ul role="tablist">
                <li><a href="#home" role="tab"><i class="fa fa-bars active"></i></a></li>
                {{--                <li><a href="#autopan" role="tab"><i class="fa fa-arrows"></i></a></li>--}}
            </ul>

            <!-- bottom aligned tabs -->
            <ul role="tablist">
                {{--                <li><a href="https://github.com/nickpeihl/leaflet-sidebar-v2"><i class="fa fa-github"></i></a></li>--}}
            </ul>
        </div>

        <!-- panel content -->
        <div class="leaflet-sidebar-content">
            <div class="leaflet-sidebar-pane" id="home">
                <h1 class="leaflet-sidebar-header">
                    data.meteo.uz
                    <span class="leaflet-sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>

                <p>
                <div class="form-group">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" v-model="currentTemp"
                           @change="current">
                    <label class="form-check-label" for="exampleCheck1">Об-ҳаво</label>
                </div>
                </p>
                {{--                <p>--}}
                {{--                <div class="form-group">--}}
                {{--                    <input type="checkbox" class="form-check-input" id="exampleCheck2" v-model="forcastTemp">--}}
                {{--                    <label class="form-check-label" for="exampleCheck2">Об-ҳаво (3 кунлик)</label>--}}
                {{--                </div>--}}
                {{--                </p>--}}
                <p>
                <div class="form-group">
                    <input type="checkbox" class="form-check-input" id="exampleCheck3" v-model="atmTemp">
                    <label class="form-check-label" for="exampleCheck3">Атмосфера ифлосланиши</label>
                </div>
                </p>
                <p>
                <div class="form-group">
                    <input type="checkbox" class="form-check-input" id="exampleCheck4" v-model="radar"
                           @change="getRadars"
                    >
                    <label class="form-check-label" for="exampleCheck4">Радар</label>
                </div>
                </p>
            </div>

            {{--            <div class="leaflet-sidebar-pane" id="autopan">--}}
            {{--                <h1 class="leaflet-sidebar-header">--}}
            {{--                    autopan--}}
            {{--                    <span class="leaflet-sidebar-close"><i class="fa fa-caret-left"></i></span>--}}
            {{--                </h1>--}}
            {{--                <p>--}}
            {{--                    <code>Leaflet.control.sidebar({ autopan: true })</code>--}}
            {{--                    makes shure that the map center always stays visible.--}}
            {{--                </p>--}}
            {{--                <p>--}}
            {{--                    The autopan behviour is responsive as well.--}}
            {{--                    Try opening and closing the sidebar from this pane!--}}
            {{--                </p>--}}
            {{--            </div>--}}

            <div class="leaflet-sidebar-pane" id="messages">
                <h1 class="leaflet-sidebar-header">Messages<span class="leaflet-sidebar-close"><i
                            class="fa fa-caret-left"></i></span></h1>
            </div>
        </div>
    </div>
</div>




<!--  <a href="#"><img style="position: fixed; top: 0; right: 0; border: 0;" src="../images/ribbon.png" alt="βeta version"></a> -->
<script src="{{asset('assets/js/leaflet.js')}}"></script>
<script src="{{asset('asset/js/leaflet-sidebar.min.js')}}"></script>
<script src="{{asset('assets/js/leaflet.awesome-markers.min.js')}}"></script>
<script src="{{asset('js/topojson.min.js')}}"></script>

<script src="{{asset('asset/js/leaflet.ajax.js')}}"></script>

<script src="{{asset('assets/js/jquery-2.1.3.js')}}"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-simple-tree-table.js')}}"></script>
<script src="{{asset('assets/js/table.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
{{--<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster-src.js"></script>--}}
{{--<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>--}}
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.3/js/bootstrap-select.min.js"></script> -->
<script>
    var map;
    var markers_weather = L.featureGroup();
    var markers_radar = L.featureGroup();


    Vue.component('validation-errors', {
        data() {
            return {}
        },
        props: ['errors'],
        template: `<div v-if="validationErrors">
                        <ul class="alert alert-danger">
                            <li v-for="(value, key, index) in validationErrors">@{{ value }}</li>
                        </ul>
                    </div>`,
        computed: {
            validationErrors() {
                let errors = Object.values(this.errors);
                errors = errors.flat();
                return errors;
            }
        }
    });


    let app = new Vue({
        el: '#map',
        data: {
            area_id: '',
            map_id: '',
            full_name: '{{$user->full_name ?? ''}}',
            phone: '{{$user->mob_phone_no ?? ''}}',
            category: 1,
            sentence: '',
            proposed_financing: '',
            validationErrors: "",

            area: '',
            address: '',
            result_id: '',
            latitude: 0,
            longitude: 0,
            file: '',
            forcastTemp: false,
            currentTemp: true,
            atmTemp: false,
            markers: [],
            radars:@json($radars),
            radar: false,


        },
        methods: {
            InitialMap: function () {

                var google = L.tileLayer('http://www.google.com/maps/vt?ROADMAP=s@189&gl=uz&x={x}&y={y}&z={z}', {
                    attribution: 'data.meteo.uz'
                });
                var googleSputnik = L.tileLayer('http://www.google.com/maps/vt?lyrs=s@189&gl=uz&x={x}&y={y}&z={z}', {
                    attribution: 'data.meteo.uz'
                });
                var OpenStreetMap = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: 'data.meteo.uz'
                });

                // initialize the map
                if (app.latitude == 0 && app.longitude == 0) {
                    map = L.map('map', {
                        center: [41.315514, 69.246097],
                        zoom: 6,
                        layers: [google]
                    });
                } else {
                    map = L.map('map', {
                        center: [app.latitude, app.longitude],
                        zoom: 10,
                        layers: [google]
                    });


                }








                {{--var kmlLayer = new L.KML("{{asset('asset/js/--1984.kml')}}", { async: false });--}}
                {{--map.addLayer(kmlLayer);--}}



                // load a tile layer  http://map.ygk.uz/tile/{z}/{x}/{y}.png OpenStreetMap харита


                drawnItems = L.featureGroup().addTo(map);


                var scale = L.control.scale({
                    imperial: false
                }).addTo(map);


                var baseMaps = {
                    "OpenStreetMap харита": OpenStreetMap,
                    "Google харита": google,
                    "Google харита (Спутник)": googleSputnik
                };


                var sidebar = L.control.sidebar({container: 'sidebar', position: "right"})
                    .addTo(map)
                    .open('home');

                var layer = L.control.layers(baseMaps).addTo(map);


                // add panels dynamically to the sidebar


                {{--var geojsonLayer = new L.GeoJSON.AJAX("{{asset('asset/geojson/tuman.geojson')}}");--}}
                {{--geojsonLayer.addTo(map);--}}




                //extend Leaflet to create a GeoJSON layer from a TopoJSON file
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
                getGeoData('{{asset('asset/geojson/map.topojson')}}').then(data => geojsonSnow.addData(data));


                this.getRadars();


            },


            {{--},--}}
            getElement: function (area, area_id, map_id) {
                app.area = area;
                app.area_id = area_id;
                app.map_id = map_id;
            },
            getLocation: function () {

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        app.latitude = position.coords.latitude;
                        app.longitude = position.coords.longitude;

                        app.InitialMap();
                        app.getGeojson();

                    });


                    navigator.geolocation.watchPosition(function (position) {
                        },
                        function (error) {
                            if (error.code == error.PERMISSION_DENIED) {
                                app.InitialMap();

                            }

                        });
                } else {
                    console.log("geolocation is not supported!!");
                }

            },
            showError: function (error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        alert("User denied the request for Geolocation.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("Location information is unavailable.");
                        break;
                    case error.TIMEOUT:
                        alert("The request to get user location timed out.");
                        break;
                    case error.UNKNOWN_ERROR:
                        alert("An unknown error occurred.");
                        break;
                }
            },
            showPosition: function (position) {
                console.log('Latitude: ' + position.coords.latitude + 'Longitude: ' + position.coords.longitude);
            },
            getCurrent: function (city, lat, lang) {
                var marker;

                axios.get('{{route('map.getCurrent')}}', {
                    params: {
                        regionid: city,
                    }
                })
                    .then(function (response) {


                        if (response.data.weather_code == 'clear') {
                            marker = L.marker([response.data.city.latitude, response.data.city.longitude], {
                                icon: L.AwesomeMarkers.icon({
                                    icon: 'wi-day-sunny',
                                    prefix: 'wi',
                                    markerColor: 'yellow',
                                    spin: false
                                })
                            }).bindTooltip(response.data.air_t > 0 ? '+' + Math.round(response.data.air_t).toString() + ' °C' : Math.round(response.data.air_t).toString(),
                                {
                                    permanent: true,
                                    direction: 'center'
                                });
                            markers_weather.addLayer(marker)

                        } else if (response.data.weather_code == 'mostly_clear' || response.data.weather_code == 'mostly_clear' || response.data.weather_code == 'mostly_loudy') {
                            marker = L.marker([response.data.city.latitude, response.data.city.longitude], {
                                icon: L.AwesomeMarkers.icon({
                                    icon: 'wi-day-cloudy',
                                    prefix: 'wi',
                                    markerColor: 'cadetblue',
                                    spin: false
                                })
                            }).bindTooltip(response.data.air_t > 0 ? '+' + Math.round(response.data.air_t).toString() + ' °C' : Math.round(response.data.air_t).toString(),
                                {
                                    permanent: true,
                                    direction: 'center'
                                });
                            markers_weather.addLayer(marker)


                        } else if (response.data.weather_code == 'overcast') {
                            marker = L.marker([response.data.city.latitude, response.data.city.longitude], {

                                icon: L.AwesomeMarkers.icon({
                                    icon: 'wi-cloudy',
                                    prefix: 'wi',
                                    markerColor: 'cadetblue',
                                    spin: false
                                })
                            }).bindTooltip(response.data.air_t > 0 ? '+' + Math.round(response.data.air_t).toString() + ' °C' : Math.round(response.data.air_t).toString(),
                                {
                                    permanent: true,
                                    direction: 'center'
                                });
                            markers_weather.addLayer(marker)


                        } else if (response.data.weather_code == 'fog') {
                            marker = L.marker([response.data.city.latitude, response.data.city.longitude], {

                                icon: L.AwesomeMarkers.icon({
                                    icon: 'wi-fog',
                                    prefix: 'wi',
                                    markerColor: 'cadetblue',
                                    spin: false
                                })
                            }).bindTooltip(response.data.air_t > 0 ? '+' + Math.round(response.data.air_t).toString() + ' °C' : Math.round(response.data.air_t).toString(),
                                {
                                    permanent: true,
                                    direction: 'center'
                                });
                            markers_weather.addLayer(marker)


                        } else if (response.data.weather_code == 'light_rain' || response.data.weather_code == 'rain') {
                            marker = L.marker([response.data.city.latitude, response.data.city.longitude], {

                                icon: L.AwesomeMarkers.icon({
                                    icon: 'wi-rain',
                                    prefix: 'wi',
                                    markerColor: 'cadetblue',
                                    spin: false
                                })
                            }).bindTooltip(response.data.air_t > 0 ? '+' + Math.round(response.data.air_t).toString() + ' °C' : Math.round(response.data.air_t).toString(),
                                {
                                    permanent: true,
                                    direction: 'center'
                                });
                            markers_weather.addLayer(marker)


                        } else if (response.data.weather_code == 'heavy_rain') {
                            marker = L.marker([response.data.city.latitude, response.data.city.longitude], {

                                icon: L.AwesomeMarkers.icon({
                                    icon: 'wi-storm-showers',
                                    prefix: 'wi',
                                    markerColor: 'cadetblue',
                                    spin: false
                                })
                            }).bindTooltip(response.data.air_t > 0 ? '+' + Math.round(response.data.air_t).toString() + ' °C' : Math.round(response.data.air_t).toString(),
                                {
                                    permanent: true,
                                    direction: 'center'
                                });
                            markers_weather.addLayer(marker)


                        } else if (response.data.weather_code == 'thunderstorm') {
                            marker = L.marker([response.data.city.latitude, response.data.city.longitude], {

                                icon: L.AwesomeMarkers.icon({
                                    icon: 'wi-thunderstorm',
                                    prefix: 'wi',
                                    markerColor: 'cadetblue',
                                    spin: false
                                })
                            }).bindTooltip(response.data.air_t > 0 ? '+' + Math.round(response.data.air_t).toString() + ' °C' : Math.round(response.data.air_t).toString(),
                                {
                                    permanent: true,
                                    direction: 'center'
                                });
                            markers_weather.addLayer(marker)


                        } else if (response.data.weather_code == 'light_sleet' || response.data.weather_code == 'sleet') {
                            marker = L.marker([response.data.city.latitude, response.data.city.longitude], {

                                icon: L.AwesomeMarkers.icon({
                                    icon: 'wi-sleet',
                                    prefix: 'wi',
                                    markerColor: 'cadetblue',
                                    spin: false
                                })
                            }).bindTooltip(response.data.air_t > 0 ? '+' + Math.round(response.data.air_t).toString() + ' °C' : Math.round(response.data.air_t).toString(),
                                {
                                    permanent: true,
                                    direction: 'center'
                                });
                            markers_weather.addLayer(marker)


                        } else if (response.data.weather_code == 'heavy_sleet') {
                            marker = L.marker([response.data.city.latitude, response.data.city.longitude], {

                                icon: L.AwesomeMarkers.icon({
                                    icon: 'wi-storm-showers',
                                    prefix: 'wi',
                                    markerColor: 'cadetblue',
                                    spin: false
                                })
                            }).bindTooltip(response.data.air_t > 0 ? '+' + Math.round(response.data.air_t).toString() + ' °C' : Math.round(response.data.air_t).toString(),
                                {
                                    permanent: true,
                                    direction: 'center'
                                });
                            markers_weather.addLayer(marker)


                        } else {
                            marker = L.marker([response.data.city.latitude, response.data.city.longitude], {
                                icon: L.AwesomeMarkers.icon({
                                    icon: 'wi-snow',
                                    prefix: 'wi',
                                    markerColor: 'cadetblue',
                                    spin: false
                                })
                            }).bindTooltip(response.data.air_t > 0 ? '+' + Math.round(response.data.air_t).toString() + ' °C' : Math.round(response.data.air_t).toString(),
                                {
                                    permanent: true,
                                    direction: 'center'
                                });
                            markers_weather.addLayer(marker)


                        }


                        map.addLayer(markers_weather);


                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

                return marker;

            },
            current: function () {
                if (this.currentTemp) {
                    this.markers.push(this.getCurrent(1726));
                    this.markers.push(this.getCurrent(1703));
                    this.markers.push(this.getCurrent(1706));
                    this.markers.push(this.getCurrent(1730));
                    this.markers.push(this.getCurrent(1708));
                    this.markers.push(this.getCurrent(1733));
                    this.markers.push(this.getCurrent(1714));
                    this.markers.push(this.getCurrent(1712));
                    this.markers.push(this.getCurrent(1710));
                    this.markers.push(this.getCurrent(1735));
                    this.markers.push(this.getCurrent(1718));
                    this.markers.push(this.getCurrent(1724));
                    this.markers.push(this.getCurrent(1722));
                    this.markers.push(this.getCurrent(1727));
                } else {
                    markers_weather.clearLayers();


                }


            },
            getRadars: function () {
                if (this.radar) {
                    this.radars.forEach(function (item, i, arr) {
                        // console.log( i + ": " + item.latitude + " (массив:" + item.region_id + ")" );
                        var marker = L.marker([item.latitude, item.longitude]).on('click', function () {

                            if(item.region_id == 1726 || item.region_id == 1735)
                            {
                                marker.bindPopup("<img width='400' height='250' src='/map/getRadars?region="+ item.region_id + "' />" )
                            }
                            // marker.bindPopup("<img width='200' height='150' src='/map/getRadars?region="+ item.region_id + "' />" )

                            // this.bindPopup('<img src="https://www.google.ru/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png">');
                        });
                        markers_radar.addLayer(marker);
                        marker.fire('click');


                        // marker.bindPopup('<p>'+ item.region_id +'</p>');

                        var circle = L.circle([item.latitude, item.longitude], {
                            color: '#4236E5',
                            fillColor: '#6789E5',
                            fillOpacity: 0.3,
                            radius: 200000
                        })
                        markers_radar.addLayer(circle)
                    });


                    map.addLayer(markers_radar);

                } else {
                    markers_radar.clearLayers();

                }


            }
        },
        created() {
            this.getLocation();
            this.current();

        },
        mounted() {

        }


    });
</script>

</body>

</html>
