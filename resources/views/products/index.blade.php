@extends('app')

@section('content')

<h1>Products</h1>
        
<br/>
<a href="{{ route('products.create') }}" class="btn btn-xs btn-default">New Product</a>
<br/><br/>

<table class='table table-bordered table-hover table-condensed table-striped'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Featured</th>
            <th>Recommend</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($values as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->price }}</td>
            <td>{{ $value->featured == 1 ? 'Yes' : 'No' }}</td>
            <td>{{ $value->recommend == 1 ? 'Yes' : 'No' }}</td>
            <td>
                <a href="{{ route('products.edit',['id'=>$value->id]) }}" class="btn btn-xs btn-primary">Edit</a>
                <a href="{{ route('products.destroy',['id'=>$value->id]) }}" class="btn btn-xs btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection