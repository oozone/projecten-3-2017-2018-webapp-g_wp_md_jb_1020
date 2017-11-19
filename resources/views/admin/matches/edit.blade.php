@extends('layouts.app_sidebar')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <legend>{{ __('Edit match') }}</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-12">
        <h4>{{ __('Match profile') }}</h4>
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
                            <a href="{{url('admin/matches')}}" class="btn btn-default">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>

                {!! Form::model($match, array('action' => array('Admin\MatchController@update', $match->id), 'method' => 'PUT'))  !!}
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Season') }}</label>
                    <div class="col-sm-9">
                        {{ Form::select('season_id', $seasons, $match->season_id, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Home') }}</label>
                    <div class="col-sm-9">
                        {{ Form::select('home_id', $teams, $match->home->id, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Visitor') }}</label>
                    <div class="col-sm-9">
                        {{ Form::select('visitor_id', $teams, $match->visitor->id, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Date') }}</label>
                    <div class="col-sm-9">
			            <?php $dt =  new Carbon\Carbon($match->datum);?>
                        {{ Form::date('datum', $dt->toDateString(), null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Division') }}</label>
                    <div class="col-sm-9">
                        {{ Form::select('division_id', $divisions, 1, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Location') }}</label>
                    <div class="col-sm-9">
                        {{ Form::select('location_id', $locations, $match->location->id, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Valor') }}</label>
                    <div class="col-sm-9">
                        {{ Form::select('valor_id', $valors, 1, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Difficulty') }}</label>
                    <div class="col-sm-9">
                        {{ Form::select('difficulty_id', $difficulties, 1, array('class' => 'form-control')) }}
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