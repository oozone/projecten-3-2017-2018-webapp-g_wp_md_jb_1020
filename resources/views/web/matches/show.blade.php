@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                    $isadmin = 0;
                    if (auth()->check())
	                    $isadmin = auth()->user()->isAdmin();

                ?>
                <match :match="{{$match}}" :matchdetail="{{$matchdetail}}" :isadmin="{{$isadmin}}"></match>

            </div>

            <div class="col-md-4" style="margin-top: 35px;">

                <!-- Topscorers -->
                <div class="panel panel-sidebar">
                    <div class="panel-heading">
                        {{ __('Topscorers') }}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <b>{{ __('Name') }}</b>
                            </div>
                            <div class="col-sm-3">
                                <b>{{ __('Goals') }}</b>
                            </div>
                        </div>
                        <topscorers :topscorers="{{$topscorers}}"></topscorers>
                    </div>
                </div>

                <!-- Standings -->
                <div class="panel panel-sidebar">
                    <div class="panel-heading">
                        {{ __('Standings') }}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <b>{{ __('Team') }}</b>
                            </div>
                            <div class="col-sm-3">
                                <b>{{ __('Points') }}</b>
                            </div>
                        </div>
                        <standings :standings="{{$standings}}"></standings>

                    </div>
                </div>

            </div>




        </div>
    </div>

@endsection