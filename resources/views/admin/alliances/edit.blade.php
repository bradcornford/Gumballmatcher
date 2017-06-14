@extends('admin.layouts.app')

@section('content')
    <h3 class="page-title">@lang('admin.alliances.title')</h3>

    {!! Form::model($alliance, ['method' => 'PUT', 'route' => ['admin.alliances.update', $alliance->id]]) !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('admin.defaults.edit')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('name', trans('admin.alliances.fields.name') . '*', ['class' => 'control-label']) !!}
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
                        {!! Form::label('key', trans('admin.alliances.fields.key') . '*', ['class' => 'control-label']) !!}
                        {!! Form::text('key', old('key'), ['class' => 'form-control form-input-key', 'style' => 'text-transform: uppercase;', 'placeholder' => '', 'required' => '']) !!}

                        @if ($errors->has('key'))
                            <span class="help-block">
                                {{ $errors->first('key') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('level', trans('admin.alliances.fields.level') . '*', ['class' => 'control-label']) !!}
                        {!! Form::number('level', old('level'), ['class' => 'form-control', 'min' => 1, 'max' => 20, 'placeholder' => '', 'required' => '']) !!}

                        @if ($errors->has('level'))
                            <span class="help-block">
                                {{ $errors->first('level') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('description', trans('admin.alliances.fields.description'), ['class' => 'control-label']) !!}
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
                        {!! Form::label('image', trans('admin.alliances.fields.image'), ['class' => 'control-label']) !!}
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

        <a class="btn btn-link" href="{{ route('admin.alliances.index') }}">
            @lang('admin.defaults.back')
        </a>
        {!! Form::submit(trans('admin.defaults.update'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@stop
