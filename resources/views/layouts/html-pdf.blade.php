<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <style>
        @font-face {
            font-family: "DejaVu Sans";
            font-style: normal;
            font-weight: 400;
            src: url("/template/fonts/dejavu-sans/DejaVuSans.ttf");
            /* IE9 Compat Modes */
            src:
                local("DejaVu Sans"),
                local("DejaVu Sans"),
                url("/template/fonts/dejavu-sans/DejaVuSans.ttf") format("truetype");
        }

        body {
            font-family: "DejaVu Sans";
        }

        table {
            border-bottom: 1px solid black;
            border-top: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
            font-weight: bold;
            font-size: 18px;
            width: 100%;
            padding: 0px;
            margin: 10px 0px;
            border-spacing: -1px;
        }

        tr, td {
            border-bottom: 1px solid black;
            border-top: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
            padding: 5px;
            font-size: 18px;
        }
    </style>
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>
