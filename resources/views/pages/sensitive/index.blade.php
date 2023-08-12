<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="form-group">
            <h1 class="text-center">Ўзбекистон Республикаси аҳолисининг об-ҳавога сезувчанлиги тўғрисидаги маълумотлар
                базаси (2020-{{ \Carbon\Carbon::now()->year}})</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Кўрсатгичлар</th>
                    <th scope="col">I</th>
                    <th scope="col">II</th>
                    <th scope="col">III</th>
                    <th scope="col">IV</th>
                    <th scope="col">V</th>
                    <th scope="col">VI</th>
                    <th scope="col">VII</th>
                    <th scope="col">VIII</th>
                    <th scope="col">IX</th>
                    <th scope="col">X</th>
                    <th scope="col">XI</th>
                    <th scope="col">XII</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Ҳарорат</td>
                    @foreach($temp_avarage as $key=> $sensitive)
                        <td>{{round($sensitive,2)}}</td>
                    @endforeach
                    @for($i=0;$i<12-count($temp_avarage);$i++)
                        <td></td>
                    @endfor
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Босим</td>
                    @foreach($pressure_avarage as $key=> $sensitive)
                        <td>{{round($sensitive,2)}}</td>
                    @endforeach
                    @for($i=0;$i<12-count($pressure_avarage);$i++)
                        <td></td>
                    @endfor
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Ёғин</td>
                    @foreach($precipitation_avarage as $key=> $sensitive)
                        <td>{{round($sensitive,2)}}</td>
                    @endforeach
                    @for($i=0;$i<12-count($precipitation_avarage);$i++)
                        <td></td>
                    @endfor
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Намлик</td>
                    @foreach($humidity_avarage as $key=> $sensitive)
                        <td>{{round($sensitive,2)}}</td>
                    @endforeach
                    @for($i=0;$i<12-count($humidity_avarage);$i++)
                        <td></td>
                    @endfor
                </tr>

                <tr>
                    <th scope="row">5</th>
                    <td>Булутлилик</td>
                    @for($i=0;$i<12;$i++)
                        <td></td>
                    @endfor
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Қуёш радиацияси</td>
                    @foreach($solar_radiation_avarage as $key=> $sensitive)
                        <td>{{round($sensitive,2)}}</td>
                    @endforeach
                    @for($i=0;$i<12-count($solar_radiation_avarage);$i++)
                        <td></td>
                    @endfor
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Шамол тезлиги</td>
                    @foreach($wind_speed_avarage as $key=> $sensitive)
                        <td>{{round($sensitive,2)}}</td>
                    @endforeach
                    @for($i=0;$i<12-count($wind_speed_avarage);$i++)
                        <td></td>
                    @endfor
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Ҳаво ифлосланиши</td>
                    @foreach($air_quality_avarage as $key=> $sensitive)
                        <td>{{round($sensitive,2)}}</td>
                    @endforeach
                    @for($i=0;$i<12-count($air_quality_avarage);$i++)
                        <td></td>
                    @endfor
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>УФ</td>
                    @for($i=0;$i<12;$i++)
                        <td></td>
                    @endfor
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>Магнит бўрон</td>
                    @for($i=0;$i<12;$i++)
                        <td></td>
                    @endfor
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>