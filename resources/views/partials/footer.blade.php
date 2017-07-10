    <footer class="footer">
        <div class="container">
            <p class="text-muted">
                &copy; {{ date('Y') }} {{ str_replace('www.', '', parse_url(env('APP_URL', 'http://www.fatelinks.co.uk'))['host']) }} | @lang ('app.defaults.rights')
                <span class="small pull-right">
                    {{ sprintf(trans('app.defaults.version'), env('APP_VERSION', '1.0.0')) }}
                </span>
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js" type="text/javascript"></script>
    <script src="//www.gstatic.com/charts/loader.js" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        window._token = '{{ csrf_token() }}';
    </script>

    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '{{ env('ANALYTICS_KEY', null) }}', 'auto');
        ga('send', 'pageview');
    </script>

    @yield ('javascript')
</body>
</html>