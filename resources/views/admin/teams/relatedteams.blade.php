@extends('layouts.app_sidebar')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <legend>{{ __('Edit team') }}</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-12">
        <h4>{{ __('Team profile') }}</h4>
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
                            <a href="{{url()->previous()}}" class="btn btn-default">{{ __('Back') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="pull-right">
                            {{--<a href="{{url('admin/teams/'.$team->id .'/csv')}}" class="btn btn-default">{{ __('Upload players') }}</a>--}}
                        </div>
                    </div>
                </div>

                {!! Form::model($team, array('action' => array('Admin\TeamController@updateRelatedTeams', $team->id), 'method' => 'PUT', 'files' => false))  !!}

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Related teams') }}</label>
                    <div class="col-sm-9">
                        {{Form::select('teams',$teams,$relatedTeams,array('class' => 'form-control', 'multiple'=>'multiple','name'=>'teams[]'))}}
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
</div>
@endsection