@extends('store.store')

@section('content')
<div class="container">    
    @if($cart == 'empty')
    <h3>Carrinho de compras vazio!</h3>    
    <a href="{{ url('/') }}">Continuar comprando</a>
    @else
    <h3>Pedido realizado com sucesso</h3>    
    <p class="alert alert-success">O pedido #{{ $order->id }} foi realizado com sucesso!</p>
    @endif
</div>
@stop