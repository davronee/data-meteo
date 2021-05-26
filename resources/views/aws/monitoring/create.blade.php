@extends('layouts.html')

@section('content')
<div class="content-body mg-t-20 mg-b-20">
    @include('common.messages')

    <div class="row row-xs">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">@lang('messages.station_status')</div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center"><strong>ГИДРОМЕТРОЛОГИЯ ТИЗИМИДА ЖОЙЛАРДАГИ АВТОМАТИК СТАНЦИЯЛАР ҲОЛАТИ ЖАДВАЛИ</strong></h4>

                                    <div class="table-responsive double-scroll">
                                        @include('aws.monitoring.parts.table')
                                    </div>

                                    <div class="form-group mt-2">
                                        <button @click="saveAwsStatuses('{{ route('aws-monitoring.save') }}')" ref="saveAwsStatuses" class="btn btn-success">@lang('messages.save')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('template/lib/jQuery-doubleScroll/jquery.doubleScroll.js') }}"></script>
    <script src="{{ asset('template/lib/notification-box-notific/notific.js') }}"></script>
@endsection

@section('styles')
    <link href="{{ asset('template/lib/notification-box-notific/notific.css') }}" rel="stylesheet">
@endsection
