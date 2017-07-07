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
        </div>
    </div>

    <a class="btn btn-link" href="{{ route('admin.users.index') }}">
        @lang ('admin.defaults.back')
    </a>
@stop
