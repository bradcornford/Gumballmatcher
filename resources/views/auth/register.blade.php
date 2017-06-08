@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {!! Form::open(['method' => 'POST', 'route' => ['register']]) !!}

        {{ csrf_field() }}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('app.register.title')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', trans('app.register.fields.name') . '*', ['class' => 'control-label']) !!}
                        {!! Form::text('name', '', ['class' => 'form-control', 'value' => old('name'), 'required' => '', 'autofocus' => '']) !!}

                        @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', trans('app.register.fields.email') . '*', ['class' => 'control-label']) !!}
                        {!! Form::email('email', '', ['class' => 'form-control', 'value' => old('email'), 'required' => '']) !!}

                        @if($errors->has('email'))
                            <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                        {!! Form::label('username', trans('app.register.fields.username') . '*', ['class' => 'control-label']) !!}
                        {!! Form::text('username', '', ['class' => 'form-control', 'value' => old('username'), 'required' => '']) !!}

                        @if($errors->has('username'))
                            <span class="help-block">
                                {{ $errors->first('username') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('alliance_id') ? ' has-error' : '' }}">
                        {!! Form::label('alliance_id', trans('app.register.fields.alliance') . '*', ['class' => 'control-label']) !!}
                        {{ Form::select('alliance_id', $alliances, old('alliance_id'), ['class' => 'form-control', 'required' => '']) }}

                        @if($errors->has('alliance_id'))
                            <span class="help-block">
                                {{ $errors->first('alliance_id') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        {!! Form::label('password', trans('app.register.fields.password') . '*', ['class' => 'control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required']) !!}

                        @if($errors->has('password'))
                            <span class="help-block">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        {!! Form::label('password_confirmation', trans('app.register.fields.password_confirmation') . '*', ['class' => 'control-label']) !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}

                        @if($errors->has('password_confirmation'))
                            <span class="help-block">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-link" href="{{ route('login') }}">
            @lang('app.defaults.login')
        </a>
        {!! Form::submit(trans('app.register.actions.store'), ['class' => 'btn btn-primary pull-right']) !!}

    {!! Form::close() !!}

@endsection
