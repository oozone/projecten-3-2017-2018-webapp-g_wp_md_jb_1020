@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="col-sm-12">
                    <div class="pull-right">
                        <a href="/admin/players/create" class="btn btn-default">Create</a>
                    </div>
                    <legend>Players</legend>
                </div>
                <div class="row">
                    <div class="span5">
                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Birthdate</th>
                                <th>Active</th>
                                <th>Team</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($players as $player)
                                    <tr>
                                        <td>{{$player->name}}</td>
                                        <td>{{$player->birthdate}}</td>
                                        <td>{{$player->status}}</td>
                                        <td>{{$player->team->name}}</td>
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