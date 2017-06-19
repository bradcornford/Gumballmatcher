    <footer class="footer">
        <div class="container">
            <p class="text-muted">
                &copy; {{ date('Y') }} {{ str_replace('www.', '', parse_url(env('APP_URL', 'http://www.fatelinks.co.uk'))['host']) }} | @lang('app.defaults.rights')
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

    @yield('javascript')
</body>
</html>