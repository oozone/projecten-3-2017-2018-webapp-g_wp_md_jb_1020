@extends('layouts.app_sidebar')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('Players') }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 text-center">
                                <i style="font-size: 72px" class="fa fa-user fa-lg"></i>
                            </div>
                            <div class="col-sm-12 col-md-9" style="margin-top: 15px;">
                                <ul>
                                    <a href="{{ url('admin/players')}}"><button class="btn btn-default">{{ __('List') }}</button></a>
                                    <a href="{{ url('admin/players/create')}}"><button class="btn btn-default">{{ __('Create') }}</button></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('Teams') }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 text-center">
                                <i style="font-size: 72px" class="fa fa-users fa-lg"></i>
                            </div>
                            <div class="col-sm-12 col-md-9" style="margin-top: 15px;">
                                <ul>
                                    <a href="{{ url('admin/teams')}}"><button class="btn btn-default">{{ __('List') }}</button></a>
                                    <a href="{{ url('admin/teams/create')}}"><button class="btn btn-default">{{ __('Create') }}</button></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('Matches') }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 text-center">
                                <i style="font-size: 72px" class="img-responsive fa fa-calendar fa-lg"></i>
                            </div>
                            <div class="col-sm-12 col-md-9" style="margin-top: 15px;">
                                <ul>
                                    <a href="{{ url('admin/matches')}}"><button class="btn btn-default">{{ __('List') }}</button></a>
                                    <a href="{{ url('admin/matches/create')}}"><button class="btn btn-default">{{ __('Create') }}</button></a>
                                    <a href="{{ url('admin/matches/finasheets')}}"><button class="btn btn-default">{{ __('FINA-sheets') }}</button></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('Locations') }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 text-center">
                                <i style="font-size: 72px" class="fa fa-globe fa-lg"></i>
                            </div>
                            <div class="col-sm-12 col-md-9"  style="margin-top: 15px;">
                                <ul>
                                    <a href="{{ url('admin/locations')}}"><button class="btn btn-default">{{ __('List') }}</button></a>
                                    <a href="{{ url('admin/locations/create')}}"><button class="btn btn-default">{{ __('Create') }}</button></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('Live Scoreboard') }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 text-center">
                                <i style="font-size: 72px" class="fa fa-television fa-lg"></i>
                            </div>
                            <div class="col-sm-12 col-md-9" style="margin-top: 15px;">
                                <ul>
                                    <a href="{{ url('admin/scoreboard')}}"><button class="btn btn-default">{{ __('List') }}</button></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>



@endsection