@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <a href="{{ url()->previous() }}"><button type="button" class="btn btn-default">{{ __("Back") }}</button></a>
                <!-- Match details -->
                <div class="panel panel-matchlist">
                    <div class="panel-heading text-center">
                        {{ __('Team') }}
                    </div>
                    <div class="panel-body">
                        <!-- home -->
                        <div class="row">

                            <div class="col-md-3">
                                @if($team->logo != null && $team->logo != '')
                                    <img src="{{ $team->logo }}" class="img-responsive img-rounded" />
                                @else
                                    <img src="/images/common/team_logo_placeholder.png" class="img-responsive img-rounded" />
                                @endif
                            </div>
                            <div class="col-md-9">
                                <h4>{{ $team->name }}</h4>
                                Coach: {{ $team->coach->name }}
                            </div>


                        </div>
                    </div>
                </div>

                <!-- Match details -->
                <div class="panel panel-matchlist">
                    <div class="panel-heading text-center">
                        {{ __('Program') }}
                    </div>
                    <div class="panel-body">
                        @foreach($matches as $m)
                            <div class="row">
                                <div class="col-sm-3 col-xs-12">
                                    {{ $m->formattedDate }}
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <a href="{{url('/matches/' . $m->id)}}" class="playerprofilelink">{{ $m->home->name . ' - ' . $m->visitor->name }}</a>
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                    {{ $m->score_home . ' - ' . $m->score_visitor }}
                                </div>
                            </div>
                        @endforeach    
                    </div>
                </div>


                <!-- Players -->
                <div class="panel panel-matchlist">
                    <div class="panel-heading text-center">
                        {{ __('Players') }}
                    </div>
                    <div class="panel-body">
                        @foreach($team->players as $p)
                            <div class="row">
                                <div class="col-sm-3 col-xs-2" style="text-align: right;">
                                    {{ $p->player_number }}
                                </div>
                                <div class="col-sm-9 col-xs-10">
                                    <a href="{{url('/players/' . $p->id)}}" class="playerprofilelink">{{ $p->name }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>




            </div>

            <div class="col-md-4" style="margin-top: 35px;">

                <div class="panel panel-sidebar">
                    <div class="panel-heading">
                        {{ __('Teams') }}
                    </div>
                    <div class="panel-body">
                        @foreach($teams as $t)
                            <a href="{{url('/teams/' . $t->id)}}">{{$t->name}}</a><br />
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

