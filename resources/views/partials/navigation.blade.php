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
                {{ config('app.name', trans('app.name')) }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ route('alliance.index') }}">@lang ('app.alliance.title')</a></li>
                <li><a href="{{ route('user.index') }}">@lang ('app.user.title')</a></li>
                <li><a href="{{ route('gumball.index') }}">@lang ('app.gumball.title')</a></li>
                <li><a href="{{ route('fate.index') }}">@lang ('app.fate.title')</a></li>
                <li><a href="{{ route('match.index') }}">@lang ('app.match.title')</a></li>
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
                            @can ('admin-index')
                                <li>
                                    <a href="{{ route('admin.index') }}">
                                        @lang ('admin.title')
                                    </a>
                                </li>
                            @endcan

                            @can ('account-change-details')
                                <li>
                                    <a href="{{ route('auth.account.change_details') }}">
                                        @lang ('app.account.change_details.title')
                                    </a>
                                </li>
                            @endcan

                            @can ('account-change-password')
                                <li>
                                    <a href="{{ route('auth.account.change_password') }}">
                                        @lang ('app.account.change_password.title')
                                    </a>
                                </li>
                            @endcan

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