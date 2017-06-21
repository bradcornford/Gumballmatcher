@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('app.user.title')</h3>

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

            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('admin.users.fields.name')</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.users.fields.email')</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.users.fields.role')</th>
                            <td>{{ $user->role->name or '-' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.users.fields.username')</th>
                            <td>{{ $user->username or '-' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.users.fields.alliance')</th>
                            <td>{{ $user->alliance->name or '-' }}</td>
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

            <div class="table-responsive">
                <table class="table table-striped table-hover table-condensed">
                    <thead>
                        <tr>
                            <th class="table-icon-column">
                                &nbsp;
                            </th>
                            <th>
                                @lang('app.user.fields.name')
                            </th>
                            <th>
                                @lang('app.user.fields.username')
                            </th>
                            <th>
                                @lang('app.user.fields.gumballs')
                            </th>
                            <th>
                                @lang('app.user.fields.fates')
                            </th>
                            <th>
                                @lang('app.user.fields.created')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $allianceUser)
                            <tr>
                                <td class="text-center">
                                    @if ($allianceUser->image)<img src="{{ $allianceUser->image }}" height="40" title="{{ $allianceUser->name }}" data-toggle="tooltip">@endif
                                </td>
                                <td>
                                     {{ $allianceUser->name }}
                                </td>
                                <td>
                                     {{ $allianceUser->username }}
                                </td>
                                <td>
                                    {{ $allianceUser->gumballs()->count() }}
                                </td>
                                <td>
                                    {{ $allianceUser->fates()->count() }}
                                </td>
                                <td>
                                     {{ $allianceUser->created_at->format('d-m-Y') }}
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
                ['Unlocked', {{ $user->gumballs->count() }}],
                ['Locked', {{ ($gumballs->count() - $user->gumballs->count()) }}]
            ]);

            var gumballs_chart_options = {
                title: 'Unlocked User Gumballs ({{ $gumballs->count() }})',
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
                ['Linked', {{ $user->fates->count() }}],
                ['Unlinked', {{ ($fates->count() - $user->fates->count()) }}]
            ]);

            var fates_chart_options = {
                title: 'Linked User Fates ({{ $fates->count() }})',
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