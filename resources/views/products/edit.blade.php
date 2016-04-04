@extends('app')

@section('content')

<h1>Edit Product</h1>

{!! Form::open(['route'=>['products.update', $value->id], 'method'=>'PUT']) !!}

<div class='form-group'>
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category_id', $categories, $value->category->id, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', $value->name, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', $value->description, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', $value->price, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('featured', 'Featured:') !!}
    {!! Form::select('featured', ['1' => 'Yes', '0' => 'No'], $value->featured, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('recommend', 'Recommend:') !!}
    {!! Form::select('recommend', ['1' => 'Yes', '0' => 'No'], $value->recommend, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::submit('Update Category', ['class'=>'btn btn-block btn-primary']) !!}
    <a href="{{ route('products') }}" class="btn btn-block btn-default">Back</a>
</div>


{!! Form::close() !!}

@endsection