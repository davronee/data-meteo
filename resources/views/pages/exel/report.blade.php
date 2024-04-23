<table>
    <tr>
        <th colspan="10"><strong>Степень соответствия прогнозов фактическим условиям погоды</strong>
            <br>(оправдываемость прогнозов)
        </th>
        <td></td>
        <td></td>
    </tr>
</table>
<table style="border: 1px">
    <thead>
    <tr>
        <th><b>Регион</b></th>
        <th><b>Краткосрочные (КПП)</b></th>
        <th><b>Среднесрочные (СПП)</b></th>
        <th><b>С расширенным сроком</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach(\App\Models\WeatherRegions::all() as $region)
        <tr>
            <td>{{  \App\Classes\Services::GetRu($region->code) }}</td>
            <td>{{ \App\Classes\Services::GetReport('uz_hydromets', 12, 72, $region->code) }}</td>
            <td>{{ \App\Classes\Services::GetReport('uz_hydromets', 72, 240, $region->code) }}</td>
            <td>{{ \App\Classes\Services::GetReport('uz_hydromets', 240, 720, $region->code) }}</td>
        </tr>
    @endforeach
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
