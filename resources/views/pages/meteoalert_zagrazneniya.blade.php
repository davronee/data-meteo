<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Air Quality Viewer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .iframe-wrapper {
            width: 100%;
            max-width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center; /* iframe'ni gorizontal markazga joylaydi */
        }

        iframe {
            width: 100%;
            height: 80vh;
            border: none;
            display: block;
            max-width: 100%;
            margin: 0 auto;
        }

        /* Kompyuter (md va undan katta) ekranlarda iframe biroz kichiklashtiriladi */
        @media (min-width: 768px) {
            .iframe-wrapper {
                max-width: 900px; /* Kompyuterda iframe eni cheklanadi */
                margin: 0 auto;    /* Markazga joylashadi */
            }

            iframe {
                width: 770px; /* Kompyuterda biroz pastroq bo‘ladi */
                margin: 0 auto;
                height: 90vh; /* Kompyuterda balandligi oshiriladi */
            }
        }
    </style>
</head>
<body class="bg-light p-3">

<div class="container">
    {{-- Orqaga qaytish --}}
{{--    <div class="mb-3">--}}
{{--        <a href="https://data.meteo.uz" class="btn btn-secondary">&larr; Orqaga qaytish</a>--}}
{{--    </div>--}}

    <h4 class="d-flex justify-content-center flex-wrap gap-2 mb-4">Havoning sifat parametrlari</h4>

    {{-- Parametr tugmalari --}}
    <div class="d-flex justify-content-center flex-wrap gap-2 mb-4">
        <a href="?param=AQI" class="btn btn-outline-primary mb-2">AQI</a>
        <a href="?param=CO_surf" class="btn btn-outline-primary mb-2">CO</a>
        <a href="?param=NO2_surf" class="btn btn-outline-primary mb-2">NO₂</a>
        <a href="?param=O3_surf" class="btn btn-outline-primary mb-2">O₃</a>
        <a href="?param=PM10_surf" class="btn btn-outline-primary mb-2">PM10</a>
        <a href="?param=PM2_5_surf" class="btn btn-outline-primary mb-2">PM2.5</a>
        <a href="?param=SO2_surf" class="btn btn-outline-primary mb-2">SO₂</a>
        <a href="?param=BLH" class="btn btn-outline-primary mb-2">ABL</a>
    </div>

    {{-- iframe responsive qilingan --}}
    @php
        $param = request()->query('param', 'PM2_5_surf');
    @endphp

    <div class="iframe-wrapper">
        <iframe
            src="https://mysilam.meteo.uz/SILAMForcast.html?param={{ urlencode($param) }}"
            title="Air Quality Forecast"
            allowfullscreen>
        </iframe>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
