require('./bootstrap');

import Vue from 'vue'
import moment from 'moment'


const app = new Vue({
    el: '#app',
    data() {
        return {
            regions: {},
            region: 1726,
            openweather: null,
            accuweather: null,
            uzhydromet: null,
            day: [],
            night: [],
            weatherbit: [],
            darksky: [],
            Aerisweather: [],
            ForecastApi: [],
            interval: 0,
            endpoint: 'https://www.meteoblue.com/ru/weather/widget/daily/' + this.region + '_uzbekistan_1512569?geoloc=fixed&days=7&tempunit=CELSIUS&windunit=METER_PER_SECOND&precipunit=MILLIMETER&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&winddirection=1&uv=0&humidity=0&precipitation=0&precipitation=1&precipitationprobability=0&precipitationprobability=1&spot=0&spot=1&pressure=0&pressure=1&layout=light',
            uzhydromet_current: {},
            current_si: {},
            current_all: [],
            days: 1,
            gismeteo: [],
            yandex: [],
        }
    },
    methods: {
        async getOpenweather() {
            axios.get('/weather/openweather', {
                params: {
                    region: this.region,
                    interval: this.interval,
                }
            })
                .then(response => {
                    this.openweather = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        async getAccuweather() {
            axios.get('/weather/accuweather', {
                params: {
                    region: this.region,
                    interval: this.interval,

                }
            })
                .then(response => {
                    this.accuweather = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async GetUzhydromet() {

            axios.get('/weather/uzgidromet', {
                params: {
                    region: this.region,
                    interval: this.interval,

                }
            })
                .then(response => {
                    this.uzhydromet = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async GetWeatherbit() {
            axios.get('/weather/weatherbit', {
                params: {
                    region: this.region,
                    interval: this.interval,

                }
            })
                .then(response => {
                    this.weatherbit = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async DarkSky() {
            axios.get('/weather/darksky', {
                params: {
                    region: this.region,
                    interval: this.interval,

                }
            })
                .then(response => {
                    this.darksky = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async GetAerisweather1() {
            axios.get('/weather/Aerisweather1', {
                params: {
                    region: this.region,
                    interval: this.interval,

                }
            })
                .then(response => {
                    this.Aerisweather = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async GetForecastApi() {
            axios.get('/weather/ForecastApi', {
                params: {
                    region: this.region
                }
            })
                .then(response => {
                    this.ForecastApi = response.data.items;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        moment: function () {
            return moment();
        },
        Changes() {
            this.getOpenweather();
            this.getAccuweather();
            this.GetUzhydromet();
            this.GetWeatherbit();
            this.DarkSky();
            this.GetAerisweather1();
            // this.GetForecastApi();
        },
        getregions() {
            axios.get('api/directory/regions')
                .then(response => {
                    this.regions = response.data;
                })
        },
        getcurrent() {
            axios.get('https://meteoapi.meteo.uz/api/weather/current/' + this.region)
                .then(response => {
                    this.uzhydromet_current = response.data;
                })
                .catch(error => {
                    console.log(error);
                })

            this.getsi();
            this.foreacasthydromet();
            this.foreacastgismeto();
            this.foreacast_yandex();

        },
        getsi() {
            var endpoint = 'https://meteoapi.meteo.uz/api/atmosphere/monitoring/regions/' + this.region;
            axios.get(endpoint)
                .then(response => {
                    if (this.region == 1726)
                        this.current_si = response.data.data[0].stations[6];
                    else
                        this.current_si = response.data.data[0].stations[0];

                })

        },
        getAllCurrent() {
            axios.get('https://meteoapi.meteo.uz/api/weather/current')
                .then(response => {
                    this.current_all = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        foreacasthydromet() {
            axios.get('/api/directory/forecast/uzhydromet/' + this.region + '/' + this.days)
                .then(response => {
                    this.uzhydromet = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        foreacastgismeto() {
            axios.get('/api/directory/forecast/gismeteo/' + this.region + '/' + this.days)
                .then(response => {
                    this.gismeteo = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        foreacast_yandex() {
            axios.get('/api/directory/forecast/yandexweather/' + this.region + '/' + this.days)
                .then(response => {
                    this.yandex = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
    filters: {
        moment: function (date) {
            return moment(date).format('DD.MM.YYYY hh:mm:ss');
        },
        night: function (date) {
            return moment(date).format('DD.MM.YYYY');
        },
        unixdate: function (date) {
            return moment.unix(date).format('DD.MM.YYYY');
        }
    },
    mounted() {
        this.Changes();
        this.getregions();
        this.getAllCurrent();
        this.getcurrent();
        this.foreacasthydromet();
        this.foreacastgismeto();
        this.foreacast_yandex();


        // $('#ex-city').picker();
        // $('#ex-tuman').picker();
        // $('#ex-forecast').picker();
        // $('#ex-multiselect').picker();
        // $('#ex-search').picker({ search: true });
    }
});
