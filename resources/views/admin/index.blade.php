@extends('admin.layouts.app')

@section('content')
    <h3 class="page-title">@lang('admin.index.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('admin.defaults.dashboard')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('admin.roles.index') }}" title="@lang('admin.roles.title')"><span class="glyphicon glyphicon-user"></span> <span class="hidden-xs">@lang('admin.roles.title')</span></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('admin.users.index') }}" title="@lang('admin.users.title')"><span class="glyphicon glyphicon-user"></span> <span class="hidden-xs">@lang('admin.users.title')</span></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('admin.alliances.index') }}" title="@lang('admin.alliances.title')"><span class="glyphicon glyphicon-king"></span> <span class="hidden-xs">@lang('admin.alliances.title')</span></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('admin.factions.index') }}" title="@lang('admin.factions.title')"><span class="glyphicon glyphicon-th-large"></span> <span class="hidden-xs">@lang('admin.factions.title')</span></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('admin.gumballs.index') }}" title="@lang('admin.gumballs.title')"><span class="glyphicon glyphicon-minus-sign"></span> <span class="hidden-xs">@lang('admin.gumballs.title')</span></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('admin.groups.index') }}" title="@lang('admin.groups.title')"><span class="glyphicon glyphicon-th-large"></span> <span class="hidden-xs">@lang('admin.groups.title')</span></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('admin.fates.index') }}" title="@lang('admin.fates.title')"><span class="glyphicon glyphicon-transfer"></span> <span class="hidden-xs">@lang('admin.fates.title')</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
