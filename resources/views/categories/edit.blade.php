@extends('app')

@section('content')

<h1>Edit Category</h1>

{!! Form::open(['route'=>['categories.update', $value->id], 'method'=>'PUT']) !!}

<div class='form-group'>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', $value->name, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', $value->description, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::submit('Update Category', ['class'=>'btn btn-block btn-primary']) !!}
    <a href="{{ route('categories') }}" class="btn btn-block btn-default">Back</a>
</div>


{!! Form::close() !!}

@endsection