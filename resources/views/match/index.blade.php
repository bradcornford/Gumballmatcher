@extends('layouts.app')

@section('content')
    @define $userFates = $user->fates->pluck('id')

    <h3 class="page-title">
        @lang('app.match.title')
        <span class="small pull-right">
            ({{ $fates->whereNotIn('id', $userFates)->count() }})
        </span>
    </h3>

    {!! Form::open(['method' => 'POST', 'route' => ['match.store']]) !!}

        {{ csrf_field() }}
        {{ Form::hidden('user_id', $user->id) }}

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
                        @foreach ($errors->all() as $message)
                            <span class="help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @endforeach

                        @define $allianceGumballs = []

                        @if ($alliance)
                            @define $allianceGumballs = $alliance->gumballs($user->id)->get()

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="alliance-user" class="control-label">@lang('app.match.fields.user')</label>
                                                <select name="alliance-user" data-query="li">
                                                    <option value="">@lang('app.match.fields.all')</option>

                                                    @foreach ($alliance->users->whereNotIn('id', [$user->id])->sortBy('name') as $allianceUser)
                                                        <option value="{{ strtolower($allianceUser->name) }}">{{ $allianceUser->name }} ({{ $allianceUser->username }})</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 text-right">
                                                <button type="button" class="btn btn-primary btn-sm" data-display="unavailable" data-display-state="true" >
                                                    @lang('app.defaults.unavailable')
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @forelse ($groups as $group)
                            @define $count = 0

                            <h3>
                                @if ($group->image)<img src="{{ $group->image }}" height="40" title="{{ $group->name }}">@endif
                                {{ $group->name }}
                            </h3>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-condensed table-row-toggle">
                                    <thead>
                                        <tr>
                                            <th class="table-icon-column">
                                                &nbsp;
                                            </th>
                                            <th>
                                                @lang('app.match.fields.name')
                                            </th>
                                            <th>
                                                @lang('app.match.fields.gumballs')
                                            </th>
                                            <th>
                                                @lang('app.match.fields.available')
                                            </th>
                                            <th>
                                                @lang('app.match.fields.matches')
                                            </th>
                                            <th>
                                                @lang('app.match.fields.matched')
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($group->fates->whereNotIn('id', $userFates)->sortBy('name') as $fate)
                                            @define $allianceFate = false

                                            @if ($allianceGumballs && $fate->gumballs->count() > 1)
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
                                                     <ul class="small list-unstyled">
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
                                                     <ol class="small list-unstyled">
                                                         @if ($allianceFate)
                                                             @forelse ($alliance->getFateUsersByGumballs($fate->gumballs->pluck('id'), $user) as $allianceUser)
                                                                 <li data-query-item-value=":{{ strtolower($allianceUser->name) }}:">
                                                                     @if ($allianceUser->fates->where('id', '=', $fate->id)->count())
                                                                         <span class="glyphicon glyphicon-ok text-success"></span>
                                                                     @else
                                                                         <span class="glyphicon glyphicon-remove text-danger"></span>
                                                                     @endif
                                                                     {{ $allianceUser->name }} ({{ $allianceUser->username }})
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
                                                 <td>
                                                     {{ Form::checkbox('fates', $fate->id, false, ['name' => 'fates[]', 'data-toggle-item' => 'checkbox']) }}
                                                 </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">
                                                    @lang('app.defaults.no-items')
                                                </td>
                                            </tr>
                                        @endforelse

                                        <tr class="@if ($count > 0) hidden @endif" data-display-item-none>
                                            <td colspan="6">
                                                @lang('app.defaults.no-items')
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @empty
                            <h3>
                                @lang('app.defaults.no-items')
                            </h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-link" href="{{ route('index') }}">
            @lang('app.index.title')
        </a>
        {!! Form::submit(trans('app.match.actions.store'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@endsection
