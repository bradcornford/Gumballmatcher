@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang ('admin.groups.title')</h3>

    @can ('admin-group-create')
        <p class="text-right">
            <a href="{{ route('admin.groups.create') }}" class="btn btn-success">@lang ('admin.defaults.create')</a>
        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang ('admin.defaults.list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($groups) > 0 ? 'datatable' : '' }} @can ('admin-group-mass-delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can ('admin-group-mass-delete')
                            <th class="text-center"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang ('admin.groups.fields.name')</th>
                        <th>@lang ('admin.groups.fields.key')</th>
                        <th>@lang ('admin.groups.fields.description')</th>
                        <th>@lang ('admin.groups.fields.image')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($groups as $group)
                        <tr data-entry-id="{{ $group->id }}">
                            @can ('admin-group-delete', $group)
                                <td class=""></td>
                            @endcan

                            <td>{{ $group->name }}</td>
                            <td>{{ $group->key }}</td>
                            <td>{{ substr($group->description, 0, 50) . (strlen($group->description) > 50 ? '...' : '') }}</td>
                            <td class="word-break-all">{{ $group->image or '' }}</td>
                            <td>
                                @can ('admin-group-view', $group)
                                    <a href="{{ route('admin.groups.show', [$group->id]) }}" class="btn btn-xs btn-primary">@lang ('admin.defaults.view')</a>
                                @endcan

                                @can ('admin-group-edit', $group)
                                    <a href="{{ route('admin.groups.edit', [$group->id]) }}" class="btn btn-xs btn-info">@lang ('admin.defaults.edit')</a>
                                @endcan

                                @can ('admin-group-delete', $group)
                                    {!! Form::open(
                                        [
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('" . trans('admin.defaults.confirm') . "');",
                                            'route' => ['admin.groups.destroy', $group->id]
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
        @can ('admin-group-mass-delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.groups.mass_destroy') }}';
        @endcan
    </script>
@endsection
