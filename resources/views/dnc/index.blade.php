@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
@endpush

@section('content')

<div class="col-md-6 col-md-offset-3">
    @include('shared.status')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>DNC List</h1>
            <p><a class="btn btn-primary" href="{{ route('dnc_create') }}"><i class="fas fa-plus"></i> Add number</a></p>
        </div>
        <div class="panel-body table-responsive">
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $listItem)
                        <tr>
                            <td>{{ $listItem->id }}</td>
                            <td>{{ $listItem->name }}</td>
                            <td>{{ $listItem->number }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('dnc_update', $listItem->id) }}"><i class="fas fa-edit"></i> Edit</a>
                                
                                {!! Form::open(['route' => ['dnc_delete', $listItem->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                {!! Form::close() !!}
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection