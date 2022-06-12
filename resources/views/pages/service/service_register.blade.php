@extends('layouts.service_layout')

@section('vue_id', 'app')

@section('content')

    <div class="content-body mg-t-20 mg-b-20">
        @include('common.messages')

        {{--        <div class="mail-body-content">--}}
        {{--            @include('daily-station-info.partials.common.navbar', ['date' => date("d.m.Y")])--}}
        {{--        </div>--}}

        <div class="row row-xs">
            <div class="col-md-12">
                <div class="card card-body pd-sm-40 pd-md-30 pd-xl-y-35 pd-xl-x-40 wd-98p mg-b-15 mg-t-5">
                    <div class="tab-content">
                        <h1> Мурожаатлар очиқ реестри</h1>
                        <div class="row">
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
                                        <th scope="row">  {{ $offers->firstItem() + $key }}</th>
                                        <td>{!! $offer->id !!}</td>
                                        <td>{!! $offer->service->name !!}</td>
                                        <td>{!! $offer->created_at->format('d.m.Y') !!}</td>
                                        <td>{!! $offer->fio !!}</td>
                                        <td>Д. Қориев</td>
                                        <td>Д. Қориев</td>
                                        <td>Кўриб чиқилмоқда</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $offers->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
