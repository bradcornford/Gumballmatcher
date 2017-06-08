@extends('admin.layouts.app')

@section('content')
    <h3 class="page-title">@lang('admin.gumballs.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('admin.defaults.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('admin.gumballs.fields.name')</th>
                            <td>{{ $gumball->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.gumballs.fields.key')</th>
                            <td>{{ $gumball->key }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.gumballs.fields.faction')</th>
                            <td>{{ $gumball->faction->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.gumballs.fields.description')</th>
                            <td>{{ $gumball->description or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.gumballs.fields.image')</th>
                            <td>{{ $gumball->image or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <a class="btn btn-link" href="{{ route('admin.gumballs.index') }}">
        @lang('admin.defaults.back')
    </a>
@stop
