@extends('layouts.app_sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="col-sm-12">
                    <div class="pull-right">
                        <a href="/admin/matches/create" class="btn btn-default">Create</a>
                    </div>
                    <legend>Teams</legend>
                </div>
                <div class="row">
                    <div class="span5">
                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Home</th>
                                <th>Visitor</th>
                                <th>Date</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->home->name}}</td>
                                        <td>{{$item->visitor->name}}</td>
                                        <td>{{$item->datum}}</td>
                                        <td><a href="/admin/matches/{{$item->id}}/edit"><i class="fa fa-edit fa-lg"></i></a></td>
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