@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang('admin.factions.title')</h3>

    @can ('admin-faction-create')
        <p class="text-right">
            <a href="{{ route('admin.factions.create') }}" class="btn btn-success">@lang('admin.defaults.create')</a>
        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('admin.defaults.list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($factions) > 0 ? 'datatable' : '' }} @can('admin-faction-delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can ('admin-faction-delete')
                            <th class="text-center"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang ('admin.factions.fields.name')</th>
                        <th>@lang ('admin.factions.fields.key')</th>
                        <th>@lang ('admin.factions.fields.description')</th>
                        <th>@lang ('admin.factions.fields.image')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($factions as $faction)
                        <tr data-entry-id="{{ $faction->id }}">
                            @can ('admin-faction-delete')
                                <td class=""></td>
                            @endcan

                            <td>{{ $faction->name }}</td>
                            <td>{{ $faction->key }}</td>
                            <td>{{ substr($faction->description, 0, 50) . (strlen($faction->description) > 50 ? '...' : '') }}</td>
                            <td class="word-break-all">{{ $faction->image or '' }}</td>
                            <td>
                                @can ('admin-faction-view')
                                    <a href="{{ route('admin.factions.show',[$faction->id]) }}" class="btn btn-xs btn-primary">@lang('admin.defaults.view')</a>
                                @endcan

                                @can ('admin-faction-edit')
                                    <a href="{{ route('admin.factions.edit',[$faction->id]) }}" class="btn btn-xs btn-info">@lang('admin.defaults.edit')</a>
                                @endcan

                                @can ('admin-faction-delete')
                                    {!! Form::open(
                                        [
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('" . trans('admin.defaults.confirm') . "');",
                                            'route' => ['admin.factions.destroy', $faction->id]
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
        @can ('admin-faction-delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.factions.mass_destroy') }}';
        @endcan
    </script>
@endsection
