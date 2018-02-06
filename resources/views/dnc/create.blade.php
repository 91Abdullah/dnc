@extends('layouts.app')

@section('content')

    <div class="row">

        {!! Form::open(['route' => 'dnc_create_post', 'method' => 'post', 'class' => 'col-md-6 col-md-offset-3']) !!}
    
        <div class="panel panel-default">

            <div class="panel-heading">
                <h2>Add a number</h2>
            </div>

            <div class="panel-body">

                <div class="form-group">
            
                    {!! Form::label('name', 'Name') !!}
                    
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
        
                </div>
        
                <div class="form-group">
        
                    {!! Form::label('number', 'Number') !!}
                    
                    {!! Form::text('number', null, ['class' => 'form-control']) !!}

                    @if ($errors->has('number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('number') }}</strong>
                        </span>
                    @endif
        
                </div>
        
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

            </div>
        </div>

        {!! Form::close() !!}

    </div>
        

@endsection