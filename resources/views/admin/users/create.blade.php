@extends ('admin.layouts.app')

@section ('content')
    <h3 class="page-title">@lang ('admin.users.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang ('admin.defaults.create')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('name', trans('admin.users.fields.name') . '*', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'autofocus' => 'autofocus']) !!}

                        @if ($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('email', trans('admin.users.fields.email') . '*', ['class' => 'control-label']) !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}

                        @if ($errors->has('email'))
                            <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">
                        {!! Form::label('role_id', trans('admin.users.fields.role') . '*', ['class' => 'control-label']) !!}
                        {{ Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control select2', 'required' => '']) }}

                        @if ($errors->has('role_id'))
                            <span class="help-block">
                                {{ $errors->first('role_id') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('username', trans('admin.users.fields.username'), ['class' => 'control-label']) !!}
                        {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '']) !!}

                        @if ($errors->has('username'))
                            <span class="help-block">
                                {{ $errors->first('username') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('alliance_id') ? ' has-error' : '' }}">
                        {!! Form::label('alliance_id', trans('admin.users.fields.alliance'), ['class' => 'control-label']) !!}
                        {{ Form::select('alliance_id', $alliances, old('alliance_id'), ['class' => 'form-control select2']) }}

                        @if ($errors->has('alliance_id'))
                            <span class="help-block">
                                {{ $errors->first('alliance_id') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        {!! Form::label('password', trans('admin.users.fields.password') . '*', ['class' => 'control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}

                        @if ($errors->has('password'))
                            <span class="help-block">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-link" href="{{ route('admin.users.index') }}">
            @lang ('admin.defaults.back')
        </a>
        {!! Form::submit(trans('admin.defaults.save'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@stop
