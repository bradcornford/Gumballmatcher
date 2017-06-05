@extends('layouts.app')

@section('content')
    @define $userFates = $user->fates->pluck('id')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            @lang('match.title')
                            <span class="small pull-right">
                                ({{ $fates->whereNotIn('id', $userFates)->count() }})
                            </span>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @foreach ($errors->all() as $message)
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endforeach

                                @define $allianceGumballs = $alliance->gumballs($user->id)->get()

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="alliance-user" class="control-label">@lang('match.field.alliance-user')</label>
                                                    <select name="alliance-user" data-query="li">
                                                        <option value="">@lang('default.field.all')</option>

                                                        @foreach ($alliance->users->whereNotIn('id', [$user->id])->sortBy('name') as $allianceUser)
                                                            <option value="{{ strtolower($allianceUser->name) }}">{{ $allianceUser->name }} - {{ $allianceUser->username }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6 text-right">
                                                    <button type="button" class="btn btn-primary btn-sm" data-display="unavailable" data-display-state="true" >
                                                        @lang('match.link.unavailable')
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @forelse ($groups as $group)
                                    @define $count = 0

                                    <h3>
                                        @if ($group->image)<img src="{{ $group->image }}" height="40" title="{{ $group->name }}">@endif
                                        {{ $group->name }}
                                    </h3>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th style="width: 60px;">
                                                        &nbsp;
                                                    </th>
                                                    <th>
                                                        @lang('default.field.name')
                                                    </th>
                                                    <th>
                                                        @lang('default.field.gumballs')
                                                    </th>
                                                    <th>
                                                        @lang('default.field.available')
                                                    </th>
                                                    <th>
                                                        @lang('default.field.matches')
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($group->fates->whereNotIn('id', $userFates)->sortBy('name') as $fate)
                                                    @define $allianceFate = false

                                                    @if ($fate->gumballs->count() > 1)
                                                        @if ($allianceGumballs->where('id', $fate->gumballs->first()->id)->count() && $user->gumballs->where('id', $fate->gumballs->last()->id)->count())
                                                            @define $allianceFate = true
                                                        @else
                                                            @if ($allianceGumballs->where('id', $fate->gumballs->last()->id)->count() && $user->gumballs->where('id', $fate->gumballs->first()->id)->count())
                                                                @define $allianceFate = true
                                                            @endif
                                                        @endif
                                                    @endif

                                                    @if ($allianceFate)
                                                        @define $count++
                                                    @endif

                                                    <tr data-display-item="unavailable" data-display-item-state="{{ (!$allianceFate ? 'true' : 'false') }}" class="{{ !$allianceFate ? 'hidden' : '' }}">
                                                         <td>
                                                             @if ($fate->image)<img src="{{ $fate->image }}" height="40" title="{{ $fate->name }}">@endif
                                                         </td>
                                                         <td>
                                                             {{ $fate->name }}
                                                         </td>
                                                         <td>
                                                             <ul class="small">
                                                                 @forelse ($fate->gumballs as $gumball)
                                                                     <li>
                                                                         @if ($user->gumballs->where('id', '=', $gumball->id)->count())
                                                                             <span class="glyphicon glyphicon-ok text-success"></span>
                                                                         @else
                                                                             <span class="glyphicon glyphicon-remove text-danger"></span>
                                                                         @endif
                                                                         @if ($gumball->image)<img src="{{ $gumball->image }}" height="25" title="{{ $gumball->name }}">@endif
                                                                         {{ $gumball->name }}
                                                                     </li>
                                                                 @empty
                                                                     <li class="list-unstyled">
                                                                         -
                                                                     </li>
                                                                 @endforelse
                                                            </ul>
                                                         </td>
                                                         <td>
                                                             @if ($allianceFate)
                                                                 <span class="glyphicon glyphicon-ok text-success"></span>
                                                             @else
                                                                 <span class="glyphicon glyphicon-remove text-danger"></span>
                                                             @endif
                                                         </td>
                                                         <td data-query-item="li">
                                                             <ol class="small">
                                                                 @if ($allianceFate)
                                                                     @forelse ($alliance->getFateUsersByGumballs($fate->gumballs->pluck('id'), $user) as $allianceUser)
                                                                         <li data-query-item-value=":{{ strtolower($allianceUser->name) }}:">
                                                                             {{ $allianceUser->name }}
                                                                         </li>
                                                                     @empty
                                                                         <li class="list-unstyled" data-query-item-value="">
                                                                             -
                                                                         </li>
                                                                     @endforelse
                                                                 @else
                                                                     <li class="list-unstyled" data-query-item-value="">
                                                                         -
                                                                     </li>
                                                                 @endif
                                                             </ol>
                                                         </td>
                                                     </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6">
                                                            @lang('default.table.no-items')
                                                        </td>
                                                    </tr>
                                                @endforelse

                                                <tr class="@if ($count > 0) hidden @endif" data-display-item-none>
                                                    <td colspan="6">
                                                        @lang('default.table.no-items')
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr>
                                @empty
                                    <h3>
                                        @lang('default.table.no-items')
                                    </h3>
                                @endforelse

                                <div class="form-group">
                                    <div class="col-md-12">
                                         <a class="btn btn-link" href="{{ route('index') }}">
                                            @lang('index.title')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
