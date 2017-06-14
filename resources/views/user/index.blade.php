@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('app.user.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('admin.defaults.list')
        </div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('admin.users.fields.name')</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.users.fields.email')</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.users.fields.role')</th>
                            <td>{{ $user->role->name or '-' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.users.fields.username')</th>
                            <td>{{ $user->username or '-' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.users.fields.alliance')</th>
                            <td>{{ $user->alliance->name or '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-condensed">
                    <thead>
                        <tr>
                            <th class="table-icon-column">
                                &nbsp;
                            </th>
                            <th>
                                @lang('app.user.fields.name')
                            </th>
                            <th>
                                @lang('app.user.fields.username')
                            </th>
                            <th>
                                @lang('app.user.fields.gumballs')
                            </th>
                            <th>
                                @lang('app.user.fields.fates')
                            </th>
                            <th>
                                @lang('app.user.fields.created')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    @if ($user->image)<img src="{{ $user->image }}" height="40" title="{{ $user->name }}" data-toggle="tooltip">@endif
                                </td>
                                <td>
                                     {{ $user->name }}
                                </td>
                                <td>
                                     {{ $user->username }}
                                </td>
                                <td>
                                    {{ $user->gumballs()->count() }}
                                </td>
                                <td>
                                    {{ $user->fates()->count() }}
                                </td>
                                <td>
                                     {{ $user->created_at->format('d-m-Y') }}
                                </td>
                            </tr>
                        @empty
                            <td colspan="3">
                                @lang('app.defaults.no-items')
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a class="btn btn-link" href="{{ route('alliance.index') }}">
        @lang('app.index.title')
    </a>
@endsection
