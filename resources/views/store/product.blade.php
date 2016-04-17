@extends('store.store')

@section('categories')
@include('store.partial.categories')
@stop

@section('content')

<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">

                @if(count($product->images))                        
                <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" width='200px' alt="" />
                @else
                <img src="{{ url('images/no-img.jpg') }}" alt="" />
                @endif

            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($product->images as $images)
                        <a href="#">
                            <img src="{{ url('uploads/'.$images->id.'.'.$images->extension) }}" alt="" width="80">
                        </a>
                        @endforeach
                    </div>

                </div>

            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->

                <h2>{{ $product->name }}</h2>

                <p>{{ $product->description }}</p>
                <span>
                    <span>R$ {{ $product->price }}</span>
                    <a href="{{ route('cart.add', ['id'=>$product->id]) }}" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Adicionar no Carrinho
                    </a>
                </span>
            </div>
            <!--/product-information-->
        </div>

    </div>
    <!--/product-details-->

    <div class="col-md-12 col-sm-12">

        <div class="panel panel-default">
            <div class="panel-heading">Tags do produto</div>
            <div class="panel-body">
                @foreach($product->tags as $tag)
                <a href="{{ route('store.tag', ['id'=>$tag->id]) }}" class="btn btn-info">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> {{ $tag->name }}
                </a>
                @endforeach
            </div>
        </div>

    </div>

</div>

@stop