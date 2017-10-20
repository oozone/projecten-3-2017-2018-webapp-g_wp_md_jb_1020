@extends('layouts.app')

@section('content')
    <div class="col-sm-12">
        <legend>Create player</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-10 col-sm-offset-2">
        <h4>Player profile</h4>
        <div class="panel panel-default">
            <div class="panel-body form-horizontal payment-form">
                <form action="/admin/players">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Birthdate</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status">
                                <option>Active</option>
                                <option>Inactive</option>
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
                        <label for="status" class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <a class="btn btn-default" type="submit">Save</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div> <!-- / panel preview -->
@endsection