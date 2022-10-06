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
        <td>Uzhydromet</td>
        <td>{{ \App\Classes\Services::GetReportAll('uz_hydromets', 12, 72) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('uz_hydromets', 72, 240) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('uz_hydromets', 240, 720) }}</td>
        <td>Узбекистан</td>
    </tr>
    <tr>
        <td>Accuweather</td>
        <td>{{ \App\Classes\Services::GetReportAll('accuweathers', 12, 72) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('accuweathers', 72, 240) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('accuweathers', 240, 720) }}</td>
        <td>США</td>
    </tr>
    <tr>
        <td>Weather.com</td>
        <td>{{ \App\Classes\Services::GetReportAll('weather_apis', 12, 72) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('weather_apis', 72, 240) }}</td>
        <td>{{ \App\Classes\Services::GetReportAll('weather_apis', 240, 720) }}</td>
        <td>США</td>
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
