@extends('frontend.layouts.app')
@section('title', 'index')
@section('content')
    <!-- banner -->
    <div class="banner banner10">
        <div class="container">
            <h2>{{trans('messages.product_detail')}}</h2>
        </div>
    </div>
    <!-- //banner -->
    <!-- single -->
    <div class="single">
        <div class="container">
            <div class="col-md-4 single-left">
                <div class="flexslider">
                        <img src="{{route('product.image', $product->id)}}" data-imagezoom="true" class="img-responsive" alt="{{$product->name}}">
                </div>
            </div>
            <div class="col-md-8 single-right">
                <h3>{{$product->name}}</h3>
                <div class="description">
                    <h5><i>{{trans('messages.desc_product_lable')}}</i></h5>
                    <p>{{$product->desc}}</p>
                </div>
                <div class="simpleCart_shelfItem">
                    <p><i class="item_price">{{number_format($product->price, 0, ',', '.')}} {{trans('messages.money')}}</i></p>
                    <div>
                        <a href="{{route('cart.product', $product->id)}}" class="w3ls-cart">{{trans('messages.add_to_cart')}}</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //single -->
@endsection