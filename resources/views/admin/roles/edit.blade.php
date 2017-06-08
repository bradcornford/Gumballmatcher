@extends('admin.layouts.app')

@section('content')
    <h3 class="page-title">@lang('admin.roles.title')</h3>

    {!! Form::model($role, ['method' => 'PUT', 'route' => ['admin.roles.update', $role->id]]) !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('admin.defaults.edit')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('name', trans('admin.roles.fields.name') . '*', ['class' => 'control-label']) !!}
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
                        {!! Form::label('key', trans('admin.roles.fields.key') . '*', ['class' => 'control-label']) !!}
                        {!! Form::text('key', old('key'), ['class' => 'form-control', 'style' => 'text-transform: uppercase;', 'placeholder' => '', 'required' => '']) !!}

                        @if ($errors->has('key'))
                            <span class="help-block">
                                {{ $errors->first('key') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-link" href="{{ route('admin.roles.index') }}">
            @lang('admin.defaults.back')
        </a>
        {!! Form::submit(trans('admin.defaults.update'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@stop
