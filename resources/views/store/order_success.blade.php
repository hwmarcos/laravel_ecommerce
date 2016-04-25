@extends('store.store')
@section('content')

<div class="alert alert-success">COMPRA FINALIZADA COM SUCESSO.</div>

<ul class="list-group">
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('auth/logout') }}">Logout</a></li>
</ul>


@stop