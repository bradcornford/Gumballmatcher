@extends('layouts.app')

@section('content')
    @define $userFates = $user->fates->pluck('id')

    <h3 class="page-title">
        @lang('app.match.title')
        <span class="small pull-right">
            ({{ $fates->whereNotIn('id', $userFates)->count() }})
        </span>
    </h3>

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

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
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

                    {!! Form::open(['method' => 'GET', 'route' => ['match.show']]) !!}

                        {{ csrf_field() }}

                        @if ($alliance)
                            @define $allianceGumballs = $alliance->gumballs($user->id)->get()

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-6">
                                                {!! Form::label('alliance_user', trans('app.match.fields.user'), ['class' => 'control-label']) !!}
                                                {{ Form::select('alliance_user', $allianceUsers, null, ['class' => 'form-control select2', 'data-toggle' => 'li']) }}
                                            </div>

                                            <div class="col-md-6 text-right">
                                                {!! Form::submit(trans('app.match.actions.show'), ['class' => 'btn btn-primary btn-sm']) !!}

                                                <button type="button" class="btn btn-primary btn-sm" data-display="unavailable" data-display-state="true" >
                                                    @lang('app.defaults.unavailable')
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    {!! Form::close() !!}

    {!! Form::open(['method' => 'POST', 'route' => ['match.store']]) !!}

        {{ csrf_field() }}
        {{ Form::hidden('user_id', $user->id) }}

                        @forelse ($groups as $group)
                            @define $count = 0

                            <h3>
                                @if ($group->image)<img src="{{ $group->image }}" height="40" title="{{ $group->name }}" data-toggle="tooltip">@endif
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
                                                 <td class="text-center">
                                                     @if ($fate->image)<img src="{{ $fate->image }}" height="40" title="{{ $fate->name }}" data-toggle="tooltip">@endif
                                                 </td>
                                                 <td>
                                                     {{ $fate->name }}
                                                 </td>
                                                 <td>
                                                     <ul class="small list-unstyled">
                                                         @forelse ($fate->gumballs as $gumball)
                                                             <li>
                                                                 @if ($user->gumballs->where('id', '=', $gumball->id)->count())
                                                                     <span class="glyphicon glyphicon-ok text-success" title="{{ trans_choice('app.defaults.user-gumball', true) }}" data-toggle="tooltip"></span>
                                                                 @else
                                                                     <span class="glyphicon glyphicon-remove text-danger" title="{{ trans_choice('app.defaults.user-gumball', false) }}" data-toggle="tooltip"></span>
                                                                 @endif
                                                                 @if ($gumball->image)
                                                                     <img src="{{ $gumball->image }}" height="25" title="{{ $gumball->name }}" data-toggle="tooltip">
                                                                 @else
                                                                     <span class="image-placeholder glyphicon glyphicon-question-sign" title="{{ $gumball->name }}" data-toggle="tooltip"></span>
                                                                 @endif
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
                                                         <span class="glyphicon glyphicon-ok text-success" title="{{ trans_choice('app.defaults.alliance-fate', true) }}" data-toggle="tooltip"></span>
                                                     @else
                                                         <span class="glyphicon glyphicon-remove text-danger" title="{{ trans_choice('app.defaults.alliance-fate', false) }}" data-toggle="tooltip"></span>
                                                     @endif
                                                 </td>
                                                 <td data-toggle-item="li">
                                                     <ol class="small list-unstyled">
                                                         @if ($allianceFate)
                                                             @forelse ($alliance->getFateUsersByGumballs($fate->gumballs->pluck('id'), $user) as $allianceUser)
                                                                 <li data-toggle-item-value=":{{ strtolower($allianceUser->username) }}:">
                                                                     @if ($allianceUser->fates->where('id', '=', $fate->id)->count())
                                                                         <span class="glyphicon glyphicon-ok text-success" title="{{ trans_choice('app.defaults.alliance-user-fate', true) }}" data-toggle="tooltip"></span>
                                                                     @else
                                                                         <span class="glyphicon glyphicon-remove text-danger" title="{{ trans_choice('app.defaults.alliance-user-fate', false) }}" data-toggle="tooltip"></span>
                                                                     @endif
                                                                     {{ $allianceUser->name }} ({{ $allianceUser->username }})
                                                                 </li>
                                                             @empty
                                                                 <li class="list-unstyled" data-toggle-item-value="">
                                                                     -
                                                                 </li>
                                                             @endforelse
                                                         @else
                                                             <li class="list-unstyled" data-toggle-item-value="">
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
