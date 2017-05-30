@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            @lang('gumball.title')
                            <span class="small pull-right">
                                ({{ $user->gumballs->count() }} / {{ $gumballs->count() }})
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

                                <form class="form-horizontal" role="form" method="POST" action="{{ route('gumball') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user" value="{{ $user->id }}"/>

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
                                                            @lang('gumball.link.unlocked')
                                                        </button>

                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="checkbox" data-toggle-state="true" >
                                                            @lang('gumball.link.checkbox')
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @forelse ($factions as $faction)
                                        <h3>
                                            @if ($faction->image)<img src="{{ $faction->image }}" height="40" title="{{ $faction->name }}">@endif
                                            {{ $faction->name }}
                                            <span class="small pull-right">
                                                ({{ $user->factionGumballs($faction->id)->count() }} / {{ $faction->gumballs()->count() }})
                                            </span>
                                        </h3>

                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            &nbsp;
                                                        </th>
                                                        <th>
                                                            @lang('default.field.name')
                                                        </th>
                                                        <th>
                                                            @lang('default.field.unlocked')
                                                        </th>
                                                        <th>
                                                            @lang('default.field.owned')
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
                                                                @if ($unlocked->count())
                                                                    {{ $unlocked->first()->updated_at->format('d-m-Y') }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" name="gumballs[]" value="{{ $gumball->id }}" data-toggle-item="checkbox" {{ ($unlocked->count() || old('gumballs[' . $gumball->id . ']') ? 'checked' : '') }} />
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">
                                                                @lang('default.table.no-items')
                                                            </td>
                                                        </tr>
                                                    @endforelse

                                                    <tr class="hidden" data-display-item-none>
                                                        <td colspan="5">
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
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                @lang('gumball.action.store')
                                            </button>

                                            <a class="btn btn-link" href="{{ route('home') }}">
                                                @lang('index.title')
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
