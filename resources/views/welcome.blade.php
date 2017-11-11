@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="title m-b-md">
                    <h3>Geplande matchen</h3>
                </div>

                <matchlist :divisions="{{$divisions}}"></matchlist>

            </div>
        </div>
    </div>



@endsection