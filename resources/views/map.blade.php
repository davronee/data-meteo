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
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}"/>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet-0.7.2/leaflet.ie.css"/><![endif]-->
    <link rel="stylesheet" href="{{asset('assets/css/leaflet-sidebar.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}"/>
    <script src="{{asset('asset/js/vue.js')}}"></script>
    <script src="{{asset('asset/js/axios.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/table.css')}}"/>


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
</div>


<!--  <a href="#"><img style="position: fixed; top: 0; right: 0; border: 0;" src="../images/ribbon.png" alt="βeta version"></a> -->
<script src="{{asset('assets/js/leaflet.js')}}"></script>
<script src="https://unpkg.com/topojson@3.0.2/dist/topojson.min.js"></script>

<script src="{{asset('asset/js/leaflet.ajax.js')}}"></script>

<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-simple-tree-table.js')}}"></script>
<script src="{{asset('assets/js/table.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.3/js/bootstrap-select.min.js"></script> -->
<script>
    var map;
    var geoojson;
    var area_id;
    var map_id;
    var area;
    var address;


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


        },
        methods: {
            InitialMap: function () {


                // initialize the map
                if (app.latitude == 0 && app.longitude == 0) {
                    map = L.map('map').setView([41.315514, 69.246097], 15);

                } else {
                    map = L.map('map').setView([app.latitude, app.longitude], 15);


                }

                {{--var kmlLayer = new L.KML("{{asset('asset/js/--1984.kml')}}", { async: false });--}}
                {{--map.addLayer(kmlLayer);--}}



                // load a tile layer  http://map.ygk.uz/tile/{z}/{x}/{y}.png OpenStreetMap харита
                osm = L.tileLayer('http://map.ygk.uz/tile/{z}/{x}/{y}.png', {
                    // osm =  L.tileLayer('http://map.ygk.uz/tile/{z}/{x}/{y}.png', {
                    attribution: 'data.meteo.uz'
                }).addTo(map);

                drawnItems = L.featureGroup().addTo(map);


                var scale = L.control.scale({
                    imperial: false
                }).addTo(map);

                L.control.layers({
                    'OpenStreetMap харита': osm.addTo(map),
                    'Google харита (Спутник)': L.tileLayer('http://www.google.com/maps/vt?lyrs=s@189&gl=uz&x={x}&y={y}&z={z}', {
                        attribution: 'data.meteo.uz'
                    }),
                    'Google харита': L.tileLayer('http://www.google.com/maps/vt?ROADMAP=s@189&gl=uz&x={x}&y={y}&z={z}', {
                        attribution: 'data.meteo.uz'
                    })
                }, {}, {position: 'topright', collapsed: false}).addTo(map);

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
                    style: function(feature){
                        return {
                            color: "#000",
                            opacity: 0.5,
                            weight: 1,
                            fillColor: '#35495d',
                            fillOpacity: 0.8
                        }
                    },
                    onEachFeature: function(feature, layer) {
                        layer.bindPopup('<p>'+feature.properties.tuman_nomi+'</p>')
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













// Begin Amudaryo
                var Kafernigan = new L.GeoJSON.AJAX("{{asset('asset/geojson/Snow-json/Amudaryo/Kafernigan.geojson')}}", {
                    style: function (feature) {
                        return {
                            fillColor: "#57A0F3", // Default color of countries.
                            fillOpacity: 0.5,
                            stroke: true,
                            color: "grey", // Lines in between countries.
                            weight: 2
                        };
                    }
                });
                Kafernigan.addTo(map);

                var Kashkad = new L.GeoJSON.AJAX("{{asset('asset/geojson/Snow-json/Amudaryo/Kashkad.geojson')}}", {
                    style: function (feature) {
                        return {
                            fillColor: "#57A0F3", // Default color of countries.
                            fillOpacity: 0.5,
                            stroke: true,
                            color: "grey", // Lines in between countries.
                            weight: 2
                        };
                    }
                });
                Kashkad.addTo(map);

                var Qunduz = new L.GeoJSON.AJAX("{{asset('asset/geojson/Snow-json/Amudaryo/Qunduz.geojson')}}", {
                    style: function (feature) {
                        return {
                            fillColor: "#57A0F3", // Default color of countries.
                            fillOpacity: 0.5,
                            stroke: true,
                            color: "grey", // Lines in between countries.
                            weight: 2
                        };
                    }
                });
                Qunduz.addTo(map);

                var Surhan = new L.GeoJSON.AJAX("{{asset('asset/geojson/Snow-json/Amudaryo/Surhan.geojson')}}", {
                    style: function (feature) {
                        return {
                            fillColor: "#57A0F3", // Default color of countries.
                            fillOpacity: 0.5,
                            stroke: true,
                            color: "grey", // Lines in between countries.
                            weight: 2
                        };
                    }
                });
                Surhan.addTo(map);

                var Vakhsh = new L.GeoJSON.AJAX("{{asset('asset/geojson/Snow-json/Amudaryo/Vakhsh.geojson')}}", {
                    style: function (feature) {
                        return {
                            fillColor: "#57A0F3", // Default color of countries.
                            fillOpacity: 0.5,
                            stroke: true,
                            color: "grey", // Lines in between countries.
                            weight: 2
                        };
                    }
                });
                Vakhsh.addTo(map);

                //Amudaryo end
                //Sirdaryo begin

                var Ferg_North = new L.GeoJSON.AJAX("{{asset('asset/geojson/Snow-json/Sirdaryo/Ferg_North.geojson')}}", {
                    style: function (feature) {
                        return {
                            fillColor: "#57A0F3", // Default color of countries.
                            fillOpacity: 0.5,
                            stroke: true,
                            color: "grey", // Lines in between countries.
                            weight: 2
                        };
                    }
                });
                Ferg_North.addTo(map);

                var Ferg_Sourth = new L.GeoJSON.AJAX("{{asset('asset/geojson/Snow-json/Sirdaryo/Ferg_Sourth.geojson')}}", {
                    style: function (feature) {
                        return {
                            fillColor: "#57A0F3", // Default color of countries.
                            fillOpacity: 0.5,
                            stroke: true,
                            color: "grey", // Lines in between countries.
                            weight: 2
                        };
                    }
                });
                Ferg_Sourth.addTo(map);

                var Pskem = new L.GeoJSON.AJAX("{{asset('asset/geojson/Snow-json/Sirdaryo/Pskem.geojson')}}", {
                    style: function (feature) {
                        return {
                            fillColor: "#57A0F3", // Default color of countries.
                            fillOpacity: 0.5,
                            stroke: true,
                            color: "grey", // Lines in between countries.
                            weight: 2
                        };
                    }
                });
                Pskem.addTo(map);

                var Ugam = new L.GeoJSON.AJAX("{{asset('asset/geojson/Snow-json/Sirdaryo/Ugam.geojson')}}", {
                    style: function (feature) {
                        return {
                            fillColor: "#57A0F3", // Default color of countries.
                            fillOpacity: 0.1,
                            stroke: true,
                            color: "#57A0F3", // Lines in between countries.
                            weight: 0.5
                        };
                    }
                });
                Ugam.addTo(map);

                //Sirdaryo end


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
            }


        },
        created() {
            this.getLocation();

        },
        mounted() {
        }

    });


    function ClickButton() {
        area_id = $('#area_id').val();
        map_id = $('#map_id').val();
        area = $('#area').val();
        address = $('#address').val();


        {{--axios.get('{{route('check')}}')--}}
        {{--    .then(function(response) {--}}
        {{--        // handle success--}}
        {{--        if (response.data == 0) {--}}
        {{--            window.location.assign('{{route('login')}}')--}}
        {{--        }--}}
        {{--    })--}}
        {{--    .catch(function(error) {--}}
        {{--        // handle error--}}
        {{--        console.log(error);--}}
        {{--    })--}}
        {{--    .finally(function() {--}}
        {{--        // always executed--}}
        {{--    });--}}



    }
</script>
<script>
    $('#basic').simpleTreeTable({
        expander: $('#expander'),
        collapser: $('#collapser'),
        store: 'session',
        storeKey: 'simple-tree-table-basic'
    });
    $('#open1').on('click', function () {
        $('#basic').data('simple-tree-table').openByID("1");
    });
    $('#close1').on('click', function () {
        $('#basic').data('simple-tree-table').closeByID("1");
    });
</script>

</body>

</html>
