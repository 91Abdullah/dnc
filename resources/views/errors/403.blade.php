@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
        	<h2 class="text-center">{{ $exception->getMessage() }}</h2>
        </div>
    </div>
</div>
@endsection