@extends ('layouts.app')

@section ('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {!! Form::open(['method' => 'POST', 'route' => ['login']]) !!}

        {{ csrf_field() }}

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang ('app.login.title')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="well">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4>
                                        Welcome to fatelinks.co.uk, the latest tool for finding Fate link partners in Gumballs &amp; Dungeons!
                                    </h4>
                                    <p>
                                        The site works by comparing your gumballs and missing fate matches to the gumballs owned by your alliance members, and lets you know who to find online to arrange a match. For example, if you needed Sage for the Follower Fate link, the site will tell you who has Sage. Then you just need to arrange a time to link with them!
                                    </p>
                                    <p>
                                        Currently this site is only available to members of the <strong>Sky Pirate</strong> alliance. If you have found this, and want to add your own alliance, please email <a href="mailto:glkskypr@gmail.com" title="glkskypr@gmail.com">glkskypr@gmail.com</a>.
                                    </p>
                                    <p>
                                        For all you <strong>Sky Pirate</strong>, sign up, log in and you are ready to start!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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

                <div class="row">
                    <div class="col-xs-12 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        {!! Form::label('password', trans('app.login.fields.password') . '*', ['class' => 'control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required']) !!}

                        @if ($errors->has('password'))
                            <span class="help-block">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="checkbox">
                            <label>
                                {{ Form::checkbox('remember', true, (old('remember') ? true : false)) }} @lang ('app.login.fields.remember')
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-link" href="{{ route('password.request') }}">
            @lang ('app.defaults.reset')
        </a>
        {!! Form::submit(trans('app.login.actions.store'), ['class' => 'btn btn-primary pull-right']) !!}

    {!! Form::close() !!}

@endsection
