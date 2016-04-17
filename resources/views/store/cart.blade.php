@extends('store.store')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-striped tbale-hover">
                <thead>
                    <tr class="cart_menu">
                        <th class="image">Item</th>
                        <th class="description">Descrição</th>
                        <th class="price">Valor</th>
                        <th class="price">Qtd</th>
                        <th class="price">Total</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cart->all() as $key => $item)
                    <tr>
                        <td class="cart_product">
                            <a href="{{ route('store.product',['id'=>$key]) }}">Img</a>
                        </td>
                        <td class="cart_description">
                            <h4>
                                <a href="{{ route('store.product',['id'=>$key]) }}">{{ $item['name'] }}</a>
                            </h4>
                            <p>Código: {{ $key }}</p>
                        </td>
                        <td class="cart_price">R$ {{ $item['price'] }}</td>
                        <td class="cart_quantity">
                            <input type="text" class="updateCartProdQtd" cod="{{ $key }}" value="{{ $item['qtd'] }}">
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">R$ {{ $item['price']*$item['qtd'] }}</p>
                        </td>
                        <td class="cart_delete">
                            <a href="{{ route('cart.destroy', ['id'=>$key]) }}" class="cart_quantity_delete">[ x ]</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="" colspan="6">
                            <p>Nenhum item encontrado.</p>
                        </td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="6">
                            <div class="pull-right">
                                <h3>Total: R$ {{ $cart->getTotal() }}</h3>
                                <a href="#" class="btn btn-block btn-success">FECHAR A CONTA</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@stop
