@extends('layouts.app_sidebar')

@section('content')

<div class="container">

    <div class="col-sm-12">
        <legend>{{ __('Create player') }}</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-12">
        <h4>{{ __('Player profile') }}</h4>
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
                            <a href="{{url('admin/players')}}" class="btn btn-default">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>

                    {!! Form::open(array('action' => array('Admin\PlayerController@store'), 'method' => 'POST', 'files' => true))  !!}
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">{{ __('Name') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">{{ __('Player number') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="player_number" name="player_number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">{{ __('Birthdate') }}</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">{{ __('Starter') }}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="starter" name="starter">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">{{ __('Status') }}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status">
                                <option value="1">Active</option>
                                <option value="2">Suspended</option>
                                <option value="3">Game over</option>
                                <option value="3">Injured</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">{{ __('Division') }}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="division" name="division">
                                @foreach($divisions as $d)
                                    <option value="{{ $d->id }}">{{ __($d->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">{{ __('Team') }}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="team" name="team">
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{__($team->name) }}</option>
                                @endforeach
                            </select>
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
</div>
@endsection