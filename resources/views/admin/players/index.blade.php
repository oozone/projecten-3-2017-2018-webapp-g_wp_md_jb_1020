@extends('layouts.app_sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-sm-9">
                        <legend>{{ __('Players profile') }}</legend>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{url('admin/players/create')}}" class="btn btn-default">{{ __('Create') }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="span5">
                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Birthdate') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Team') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($players as $player)
                                    <tr>
                                        <td><a href="{{url('admin/players/'.$player->id.'/edit')}}">{{$player->name}}</a></td>
                                        <td>{{$player->birthdate}}</td>
                                        <td>{{$player->status}}</td>
                                        <td>{{$player->team->name}}</td>
                                    </tr>
                                @endforeach

                                {{ $players->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection