@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {!! Form::open(['method' => 'PATCH', 'route' => ['auth.account.change_details']]) !!}
        {{ Form::hidden('user_id', $user->id) }}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('app.account.change_details.title')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', trans('app.account.change_details.fields.name') . '*', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name', $user->name), ['class' => 'form-control', 'required' => '', 'autofocus' => '']) !!}

                        @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', trans('app.account.change_details.fields.email') . '*', ['class' => 'control-label']) !!}
                        {!! Form::email('email', old('email', $user->email), ['class' => 'form-control', 'required' => '']) !!}

                        @if($errors->has('email'))
                            <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                        {!! Form::label('username', trans('app.account.change_details.fields.username') . '*', ['class' => 'control-label']) !!}
                        {!! Form::text('username', old('username', $user->username), ['class' => 'form-control', 'required' => '']) !!}

                        @if($errors->has('username'))
                            <span class="help-block">
                                {{ $errors->first('username') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('alliance_id') ? ' has-error' : '' }}">
                        {!! Form::label('alliance_id', trans('app.account.change_details.fields.alliance') . '*', ['class' => 'control-label']) !!}
                        {{ Form::select('alliance_id', $alliances, old('alliance_id', ($user->alliance ? $user->alliance->id : null)), ['class' => 'form-control select2', 'required' => '']) }}

                        @if($errors->has('alliance_id'))
                            <span class="help-block">
                                {{ $errors->first('alliance_id') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {!! Form::submit(trans('app.defaults.save'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@stop

