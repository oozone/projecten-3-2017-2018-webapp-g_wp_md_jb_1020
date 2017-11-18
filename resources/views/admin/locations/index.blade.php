@extends('layouts.app_sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-sm-9">
                        <legend>{{ __('Locations') }}</legend>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{url('admin/locations/create')}}" class="btn btn-default">{{ __('Create') }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="span5">
                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('City') }}</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->city}}</td>
                                        <td><a href="{{url('admin/locations/'.$item->id.'/edit')}}"><i class="fa fa-edit fa-lg"></i></a></td>
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