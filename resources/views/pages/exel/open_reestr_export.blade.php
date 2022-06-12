<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">т/р</th>
        <th scope="col">Ариза рақами</th>
        <th scope="col">Давлат хизмати номи</th>
        <th scope="col">Келиб тушган сана</th>
        <th scope="col">Мурожаатчи ФИО си</th>
        <th scope="col">Ижрочи</th>
        <th scope="col">Ижрочи телефон рақами</th>
        <th scope="col">Ҳолати</th>
    </tr>
    </thead>
    <tbody>
    @foreach($offers as $key=>$offer)
        <tr>
            <th scope="row">  {{  $key+1 }}</th>
            <td>{!! $offer->id !!}</td>
            <td>{!! $offer->service->name !!}</td>
            <td>{!! $offer->created_at->format('d.m.Y') !!}</td>
            <td>{!! $offer->fio !!}</td>
            <td>Д. Қориев</td>
            <td>99871-235-85-49</td>
            <td>Кўриб чиқилмоқда</td>
        </tr>
    @endforeach
    </tbody>
</table>
