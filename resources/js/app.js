require('./bootstrap');

import Vue from 'vue'
import moment from 'moment'

const app = new Vue({
    el: '#app',
    data() {
        return {
            regions: {
                tashkent: 'г. Ташкент',
                andijan: 'Андижанская область',
                bukhara: 'Бухарская область',
                jizzakh: 'Джизакская область',
                qarshi: 'Кашкадарьинская область',
                navoiy: 'Навоийская область',
                namangan: 'Наманганская область',
                samarkand: 'Самаркандская область',
                termez: 'Сурхандарьинская область',
                gulistan: 'Сырдарьинская область',
                nurafshon: 'Ташкентская область',
                fergana: 'Ферганская область',
                urgench: 'Хорезмская область',
                nukus: 'Республика Каракалпакстан',
            },
            region: 'tashkent',
            openweather: null,
            accuweather: null,
            uzhydromet: null,
            day: [],
            night: [],
            weatherbit: [],
            darksky: [],
            Aerisweather: [],
            ForecastApi: [],
            interval: 0
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
    }
});
