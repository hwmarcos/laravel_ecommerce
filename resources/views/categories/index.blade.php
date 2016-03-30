@extends('app')

@section('content')

<h1>Categories</h1>
        
<br/>
<a href="{{ route('categories.create') }}" class="btn btn-xs btn-default">New Category</a>
<br/><br/>

<table class='table table-bordered table-hover table-condensed table-striped'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($values as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td>
                <a href="{{ route('categories.edit',['id'=>$value->id]) }}" class="btn btn-xs btn-primary">Edit</a>
                <a href="{{ route('categories.destroy',['id'=>$value->id]) }}" class="btn btn-xs btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection