@extends('layouts.app_sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-sm-9">
                        <legend>{{__('Matches')}}</legend>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{url('admin/matches/create')}}" class="btn btn-default">{{ __('Create') }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="span5">
                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Home')}}</th>
                                <th>{{__('Visitor')}}</th>
                                <th>{{__('Division')}}</th>

                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->datum->format('d/m/Y H:i')}}</td>
                                        <td>{{__($item->home->name)}}</td>
                                        <td>{{__($item->visitor->name)}}</td>
                                        <td>{{__($item->division->name)}}</td>
                                        <td><a href="{{url('admin/matches/'.$item->id.'/edit')}}"><i class="fa fa-edit fa-lg"></i></a></td>
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