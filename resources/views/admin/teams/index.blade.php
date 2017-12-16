@extends('layouts.app_sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-sm-9">
                        <legend>{{ __('Teams') }}</legend>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{url('admin/teams/create')}}" class="btn btn-default">{{ __('Create') }}</a>
                    </div>
                </div>

                <div class="row">
                    <div class="span5">
                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Division') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td><a href="{{url('admin/teams/'.$item->id.'/edit')}}">{{__($item->name)}}</a></td>
                                        <td>{{__($item->division->name)}}</td>
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