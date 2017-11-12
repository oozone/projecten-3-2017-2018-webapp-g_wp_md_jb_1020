@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <match :match="{{$match}}"></match>

            </div>
            <div class="col-md-4">
                SIDEBAR
            </div>
        </div>

    </div>
@endsection