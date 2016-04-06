@extends('app')

@section('content')

<h1>Images of product <u>{{ $product->name  }}</u></h1>
        
<br/>
<a href="{{ route('products.images.create', ['id'=>$product->id]) }}" class="btn btn-xs btn-default">New Product Image</a>
<br/><br/>

<table class='table table-bordered table-hover table-condensed table-striped'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Extension</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach($product->images as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>
                <img src="{{ url('/uploads/'.$value->id.'.'.$value->extension) }}" width="80" />
            </td>
            <td>{{ $value->extension }}</td>
            <td>
               <a href="{{ route('products.images.destroy', ['id'=>$value->id]) }}" class="btn btn-xs btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('products') }}" class="btn btn-block btn-default">Back</a>
@endsection