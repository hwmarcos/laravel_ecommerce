@extends('app')

@section('content')

<h1>Upload Product Image</h1>

{!! Form::open(['route'=>['products.images.store', $product->id], 'method'=>'POST', 'enctype'=>"multipart/form-data"]) !!}

<div class='form-group'>
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', null, ['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::submit('Upload Image', ['class'=>'btn btn-block btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection