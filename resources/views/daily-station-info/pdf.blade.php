@extends('layouts.html-pdf')

@section('title')
{!! $dailyStationInfo->formatted_station !!} :: {!! $dailyStationInfo->created_at->format('d.m.Y') !!}
@endsection

@section('content')
    {!! $dailyStationInfo->description !!}
@endsection
