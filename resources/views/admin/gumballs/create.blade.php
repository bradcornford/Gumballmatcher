@extends('admin.layouts.app')

@section('content')
    <h3 class="page-title">@lang('admin.gumballs.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.gumballs.store']]) !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('admin.defaults.create')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('name', trans('admin.gumballs.fields.name') . '*', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'autofocus' => '']) !!}

                        @if ($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('key', trans('admin.gumballs.fields.key') . '*', ['class' => 'control-label']) !!}
                        {!! Form::text('key', old('key'), ['class' => 'form-control form-input-key', 'style' => 'text-transform: uppercase;', 'placeholder' => '', 'required' => '']) !!}

                        @if ($errors->has('key'))
                            <span class="help-block">
                                {{ $errors->first('key') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('faction_id') ? ' has-error' : '' }}">
                        {!! Form::label('faction_id', trans('admin.gumballs.fields.faction') . '*', ['class' => 'control-label']) !!}
                        {{ Form::select('faction_id', $factions, old('faction_id'), ['class' => 'form-control', 'required' => '']) }}

                        @if($errors->has('faction_id'))
                            <span class="help-block">
                                {{ $errors->first('faction_id') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('description', trans('admin.gumballs.fields.description'), ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}

                        @if ($errors->has('description'))
                            <span class="help-block">
                                {{ $errors->first('description') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('image', trans('admin.gumballs.fields.image'), ['class' => 'control-label']) !!}
                        {!! Form::text('image', old('image'), ['class' => 'form-control', 'placeholder' => '']) !!}

                        @if ($errors->has('image'))
                            <span class="help-block">
                                {{ $errors->first('image') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-link" href="{{ route('admin.gumballs.index') }}">
            @lang('admin.defaults.back')
        </a>
        {!! Form::submit(trans('admin.defaults.save'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@stop
