@extends('app')

@section('content')

<h1>Create Product</h1>

{!! Form::open(['route'=>'products.store', 'method'=>'POST']) !!}

<div class='form-group'>
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('featured', 'Featured:') !!}
    {!! Form::select('featured', ['1' => 'Yes', '0' => 'No'], null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('recommend', 'Recommend:') !!}
    {!! Form::select('recommend', ['1' => 'Yes', '0' => 'No'], null, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::textarea('tags', null, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::submit('Add Category', ['class'=>'btn btn-block btn-primary']) !!}
    <a href="{{ route('products') }}" class="btn btn-block btn-default">Back</a>
</div>

{!! Form::close() !!}

@endsection