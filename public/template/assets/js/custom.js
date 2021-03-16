
var map;
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


let app2 = new Vue({
    el: '#map',
    data: {
        area_id: '',
        map_id: '',

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
            if (app2.latitude == 0 && app2.longitude == 0) {
                map = L.map('map', {
                    center: [41.315514, 65.246097],
                    zoom: 6,
                    layers: [google]
                });
            } else {
                map = L.map('map', {
                    center: [app2.latitude, app2.longitude],
                    zoom: 10,
                    layers: [google]
                });


            }

            drawnItems = L.featureGroup().addTo(map);


            var scale = L.control.scale({
                imperial: false
            }).addTo(map);


            var baseMaps = {
                "OpenStreetMap харита": OpenStreetMap,
                "Google харита": google,
                "Google харита (Спутник)": googleSputnik
            };


            var layer = L.control.layers(baseMaps).addTo(map);

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
            // getGeoData('/asset/geojson/tuman.topojson').then(data => geojson.addData(data));
            // getGeoData('/asset/geojson/map.topojson').then(data => geojsonSnow.addData(data));
        },

getElement: function (area, area_id, map_id) {
    app2.area = area;
    app2.area_id = area_id;
    app2.map_id = map_id;
},
getLocation: function () {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            app2.latitude = position.coords.latitude;
            app2.longitude = position.coords.longitude;

            app2.InitialMap();
            app2.getGeojson();

        });


        navigator.geolocation.watchPosition(function (position) {
            },
            function (error) {
                if (error.code == error.PERMISSION_DENIED) {
                    app2.InitialMap();

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

    axios.get('http://www.meteo.uz/api/v2/weather/current.json', {
        params: {
            city: city,
            language: 'ru'
        }
    })
        .then(function (response) {


            if (response.data.weather_code == 'clear') {
                marker = L.marker([lat, lang], {
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
                    }).addTo(map);
            } else if (response.data.weather_code == 'mostly_clear' || response.data.weather_code == 'mostly_loudy' ||  response.data.weather_code == 'partly_cloudy') {
                marker = L.marker([lat, lang], {
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
                    }).addTo(map);

            } else if (response.data.weather_code == 'overcast') {
                marker = L.marker([lat, lang], {
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
                    }).addTo(map);

            } else if (response.data.weather_code == 'fog') {
                marker = L.marker([lat, lang], {
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
                    }).addTo(map);

            } else if (response.data.weather_code == 'light_rain' || response.data.weather_code == 'rain') {
                marker = L.marker([lat, lang], {
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
                    }).addTo(map);

            } else if (response.data.weather_code == 'heavy_rain') {
                marker = L.marker([lat, lang], {
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
                    }).addTo(map);

            } else if (response.data.weather_code == 'thunderstorm') {
                marker = L.marker([lat, lang], {
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
                    }).addTo(map);

            } else if (response.data.weather_code == 'light_sleet' || response.data.weather_code == 'sleet') {
                marker = L.marker([lat, lang], {
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
                    }).addTo(map);

            } else if (response.data.weather_code == 'heavy_sleet') {
                marker = L.marker([lat, lang], {
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
                    }).addTo(map);

            } else {
                marker = L.marker([lat, lang], {
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
                    }).addTo(map);

            }

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
        this.markers.push(this.getCurrent('tashkent', 41.311081, 69.240562));
        this.markers.push(this.getCurrent('andijan', 40.815356, 72.28375));
        this.markers.push(this.getCurrent('bukhara', 39.768083, 64.455577));
        this.markers.push(this.getCurrent('fergana', 40.37338, 71.797833));
        this.markers.push(this.getCurrent('jizzakh', 40.125044, 67.880824));
        this.markers.push(this.getCurrent('urgench', 41.583884, 60.642432));
        this.markers.push(this.getCurrent('namangan', 41.005773, 71.643603));
        this.markers.push(this.getCurrent('navoiy', 40.103922, 65.368834));
        this.markers.push(this.getCurrent('qarshi', 38.861192, 65.784727));
        this.markers.push(this.getCurrent('nukus', 42.461891, 59.616631));
        this.markers.push(this.getCurrent('samarkand', 39.627012, 66.974973));
        this.markers.push(this.getCurrent('gulistan', 40.491509, 68.781077));
        this.markers.push(this.getCurrent('termez', 37.261069, 67.308624));
        this.markers.push(this.getCurrent('nurafshon', 41.045932, 69.353311));
    } else {
        for (i in map._layers) {
        }

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
