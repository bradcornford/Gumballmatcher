@include('partials.header')

    <div id="app">
        @include('partials.navigation')

        @yield('content')
    </div>


@include('partials.footer')