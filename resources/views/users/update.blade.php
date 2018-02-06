@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Updates User</h1>
            <p>Update user.</p>
            <p><a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Back to Users</a></p>
        </div>

        <div class="panel-body">
            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['update.user', $user->id], 'class' => 'form-horizontal']) !!}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Name', ['class' => 'control-label col-sm-4']) !!}
                <div class="col-sm-8">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', 'E-Mail Address', ['class' => 'control-label col-sm-4']) !!}
                <div class="col-sm-8">
                    {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::label('password', 'Password', ['class' => 'control-label col-sm-4']) !!}
                <div class="col-sm-8">
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label col-sm-4']) !!}
                <div class="col-sm-8">
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>

        {{--  <div class="panel-footer text-center">
            {!! $cdrs->links() !!}
        </div>  --}}
    </div>
    </div>
@endsection