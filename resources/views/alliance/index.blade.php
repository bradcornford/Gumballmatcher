@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('app.alliance.title')</h3>

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

            @if ($alliance)
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>@lang('admin.alliances.fields.name')</th>
                                <td>{{ $alliance->name }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.alliances.fields.key')</th>
                                <td>{{ $alliance->key }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.alliances.fields.level')</th>
                                <td>{{ $alliance->level }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.alliances.fields.description')</th>
                                <td>{{ $alliance->description or '' }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.alliances.fields.image')</th>
                                <td>{{ $alliance->image or '' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover table-condensed">
                    <thead>
                        <tr>
                            <th class="table-icon-column">
                                &nbsp;
                            </th>
                            <th>
                                @lang('app.alliance.fields.key')
                            </th>
                            <th>
                                @lang('app.alliance.fields.name')
                            </th>
                            <th>
                                @lang('app.alliance.fields.level')
                            </th>
                            <th>
                                @lang('app.alliance.fields.users')
                            </th>
                            <th>
                                @lang('app.alliance.fields.created')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alliances as $alliance)
                            <tr>
                                <td>
                                    @if ($alliance->image)<img src="{{ $alliance->image }}" height="40" title="{{ $alliance->name }}" data-toggle="tooltip">@endif
                                </td>
                                <td>
                                     {{ $alliance->key }}
                                </td>
                                <td>
                                     {{ $alliance->name }}
                                </td>
                                <td>
                                     {{ $alliance->level }}
                                </td>
                                <td>
                                     {{ $alliance->users->count() }}
                                </td>
                                <td>
                                     {{ $alliance->created_at->format('d-m-Y') }}
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
