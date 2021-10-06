<table>
    <tr>
        <th colspan="10"><strong>Степень соответствия прогнозов интернет сервисов фактическим условиям погоды</strong>
            <br>(оправдываемость прогнозов)
        </th>
        <td></td>
        <td></td>
    </tr>
</table>
<table style="border: 1px">
    <thead>
    <tr>
        <th><b>Сервисы</b></th>
        <th><b>Краткосрочные (КПП)</b></th>
        <th><b>Среднесрочные (СПП)</b></th>
        <th><b>С расширенным сроком</b></th>
        <th><b>Страна</b></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Openweather</td>
        <td>{{ \App\Classes\Services::GetReportAll('open_weather', 12, 72) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('open_weather', 72, 240) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('open_weather', 240, 720) }}</td>
        <td>Великобритания</td>
    </tr>
    <tr>
        <td>Accuweather</td>
        <td>{{ \App\Classes\Services::GetReportAll('accuweathers', 12, 72) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('accuweathers', 72, 240) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('accuweathers', 240, 720) }}</td>
        <td>США</td>
    </tr>
    <tr>
        <td>Weatherbit</td>
        <td>{{ \App\Classes\Services::GetReportAll('weather_bits', 12, 72) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('weather_bits', 72, 240) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('weather_bits', 240, 720) }}</td>
        <td>Великобритания</td>
    </tr>
    <tr>
        <td>DarkSky</td>
        <td>{{ \App\Classes\Services::GetReportAll('dark_skies', 12, 72) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('dark_skies', 72, 240) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('dark_skies', 240, 720) }}</td>
        <td>США</td>
    </tr>
    <tr>
        <td>Aerisweather</td>
        <td>{{ \App\Classes\Services::GetReportAll('aerisweathers', 12, 72) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('aerisweathers', 72, 240) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('aerisweathers', 240, 720) }}</td>
        <td>США</td>
    </tr>
    <tr>
        <td>Uzhydromet</td>
        <td>{{ \App\Classes\Services::GetReportAll('uz_hydromets', 12, 72) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('uz_hydromets', 72, 240) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('uz_hydromets', 240, 720) }}</td>
        <td>Узбекистан</td>
    </tr>
    <tr>
        <td><b>≈ Оправдываемост</b></td>

    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td>Краткосрочные (КПП) — от 12 до 72 часов;</td>
    </tr>
    <tr>
        <td>Среднесрочные (СПП) — от 72 часов до 10 суток;</td>
    </tr>
    <tr>
        <td>С расширенным сроком — от 10 до 30 суток;</td>
    </tr>
    </tbody>
</table>
<table>

</table>
