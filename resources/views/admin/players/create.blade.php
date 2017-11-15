@extends('layouts.app_sidebar')

@section('content')



    <div class="col-sm-12">
        <legend>Create player</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-12">
        <h4>Player profile</h4>
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
                {!! Form::open(array('action' => array('Admin\PlayerController@store'), 'method' => 'POST', 'files' => true))  !!}
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="player_number" class="col-sm-3 control-label">Player Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="player_number" name="player_number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Birthdate</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Starter</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="starter" name="starter">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Team</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="team" name="team">
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Image', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-sm-9">
                            {{ Form::file('image') }}
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