@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang ('admin.groups.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang ('admin.defaults.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang ('admin.groups.fields.name')</th>
                            <td>{{ $group->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang ('admin.groups.fields.key')</th>
                            <td>{{ $group->key }}</td>
                        </tr>
                        <tr>
                            <th>@lang ('admin.groups.fields.description')</th>
                            <td>{{ $group->description or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang ('admin.groups.fields.image')</th>
                            <td>{{ $group->image or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#fates" aria-controls="fates" role="tab" data-toggle="tab">@lang ('admin.fates.title')</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="fates">
                    <table class="table table-bordered table-striped {{ count($fates) > 0 ? 'datatable' : '' }}">
                        <thead>
                            <tr>
                                <th>@lang ('admin.fates.fields.name')</th>
                                <th>@lang ('admin.fates.fields.key')</th>
                                <th>@lang ('admin.fates.fields.description')</th>
                                <th>@lang ('admin.fates.fields.image')</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($fates as $fate)
                                <tr data-entry-id="{{ $fate->id }}">
                                    <td>{{ $fate->name }}</td>
                                    <td>{{ $fate->key }}</td>
                                    <td>{{ substr($fate->description, 0, 50) . (strlen($fate->description) > 50 ? '...' : '') }}</td>
                                    <td class="word-break-all">{{ $fate->image or '' }}</td>
                                    <td>
                                        @can ('admin-fate-view', $fate)
                                            <a href="{{ route('admin.fates.show',[$fate->id]) }}" class="btn btn-xs btn-primary">@lang ('admin.defaults.view')</a>
                                        @endcan

                                        @can ('admin-fate-edit', $fate)
                                            <a href="{{ route('admin.fates.edit',[$fate->id]) }}" class="btn btn-xs btn-info">@lang ('admin.defaults.edit')</a>
                                        @endcan

                                        @can ('admin-fate-delete', $fate)
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

    <a class="btn btn-link" href="{{ route('admin.groups.index') }}">
        @lang ('admin.defaults.back')
    </a>
@stop
