@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            @lang('index.title')
                        </h2>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="btn-group btn-group-justified" role="group">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-default btn-lg" href="{{ route('alliance') }}"><span class="glyphicon glyphicon-king"></span> @lang('alliance.title')</a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-default btn-lg" href="{{ route('user') }}"><span class="glyphicon glyphicon-user"></span> @lang('user.title')</a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-default btn-lg" href="{{ route('faction') }}"><span class="glyphicon glyphicon-th-large"></span> @lang('faction.title')</a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-default btn-lg" href="{{ route('gumball') }}"><span class="glyphicon glyphicon-minus-sign"></span> @lang('gumball.title')</a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-default btn-lg" href="{{ route('fate') }}"><span class="glyphicon glyphicon-transfer"></span> @lang('fate.title')</a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-default btn-lg" href="{{ route('match') }}"><span class="glyphicon glyphicon-resize-horizontal"></span> @lang('match.title')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
