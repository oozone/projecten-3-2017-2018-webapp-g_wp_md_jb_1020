@extends('layouts.app_sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="col-sm-12">
                    <div class="pull-right">
                        <a href="/admin/teams/create" class="btn btn-default">Create</a>
                    </div>
                    <legend>Teams</legend>
                </div>
                <div class="row">
                    <div class="span5">
                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Competition</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td><a href="/admin/teams/{{$item->id}}/edit">{{$item->name}}</a></td>
                                        <td>{{$item->division->name}}</td>
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