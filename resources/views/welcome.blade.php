@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="wp-intro-image">
                    <img src="/images/header/wpheader.jpg" class="img-responsive img-rounded">
                </div>

                @foreach($divisions as $division)
                    <div class="panel panel-matchlist">
                        <div class="panel-heading text-center">{{ __($division->name)}}</div>
                        <div class="panel-body">

                            <div class="table-matchlist">
                                <matchlist :divisions="{{$division->matches}}"></matchlist>
                            </div>
                        </div>
                    </div>
                @endforeach;



            </div>

            <div class="col-md-4">
                <!-- Standings -->
                <div class="panel panel-sidebar">
                    <div class="panel-heading">
                        {{ __('Standings First Division') }}
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

                <!-- Topscorers -->
                <div class="panel panel-sidebar">
                    <div class="panel-heading">
                        {{ __('Topscorers First Division') }}
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

            </div>
        </div>
    </div>



@endsection