@extends('layouts.app_sidebar')

@section('content')

    <div class="col-sm-12">
        <legend>{{ __('Edit location') }}</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-12">
        <h4>{{ __('Location') }}</h4>
        <!-- if there are creation errors, they will show here -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-body form-horizontal payment-form">

                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-3">
                        <div class="pull-right">
                            <a href="{{url('admin/locations')}}" class="btn btn-default">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>

                {!! Form::model($location, array('action' => array('Admin\LocationController@update', $location->id), 'method' => 'PUT', 'files' => true))  !!}

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Name') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('name', $location->name, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Street') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('street', $location->street, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Postal Code') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('postalcode', $location->postalcode, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('City') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('city', $location->city, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Country') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('country', $location->country, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Image') }}</label>
                    <div class="col-sm-9">
                        {{ Form::file('image') }}
                    </div>
                </div>


                <div class="form-group">
                    <label for="status" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <button class="btn btn-default" type="submit">{{ __('Save') }}</button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div> <!-- / panel preview -->
@endsection