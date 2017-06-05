@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            @lang('fate.title')
                            <span class="small pull-right">
                                ({{ $user->fates->count() }} / {{ $fates->count() }})
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

                                <form class="form-horizontal" role="form" method="POST" action="{{ route('fate') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{ $user->id }}"/>

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
                                                        <button type="button" class="btn btn-primary btn-sm" data-display="linked" data-display-state="true" >
                                                            @lang('fate.link.linked')
                                                        </button>

                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="checkbox" data-toggle-state="true" >
                                                            @lang('fate.link.checkbox')
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @forelse ($groups as $group)
                                        <h3>
                                            @if ($group->image)<img src="{{ $group->image }}" height="40" title="{{ $group->name }}">@endif
                                            {{ $group->name }}
                                            <span class="small pull-right">
                                                ({{ $user->fates->where('group_id', $group->id)->count() }} / {{ $group->fates->count() }})
                                            </span>
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
                                                            @lang('default.field.completed')
                                                        </th>
                                                        <th>
                                                            @lang('default.field.linked')
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($group->fates->sortBy('name') as $fate)
                                                        @define $linked = $user->fates->where('id', $fate->id)

                                                        <tr data-display-item="linked" data-display-item-state="{{ ($linked->count() > 0 ? 'true' : 'false') }}">
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
                                                                 @if ($linked->count())
                                                                     {{ $linked->first()->updated_at->format('d-m-Y') }}
                                                                 @else
                                                                     -
                                                                 @endif
                                                             </td>
                                                             <td>
                                                                <input type="checkbox" name="fates[]" value="{{ $fate->id }}" data-toggle-item="checkbox" {{ ($linked->count() || old('fates[' . $fate->id . ']') ? 'checked' : '') }} />
                                                             </td>
                                                         </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6">
                                                                @lang('default.table.no-items')
                                                            </td>
                                                        </tr>
                                                    @endforelse

                                                    <tr class="hidden" data-display-item-none>
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

                                            <button type="submit" class="btn btn-primary pull-right">
                                                @lang('fate.action.store')
                                            </button>
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
