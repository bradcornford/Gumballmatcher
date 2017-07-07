@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang ('admin.factions.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang ('admin.defaults.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang ('admin.factions.fields.name')</th>
                            <td>{{ $faction->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang ('admin.factions.fields.key')</th>
                            <td>{{ $faction->key }}</td>
                        </tr>
                        <tr>
                            <th>@lang ('admin.factions.fields.description')</th>
                            <td>{{ $faction->description or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang ('admin.factions.fields.image')</th>
                            <td>{{ $faction->image or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#gumballs" aria-controls="gumballs" role="tab" data-toggle="tab">@lang ('admin.gumballs.title')</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="gumballs">
                    <table class="table table-bordered table-striped {{ count($gumballs) > 0 ? 'datatable' : '' }}">
                        <thead>
                            <tr>
                                <th>@lang ('admin.gumballs.fields.name')</th>
                                <th>@lang ('admin.gumballs.fields.key')</th>
                                <th>@lang ('admin.gumballs.fields.description')</th>
                                <th>@lang ('admin.gumballs.fields.image')</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($gumballs as $gumball)
                                <tr data-entry-id="{{ $gumball->id }}">
                                    <td>{{ $gumball->name }}</td>
                                    <td>{{ $gumball->key }}</td>
                                    <td>{{ substr($gumball->description, 0, 50) . (strlen($gumball->description) > 50 ? '...' : '') }}</td>
                                    <td style="word-break: break-all;">{{ $gumball->image or '' }}</td>
                                    <td>
                                        @can ('admin-gumball-view', $gumball)
                                            <a href="{{ route('admin.gumballs.show',[$gumball->id]) }}" class="btn btn-xs btn-primary">@lang ('admin.defaults.view')</a>
                                        @endcan

                                        @can ('admin-gumball-edit', $gumball)
                                            <a href="{{ route('admin.gumballs.edit',[$gumball->id]) }}" class="btn btn-xs btn-info">@lang ('admin.defaults.edit')</a>
                                        @endcan

                                        @can ('admin-gumball-delete', $gumball)
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
                                    <td colspan="9">
                                        @lang ('admin.defaults.no-items')
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <a class="btn btn-link" href="{{ route('admin.factions.index') }}">
        @lang ('admin.defaults.back')
    </a>
@stop
