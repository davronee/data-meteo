@extends('layouts.html-no-sidebar')

@section('content')
<div class="content-body mg-t-20 mg-b-20">
    @include('common.messages')

    <div class="row row-xs">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-center"><strong>ГИДРОМЕТРОЛОГИЯ ТИЗИМИДА ЖОЙЛАРДАГИ АВТОМАТИК СТАНЦИЯЛАР ҲОЛАТИ ЖАДВАЛИ</strong></h4>

                            <div class="table-responsive double-scroll">
                                @include('aws.monitoring.parts.view-table')
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
@endsection
