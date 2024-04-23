@extends('layouts.html-pdf')

@section('title')
{!! $quickInfo->formatted_region !!} :: {!! $quickInfo->created_at->format('d.m.Y H:i:s') !!}
@endsection

@section('content')
    {!! $quickInfo->info !!}
@endsection
