@extends ('layouts.app')

@section ('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {!! Form::open(['method' => 'POST', 'route' => ['password.request']]) !!}

        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang ('app.login.title')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', trans('app.login.fields.email') . '*', ['class' => 'control-label']) !!}
                        {!! Form::email('email', '', ['class' => 'form-control', 'value' => old('email'), 'required' => '', 'autofocus' => '']) !!}

                        @if ($errors->has('email'))
                            <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', trans('app.register.fields.password') . '*', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required']) !!}

                    @if ($errors->has('password'))
                        <span class="help-block">
                                {{ $errors->first('password') }}
                            </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    {!! Form::label('password_confirmation', trans('app.register.fields.password_confirmation') . '*', ['class' => 'control-label']) !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '', 'required']) !!}

                    @if ($errors->has('password_confirm'))
                        <span class="help-block">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                    @endif
                </div>
            </div>
        </div>

        {!! Form::submit(trans('app.reset.actions.update'), ['class' => 'btn btn-primary pull-right']) !!}

    {!! Form::close() !!}

@endsection



@extends ('layouts.app')

@section ('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                @lang ('app.reset.title')
            </h2>
        </div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">@lang ('app.reset.fields.email')</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">@lang ('app.reset.fields.password')</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-4 control-label">@lang ('app.reset.fields.password-confirm')</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            @lang ('app.reset.actions.update')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
