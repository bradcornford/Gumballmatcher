@extends('admin.layouts.app')

@section('content')
    <h3 class="page-title">@lang('admin.fates.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.fates.store']]) !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('admin.defaults.create')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-fate">
                        {!! Form::label('name', trans('admin.fates.fields.name') . '*', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'autofocus' => '']) !!}

                        @if ($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-fate">
                        {!! Form::label('key', trans('admin.fates.fields.key') . '*', ['class' => 'control-label']) !!}
                        {!! Form::text('key', old('key'), ['class' => 'form-control form-input-key', 'style' => 'text-transform: uppercase;', 'placeholder' => '', 'required' => '']) !!}

                        @if ($errors->has('key'))
                            <span class="help-block">
                                {{ $errors->first('key') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('group_id') ? ' has-error' : '' }}">
                        {!! Form::label('group_id', trans('admin.fates.fields.group') . '*', ['class' => 'control-label']) !!}
                        {{ Form::select('group_id', $groups, old('group_id'), ['class' => 'form-control', 'required' => '']) }}

                        @if($errors->has('group_id'))
                            <span class="help-block">
                                {{ $errors->first('group_id') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('gumballs') ? ' has-error' : '' }}">
                        {!! Form::label('gumballs', trans('admin.fates.fields.gumball') . '*', ['class' => 'control-label']) !!}
                        {{ Form::select('gumballs', $gumballs, old('gumballs')[0], ['name' => 'gumballs[]', 'class' => 'form-control']) }}

                        @if($errors->has('gumballs'))
                            <span class="help-block">
                                {{ $errors->first('gumballs') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('gumballs') ? ' has-error' : '' }}">
                        {!! Form::label('gumballs', trans('admin.fates.fields.gumball') . '*', ['class' => 'control-label']) !!}
                        {{ Form::select('gumballs', $gumballs, old('gumballs')[1], ['name' => 'gumballs[]', 'class' => 'form-control']) }}

                        @if($errors->has('gumballs'))
                            <span class="help-block">
                                {{ $errors->last('gumballs') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-fate">
                        {!! Form::label('description', trans('admin.fates.fields.description'), ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}

                        @if ($errors->has('description'))
                            <span class="help-block">
                                {{ $errors->first('description') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-fate">
                        {!! Form::label('image', trans('admin.fates.fields.image'), ['class' => 'control-label']) !!}
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

        <a class="btn btn-link" href="{{ route('admin.fates.index') }}">
            @lang('admin.defaults.back')
        </a>
        {!! Form::submit(trans('admin.defaults.save'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@stop
