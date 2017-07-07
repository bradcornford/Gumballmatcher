@extends ('layouts.app')

@section ('content')
    <h3 class="page-title">@lang ('app.index.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang ('app.defaults.dashboard')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

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
                                        <ul>
                                            <li>Step one – state which gumballs you have, via the Gumballs page. It may be easier to toggle all of them to ticked, and then unselect the few you have not yet obtained, if you have lots!</li>
                                            <li>Step two – state which fate links you have complete, via the Fates page. As with the gumballs, it may to easier to toggle them all on, then deselect any missing ones.</li>
                                            <li>Step three – Click the Matches button. Please note, the more matches you still have left to finish, the longer it takes to work its magic! After that, you can see who can help you complete your missing matches!</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('alliance.index') }}" title="@lang ('app.alliance.title')"><span class="glyphicon glyphicon-king"></span> <span class="hidden-xs">@lang ('app.alliance.title')</span></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('user.index') }}" title="@lang ('app.user.title')"><span class="glyphicon glyphicon-user"></span> <span class="hidden-xs">@lang ('app.user.title')</span></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('gumball.index') }}" title="@lang ('app.gumball.title')"><span class="glyphicon glyphicon-minus-sign"></span> <span class="hidden-xs">@lang ('app.gumball.title')</span></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('fate.index') }}" title="@lang ('app.fate.title')"><span class="glyphicon glyphicon-transfer"></span> <span class="hidden-xs">@lang ('app.fate.title')</span></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a class="btn btn-default btn-lg overflow-hidden" href="{{ route('match.index') }}" title="@lang ('app.match.title')"><span class="glyphicon glyphicon-resize-horizontal"></span> <span class="hidden-xs">@lang ('app.match.title')</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
