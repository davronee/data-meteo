<!DOCTYPE html>
<html lang="en">
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
    </style>
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>
