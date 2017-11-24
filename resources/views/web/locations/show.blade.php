@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <a href="{{ url()->previous() }}"><button type="button" class="btn btn-default">{{ __("Back") }}</button></a>
                <!-- Match details -->
                <div class="panel panel-matchlist">
                    <div class="panel-heading text-center">
                        {{ __('Location') }}
                    </div>
                    <div class="panel-body">
                        <!-- home -->
                        <div class="row text-center">

                            <b>{{ $location->name }}</b><br />
                            {{$location->street}}<br />
                            {{$location->postalcode}} {{$location->city}} ({{$location->country}})
                        </div>
                    </div>
                </div>
                <div style="width: 100%; height: 200px;">
                    <gmaps :location="{{$location}}"></gmaps>
                </div>




            </div>

            <div class="col-md-4" style="margin-top: 35px;">

                <div class="panel panel-sidebar">
                    <div class="panel-heading">
                        {{ __('Locations') }}
                    </div>
                    <div class="panel-body">
                        @foreach($locations as $location)
                            <a href="{{url('/locations/' . $location->id)}}">{{$location->name}}</a><br />
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

