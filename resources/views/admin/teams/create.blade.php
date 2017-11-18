@extends('layouts.app_sidebar')

@section('content')



    <div class="col-sm-12">
        <legend>{{ __('Create team') }}</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-12">
        <h4>{{ __('Team profile') }}</h4>
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
                            <a href="{{url('admin/teams')}}" class="btn btn-default">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>

                {!! Form::open(array('action' => array('Admin\TeamController@store'), 'method' => 'POST', 'files' => true))  !!}

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Name') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('name', null, array('class' => 'form-control' )) }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Division') }}</label>
                    <div class="col-sm-9">
                        {{ Form::select('division_id', $divisions, 1, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Coach') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('coach', null, array('class' => 'form-control')) }}
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