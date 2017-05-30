@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            @lang('user.title')
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
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    &nbsp;
                                                </th>
                                                    @lang('default.field.name')
                                                </th>
                                                <th>
                                                    @lang('default.field.username')
                                                </th>
                                                <th>
                                                    @lang('default.field.gumballs')
                                                </th>
                                                <th>
                                                    @lang('default.field.fates')
                                                </th>
                                                <th>
                                                    @lang('default.field.joined')
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td>
                                                        @if ($user->image)<img src="{{ $user->image }}" height="40" title="{{ $user->name }}">@endif
                                                    </td>
                                                    <td>
                                                         {{ $user->name }}
                                                    </td>
                                                    <td>
                                                         {{ $user->username }}
                                                    </td>
                                                    <td>
                                                        {{ $user->gumballs()->count() }}
                                                    </td>
                                                    <td>
                                                        {{ $user->fates()->count() }}
                                                    </td>
                                                    <td>
                                                         {{ $user->created_at->format('d-m-Y') }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <td colspan="3">
                                                    @lang('default.table.no-items')
                                                </td>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-8 col-md-offset-4">
                                    <a class="btn btn-link" href="{{ route('home') }}">
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
@endsection
