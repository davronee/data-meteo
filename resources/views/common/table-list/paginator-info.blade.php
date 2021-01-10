<div class="row">
    <div class="col-sm-6">
        <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
            @lang('messages.paginator_info', [
                'total' => $model->total(),
                'start' => (($model->currentPage() - 1) * $model->perPage() + 1),
                'end' => (($model->currentPage() - 1) * $model->perPage() + $model->count())
            ])
        </div>
    </div>
    <div class="col-sm-6">
        <div class="pagination-wrapper text-right no-child-top-margin pull-right">
            {{ $model->links() }}
        </div>
    </div>
</div>
