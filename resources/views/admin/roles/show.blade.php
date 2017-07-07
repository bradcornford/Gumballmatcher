@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang ('admin.roles.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang ('admin.defaults.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang ('admin.roles.fields.name')</th>
                            <td>{{ $role->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang ('admin.roles.fields.key')</th>
                            <td>{{ $role->key }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="users">
                    <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }}">
                        <thead>
                            <tr>
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
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name or '-' }}</td>
                                    <td>{{ $user->username or '-' }}</td>
                                    <td>{{ $user->alliance->name or '-' }}</td>
                                    <td>
                                        @can ('admin-user-view', $user)
                                            <a href="{{ route('admin.users.show', [$user->id]) }}" class="btn btn-xs btn-primary">@lang ('admin.defaults.view')</a>
                                        @endcan

                                        @can ('admin-user-edit', $user)
                                            <a href="{{ route('admin.users.edit', [$user->id]) }}" class="btn btn-xs btn-info">@lang ('admin.defaults.edit')</a>
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

    <a class="btn btn-link" href="{{ route('admin.roles.index') }}">
        @lang ('admin.defaults.back')
    </a>
@stop
