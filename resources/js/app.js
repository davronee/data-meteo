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
        }
    },
    methods: {
        async getOpenweather() {
            axios.get('/weather/openweather', {
                params: {
                    'region': this.region,
                }
            })
                .then(response => {
                    this.openweather = response.data.list;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        async getAccuweather() {
            axios.get('/weather/accuweather', {
                params: {
                    'region': this.region,
                }
            })
                .then(response => {
                    this.accuweather = response.data.DailyForecasts;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async GetUzhydromet() {
            this.day = [];
            this.night = [];
            axios.get('/weather/uzgidromet', {
                params: {
                    region: this.region
                }
            })
                .then(response => {
                    this.uzhydromet = response.data
                    this.uzhydromet.reverse();

                    for (var i = 0; i < this.uzhydromet.length; i++) {
                        if (i % 2 == 0) {
                            this.night.push({
                                day: false,
                                date: this.uzhydromet[i].date,
                                day_part: this.uzhydromet[i].day_part,
                                air_t_min: this.uzhydromet[i].air_t_min,
                                air_t_max: this.uzhydromet[i].air_t_max,
                                wind_direction: this.uzhydromet[i].wind_direction,
                                wind_direction_change: this.uzhydromet[i].wind_direction_change,
                                wind_direction_after_change: this.uzhydromet[i].wind_direction_after_change,
                                wind_speed_min: this.uzhydromet[i].wind_speed_min,
                                wind_speed_max: this.uzhydromet[i].wind_speed_max,
                                wind_speed_change: this.uzhydromet[i].wind_speed_change,
                                wind_speed_min_after_change: this.uzhydromet[i].wind_speed_min_after_change,
                                wind_speed_max_after_change: this.uzhydromet[i].wind_speed_max_after_change,
                                cloud_amount: this.uzhydromet[i].cloud_amount,
                                precipitation: this.uzhydromet[i].precipitation,
                                is_occasional: this.uzhydromet[i].is_occasional,
                                is_possible: this.uzhydromet[i].is_possible,
                                thunderstorm: this.uzhydromet[i].thunderstorm,
                                location: this.uzhydromet[i].location,
                                time_period: this.uzhydromet[i].time_period,
                            })
                        } else {
                            this.day.push({
                                day: true,
                                date: this.uzhydromet[i].date,
                                day_part: this.uzhydromet[i].day_part,
                                air_t_min: this.uzhydromet[i].air_t_min,
                                air_t_max: this.uzhydromet[i].air_t_max,
                                wind_direction: this.uzhydromet[i].wind_direction,
                                wind_direction_change: this.uzhydromet[i].wind_direction_change,
                                wind_direction_after_change: this.uzhydromet[i].wind_direction_after_change,
                                wind_speed_min: this.uzhydromet[i].wind_speed_min,
                                wind_speed_max: this.uzhydromet[i].wind_speed_max,
                                wind_speed_change: this.uzhydromet[i].wind_speed_change,
                                wind_speed_min_after_change: this.uzhydromet[i].wind_speed_min_after_change,
                                wind_speed_max_after_change: this.uzhydromet[i].wind_speed_max_after_change,
                                cloud_amount: this.uzhydromet[i].cloud_amount,
                                precipitation: this.uzhydromet[i].precipitation,
                                is_occasional: this.uzhydromet[i].is_occasional,
                                is_possible: this.uzhydromet[i].is_possible,
                                thunderstorm: this.uzhydromet[i].thunderstorm,
                                location: this.uzhydromet[i].location,
                                time_period: this.uzhydromet[i].time_period,
                            })
                        }
                    }
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
        }
    },
    filters: {
        moment: function (date) {
            return moment(date).format('DD.MM.YYYY hh:mm:ss');
        },
        night: function (date) {
            return moment(date).format('DD.MM.YYYY');
        },
    },
    mounted() {
        this.getOpenweather();
        this.getAccuweather();
        this.GetUzhydromet();
    }
});
