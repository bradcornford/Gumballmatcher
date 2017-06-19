@extends('admin.layouts.app')

@section('content')
    <h3 class="page-title">@lang('admin.fates.title')</h3>

    {!! Form::model($fate, ['method' => 'PUT', 'route' => ['admin.fates.update', $fate->id]]) !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('admin.defaults.edit')
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
                        {{ Form::select('group_id', $groups, old('group_id', $fate->group_id), ['class' => 'form-control select2', 'required' => '']) }}

                        @if($errors->has('group_id'))
                            <span class="help-block">
                                {{ $errors->first('group_id') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('gumballs.0') ? ' has-error' : '' }}">
                        {!! Form::label('gumballs', trans('admin.fates.fields.gumball') . '*', ['class' => 'control-label']) !!}
                        {{ Form::select('gumballs', $gumballs, old('gumballs.0', ($fateGumballs->count() ? $fateGumballs->first()->id : '')), ['name' => 'gumballs[]', 'class' => 'form-control select2']) }}

                        @if($errors->has('gumballs.0'))
                            <span class="help-block">
                                {{ $errors->first('gumballs.0') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('gumballs.1') ? ' has-error' : '' }}">
                        {!! Form::label('gumballs', trans('admin.fates.fields.gumball') . '*', ['class' => 'control-label']) !!}
                        {{ Form::select('gumballs', $gumballs, old('gumballs.1', ($fateGumballs->count() ? $fateGumballs->last()->id : '')), ['name' => 'gumballs[]', 'class' => 'form-control select2']) }}

                        @if($errors->has('gumballs.1'))
                            <span class="help-block">
                                {{ $errors->first('gumballs.1') }}
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
        {!! Form::submit(trans('admin.defaults.update'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@stop
