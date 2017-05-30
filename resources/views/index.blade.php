@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        View <a href="{{ route('faction') }}">Factions</a>, <a href="{{ route('gumball') }}">Gumballs</a> or <a href="{{ route('fate') }}">Fates</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
