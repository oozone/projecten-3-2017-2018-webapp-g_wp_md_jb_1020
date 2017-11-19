@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <match :match="{{$match}}"></match>

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
                        @foreach($topscorers as $t)
                            <div class="row">
                                <div class="col-sm-9">
                                    {{ $t->name }}
                                </div>
                                <div class="col-sm-3">
                                    {{ $t->goalscore }}
                                </div>
                            </div>
                        @endforeach
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
                        @foreach($standings as $s)

                            <div class="row">
                                <div class="col-sm-9">
                                    {{ $s->name }}
                                </div>
                                <div class="col-sm-3">
                                    {{ $s->pivot->won * 3 }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>




        </div>
    </div>

@endsection