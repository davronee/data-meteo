@extends('layouts.html-pdf')

@section('title')
{!! $hourlyStationInfo->formatted_station !!} :: {!! $hourlyStationInfo->created_at->format('d.m.Y') !!}
@endsection

@section('content')
    {!! $hourlyStationInfo->description !!}
@endsection
