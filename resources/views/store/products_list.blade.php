@extends('store.store')

@section('categories')
@include('store.categories_partial')
@stop

@section('content')
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">
            Produtos > <u>{{ isset($category->name) ? $category->name : 'Default' }}</u>
        </h2>

        @foreach($products as $value)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">

                        @if(count($value->images))                        
                        <img src="{{ url('uploads/'.$value->images->first()->id.'.'.$value->images->first()->extension) }}" width='200px' alt="" />
                        @else
                        <img src="{{ url('images/no-img.jpg') }}" alt="" />
                        @endif

                        <h2>R$ {{ $value->price }}</h2>
                        <p>{{ $value->name }}</p>
                        <a href="http://commerce.dev:10088/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{ $value->price }}</h2>
                            <p>{{ $value->name }}</p>
                            <a href="http://commerce.dev:10088/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div><!--features_items-->
    
</div>

@stop
