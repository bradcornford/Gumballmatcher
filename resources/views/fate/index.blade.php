@extends('layouts.app')

@section('content')
    <h3 class="page-title">
        @lang('app.fate.title')
        <span class="small pull-right">
            ({{ $user->fates->count() }} / {{ $fates->count() }})
        </span>
    </h3>

    {!! Form::open(['method' => 'POST', 'route' => ['fate.store']]) !!}

        {{ csrf_field() }}
        {{ Form::hidden('user_id', $user->id) }}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('admin.defaults.list')
            </div>

            <div class="panel-body table-responsive">
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
                                    <button type="button" class="btn btn-primary btn-sm" data-display="linked" data-display-state="true" >
                                        @lang('app.defaults.linked')
                                    </button>

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="checkbox" data-toggle-state="true" >
                                        @lang('app.defaults.checkbox')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @forelse ($groups as $group)
                    <h4>
                        @if ($group->image)<img src="{{ $group->image }}" height="40" title="{{ $group->name }}" data-toggle="tooltip">@endif
                        {{ $group->name }}
                        <span class="small pull-right">
                            ({{ $user->fates->where('group_id', $group->id)->count() }} / {{ $group->fates->count() }})
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
                                        @lang('app.fate.fields.name')
                                    </th>
                                    <th>
                                        @lang('app.fate.fields.gumballs')
                                    </th>
                                    <th>
                                        @lang('app.fate.fields.linked')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($group->fates->sortBy('name') as $fate)
                                    @define $linked = $user->fates->where('id', $fate->id)

                                    <tr data-display-item="linked" data-display-item-state="{{ ($linked->count() > 0 ? 'true' : 'false') }}">
                                         <td>
                                             @if ($fate->image)<img src="{{ $fate->image }}" height="40" title="{{ $fate->name }}" data-toggle="tooltip">@endif
                                         </td>
                                         <td>
                                             {{ $fate->name }}
                                         </td>
                                         <td>
                                             <ul class="small list-unstyled">
                                                 @forelse ($fate->gumballs as $gumball)
                                                     <li>
                                                         @if ($gumball->image)<img src="{{ $gumball->image }}" height="25" title="{{ $gumball->name }}" data-toggle="tooltip">@endif
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
                                             {{ Form::checkbox('fates', $fate->id, ($linked->count() || old('fates[' . $fate->id . ']') ? true : false), ['name' => 'fates[]', 'data-toggle-item' => 'checkbox']) }}
                                         </td>
                                     </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            @lang('app.defaults.no-items')
                                        </td>
                                    </tr>
                                @endforelse

                                <tr class="hidden" data-display-item-none>
                                    <td colspan="6">
                                        @lang('app.defaults.no-items')
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @empty
                    <h4>
                        @lang('app.defaults.no-items')
                    </h4>
                @endforelse
            </div>
        </div>

        <a class="btn btn-link" href="{{ route('index') }}">
            @lang('app.index.title')
        </a>
        {!! Form::submit(trans('app.fate.actions.store'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@endsection
