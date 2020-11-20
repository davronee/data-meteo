<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="Единая система анализа и обработки гидрометеорологических наблюдений">
    <meta name="author" content="Метеоинфосистем">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('template/assets/img/favicon/favicon.ico')}}">
    <title>METEO|DC</title>
    <!-- icons css -->
    <link href="{{asset('template/lib/fontawesome5/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/assets/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/ionicons.min.css')}}">
    <!-- vendor css -->
    <link href="{{asset('template/lib/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- template css -->
    <link rel="stylesheet" href="{{asset('template/assets/css/meteo.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/weather-panel.css')}}">
    <script src="{{asset('template/assets/js/vue.js')}}"></script>
    <script src="{{asset('template/assets/js/axios.min.js')}}"></script>
    @yield('css')
</head>

<body data-spy="scroll" data-target="#navSection" data-offset="100">
@include('blocks.sidebar')
<div class="content content-page">
    <div class="header">
        <div class="header-left">
            <a href="" class="burger-menu"><i data-feather="menu"></i></a>
            <div class="header-search">
                <i data-feather="search"></i>
                <input type="search" class="form-control" placeholder="Что вы ищете?">
            </div><!-- header-search -->
        </div><!-- header-left -->
        <div class="header-right">
            <div class="dropdown dropdown-notification">
                <a href="" class="dropdown-link new" data-toggle="dropdown"><i class="far fa-bell fa-lg"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-menu-header">
                        <h6>Уведомления</h6>
                        <a href=""><i data-feather="more-vertical"></i></a>
                    </div><!-- dropdown-menu-header -->
                    <div class="dropdown-menu-body">
                        <a href="" class="dropdown-item">
                            <div class="avatar"><span class="avatar-initial rounded-circle text-primary bg-primary-light">s</span></div>
                            <div class="dropdown-item-body">
                                <p><strong>Socrates Itumay</strong> marked the task as completed.</p>
                                <span>5 hours ago</span>
                            </div>
                        </a>
                        <a href="" class="dropdown-item">
                            <div class="avatar"><span class="avatar-initial rounded-circle tx-pink bg-pink-light">r</span></div>
                            <div class="dropdown-item-body">
                                <p><strong>Reynante Labares</strong> marked the task as incomplete.</p>
                                <span>8 hours ago</span>
                            </div>
                        </a>
                        <a href="" class="dropdown-item">
                            <div class="avatar"><span class="avatar-initial rounded-circle tx-success bg-success-light">d</span></div>
                            <div class="dropdown-item-body">
                                <p><strong>Dyanne Aceron</strong> responded to your comment on this <strong>post</strong>.</p>
                                <span>a day ago</span>
                            </div>
                        </a>
                        <a href="" class="dropdown-item">
                            <div class="avatar"><span class="avatar-initial rounded-circle tx-indigo bg-indigo-light">k</span></div>
                            <div class="dropdown-item-body">
                                <p><strong>Kirby Avendula</strong> marked the task as incomplete.</p>
                                <span>2 days ago</span>
                            </div>
                        </a>
                    </div><!-- dropdown-menu-body -->
                    <div class="dropdown-menu-footer">
                        <a href="">Просмотреть все уведомления</a>
                    </div>
                </div><!-- dropdown-menu -->
            </div>
        </div><!-- header-right -->
    </div><!-- header -->
    <div class="content-header justify-content-between">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Рабочий стол</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Фактическая погода</li>
                </ol>
            </nav>
        </div>
        <div class="d-none d-sm-flex">
            <a href="" class="btn btn-white"><i class="fas fa-sync"></i> Обновить</a>
        </div>
    </div><!-- content-header -->
    <div class="content-body">
        @yield('content')

    </div><!-- content-body -->
</div><!-- content -->
<div id="offCanvas3" class="off-canvas off-canvas-overlay off-canvas-right">
    <a href="#" class="close"><i data-feather="x"></i></a>
    <div class="pd-30 ht-100p">
        <div class="sidebar-header"><a href="#" class="sidebar-logo"><img src="{{asset('template/assets/img/gidrometeo.svg')}}"></a></div>
        <h6 class="tx-colo-01 tx-semibold mg-t-50 mg-b-25">О системе</h6>
        <p class="mg-b-25 tx-color-03 tx-justify">Система для автоматизации основных этапов прикладной обработки и анализа гидрометерологических данных Узгидромета</p>
    </div>
</div><!-- off-canvas -->
<script src="{{asset('template/lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('template/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script src="{{asset('template/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('template/lib/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('template/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('template/lib/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('template/lib/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('template/lib/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('template/lib/jquery.flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('template/lib/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('template/lib/jquery.flot/jquery.flot.threshold.js')}}"></script>
<script src="{{asset('template/lib/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('template/lib/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('template/lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('template/assets/js/meteo.js')}}"></script>
<script src="{{asset('template/assets/js/canvas.js')}}"></script>
<script src="{{asset('template/assets/js/flot.sampledata.js')}}"></script>
<script src="{{asset('template/assets/js/vmap.sampledata.js')}}"></script>
<!-- weather-panel -->
<script src="{{asset('template/assets/js/weather-panel.js')}}"></script>
@yield('script')
<script>
    var dt = new Date();
    document.getElementById("datetime").innerHTML = (("0" + dt.getDate()).slice(-2)) + "." + (("0" + (dt.getMonth() + 1)).slice(-2)) + "." + (dt.getFullYear()) + " " + (("0" + dt.getHours()).slice(-2)) + ":" + (("0" + dt.getMinutes()).slice(-2));

</script>
<script>
    $(function() {

        'use strict'

        $.plot('#flotChart1', [{
            data: df1,
            color: '#38c4fa'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 1.5,
                    fill: true,
                    fillColor: { colors: [{ opacity: 0 }, { opacity: 0.5 }] }
                },
                points: {
                    show: false,
                    radius: 2,
                    lineWidth: 1.5
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0,
            },
            yaxis: { show: false },
            xaxis: {
                show: false,
                min: 40,
                max: 80
            }
        });

        $.plot('#flotChart2', [{
            data: df1,
            color: '#22d273'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 1.5,
                    fill: true,
                    fillColor: { colors: [{ opacity: 0 }, { opacity: 0.5 }] }
                },
                points: {
                    show: false,
                    radius: 2,
                    lineWidth: 1.5
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0,
            },
            yaxis: { show: false },
            xaxis: {
                show: false,
                min: 20,
                max: 60
            }
        });

        $.plot('#flotChart3', [{
            data: df1,
            color: '#e83e8c'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 1.5,
                    fill: true,
                    fillColor: { colors: [{ opacity: 0 }, { opacity: 0.5 }] }
                },
                points: {
                    show: false,
                    radius: 2,
                    lineWidth: 1.5
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0,
            },
            yaxis: { show: false },
            xaxis: {
                show: false,
                min: 60,
                max: 100
            }
        });

        $.plot('#flotChart4', [{
            data: df1,
            color: '#fd7e14'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 1.5,
                    fill: true,
                    fillColor: { colors: [{ opacity: 0 }, { opacity: 0.5 }] }
                },
                points: {
                    show: false,
                    radius: 2,
                    lineWidth: 1.5
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0,
            },
            yaxis: { show: false },
            xaxis: {
                show: false,
                min: 100,
                max: 140
            }
        });

        // card-calendar-one widget
        $('#datepicker1').datepicker({
            showOtherMonths: true
        });

    })

</script>

</body>

</html>
