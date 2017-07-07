<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.admin', trans('app.admin')) }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ route('admin.roles.index') }}">@lang ('admin.roles.title')</a></li>
                <li><a href="{{ route('admin.users.index') }}">@lang ('admin.users.title')</a></li>
                <li><a href="{{ route('admin.alliances.index') }}">@lang ('admin.alliances.title')</a></li>
                <li><a href="{{ route('admin.factions.index') }}">@lang ('admin.factions.title')</a></li>
                <li><a href="{{ route('admin.gumballs.index') }}">@lang ('admin.gumballs.title')</a></li>
                <li><a href="{{ route('admin.groups.index') }}">@lang ('admin.groups.title')</a></li>
                <li><a href="{{ route('admin.fates.index') }}">@lang ('admin.fates.title')</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">@lang ('app.login.title')</a></li>
                    <li><a href="{{ route('register') }}">@lang ('app.register.title')</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('index') }}">
                                    @lang ('app.index.title')
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    @lang ('app.logout.title')
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>