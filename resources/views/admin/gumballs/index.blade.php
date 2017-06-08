@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang('admin.gumballs.title')</h3>

    @can ('admin-gumball-create')
        <p class="text-right">
            <a href="{{ route('admin.gumballs.create') }}" class="btn btn-success">@lang('admin.defaults.create')</a>
        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('admin.defaults.list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($gumballs) > 0 ? 'datatable' : '' }} @can('admin-gumball-delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can ('admin-gumball-delete')
                            <th class="text-center"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang ('admin.gumballs.fields.name')</th>
                        <th>@lang ('admin.gumballs.fields.key')</th>
                        <th>@lang ('admin.gumballs.fields.faction')</th>
                        <th>@lang ('admin.gumballs.fields.description')</th>
                        <th>@lang ('admin.gumballs.fields.image')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($gumballs as $gumball)
                        <tr data-entry-id="{{ $gumball->id }}">
                            @can ('admin-gumball-delete')
                                <td class=""></td>
                            @endcan

                            <td>{{ $gumball->name }}</td>
                            <td>{{ $gumball->key }}</td>
                            <td>{{ $gumball->faction->name or '' }}</td>
                            <td>{{ substr($gumball->description, 0, 50) . (strlen($gumball->description) > 50 ? '...' : '') }}</td>
                            <td class="word-break-all">{{ $gumball->image or '' }}</td>
                            <td>
                                @can ('admin-gumball-view')
                                    <a href="{{ route('admin.gumballs.show',[$gumball->id]) }}" class="btn btn-xs btn-primary">@lang('admin.defaults.view')</a>
                                @endcan

                                @can ('admin-gumball-edit')
                                    <a href="{{ route('admin.gumballs.edit',[$gumball->id]) }}" class="btn btn-xs btn-info">@lang('admin.defaults.edit')</a>
                                @endcan

                                @can ('admin-gumball-delete')
                                    {!! Form::open(
                                        [
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('" . trans('admin.defaults.confirm') . "');",
                                            'route' => ['admin.gumballs.destroy', $gumball->id]
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
        @can ('admin-gumball-delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.gumballs.mass_destroy') }}';
        @endcan
    </script>
@endsection
