@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Welcome!</h1></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Welcome to TeleCard Do-Not-Call List portal version 1.1</p>
                    <p>Users can add DNC numbers via portal.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
