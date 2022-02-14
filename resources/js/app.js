require('./bootstrap');

import Vue from 'vue'
import moment from 'moment'

Vue.component('weather-data-uzhydromet', {
    data: function () {
        return {
            region: 1726,
            uzhydromet: [],
            days: 1,
            gismeteo: [],
            yandex: [],
            accuweather: [],
        }
    },
    methods: {

        moment: function () {
            return moment();
        },
        foreacasthydromet() {
            this.foreacastgismeto();
            this.foreacast_yandex();
            this.foreacast_accuweather();
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
        },
        foreacast_accuweather() {
            axios.get('/api/directory/forecast/accuweather/' + this.region + '/' + this.days)
                .then(response => {
                    this.accuweather = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        aws_current(regionid) {
            axios.get('/api/directory/current/aws/uzhydromet/' + regionid + '/' + this.days)
                .then(response => {
                    this.aws_factic = response.data;
                })
                .catch(error => {
                    console.log(error);
                })

        },

    },
    mounted() {
        this.aws_current();
        this.foreacasthydromet();
    },
    props: ['regions'],
    template: `
        <table class="table report-table">
        <thead>
        <tr>
            <th class="empty border-right">
                <div class="form-group mb-2">
                    <select v-model="region" class="form-select" @change="foreacasthydromet">
                        <option v-for="item in regions" :value="item.regionid">{{
                                item.name_uz
                            }}
                        </option>
                    </select>
                </div>
            </th>
            <th class="table-title bg-theme border-theme bg-opacity-25 border-right"
                colspan="3">{{ moment().format("DD.MM.YYYY") }}
            </th>
            <th class="table-title bg-theme border-theme bg-opacity-25 border-right"
                colspan="3">{{ moment().add(1, 'days').format("DD.MM.YYYY") }}
            </th>
            <th class="table-title bg-theme border-theme bg-opacity-25 border-right"
                colspan="3">{{ moment().add(2, 'days').format("DD.MM.YYYY") }}
            </th>
            <th class="table-title bg-theme border-theme bg-opacity-25 border-right"
                colspan="3">{{ moment().add(3, 'days').format("DD.MM.YYYY") }}
            </th>
            <th class="table-title bg-theme border-theme bg-opacity-25 border-right"
                colspan="3">{{ moment().add(4, 'days').format("DD.MM.YYYY") }}
            </th>
        </tr>
        <tr>
            <th class="empty border-right">
                <div class="form-group mb-2">
                    <select class="form-select">
<!--                        <option>3 kunlik</option>-->
                        <option selected>5 kunlik</option>
<!--                        <option>7 kunlik</option>-->
<!--                        <option>10 kunlik</option>-->
<!--                        <option>1 oylik</option>-->
                    </select>
                </div>
            </th>
            <th><i class="fa-2x wi wi-thermometer me-2"></i></th>
            <th><i class="fa-2x wi wi-wind towards-45-deg me-2"></i></th>
            <th class="border-right"><i class="fa-2x wi wi-sleet me-2"></i></th>

            <th><i class="fa-2x wi wi-thermometer me-2"></i></th>
            <th><i class="fa-2x wi wi-wind towards-45-deg me-2"></i></th>
            <th class="border-right"><i class="fa-2x wi wi-sleet me-2"></i></th>

            <th><i class="fa-2x wi wi-thermometer me-2"></i></th>
            <th><i class="fa-2x wi wi-wind towards-45-deg me-2"></i></th>
            <th class="border-right"><i class="fa-2x wi wi-sleet me-2"></i></th>

            <th><i class="fa-2x wi wi-thermometer me-2"></i></th>
            <th><i class="fa-2x wi wi-wind towards-45-deg me-2"></i></th>
            <th class="border-right"><i class="fa-2x wi wi-sleet me-2"></i></th>

            <th><i class="fa-2x wi wi-thermometer me-2"></i></th>
            <th><i class="fa-2x wi wi-wind towards-45-deg me-2"></i></th>
            <th class="border-right"><i class="fa-2x wi wi-sleet me-2"></i></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th rowspan="2" class="align-middle border-right text-capitalized fw-bold fixed-side"><a
                href="#" data-bs-toggle="modal" data-bs-target="#modalPosForecast"
                class="text-warning text-left">O'zgidromet
                <br><small>(O'zbekiston)</small> </a></th>
            <template v-for="item in uzhydromet">
                <td><span class="me-1 gradus" :class="item[0].air_t_min >= 0 ? 'warm' : ''">{{ item[0].air_t_min }}</span><br>
                    <span class=" gradus" :class="item[0].air_t_max >= 0 ? 'warm' : ''">{{ item[0].air_t_max }}</span>
                </td>
                <td><span class="m_s">{{ item[0].wind_speed_min }}-{{ item[0].wind_speed_max }}</span></td>
                <td><span
                    :class="item[0].precipitation != 'none' && item[0].precipitation != 'fog' ? 'rain_yes' : 'rain_no'"></span>
                </td>
            </template>
            <td><span class="me-1  n_a"></span><span class=""></span></td>
            <td><span class="n_a"></span></td>
            <td><span class="n_a"></span></td>
        </tr>
        <tr>
            <template v-for="item in uzhydromet">
                <td><span class="me-1 gradus"
                          :class="item[1].air_t_min >= 0 ? 'warm' : ''">{{ item[1].air_t_min }}</span><br><span
                    class=" gradus" :class="item[1].air_t_max >= 0 ? 'warm' : ''">{{ item[1].air_t_max }}</span>
                </td>
                <td><span class="m_s">{{ item[1].wind_speed_min }}-{{ item[1].wind_speed_max }}</span></td>
                <td><span
                    :class="item[1].precipitation != 'none' && item[1].precipitation != 'fog' ? 'rain_yes' : 'rain_no'"></span>
                </td>
            </template>
            <td><span class="me-1  n_a"></span><span class=""></span></td>
            <td><span class="n_a"></span></td>
            <td><span class="n_a"></span></td>
        </tr>
        <tr>
            <th class="align-middle border-right text-capitalized fw-bold fixed-side"><a
                href="#" data-bs-toggle="modal" data-bs-target="#modalPosForecast"
                class="text-warning text-left">GisMeteo <br><small>(Rossiya)</small></a>
            </th>
            <template v-for="item in gismeteo">
                <td><span class="me-1 gradus" :class="item.temp_min == 0 ? 'warm' : ''">{{ item.temp_min }}</span><br><span
                    class=" gradus" :class="item.temp_max == 0 ? 'warm' : ''">{{ item.temp_max }}</span></td>
                <td><span class="m_s">{{ item.wind_speed_min }}-{{ item.wind_speed_max }}</span></td>
                <td><span :class="item.precipitation !== 0 ?  'rain_yes' : 'rain_no'"></span></td>
            </template>
        </tr>
        <tr>
            <th rowspan="2" class="align-middle border-right text-capitalized fw-bold fixed-side"><a
                href="#" data-bs-toggle="modal" data-bs-target="#modalPosForecast"
                class="text-warning text-left">Yandex <br><small>(Rossiya)</small></a>
            </th>
            <template v-for="item in yandex">
                <td><span class="me-1 gradus"
                          :class="item.parts.day.temp_min >= 0 ? 'warm' : 'cold'">{{ item.parts.day.temp_min }}</span><br><span
                    class=" gradus"
                    :class="item.parts.day.temp_max >= 0 ? 'warm' : 'cold'">{{ item.parts.day.temp_max }}</span></td>
                <td><span class="m_s">{{ item.parts.day.wind_speed }}</span></td>
                <td><span :class="item.parts.day.prec_mm !== 0 ? 'rain_yes' : 'rain_no'"></span></td>
            </template>

        </tr>
        <tr>
            <template v-for="item in yandex">
                <td><span class="me-1 gradus"
                          :class="item.parts.night.temp_min >= 0 ? 'warm' : ''">{{ item.parts.night.temp_min }}</span><br><span
                    class=" gradus"
                    :class="item.parts.night.temp_max >= 0 ? 'warm' : ''">{{ item.parts.night.temp_max }}</span></td>
                <td><span class="m_s">{{ item.parts.night.wind_speed }}</span></td>
                <td><span :class="item.parts.night.prec_mm !== 0 ? 'rain_yes' : 'rain_no'"></span></td>
            </template>

        </tr>
        <tr>
            <th class="align-middle border-right text-capitalized fw-bold fixed-side"><a
                href="#" data-bs-toggle="modal" data-bs-target="#modalPosForecast"
                class="text-warning text-left">Accuweather <br><small>(AQSH)</small></a>
            </th>
            <template v-for="item in accuweather">
                <td rowspan="2"><span class="me-1 gradus" :class="item.Temperature.Minimum.Value >= 0 ? 'warm' : ''">{{ item.Temperature.Minimum.Value }}</span><br><span
                    class=" gradus" :class="item.Temperature.Maximum.Value >= 0 ? 'warm' : ''">{{ item.Temperature.Maximum.Value }}</span></td>
                <td><span class="m_s">{{ item.Day.Wind.Speed.Value }}</span></td>
                <td><span :class="item.Day.Rain.Value !== 0 ? 'rain_yes' : 'rain_no'"></span></td>
            </template>
        </tr>
        </tbody>
        </table>
    `
})

Vue.component('region-weather', {
    data: function () {
        return {
            aws_factics: {},
        }
    },
    methods: {
        aws() {
            axios.get('/api/directory/current/aws/uzhydromet/' + this.regionid + '/' + this.days)
                .then(response => {
                    this.aws_factics = response.data;
                })
                .catch(error => {
                    console.log(error);
                })

        },

    },
    mounted() {
        this.aws();
    },
    props: ['regionid', 'days', 'title'],
    template: `
        <div class="pos-order">
        <div class="pos-order-product">
            <div class="img"
                 :style="{'background-image': 'url(new_meteo/assets/img/weather/'+ aws_factics.weathercode +'.svg)'}"></div>
            <div class="flex-1">
                <div class="h6 mb-1">{{ title }}</div>
                <div class="small m_s"><i class="wi wi-wind towards-45-deg me-2"></i> {{ aws_factics.min_wind }} -
                    {{ aws_factics.max_wind }}
                </div>
                <div class="small mb-2 light-sleet"></div>
                <div class="d-flex">
                </div>
            </div>
        </div>
        <div class="pos-order-price">
            <h2 class="gradus" :class="aws_factics.temp  >= 0 ? 'warm' : 'cold'"> {{ aws_factics.temp }}</h2>
        </div>
        </div>
    `
})
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

            aws_factic: {},
            aws_factic_tashkent: {},
            aws_factic_nukus: {},
            aws_factic_urgench: {},
            aws_factic_fergana: {},
            aws_factic_nurafshon: {},
            aws_factic_gulistan: {},
            aws_factic_termez: {},
            aws_factic_samarkand: {},
            aws_factic_namangan: {},
            aws_factic_navoiy: {},
            aws_factic_qarshi: {},
            aws_factic_jizzakh: {},
            aws_factic_bukhara: {},
            aws_factic_andijan: {},
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

        Updateweather() {
            this.regions = null;
            this.getregions();
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
        this.getsi();


        // $('#ex-city').picker();
        // $('#ex-tuman').picker();
        // $('#ex-forecast').picker();
        // $('#ex-multiselect').picker();
        // $('#ex-search').picker({ search: true });
    }
});
