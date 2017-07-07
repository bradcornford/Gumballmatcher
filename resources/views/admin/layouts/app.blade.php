@include ('admin.partials.header')

    <div id="app">
        @include ('admin.partials.navigation')

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    @yield ('content')
                </div>
            </div>
        </div>
    </div>


@include ('admin.partials.footer')