@extends('app')

@section('content')

<h1>Create Category</h1>

{!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}

<div class='form-group'>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::submit('Add Category', ['class'=>'btn btn-block btn-primary']) !!}
</div>


{!! Form::close() !!}

@endsection