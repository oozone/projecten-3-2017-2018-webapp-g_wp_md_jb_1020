@extends('layouts.app_sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-sm-9">
                        <legend>{{__('FINA-sheets')}}</legend>
                    </div>
                    <div class="col-sm-3">

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
                                <th>{{__('Download')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->home->name}}</td>
                                        <td>{{$item->visitor->name}}</td>
                                        <td>{{$item->datum->format('d/m/Y H:i')}}</td>
                                        <td><a href="{{'/pdf/'. $item->finasheet}}" download><i class="fa fa-file-pdf-o fa-lg"></i></a></td>
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