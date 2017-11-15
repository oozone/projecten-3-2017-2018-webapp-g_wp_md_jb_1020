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
                {!! Form::model($team, array('action' => array('Admin\TeamController@update', $team->id), 'method' => 'PUT', 'files' => true))  !!}

                <div class="form-group">
                    {{ Form::label('name', 'Name', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::text('name', null, array('class' => 'form-control' )) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('status', 'Division', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::select('division_id', $divisions, $team->division->id, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('coach', 'Coach', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::text('coach', $team->coach->name, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('image', 'Image', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::file('image') }}

                        @if($team->logo != '')
                            <img src="{{$team->logo}}" width="150px" />
                        @endif

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