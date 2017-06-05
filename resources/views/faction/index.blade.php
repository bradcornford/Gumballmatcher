@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            @lang('faction.title')
                        </h2>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th style="width: 60px;">
                                                    &nbsp;
                                                </th>
                                                <th>
                                                    @lang('default.field.name')
                                                </th>
                                                <th>
                                                    @lang('default.field.created')
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($factions as $faction)
                                                <tr>
                                                    <td>
                                                        @if ($faction->image)<img src="{{ $faction->image }}" height="40" title="{{ $faction->name }}">@endif
                                                    </td>
                                                    <td>
                                                         {{ $faction->name }}
                                                    </td>
                                                    <td>
                                                        {{ $faction->created_at->format('d-m-Y') }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <td colspan="3">
                                                    @lang('default.table.no-items')
                                                </td>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    <div class="col-md-12">
                                        <a class="btn btn-link" href="{{ route('index') }}">
                                            @lang('index.title')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
