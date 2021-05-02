<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Meta -->
        <meta name="description" content="Единая система анализа и обработки гидрометеорологических наблюдений">
        <meta name="author" content="Метеоинфосистем">
        <!-- Title -->
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/assets/img/favicon/favicon.ico') }}">
        <!-- icons css -->
        <link href="{{ asset('template/lib/fontawesome5/css/all.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('template/assets/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template/assets/css/ionicons.min.css') }}">
        <!-- vendor css -->
        <link href="{{ asset('template/lib/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('template/lib/select2/css/select2.min.css') }}" rel="stylesheet">
        {{-- datepicker --}}
        {{-- <link href="{{ asset('template/lib/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('template/lib/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
        <!-- template css -->
        <link rel="stylesheet" href="{{ asset('template/assets/css/meteo.css') }}">
        <link rel="stylesheet" href="{{ asset('template/assets/css/weather-panel.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('template/assets/css/customizer.css') }}"> --}}
        @yield('styles')
        <!-- custom styles -->
        <link rel="stylesheet" href="{{ asset('template/assets/css/custom.css') }}">
    </head>
    <body data-spy="scroll" data-target="#navSection" data-offset="100">
        {{-- sidebar --}}
        @includeWhen(auth()->check(), 'blocks.sidebar')

        <div class="{{ auth()->check() ? 'content' : '' }} content-page">
            {{-- top section --}}
            @includeWhen(auth()->check(), 'blocks.header')
            {{-- @includeWhen(auth()->check(), 'blocks.breadcrumb') --}}

            {{-- main content --}}
            <div class="content-body" id="@yield('vue_id', 'app')">
                @yield('content')
            </div><!-- content-body -->
        </div>

        {{-- system description --}}
        @include('blocks.about-system')

        <script src="{{ asset('template/lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('template/lib/jqueryui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('template/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/lib/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('template/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('template/lib/js-cookie/js.cookie.js') }}"></script>
        <script src="{{ asset('template/lib/chart.js/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('template/lib/jquery.flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('template/lib/jquery.flot/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('template/lib/jquery.flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('template/lib/jquery.flot/jquery.flot.threshold.js') }}"></script>
        <script src="{{ asset('template/lib/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('template/lib/jqvmap/maps/jquery.vmap.world_template.js') }}"></script>
        <script src="{{ asset('template/lib/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/meteo.js') }}"></script>
        <script src="{{ asset('template/assets/js/canvas.js') }}"></script>
        <script src="{{ asset('template/assets/js/flot.sampledata.js') }}"></script>
        <script src="{{ asset('template/assets/js/vmap.sampledata.js') }}"></script>
        {{-- datepicker --}}
        {{-- <script src="{{ asset('template/lib/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script> --}}
        <script src="{{ asset('template/lib/moment/moment.js') }}"></script>
        <script src="{{ asset('template/lib/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        {{-- input mask --}}
        <script src="{{ asset('template/lib/inputmask/jquery.inputmask.js') }}"></script>
        <script src="{{ asset('template/lib/inputmask/inputmask.binding.js') }}"></script>
        {{-- vuejs --}}
        <script src="{{ asset('template/assets/js/axios.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/vue.js') }}"></script>
        {{-- ckeditor --}}
        <script src="{{ asset('template/lib/ckeditor-document/ckeditor.js') }}"></script>

        @yield('script')
        {{-- customizer --}}
        <script src="{{ asset('template/assets/js/customizer/ckeditor-config.js') }}"></script>
        <script src="{{ asset('template/assets/js/customizer/customizer.js') }}"></script>
        <script src="{{ asset('template/assets/js/customizer/app.js') }}"></script>
        <!-- weather-panel -->
        <script src="{{ asset('template/assets/js/weather-panel.js') }}"></script>
        <!-- custom scripts -->
    </body>
</html>
