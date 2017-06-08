@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang('admin.roles.title')</h3>

    @can ('admin-role-create')
        <p class="text-right">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-success">@lang('admin.defaults.create')</a>
        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('admin.defaults.list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($roles) > 0 ? 'datatable' : '' }} @can('admin-role-delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can ('admin-role-delete')
                            <th class="text-center"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang ('admin.roles.fields.name')</th>
                        <th>@lang ('admin.roles.fields.key')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($roles as $role)
                        <tr data-entry-id="{{ $role->id }}">
                            @can ('admin-role-delete')
                                <td class=""></td>
                            @endcan

                            <td>{{ $role->name }}</td>
                            <td>{{ $role->key }}</td>
                            <td>
                                @can ('admin-role-view')
                                    <a href="{{ route('admin.roles.show',[$role->id]) }}" class="btn btn-xs btn-primary">@lang('admin.defaults.view')</a>
                                @endcan

                                @can ('admin-role-edit')
                                    <a href="{{ route('admin.roles.edit',[$role->id]) }}" class="btn btn-xs btn-info">@lang('admin.defaults.edit')</a>
                                @endcan

                                @can ('admin-role-delete')
                                    {!! Form::open(
                                        [
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('" . trans('admin.defaults.confirm') . "');",
                                            'route' => ['admin.roles.destroy', $role->id]
                                        ]
                                    ) !!}
                                        {!! Form::submit(trans('admin.defaults.delete'), ['class' => 'btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">@lang ('admin.defaults.no-items')</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section ('javascript')
    <script type="text/javascript">
        @can ('admin-role-delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
        @endcan
    </script>
@endsection
