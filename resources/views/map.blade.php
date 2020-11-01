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
    <link rel="stylesheet" href="{{asset('assets/css/leaflet.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />
    <!--[if lte IE 8]><link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet-0.7.2/leaflet.ie.css" /><![endif]-->
    <link rel="stylesheet" href="{{asset('assets/css/leaflet-sidebar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}" />
    <script src="{{asset('asset/js/leaflet.js')}}"></script>
    <script src="{{asset('asset/js/vue.js')}}"></script>
    <script src="{{asset('asset/js/axios.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/table.css')}}" />


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
        data(){
            return {

            }
        },
        props: ['errors'],
        template: `<div v-if="validationErrors">
                        <ul class="alert alert-danger">
                            <li v-for="(value, key, index) in validationErrors">@{{ value }}</li>
                        </ul>
                    </div>`,
        computed: {
            validationErrors(){
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
            validationErrors:"",

            area: '',
            address: '',
            result_id: '',
            latitude: 0,
            longitude: 0,
            file: '',




        },
        methods: {
            InitialMap: function() {



                // initialize the map
                if (app.latitude == 0 && app.longitude == 0) {
                    map = L.map('map').setView([41.315514, 69.246097], 15);

                } else {
                    map = L.map('map').setView([app.latitude, app.longitude], 15);


                }

                    {{--var kmlLayer = new L.KML("{{asset('asset/js/--1984.kml')}}", { async: false });--}}
                    {{--map.addLayer(kmlLayer);--}}

                    var geojsonLayer = new L.GeoJSON.AJAX("{{asset('asset/geojson/tuman.geojson')}}");
                geojsonLayer.addTo(map);

                // load a tile layer  http://map.ygk.uz/tile/{z}/{x}/{y}.png OpenStreetMap харита
                osm =  L.tileLayer('http://map.ygk.uz/tile/{z}/{x}/{y}.png', {
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
                }, {}, { position: 'topright', collapsed: false }).addTo(map);

                // var popup = L.popup();
                //
                // function onMapClick(e) {
                //     popup
                //         .setLatLng(e.latlng)
                //         .setContent("Сиз танлаган ер участкаси коорданаталари:  " + e.latlng.toString() + "<br> <hr><button onclick='ClickButton()' class='form-control btn btn-success'  data-toggle='modal' data-target='#taklif'    >Таклиф жунатиш</button>")
                //         .openOn(map);
                // }
                //
                // map.on('click', onMapClick);
            },




            {{--},--}}
            getElement: function(area, area_id, map_id) {
                app.area = area;
                app.area_id = area_id;
                app.map_id = map_id;
            },
            getLocation: function() {

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        app.latitude = position.coords.latitude;
                        app.longitude = position.coords.longitude;

                        app.InitialMap();
                        app.getGeojson();

                    });


                    navigator.geolocation.watchPosition(function(position) {},
                        function(error) {
                            if (error.code == error.PERMISSION_DENIED) {
                                app.InitialMap();

                            }

                        });
                } else {
                    console.log("geolocation is not supported!!");
                }

            },
            showError: function(error) {
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
            showPosition: function(position) {
                console.log('Latitude: ' + position.coords.latitude + 'Longitude: ' + position.coords.longitude);
            }




        },
        created() {
            this.getLocation();

        },
        mounted() {}

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
    $('#open1').on('click', function() {
        $('#basic').data('simple-tree-table').openByID("1");
    });
    $('#close1').on('click', function() {
        $('#basic').data('simple-tree-table').closeByID("1");
    });
</script>

</body>

</html>
