@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang('admin.fates.title')</h3>

    @can ('admin-fate-create')
        <p class="text-right">
            <a href="{{ route('admin.fates.create') }}" class="btn btn-success">@lang('admin.defaults.create')</a>
        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('admin.defaults.list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($fates) > 0 ? 'datatable' : '' }} @can('admin-fate-delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can ('admin-fate-delete')
                            <th class="text-center"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang ('admin.fates.fields.name')</th>
                        <th>@lang ('admin.fates.fields.key')</th>
                        <th>@lang ('admin.fates.fields.group')</th>
                        <th>@lang ('admin.fates.fields.gumball')</th>
                        <th>@lang ('admin.fates.fields.gumball')</th>
                        <th>@lang ('admin.fates.fields.description')</th>
                        <th>@lang ('admin.fates.fields.image')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($fates as $fate)
                        <tr data-entry-id="{{ $fate->id }}">
                            @can ('admin-fate-delete')
                                <td class=""></td>
                            @endcan

                            <td>{{ $fate->name }}</td>
                            <td>{{ $fate->key }}</td>
                            <td>{{ $fate->group->name or '' }}</td>
                            <td>{{ $fate->gumballs->first()->name or '' }}</td>
                            <td>{{ $fate->gumballs->last()->name or '' }}</td>
                            <td>{{ substr($fate->description, 0, 50) . (strlen($fate->description) > 50 ? '...' : '') }}</td>
                            <td class="word-break-all">{{ $fate->image or '' }}</td>
                            <td>
                                @can ('admin-fate-view')
                                    <a href="{{ route('admin.fates.show',[$fate->id]) }}" class="btn btn-xs btn-primary">@lang('admin.defaults.view')</a>
                                @endcan

                                @can ('admin-fate-edit')
                                    <a href="{{ route('admin.fates.edit',[$fate->id]) }}" class="btn btn-xs btn-info">@lang('admin.defaults.edit')</a>
                                @endcan

                                @can ('admin-fate-delete')
                                    {!! Form::open(
                                        [
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('" . trans('admin.defaults.confirm') . "');",
                                            'route' => ['admin.fates.destroy', $fate->id]
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
        @can ('admin-fate-delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.fates.mass_destroy') }}';
        @endcan
    </script>
@endsection
