@extends('layouts.app_sidebar')

@section('content')

    <div class="col-sm-12">
        <legend>Edit player</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-12">
        <h4>Player profile</h4>
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
                {!! Form::model($player, array('action' => array('Admin\PlayerController@update', $player->id), 'method' => 'PUT', 'files' => true))  !!}

                    <div class="form-group">
                        {{ Form::label('name', 'Name', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-sm-9">
                            {{ Form::text('name', null, array('class' => 'form-control' )) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('player_number', 'Player Number', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-sm-9">
                            {{ Form::text('player_number', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('birthdate', 'Birthdate', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-sm-9">
                            <?php $dt =  new Carbon\Carbon($player->birthdate);?>
                            {{ Form::date('birthdate', $dt->toDateString(), null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('starter', 'Starter', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-sm-9">
                            {{ Form::select('starter', array('0' => 'No', '1' => 'Yes'), null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('status', 'Status', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-sm-9">
                            {{ Form::select('status', array('0' => 'Inactive', '1' => 'Active'), null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('status', 'Team', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-sm-9">
                            {{ Form::select('team_id', $teams, 1, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Image', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-sm-9">
                            {{ Form::file('image') }}

                            @if($player->photo != '')
                                <img src="{{$player->photo}}" width="150px" />
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