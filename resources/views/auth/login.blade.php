@extends('layouts.html-login')

@section('styles')
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
    <script src="{{asset('assets/js/leaflet.js')}}"></script>
    <script src="{{asset('assets/js/leaflet.awesome-markers.min.js')}}"></script>
@endsection

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-31">
                <div class="signin-panel">
                    <div class="signin-sidebar">
                        <div class="signin-sidebar-body">
                            <div class="text-center">
                                <a href="#" class="text-success">
                                    <span><img src="{{ asset('template/assets/img/gidrometeo.svg') }}" alt=""></span>
                                </a>
                                <div class="divider-text">Кабинет пользователя</div>
                            </div>
                            <div class="signin-form">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Логин</label>
                                        <input type="text" class="form-control" placeholder="Введите свой логин"
                                               name="name" value="{{ old('name') }}" required autocomplete="name"
                                               autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="d-flex justify-content-between">
                                            <span>Пароль</span>
                                        </label>
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password"
                                               placeholder="Введите свой пароль">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group d-flex mg-b-0">
                                        <button type="submit" class="btn btn-facebook btn-uppercase btn-block"><i
                                                class="fas fa-sign-out-alt"></i> Войти
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <p class="mg-t-auto mg-b-0 tx-sm tx-color-03 tx-center">Центр гидрометеорологической службы
                                Республики Узбекистан</p>
                        </div><!-- signin-sidebar-body -->
                    </div><!-- signin-sidebar -->
                </div><!-- signin-panel -->
            </div>
            <div class="col-md-91">
                <div id="map">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/topojson@3.0.2/dist/topojson.min.js"></script>
    <script src="{{asset('asset/js/leaflet.ajax.js')}}"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.js"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-simple-tree-table.js')}}"></script>
    <script src="{{asset('assets/js/table.js')}}"></script>
    <script src="{{asset('template/assets/js/custom.js')}}"></script>
@endsection
