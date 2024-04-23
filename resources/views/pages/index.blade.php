@extends('layouts.layout')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card card-hover card-analytics-one">
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-sm-12 col-md-8">
                            <div class="card-chart-weather">
                                <div class="card-header bg-transparent d-flex">
                                    <div class="pd-10 flex-grow-1">
                                        <h6 class="card-title mg-b-0 d-sm-none d-none">Фактическая погода</h6>
                                    </div>
                                    <div class="pd-10">
                                        <div class="btn-group">
                                            <button class="inline-wi legend-label temp-label">Температура</button>
                                            <button class="inline-wi legend-label wind-label label-off">Ветер</button>
                                            <button class="inline-wi legend-label rain-label label-off">Осадки</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-chart-header">
                                        <div class="chart-legend">
                                            <!--  <h6 class="current-temp inline-wi"></h6> -->
                                        </div>
                                        <div class="btn-group">
                                            <button class="temp-format celsius">°C</button>
                                            <button class="temp-format faren">°F</button>
                                        </div><!-- btn-group -->
                                    </div><!-- card-chart-header -->
                                    <div class="chart-wrapper">
                                        <div class="graph">
                                            <canvas id="temp-chart" class="temp-chart"></canvas>
                                        </div>
                                        <div class="graph">
                                            <canvas id="rain-chart" class="rain-chart chart-hidden"></canvas>
                                        </div>
                                        <div class="graph">
                                            <canvas id="wind-chart" class="wind-chart chart-hidden"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- card -->
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="d-flex mg-b-20 mg-t-40">
                                <select class="custom-select custom-select-sm tx-12">
                                    <option value="1703">Андижанская область</option>
                                    <option value="1706">Бухарская область</option>
                                    <option value="1708">Джизакская область</option>
                                    <option value="1710">Кашкадарьинская область</option>
                                    <option value="1712">Навоийская область</option>
                                    <option value="1714">Наманганская область</option>
                                    <option value="1718">Самаркандская область</option>
                                    <option value="1722">Сурхандарьинская область</option>
                                    <option value="1724">Сырдарьинская область</option>
                                    <option value="1726" selected="">г. Ташкент</option>
                                    <option value="1727">Ташкентская область</option>
                                    <option value="1730">Ферганская область</option>
                                    <option value="1733">Хорезмская область</option>
                                    <option value="1735">Республика Каракалпакстан</option>
                                    <option value="1">Ташкенткая область</option>
                                </select>
                                <button class="btn btn-secondary btn-xs btn-icon pd-y-0 mg-l-5 flex-shrink-0"><i
                                        class="fas fa-download"></i></button>
                            </div>
                            <label class="content-label content-label-xs pull-right" id="datetime"></label>
                            <div class="d-flex align-items-baseline mg-b-5">
                                <h2 class="card-value mg-b-0 tx-dark tx-semibold current-temp">3</h2>
                                <span class="card-value-sub tx-meteo mg-l-10 tx-md-16 tx-lg-18"><i
                                        data-feather="trending-up" class="svg-12"></i> 1&deg;</span>
                            </div>
                            <p class="card-value-desc mg-l-10 tx-md-12 tx-lg-14 tx-lx-16"></p>
                            <hr>
                            <div class="d-flex align-items-baseline mg-b-5">
                                <ul class="list-group tx-md-16 tx-lg-17 tx-lx-16">
                                    <li class="list-group-item d-flex align-items-center no-border no-shadow">
                                        <span class="wd-60 mg-r-15 tx-dark tx-semibold precip"></span>
                                        <div class="pull-right">
                                            <span class="d-block tx-12 tx-danger"><i data-feather="trending-down"
                                                                                     class="svg-12"></i> 20%</span>
                                            <h6 class="tx-14 tx-normal mg-b-0">Влажность</h6>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center no-border no-shadow">
                                        <span class="wd-60 mg-r-15 tx-dark tx-semibold wind"></span>
                                        <div>
                                            <span class="d-block tx-12 tx-meteo"><i data-feather="git-commit"
                                                                                    class="svg-12"></i> 1 м/с</span>
                                            <h6 class="tx-14 tx-normal mg-b-0">Ветер</h6>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center no-border no-shadow">
                                        <span class="wd-60 mg-r-15 tx-dark tx-semibold clouds"></span>
                                        <div>
                                            <span class="d-block  tx-12 tx-danger"><i data-feather="trending-down"
                                                                                      class="svg-12"></i> 30%</span>
                                            <h6 class="tx-14 tx-normal mg-b-0">Осадка</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <p class="mg-l-10 tx-md-10 tx-lg-11 tx-lx-12">Вид облаков нижнего яруса: <span
                                    class="tx-medium tx-meteo">слоисто-кучевые</span></p>
                        </div><!-- col -->
                    </div><!-- row -->
                </div>
            </div><!-- card -->
        </div><!-- col -->
    </div>
    <div class="row row-sm">
        <!-- ДРУГИЕ ИСТОЧНИК -->
        <div class="col-sm-4 col-md-4 mg-t-15 mg-sm-t-20">
            <div class="card card-hover card-weather-one bg-weather-panel">
                <div class="card-header bg-transparent pd-t-15 pd-l-20 pd-r-15 pd-b-0 bd-b-0">
                    <p class="card-title mg-b-0">AccuWeather.com</p>
                    <nav class="nav">
                        <a href="" class="tx-white"><i data-feather="help-circle" class="svg-16"></i></a>
                    </nav>
                </div>
                <div class="card-body pd-t-0">
                    <div>
                        <h1 class="card-value"><span class="current-temp"></span></h1>
                        <div class="d-flex align-items-center tx-teal">
                            <i data-feather="arrow-up-circle" class="svg-12 fill-teal"></i>
                            <span class="mg-l-5 tx-numeric tx-11">28.68%</span>
                        </div>
                    </div>
                    <div class="flot-chart mgt-30"><img src="{{asset('template/assets/weather/03/200.svg')}}"
                                                        class="svg-color"></div>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
        <div class="col-sm-4 col-md-4 mg-t-15 mg-sm-t-20">
            <div class="card card-hover card-weather-one bg-weather-panel">
                <div class="card-header bg-transparent pd-t-15 pd-l-20 pd-r-15 pd-b-0 bd-b-0">
                    <p class="card-title mg-b-0">OpenWeather.com</p>
                    <nav class="nav">
                        <a href="" class="tx-white"><i data-feather="help-circle" class="svg-16"></i></a>
                    </nav>
                </div>
                <div class="card-body pd-t-0">
                    <div>
                        <h1 class="card-value"><span class="current-temp"></span></h1>
                        <div class="d-flex align-items-center tx-teal">
                            <i data-feather="arrow-up-circle" class="svg-12 fill-teal"></i>
                            <span class="mg-l-5 tx-numeric tx-11">28.68%</span>
                        </div>
                    </div>
                    <div class="flot-chart mgt-30"><img src="{{asset('template/assets/weather/03/201.svg')}}"
                                                        class="svg-color"></div>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
        <div class="col-sm-4 col-md-4 mg-t-15 mg-sm-t-20">
            <div class="card card-hover card-weather-one bg-weather-panel">
                <div class="card-header bg-transparent pd-t-15 pd-l-20 pd-r-15 pd-b-0 bd-b-0">
                    <p class="card-title mg-b-0">Total Profit</p>
                    <nav class="nav">
                        <a href="" class="tx-white"><i data-feather="help-circle" class="svg-16"></i></a>
                    </nav>
                </div>
                <div class="card-body pd-t-0">
                    <div>
                        <h1 class="card-value"><span class="current-temp"></span></h1>
                        <div class="d-flex align-items-center tx-teal">
                            <i data-feather="arrow-up-circle" class="svg-12 fill-teal"></i>
                            <span class="mg-l-5 tx-numeric tx-11">28.68%</span>
                        </div>
                    </div>
                    <div class="flot-chart mgt-30"><img src="{{asset('template/assets/weather/03/202.svg')}}"
                                                        class="svg-color"></div>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
    </div>
    <div class="row row-sm mg-t-15 mg-sm-t-20">
        <div class="col-md-12 col-xl-12 mg-t-15 mg-sm-t-20">
            <div class="card card-hover card-weather-location">
                <div class="card-header bg-transparent">
                    <div>
                        <h6 class="card-title mg-b-0">Фактическая погода по областным центрам</h6>
                    </div>
                    <nav class="nav">
                        <!-- <div class="btn-group">
           <button class="btn btn-white btn-xs active">Сегодня</button>
           <button class="btn btn-white btn-xs">Завтра</button>
           <button class="btn btn-white btn-xs">После завтра</button>
       </div> -->
                    </nav>
                </div><!-- card-header -->
                <div class="card-body" id="apps">
                    <div class="list-group-wrapper order-2 order-md-0 mg-t-20 mg-sm-t-30 mg-md-t-0">
                        <ul class="list-group list-group-flush mg-b-15">
                            <li class="list-group-item">
                                <span id="1703"><a href="#">Андижанская область</a></span>
                                <span class="tx-medium current-temp-andijan"0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1706"><a href="#">Бухарская область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1708"><a href="#">Джизакская область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1710"><a href="#">Кашкадарьинская область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1712"><a href="#">Навоийская область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1714"><a href="#">Наманганская область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1718"><a href="#">Самаркандская область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1722"><a href="#">Сурхандарьинская область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1724"><a href="#">Сырдарьинская область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1726"><a href="#">г. Ташкент</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1727"><a href="#">Ташкентская область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1730"><a href="#">Ферганская область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1733"><a href="#">Хорезмская область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1735"><a href="#">Республика Каракалпакстан</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                            <li class="list-group-item">
                                <span id="1"><a href="#">Ташкенткая область</a></span>
                                <span class="tx-medium current-temp">0</span>
                            </li>
                        </ul>
                        <br>
                        <a href="" class="d-flex pull-right tx-12">Подробнее <i
                                class="icon ion-android-arrow-forward mg-l-5"></i></a>
                    </div>
                    <div class="vmap-wrapper bd-sm-l">
                        {{--                        <div id="vmap" class="vmap order-1 order-md-0"></div>--}}
                        <iframe src="{{asset('template/map/index_.html')}}" frameborder="0" width="1340"
                                height="600"></iframe>
                    </div>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
    </div><!-- row -->
@endsection
@section('js')


@endsection
