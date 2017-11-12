@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="wp-intro-image">
                    <img src="/images/header/wpheader.jpg" class="img-responsive img-rounded">
                </div>

                <matchlist :divisions="{{$divisions}}"></matchlist>

            </div>

            <div class="col-md-4">
                SIDEBAR
            </div>
        </div>
    </div>



@endsection