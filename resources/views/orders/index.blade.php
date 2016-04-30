@extends('app')

@section('content')

<h1>Orders</h1>

<table class='table table-bordered table-hover table-condensed table-striped'>
    <thead>
        <tr>
            <th>Protocolo</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>
                {!! Form::select('status', ['0' => 'Realizado', '1' => 'Lançado', '2'=>'Enviado', '3'=>'Completo'], $order->status, ['cod'=>$order->id, 'class'=>'orderStatus form-control']) !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $orders->render() !!}

@endsection