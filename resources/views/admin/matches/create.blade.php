@extends('layouts.app_sidebar')

@section('content')



    <div class="col-sm-12">
        <legend>Create Match</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-12">
        <h4>Create Match</h4>
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
                {!! Form::open(array('action' => array('Admin\MatchController@store'), 'method' => 'POST'))  !!}

                <div class="form-group">
                    {{ Form::label('home', 'Home', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::select('home_id', $teams, 1, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Visitor', 'Visitor', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::select('visitor_id', $teams, 2, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('datum', 'Date', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
			            <?php $dt =  new Carbon\Carbon();?>
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