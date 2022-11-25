<table>
    <tr>
        <td>
            @php
                \Carbon\Carbon::now()->startOfDay()->format('d.m.Y h:i') .'-'. \Carbon\Carbon::now()->endOfDay()->format('d.m.Y h:i')
            @endphp
        </td>
    </tr>
    @foreach($horiba as $key=>$item)
        <tr>
            <td>Horiba</td>
            <td>{{ $item['Value'] }} µg/m3</td>
            <td>{{ $item['ComponentName'] }}</td>
            <td>{{ \Carbon\Carbon::parse($item['EndTime'])->format('d.m.Y H:i') }}</td>
            <td></td>
            @if(isset($meteobot[$key]))
                <td>Meteobot</td>
                <td>{{$meteobot[$key][1]}} µg/m3</td>
                <td>{{ $item['ComponentName'] }}</td>
                <td>{{ $meteobot[$key][0] }}</td>
            @endif
        </tr>
    @endforeach
</table>