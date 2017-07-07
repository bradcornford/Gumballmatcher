@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang ('admin.users.title')</h3>

    @can ('admin-user-create')
        <p class="text-right">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">@lang ('admin.defaults.create')</a>
        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang ('admin.defaults.list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} @can ('admin-user-mass-delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can ('admin-user-mass-delete')
                            <th class="text-center"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang ('admin.users.fields.name')</th>
                        <th>@lang ('admin.users.fields.email')</th>
                        <th>@lang ('admin.users.fields.role')</th>
                        <th>@lang ('admin.users.fields.username')</th>
                        <th>@lang ('admin.users.fields.alliance')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr data-entry-id="{{ $user->id }}">
                            @can ('admin-user-mass-delete')
                                <td class=""></td>
                            @endcan

                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name or '-' }}</td>
                            <td>{{ $user->username or '-' }}</td>
                            <td>{{ $user->alliance->name or '-' }}</td>
                            <td>
                                @can ('admin-user-view', $user)
                                    <a href="{{ route('admin.users.show',[$user->id]) }}" class="btn btn-xs btn-primary">@lang ('admin.defaults.view')</a>
                                @endcan

                                @can ('admin-user-edit', $user)
                                    <a href="{{ route('admin.users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang ('admin.defaults.edit')</a>
                                @endcan

                                @can ('admin-user-delete', $user)
                                    {!! Form::open(
                                        [
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('" . trans('admin.defaults.confirm') . "');",
                                            'route' => ['admin.users.destroy', $user->id]
                                        ]
                                    ) !!}
                                        {!! Form::submit(trans('admin.defaults.delete'), ['class' => 'btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">@lang ('admin.defaults.no-items')</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section ('javascript')
    <script type="text/javascript">
        @can ('admin-user-mass-delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
        @endcan
    </script>
@endsection
