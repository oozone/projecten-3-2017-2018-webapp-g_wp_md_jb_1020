@extends('layouts.app_sidebar')

@section('content')



    <div class="col-sm-12">
        <legend>{{ __('Upload players') }}</legend>
    </div>
    <!-- panel preview -->
    <div class="col-sm-12">
        <h4>{{ __('CSV upload') }}</h4>
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
                <div class="col-sm-9 col-sm-offset-3" style="margin-bottom: 30px;">
                    <h4>{{ __('Upload players') }}</h4>
                    {{ __('Team') }}: {{ $team->name }}
                </div>

                {!! Form::model($team, array('action' => array('Admin\TeamController@csvImport', $team->id), 'method' => 'POST', 'files' => true))  !!}

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ __('Document') }}</label>
                    <div class="col-sm-9">
                        <div class="well-sm">
                            <i class="fa fa-file-excel-o" aria-hidden="true"></i> <a href="/files/excel/waterpolo_template.xlsx">{{ __('Template') }}</a>
                        </div>

                        {{ Form::file('csv') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <a href="{{url('admin/teams/'.$team->id.'/edit')}}" class="btn btn-default">{{ __('Back') }}</a>
                        <button class="btn btn-default" type="submit">{{ __('Save') }}</button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div> <!-- / panel preview -->
@endsection