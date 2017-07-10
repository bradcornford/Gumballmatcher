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
    <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="//cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/main.js') }}" type="text/javascript"></script>

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