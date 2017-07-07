@extends ('layouts.app')

@section ('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {!! Form::open(['method' => 'POST', 'route' => ['password.request']]) !!}

        {{ csrf_field() }}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang ('app.reset.title')
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
        </div>

        <a class="btn btn-link" href="{{ route('login') }}">
            @lang ('app.defaults.login')
        </a>
        {!! Form::submit(trans('app.reset.actions.store'), ['class' => 'btn btn-primary pull-right']) !!}

    {!! Form::close() !!}

@endsection
