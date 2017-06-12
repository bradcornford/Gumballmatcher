@extends('layouts.app')

@section('content')
    <h3 class="page-title">
        @lang('app.gumball.title')
        <span class="small pull-right">
            ({{ $user->gumballs->count() }} / {{ $gumballs->count() }})
        </span>
    </h3>

    {!! Form::open(['method' => 'POST', 'route' => ['gumball.store']]) !!}

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

                @foreach ($errors->all() as $message)
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @endforeach

                <div class="row">
                    <div class="col-md-12">
                        <div class="well">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-6 text-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-display="unlocked" data-display-state="true" >
                                        @lang('app.defaults.owned')
                                    </button>

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="checkbox" data-toggle-state="true" >
                                        @lang('app.defaults.checkbox')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @forelse ($factions as $faction)
                    <h4>
                        @if ($faction->image)<img src="{{ $faction->image }}" height="40" title="{{ $faction->name }}">@endif
                        {{ $faction->name }}
                        <span class="small pull-right">
                            ({{ $user->factionGumballs($faction->id)->count() }} / {{ $faction->gumballs()->count() }})
                        </span>
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-condensed table-row-toggle">
                            <thead>
                                <tr>
                                    <th class="table-icon-column">
                                        &nbsp;
                                    </th>
                                    <th>
                                        @lang('app.gumball.fields.name')
                                    </th>
                                    <th>
                                        @lang('app.gumball.fields.owned')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faction->gumballs as $gumball)
                                    @define $unlocked = $user->gumballs->where('id', $gumball->id)

                                    <tr data-display-item="unlocked" data-display-item-state="{{ ($unlocked->count() > 0 ? 'true' : 'false') }}">
                                        <td>
                                            @if ($gumball->image)<img src="{{ $gumball->image }}" height="40" title="{{ $gumball->name }}">@endif
                                        </td>
                                        <td>
                                            {{ $gumball->name }}
                                        </td>
                                        <td>
                                            {{ Form::checkbox('gumballs', $gumball->id, ($unlocked->count() || old('gumballs[' . $gumball->id . ']') ? true : false), ['name' => 'gumballs[]', 'data-toggle-item' => 'checkbox']) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            @lang('app.defaults.no-items')
                                        </td>
                                    </tr>
                                @endforelse

                                <tr class="hidden" data-display-item-none>
                                    <td colspan="5">
                                        @lang('app.defaults.no-items')
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @empty
                    <h4>
                        @lang('default.table.no-items')
                    </h4>
                @endforelse
            </div>
        </div>

        <a class="btn btn-link" href="{{ route('index') }}">
            @lang('app.index.title')
        </a>
        {!! Form::submit(trans('app.gumball.actions.store'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@endsection
