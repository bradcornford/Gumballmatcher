@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('app.alliance.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('admin.defaults.list')
        </div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($alliance)
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>@lang('admin.alliances.fields.name')</th>
                                <td>{{ $alliance->name }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.alliances.fields.key')</th>
                                <td>{{ $alliance->key }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.alliances.fields.level')</th>
                                <td>{{ $alliance->level }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.alliances.fields.description')</th>
                                <td>{{ $alliance->description or '' }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.alliances.fields.image')</th>
                                <td>{{ $alliance->image or '' }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-12">
                                <div id="gumballs_piechart"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div id="fates_piechart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover table-condensed">
                    <thead>
                        <tr>
                            <th class="table-icon-column">
                                &nbsp;
                            </th>
                            <th>
                                @lang('app.alliance.fields.key')
                            </th>
                            <th>
                                @lang('app.alliance.fields.name')
                            </th>
                            <th>
                                @lang('app.alliance.fields.level')
                            </th>
                            <th>
                                @lang('app.alliance.fields.users')
                            </th>
                            <th>
                                @lang('app.alliance.fields.created')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alliances as $alliance)
                            <tr>
                                <td>
                                    @if ($alliance->image)<img src="{{ $alliance->image }}" height="40" title="{{ $alliance->name }}" data-toggle="tooltip">@endif
                                </td>
                                <td>
                                     {{ $alliance->key }}
                                </td>
                                <td>
                                     {{ $alliance->name }}
                                </td>
                                <td>
                                     {{ $alliance->level }}
                                </td>
                                <td>
                                     {{ $alliance->users->count() }}
                                </td>
                                <td>
                                     {{ $alliance->created_at->format('d-m-Y') }}
                                </td>
                            </tr>
                        @empty
                            <td colspan="3">
                                @lang('app.defaults.no-items')
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a class="btn btn-link" href="{{ route('alliance.index') }}">
        @lang('app.index.title')
    </a>
@endsection

@section('javascript')
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var gumballs_chart_data = google.visualization.arrayToDataTable([
                ['Gumballs', 'Amount'],
                ['Unlocked', {{ $allianceGumballs->count() }}],
                ['Locked', {{ ($gumballs->count() - $allianceGumballs->count()) }}]
            ]);

            var gumballs_chart_options = {
                title: 'Unlocked Alliance Gumballs ({{ $gumballs->count() }})',
                is3D: true,
                slices: {
                    0: { color: 'green' },
                    1: { color: 'red' }
                }
            };

            var gumballs_chart = new google.visualization.PieChart(document.getElementById('gumballs_piechart'));
            gumballs_chart.draw(gumballs_chart_data, gumballs_chart_options);

            var fates_chart_data = google.visualization.arrayToDataTable([
                ['Fates', 'Amount'],
                ['Linked', {{ $allianceFates->count() }}],
                ['Unlinked', {{ ($fates->count() - $allianceFates->count()) }}]
            ]);

            var fates_chart_options = {
                title: 'Linked Alliance Fates ({{ $fates->count() }})',
                is3D: true,
                slices: {
                    0: { color: 'green' },
                    1: { color: 'red' }
                }
            };

            var fates_chart = new google.visualization.PieChart(document.getElementById('fates_piechart'));
            fates_chart.draw(fates_chart_data, fates_chart_options);

            function resizeHandler () {
                gumballs_chart.draw(gumballs_chart_data, gumballs_chart_options);
                fates_chart.draw(fates_chart_data, fates_chart_options);
            }

            if (window.addEventListener) {
                window.addEventListener('resize', resizeHandler, false);
            } else if (window.attachEvent) {
                window.attachEvent('onresize', resizeHandler);
            }
        }
    </script>
@endsection
