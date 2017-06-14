@extends('admin.layouts.app')

@section('content')
    <h3 class="page-title">@lang('admin.groups.title')</h3>

    {!! Form::model($group, ['method' => 'PUT', 'route' => ['admin.groups.update', $group->id]]) !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('admin.defaults.edit')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('name', trans('admin.groups.fields.name') . '*', ['class' => 'control-label']) !!}
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
                        {!! Form::label('key', trans('admin.groups.fields.key') . '*', ['class' => 'control-label']) !!}
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
                        {!! Form::label('description', trans('admin.groups.fields.description'), ['class' => 'control-label']) !!}
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
                        {!! Form::label('image', trans('admin.groups.fields.image'), ['class' => 'control-label']) !!}
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

        <a class="btn btn-link" href="{{ route('admin.groups.index') }}">
            @lang('admin.defaults.back')
        </a>
        {!! Form::submit(trans('admin.defaults.update'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@stop
