@extends('layouts.app_sidebar')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <legend>{{ __('Edit player') }}</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-12">
        <h4>{{ __('Player profile') }}</h4>
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
                            <div class="">
                                <a href="{{url('admin/players')}}" class="btn btn-default">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>


                {!! Form::model($player, array('action' => array('Admin\PlayerController@update', $player->id), 'method' => 'PUT', 'files' => true))  !!}

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{ __('Image') }}</label>
                            <div class="col-sm-9">
                                @if($player->photo != '')
                                    <img src="{{$player->photo}}" width="150px" />
                                @endif
                                <br /><br />
                                {{ Form::file('image') }}

                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                {{ Form::text('name', null, array('class' => 'form-control' )) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{ __('Player number') }}</label>
                            <div class="col-sm-9">
                                {{ Form::text('player_number', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{ __('Birthdate') }}</label>
                            <div class="col-sm-9">
			                    <?php $dt =  new Carbon\Carbon($player->birthdate);?>
                                {{ Form::date('birthdate', $dt->toDateString(), null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{ __('Starter') }}</label>
                            <div class="col-sm-9">
                                {{ Form::select('starter', array('0' => 'No', '1' => 'Yes'), $player->starter, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{ __('Status') }}</label>
                            <div class="col-sm-9">
                                {{ Form::select('status', array('1' => 'Active', '2' => 'Suspended', '3' => 'Game over', '4' => 'Injured'), $player->status, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{ __('Division') }}</label>
                            <div class="col-sm-9">
                                {{ Form::select('division_id', $divisions, $player->division_id, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{ __('Team') }}</label>
                            <div class="col-sm-9">
                                {{ Form::select('team_id', $teams, $player->team->id, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="status" class="col-sm-6 control-label"></label>
                            <div class="col-sm-6">
                                <button class="btn btn-default" type="submit">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- / panel preview -->
</div>
@endsection