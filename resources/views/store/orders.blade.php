@extends('store.store')

@section('content')
<div class="container">    

    <h3>My orders</h3>

    <table class="table">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
            </tr>
        </thead>        
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    <ul class="list-group-item">
                        @foreach($order->items as $item)
                        <li>- {{ $item->product->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $order->total }}</td>
                <td>
                    @if($order->status == 0)
                    <span class='label label-default'>Realizado</span>
                    @elseif($order->status == 1)
                    <span class='label label-warning'>Lançado</span>
                    @elseif($order->status == 2)
                    <span class='label label-info'>Enviado</span>
                    @elseif($order->status == 3)
                    <span class='label label-success'>Completo</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>        
    </table>

</div>
@stop