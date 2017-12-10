@extends('layouts.app_sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-sm-9">
                        <legend>{{__('Scoreboard')}}</legend>
                    </div>
                </div>
                <div class="row">
                    <div class="span5">
                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>{{__('Home')}}</th>
                                <th>{{__('Visitor')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->home->name}}</td>
                                        <td>{{$item->visitor->name}}</td>
                                        <td>{{$item->datum}}</td>
                                        <td><a href="{{url('admin/scoreboard/'.$item->id)}}"><i class="fa fa-television fa-lg"></i></a></td>
                                    </tr>
                                @endforeach

                                {{ $data->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection