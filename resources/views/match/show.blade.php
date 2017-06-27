@extends('layouts.app')

@section('content')
    @define $userFates = $user->fates->pluck('id')

    <h3 class="page-title">
        @lang('app.match.title') -
        <span class="text-info">{{ $user->name_username }}</span>
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

                    @define $authUserGumballs = []

                    @if ($alliance)
                        @define $authUserGumballs = $authUser->gumballs
                    @endif

                    <a class="btn btn-link" href="{{ route('match.index') }}">
                        @lang('app.defaults.back')
                    </a>

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
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($group->fates->whereNotIn('id', $userFates)->sortBy('name') as $fate)
                                        @define $authUserFate = false

                                        @if ($authUserGumballs && $fate->gumballs->count() > 1)
                                            @if ($authUserGumballs->where('id', $fate->gumballs->first()->id)->count() && $user->gumballs->where('id', $fate->gumballs->last()->id)->count())
                                                @define $authUserFate = true
                                            @else
                                                @if ($authUserGumballs->where('id', $fate->gumballs->last()->id)->count() && $user->gumballs->where('id', $fate->gumballs->first()->id)->count())
                                                    @define $authUserFate = true
                                                @endif
                                            @endif
                                        @endif

                                        @if ($authUserFate)
                                            @define $count++
                                        @endif

                                        <tr class="{{ !$authUserFate ? 'hidden' : '' }}">
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
                                                                 <span class="glyphicon glyphicon-ok text-success" title="{{ trans_choice('app.defaults.alliance-gumball', true) }}" data-toggle="tooltip"></span>
                                                             @else
                                                                 <span class="glyphicon glyphicon-remove text-danger" title="{{ trans_choice('app.defaults.alliance-gumball', false) }}" data-toggle="tooltip"></span>
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
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                @lang('app.defaults.no-items')
                                            </td>
                                        </tr>
                                    @endforelse

                                    <tr class="@if ($count > 0) hidden @endif" data-display-item-none>
                                        <td colspan="3">
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
@endsection
