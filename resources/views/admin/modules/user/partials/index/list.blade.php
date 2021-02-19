<div class="table-responsive">
    <table id="empty-lands" class="table table-bordered normalized">
        <thead>
            <tr role="row">
                <th>№</th>
                <th class="col-md-2">@lang('messages.login')</th>
                <th class="col-md-2">@lang('messages.mail')</th>
                <th class="col-md-1">@lang('messages.region')</th>
                <th class="col-md-2">@lang('messages.district')</th>
                <th class="col-md-2">@lang('messages.created_at')</th>
                <th class="col-md-2">@lang('messages.actions')</th>
            </tr>
        </thead>
        <tbody>
            @php $num = ($users->currentPage() - 1) * $users->perPage() + 1; @endphp
            @foreach ($users as $key => $user)
                <tr role="row" class="odd">
                    <td>{{ $num }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->formatted_region }}</td>
                    <td>{{ $user->formatted_district }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-light btn-xs text-dark"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                @php $num++; @endphp
            @endforeach

            @if ($users->total() == 0)
                <tr>
                    <td colspan="8">@lang('messages.nothing')</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@include('common.table-list.paginator-info', ['model' => $users])
