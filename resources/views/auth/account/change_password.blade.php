@extends ('layouts.app')

@section ('content')
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

    {!! Form::open(['method' => 'PATCH', 'route' => ['auth.account.change_password']]) !!}
        {{ Form::hidden('user_id', $user->id) }}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang ('app.account.change_password.title')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('current_password') ? ' has-error' : '' }}">
                        {!! Form::label('current_password', trans('app.account.change_password.fields.current_password') . '*', ['class' => 'control-label']) !!}
                        {!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => '']) !!}

                        @if ($errors->has('current_password'))
                            <span class="help-block">
                                {{ $errors->first('current_password') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">
                        {!! Form::label('new_password', trans('app.account.change_password.fields.new_password') . '*', ['class' => 'control-label']) !!}
                        {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => '']) !!}

                        @if ($errors->has('new_password'))
                            <span class="help-block">
                                {{ $errors->first('new_password') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                        {!! Form::label('new_password_confirmation', trans('app.account.change_password.fields.new_password_confirmation') . '*', ['class' => 'control-label']) !!}
                        {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => '']) !!}

                        @if ($errors->has('new_password_confirmation'))
                            <span class="help-block">
                                {{ $errors->first('new_password_confirmation') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {!! Form::submit(trans('app.defaults.save'), ['class' => 'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@stop

