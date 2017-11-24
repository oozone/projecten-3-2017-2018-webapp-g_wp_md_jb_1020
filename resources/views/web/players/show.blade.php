@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <a href="{{ url()->previous() }}"><button type="button" class="btn btn-default">{{ __("Back") }}</button></a>
                <!-- Match details -->
                <div class="panel panel-matchlist">
                    <div class="panel-heading text-center">
                        {{ __('Player profile') }}
                    </div>
                    <div class="panel-body">
                        <!-- home -->
                        <div class="row">
                            <div class="col-md-6">
                                @if($player->photo != null && $player->photo != '')
                                    <img src="{{ $player->photo }}" class="img-responsive img-rounded" />
                                @else
                                    <img src="/images/common/player_profile_pic.jpg" class="img-responsive img-rounded" />
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h4>{{ $player->name }}</h4>
                                {{ __('Team') }}: {{ $player->team->name }}<br />
                                {{ __('Player number') }}: {{ $player->player_number }}<br />
                                {{ __('Birthdate') }}: {{ $player->formatted_birthdate  }}<br />
                                {{ __('Goals') }}: {{ $goals[0]->goalscore }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4" style="margin-top: 35px;">

                <div class="panel panel-sidebar">
                    <div class="panel-heading">
                        {{ __('Team') }}
                    </div>
                    <div class="panel-body">
                        <h4>{{ $player->team->name }}</h4>
                        @foreach($team as $p)
                            <a href="{{url('/players/' . $p->id)}}">{{$p->name}}</a><br />
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection