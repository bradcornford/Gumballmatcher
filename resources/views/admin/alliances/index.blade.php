@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang('admin.alliances.title')</h3>

    @can ('admin-alliance-create')
        <p class="text-right">
            <a href="{{ route('admin.alliances.create') }}" class="btn btn-success">@lang('admin.defaults.create')</a>
        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('admin.defaults.list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($alliances) > 0 ? 'datatable' : '' }} @can('admin-alliance-delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can ('admin-alliance-delete')
                            <th class="text-center"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang ('admin.alliances.fields.name')</th>
                        <th>@lang ('admin.alliances.fields.key')</th>
                        <th>@lang ('admin.alliances.fields.level')</th>
                        <th>@lang ('admin.alliances.fields.description')</th>
                        <th>@lang ('admin.alliances.fields.image')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($alliances as $alliance)
                        <tr data-entry-id="{{ $alliance->id }}">
                            @can ('admin-alliance-delete')
                                <td class=""></td>
                            @endcan

                            <td>{{ $alliance->name }}</td>
                            <td>{{ $alliance->key }}</td>
                            <td>{{ $alliance->level }}</td>
                            <td>{{ substr($alliance->description, 0, 50) . (strlen($alliance->description) > 50 ? '...' : '') }}</td>
                            <td>{{ $alliance->image or '' }}</td>
                            <td>
                                @can ('admin-alliance-view')
                                    <a href="{{ route('admin.alliances.show',[$alliance->id]) }}" class="btn btn-xs btn-primary">@lang('admin.defaults.view')</a>
                                @endcan

                                @can ('admin-alliance-edit')
                                    <a href="{{ route('admin.alliances.edit',[$alliance->id]) }}" class="btn btn-xs btn-info">@lang('admin.defaults.edit')</a>
                                @endcan

                                @can ('admin-alliance-delete')
                                    {!! Form::open(
                                        [
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('" . trans('admin.defaults.confirm') . "');",
                                            'route' => ['admin.alliances.destroy', $alliance->id]
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
        @can ('admin-alliance-delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.alliances.mass_destroy') }}';
        @endcan
    </script>
@endsection
