@extends('store.store')

@section('content')
<div class="container">    
    @if($cart == 'empty')
    <h3>Carrinho de compras vazio!</h3>
    @else
    <h3>Pedido realizado com sucesso</h3>    
    <p class="alert alert-success">O pedido #{{ $order->id }} foi realizado com sucesso!</p>
    @endif
    <hr/>
    <a href="{{ url('/') }}">Continuar comprando</a>
    <hr/>
</div>
@stop