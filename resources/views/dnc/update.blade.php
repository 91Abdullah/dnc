
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Edit number</h2>
                </div>
                
                {!! Form::model($dnc_entity, ['route' => ['dnc_update_post', $dnc_entity->id], 'method' => 'patch']) !!}
                <div class="panel-body">

                        <div class="form-group">
                    
                            {!! Form::label('name', 'Name') !!}
                            
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                
                        </div>
                
                        <div class="form-group">
                
                            {!! Form::label('number', 'Number') !!}
                            
                            {!! Form::text('number', null, ['class' => 'form-control']) !!}
                
                        </div>
                
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        
                    </div>
                </div>
                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
@endsection