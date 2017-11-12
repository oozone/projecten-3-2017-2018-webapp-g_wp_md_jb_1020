@extends('layouts.app_sidebar')

@section('content')

    <div class="col-sm-12">
        <legend>Edit team</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-12">
        <h4>Team profile</h4>
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
                {!! Form::model($match, array('action' => array('Admin\MatchController@update', $match->id), 'method' => 'PUT'))  !!}

                <div class="form-group">
                    {{ Form::label('home', 'Home', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::select('home_id', $teams, $match->home->id, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Visitor', 'Visitor', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::select('visitor_id', $teams, $match->visitor->id, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('datum', 'Date', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
			            <?php $dt =  new Carbon\Carbon($match->datum);?>
                        {{ Form::date('datum', $dt->toDateString(), null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('division', 'Division', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::select('division_id', $divisions, 1, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('location', 'Location', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::select('location_id', $locations, 1, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('valor', 'Valor', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::select('valor_id', $valors, 1, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('difficulty', 'Difficulty', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::select('difficulty_id', $difficulties, 1, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <button class="btn btn-default" type="submit">Save</button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div> <!-- / panel preview -->
@endsection