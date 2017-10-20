@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="title m-b-md">
                    Waterpolo
                </div>
                @foreach($divisions as $division)
                    {{$division->name}}
                @endforeach


                    <div class="row">
                        <div class="span5">
                            <table class="table table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th>Home</th>
                                    <th>Visitor</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($matches as $match)
                                    <tr>
                                        <td>{{$match->home->name}}</td>
                                        <td>{{$match->visitor->name}}</td>
                                        <td>{{$match->date}}</td>
                                        <td>{{$match->location->name}}</td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>



@endsection