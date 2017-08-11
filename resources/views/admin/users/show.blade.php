@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang ('admin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang ('admin.defaults.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang ('admin.users.fields.name')</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang ('admin.users.fields.email')</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang ('admin.users.fields.role')</th>
                            <td>{{ $user->role->name or '-' }}</td>
                        </tr>
                        <tr>
                            <th>@lang ('admin.users.fields.username')</th>
                            <td>{{ $user->username or '-' }}</td>
                        </tr>
                        <tr>
                            <th>@lang ('admin.users.fields.alliance')</th>
                            <td>{{ $user->alliance->name or '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#gumballs" aria-controls="gumballs" role="tab" data-toggle="tab">@lang ('admin.gumballs.title')</a></li>
                <li role="presentation"><a href="#fates" aria-controls="fates" role="tab" data-toggle="tab">@lang ('admin.fates.title')</a></li>
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

                <div role="tabpanel" class="tab-pane" id="fates">
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
                                        <a href="{{ route('admin.fates.show', [$fate->id]) }}" class="btn btn-xs btn-primary">@lang ('admin.defaults.view')</a>
                                    @endcan

                                    @can ('admin-fate-edit', $fate)
                                        <a href="{{ route('admin.fates.edit', [$fate->id]) }}" class="btn btn-xs btn-info">@lang ('admin.defaults.edit')</a>
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

    <a class="btn btn-link" href="{{ route('admin.users.index') }}">
        @lang ('admin.defaults.back')
    </a>
@stop
